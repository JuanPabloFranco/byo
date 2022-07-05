<?php

add_action( 'tgmpa_register', 'mirya_register_required_plugins' );

function mirya_register_required_plugins() {

	$plugins = array(

		array(
			'name'     => 'Elementor Website Builder',
			'slug'     => 'elementor',
			'required' => true,
		),
		array(
            'name' => 'Mirya Core',
            'slug' => 'mirya-core',
            'source' => 'https://hasnaanajmi.com/TM/mirya/mirya-content/plugins/mirya-core.zip',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
		array(
            'name' => 'Mirya Custom Recent Post Widget',
            'slug' => 'mirya-recent-posts',
            'source' => 'https://hasnaanajmi.com/TM/mirya/mirya-content/plugins/custom-recent-post-widget-thumbnail.zip',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
        ),
		array(
			'name'     => 'One Click Demo Import',
			'slug'     => 'one-click-demo-import',
			'required' => false,
        ),
        array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),

    );
    
	$config = array(
		'id'           => 'mirya',
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        
	);

	tgmpa( $plugins, $config );
}