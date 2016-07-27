<?php

/**
 * Pressgang configuration
 *
 */
return array (

    /*
     * files
     *
     * Array of files to include in the theme from the '/inc' directory using the Loader class
     *
     */
    'inc' => array(
        // 'addthis',
        'admin-logo',
        // 'breadcrumbs',
        'customizer',
        'emojicons',
        'filters',
        'gallery',
        'google-analytics',
        'images',
        // 'infinitepagination',
        'opengraph',
        'permalinks',
        // 'require-featured-image',
        'sitemap',
        'slider',
        'title',
        'projects',
    ),

    /*
     * menus
     *
     * Array representing each Menu in the theme.
     *
     * @var array
     */
    'menus' => array(
        'primary' => "Primary Navigation",
        'footer' => "Footer Menu",
    ),

    /*
     * widgets
     *
     * Array representing each widget sidebar used in the theme.
     *
     * @var array
     */
    'widgets' => array(),

    /*
     * actions
     *
     * Array representing functions to hook on given actions
     *
     * @var array
     */
    'actions' => array(),

    /*
     * templates
     *
     * Load any of the Pressgang page templates into the childtheme
     *
     * @var array
     */
    'templates' => array(
        'single-page.php'
    ),

    /*
     * scripts
     *
     * Array of scripts on $handle => $args array where $args match wp_register_script, wit additional 'hook' param
     * for the action to enque the script on (default = wp_enqueue_scripts)
     *
    */
    'scripts' => array(
        'bootstrap' => array(
            'src' => get_template_directory_uri() . '/js/min/bootstrap.min.js',
            'deps' => array('jquery'),
            'version' => '3.2.0',
            'in_footer' => true,
        ),
    ),

    /*
     * custom-post-types
     *
     * Array of custom_post_types to be registered
     *
     */
    'custom-post-types' => array(
        'project' => array(
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'projects'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => true,
            'menu_position' => 20,
            'supports' => array('title', 'editor', 'thumbnail', 'gallery', 'excerpt', 'comments', 'custom-fields', 'tags'),
            'taxonomies' => array('skill', 'company', 'technology'),
        ),
    ),

    /*
     * custom-taxonomies
     *
     * Array of custom taxonomies to be registered
     *
     * NB: supply $args array and $object-type for register_taxonomy
     *
     */
    'custom-taxonomies' => array(
        'company' => array (
            'object-type' => 'project',
            'args' => array(
                'hierarchical' => true,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array(
                    'slug' => __('companies', THEMENAME),
                    'with_front' => true,
                    'hierarchical' => true,
                ),
            ),
        ),
        'technology' => array (
            'object-type' => 'project',
            'args' =>  array(
                'rewrite' => array(
                    'slug' => __('technologies', THEMENAME),
                    'with_front' => true,
                ),
            ),

        ),
        'skill' => array (
            'object-type' => 'project',
            'args' =>  array(
                'rewrite' => array(
                    'slug' => __('skills', THEMENAME),
                    'with_front' => true,
                ),
            ),

        ),
    ),

    /*
     * support
     *
     * Include theme support
     *
     * @var array
     */
    'support' => array(
        'html5',
        'post-thumbnails',
    ),

    /*
     * plugins
     *
     * Array of plugins required by the theme (displays admin warning if plugin not activated)
     *
     * Use names of the plugin sub-directory/file.
     * See http://codex.wordpress.org/Function_Reference/is_plugin_active
     *
     * Optionally array values supply the admin warning message
     *
     */
    'plugins' => array(
        'Timber',  // Timber is required for the theme templating!
    ),
);
