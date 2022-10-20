<?php

function lth_plugin_activation() {

 

        // Khai bao plugin can cai dat

        $plugins = array(



                array(

                        'name' => 'Advanced Editor Tools',

                        'slug' => 'tinymce-advanced',

                        'required' => true,

                ),



                array(

                        'name' => 'Auto Image Attributes From Filename With Bulk Updater',

                        'slug' => 'auto-image-attributes-from-filename-with-bulk-updater',

                        'required' => true,

                ),



                array(

                        'name' => 'Automatic Translate Addon For Loco Translate',

                        'slug' => 'automatic-translator-addon-for-loco-translate',

                        'required' => true,

                ),



                array(

                        'name' => 'BIALTY - Bulk Image Alt Text (Alt tag, Alt Attribute) with Yoast SEO + WooCommerce',

                        'slug' => 'bulk-image-alt-text-with-yoast',

                        'required' => true,

                ),



                array(

                        'name' => 'Contact Form 7',

                        'slug' => 'contact-form-7',

                        'required' => true,

                ),



                array(

                        'name' => 'Contact Form CFDB7',

                        'slug' => 'contact-form-cfdb7',

                        'required' => true,

                ),



                array(

                        'name'               => 'Duplicate Page and Post', // The plugin name

                        'slug'               => 'duplicate-wp-page-post', // The plugin slug (typically the folder name)

                        'source'             => get_theme_file_path() . '/inc/plugins/duplicate-wp-page-post.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),



                array(

                        'name' => 'File Manager Advanced',

                        'slug' => 'file-manager-advanced',

                        'required' => true,

                ),



                array(

                        'name' => 'GTranslate',

                        'slug' => 'gtranslate',

                        'required' => true,

                ),



                array(

                        'name' => 'Loco Translate',

                        'slug' => 'loco-translate',

                        'required' => true,

                ),



                array(

                        'name' => 'Nextend Social Login',

                        'slug' => 'nextend-facebook-connect',

                        'required' => true,

                ),



                array(

                        'name'               => 'PK Active Flatsome', // The plugin name

                        'slug'               => 'pk-active-flatsome', // The plugin slug (typically the folder name)

                        'source'             => get_theme_file_path() . '/inc/plugins/pk-active-flatsome.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),



                array(

                        'name' => 'WooCommerce',

                        'slug' => 'woocommerce',

                        'required' => true,

                ),



                array(

                        'name' => 'WooCommerce PDF Invoices & Packing Slips',

                        'slug' => 'woocommerce-pdf-invoices-packing-slips',

                        'required' => true,

                ),



                array(

                        'name' => 'WordPress Importer',

                        'slug' => 'wordpress-importer',

                        'required' => true,

                ),



                array(

                        'name'               => 'WP Rocket', // The plugin name

                        'slug'               => 'wp-rocket', // The plugin slug (typically the folder name)

                        'source'             => get_theme_file_path() . '/inc/plugins/wp-rocket.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),



                array(

                        'name' => 'WP SMTP',

                        'slug' => 'wp-smtp',

                        'required' => true,

                ),



                array(

                        'name' => 'YITH WooCommerce Wishlist',

                        'slug' => 'yith-woocommerce-wishlist',

                        'required' => true,

                ),



                array(

                        'name' => 'YITH WooCommerce Ajax Product Filter',

                        'slug' => 'yith-woocommerce-ajax-navigation',

                        'required' => true,

                ),



                array(

                        'name' => 'Yoast SEO',

                        'slug' => 'wordpress-seo',

                        'required' => true,

                ),



                array(

                        'name' => 'Really Simple SSL',

                        'slug' => 'really-simple-ssl',

                        'required' => true,

                ),



                array(

                        'name' => 'Customizer Export/Import',

                        'slug' => 'customizer-export-import',

                        'required' => true,

                ),

        );

 

        // Thiet lap TGM

        $configs = array(

                'menu' => 'tp_plugin_install',

                'has_notice' => true,

                'dismissable' => false,

                'is_automatic' => true

        );

        tgmpa( $plugins, $configs );

 

}

add_action('tgmpa_register', 'lth_plugin_activation');

?>