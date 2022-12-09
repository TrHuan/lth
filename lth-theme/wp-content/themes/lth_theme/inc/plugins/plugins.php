<?php

function lth_plugin_activation()
{



        // Khai bao plugin can cai dat

        $plugins = array(



                array(

                        'name' => 'Advanced Editor Tools',

                        'slug' => 'tinymce-advanced',

                        'required' => true,

                ),



                array(

                        'name' => 'WooCommerce',

                        'slug' => 'woocommerce',

                        'required' => true,

                ),


                array(

                        'name' => 'Premmerce Permalink Manager for WooCommerce',

                        'slug' => 'woo-permalink-manager',

                        'required' => true,

                ),



                array(

                        'name' => 'Shipping Viet Nam WooCommerce',

                        'slug' => 'shipping-viet-nam-woocommerce',

                        'required' => true,

                ),



                array(

                        'name' => 'YITH WooCommerce Ajax Product Filter',

                        'slug' => 'yith-woocommerce-ajax-navigation',

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

                        'name' => 'QR code MeCard/vCard generator',

                        'slug' => 'wp-qrcode-me-v-card',

                        'required' => true,

                        // desktop download contact, mobile add contact vào danh bạ điện thoại

                ),



                array(

                        'name'               => 'Polylang Pro', // The plugin name

                        'slug'               => 'polylang-pro', // The plugin slug (typically the folder name)

                        'source'             => get_template_directory() . '/inc/plugins/polylang-pro.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),



                array(

                        'name'               => 'Theme Translation For Polylang', // The plugin name

                        'slug'               => 'theme-translation-for-polylang', // The plugin slug (typically the folder name)

                        'source'             => get_template_directory() . '/inc/plugins/theme-translation-for-polylang.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),



                array(

                        'name' => 'Hyyan WooCommerce Polylang Integration',

                        'slug' => 'woo-poly-integration',

                        'required' => true,

                ),



                array(

                        'name' => 'WP SMTP',

                        'slug' => 'wp-smtp',

                        'required' => true,

                ),



                array(

                        'name' => 'Yoast SEO',

                        'slug' => 'wordpress-seo',

                        'required' => true,

                ),



                array(

                        'name' => 'Wp Rocket',

                        'slug' => 'wp-rocket',

                        'source'             => get_template_directory() . '/inc/plugins/wp-rocket.zip', // The plugin source

                        'required'           => true, // If false, the plugin is only 'recommended' instead of required

                        'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

                        'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

                        'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

                        'external_url'       => '', // If set, overrides default API URL and points to an external URL

                ),



                array(

                        'name' => 'Duplicate Page and Post',

                        'slug' => 'duplicate-wp-page-post',

                        'required' => true,

                ),



                array(

                        'name' => 'Better Search Replace',

                        'slug' => 'better-search-replace',

                        'required' => true,

                ),



                array(

                        'name' => 'Really Simple SSL',

                        'slug' => 'really-simple-ssl',

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

        tgmpa($plugins, $configs);
}

add_action('tgmpa_register', 'lth_plugin_activation');
