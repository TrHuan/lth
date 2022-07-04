<?php

namespace WPGraphQL\Type\ObjectType;

use GraphQL\Type\Definition\ResolveInfo;
use WPGraphQL\AppContext;
use WPGraphQL\Data\Connection\MenuConnectionResolver;
use WPGraphQL\Data\Connection\PostObjectConnectionResolver;
use WPGraphQL\Data\Connection\TermObjectConnectionResolver;
use WPGraphQL\Model\MenuItem as MenuItemModel;

class MenuItem {

	/**
	 * Register the MenuItem Type
	 *
	 * @return void
	 */
	public static function register_type() {
		register_graphql_object_type(
			'MenuItem',
			[
				'description' => __( 'Navigation menu items are the individual items assigned to a menu. These are rendered as the links in a navigation menu.', 'wp-graphql' ),
				'interfaces'  => [ 'Node', 'DatabaseIdentifier' ],
				'connections' => [
					'connectedNode' => [
						'toType'               => 'MenuItemLinkable',
						'connectionInterfaces' => [ 'MenuItemLinkableConnection' ],
						'description'          => __( 'Connection from MenuItem to it\'s connected node', 'wp-graphql' ),
						'oneToOne'             => true,
						'resolve'              => function ( MenuItemModel $menu_item, $args, AppContext $context, ResolveInfo $info ) {

							if ( ! isset( $menu_item->databaseId ) ) {
								return null;
							}

							$object_id   = (int) get_post_meta( $menu_item->databaseId, '_menu_item_object_id', true );
							$object_type = get_post_meta( $menu_item->databaseId, '_menu_item_type', true );

							$resolver = null;
							switch ( $object_type ) {
								// Post object
								case 'post_type':
									$resolver = new PostObjectConnectionResolver( $menu_item, $args, $context, $info );
									$resolver->set_query_arg( 'p', $object_id );
									break;

								// Taxonomy term
								case 'taxonomy':
									$resolver = new TermObjectConnectionResolver( $menu_item, $args, $context, $info );
									$resolver->set_query_arg( 'include', $object_id );
									break;
								default:
									$resolved_object = null;
									break;
							}

							return null !== $resolver ? $resolver->one_to_one()->get_connection() : null;

						},
					],
					'menu'          => [
						'toType'      => 'Menu',
						'description' => __( 'The Menu a MenuItem is part of', 'wp-graphql' ),
						'oneToOne'    => true,
						'resolve'     => function ( MenuItemModel $menu_item, $args, $context, $info ) {
							$resolver = new MenuConnectionResolver( $menu_item, $args, $context, $info );
							$resolver->set_query_arg( 'include', $menu_item->menuDatabaseId );

							return $resolver->one_to_one()->get_connection();
						},
					],
				],
				'fields'      => [
					'id'               => [
						'description' => __( 'The globally unique identifier of the nav menu item object.', 'wp-graphql' ),
					],
					'parentId'         => [
						'type'        => 'ID',
						'description' => __( 'The globally unique identifier of the parent nav menu item object.', 'wp-graphql' ),
					],
					'parentDatabaseId' => [
						'type'        => 'Int',
						'description' => __( 'The database id of the parent menu item or null if it is the root', 'wp-graphql' ),
					],
					'cssClasses'       => [
						'type'        => [
							'list_of' => 'String',
						],
						'description' => __( 'Class attribute for the menu item link', 'wp-graphql' ),
					],
					'description'      => [
						'type'        => 'String',
						'description' => __( 'Description of the menu item.', 'wp-graphql' ),
					],
					'label'            => [
						'type'        => 'String',
						'description' => __( 'Label or title of the menu item.', 'wp-graphql' ),
					],
					'linkRelationship' => [
						'type'        => 'String',
						'description' => __( 'Link relationship (XFN) of the menu item.', 'wp-graphql' ),
					],
					'menuItemId'       => [
						'type'              => 'Int',
						'description'       => __( 'WP ID of the menu item.', 'wp-graphql' ),
						'deprecationReason' => __( 'Deprecated in favor of the databaseId field', 'wp-graphql' ),
					],
					'target'           => [
						'type'        => 'String',
						'description' => __( 'Target attribute for the menu item link.', 'wp-graphql' ),
					],
					'title'            => [
						'type'        => 'String',
						'description' => __( 'Title attribute for the menu item link', 'wp-graphql' ),
					],
					'url'              => [
						'type'        => 'String',
						'description' => __( 'URL or destination of the menu item.', 'wp-graphql' ),
					],
					// Note: this field is added to the MenuItem type instead of applied by the "UniformResourceIdentifiable" interface
					// because a MenuItem is not identifiable by a uri, the connected resource is identifiable by the uri.
					'uri'              => [
						'type'        => 'String',
						'description' => __( 'The uri of the resource the menu item links to', 'wp-graphql' ),
					],
					'path'             => [
						'type'        => 'String',
						'description' => __( 'Path for the resource. Relative path for internal resources. Absolute path for external resources.', 'wp-graphql' ),
					],
					'isRestricted'     => [
						'type'        => 'Boolean',
						'description' => __( 'Whether the object is restricted from the current viewer', 'wp-graphql' ),
					],
					'order'            => [
						'type'        => 'Int',
						'description' => __( 'Menu item order', 'wp-graphql' ),
					],
					'locations'        => [
						'type'        => [
							'list_of' => 'MenuLocationEnum',
						],
						'description' => __( 'The locations the menu item\'s Menu is assigned to', 'wp-graphql' ),
					],
					'connectedObject'  => [
						'type'              => 'MenuItemObjectUnion',
						'deprecationReason' => __( 'Deprecated in favor of the connectedNode field', 'wp-graphql' ),
						'description'       => __( 'The object connected to this menu item.', 'wp-graphql' ),
						'resolve'           => function ( $menu_item, array $args, AppContext $context, $info ) {

							$object_id   = intval( get_post_meta( $menu_item->menuItemId, '_menu_item_object_id', true ) );
							$object_type = get_post_meta( $menu_item->menuItemId, '_menu_item_type', true );

							switch ( $object_type ) {
								// Post object
								case 'post_type':
									$resolved_object = $context->get_loader( 'post' )->load_deferred( $object_id );
									break;

								// Taxonomy term
								case 'taxonomy':
									$resolved_object = $context->get_loader( 'term' )->load_deferred( $object_id );
									break;
								default:
									$resolved_object = null;
									break;
							}

							/**
							 * Allow users to override how nav menu items are resolved.
							 * This is useful since we often add taxonomy terms to menus
							 * but would prefer to represent the menu item in other ways,
							 * e.g., a linked post object (or vice-versa).
							 *
							 * @param \WP_Post|\WP_Term $resolved_object Post or term connected to MenuItem
							 * @param array             $args            Array of arguments input in the field as part of the GraphQL query
							 * @param AppContext        $context         Object containing app context that gets passed down the resolve tree
							 * @param ResolveInfo       $info            Info about fields passed down the resolve tree
							 * @param int               $object_id       Post or term ID of connected object
							 * @param string            $object_type     Type of connected object ("post_type" or "taxonomy")
							 *
							 * @since 0.0.30
							 */
							return apply_filters(
								'graphql_resolve_menu_item',
								$resolved_object,
								$args,
								$context,
								$info,
								$object_id,
								$object_type
							);
						},
					],
				],
			]
		);

	}
}
