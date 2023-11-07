<?php

	function css_setup() {
		$styled_blocks = ['bootstrap.min', 'bootstrap-icons', 'template'];
		foreach ( $styled_blocks as $block_name ) {
			$args = array(
				'handle' => "myfirsttheme-$block_name",
				'src'    => get_theme_file_uri( "assets/css/$block_name.css" ),
				$args['path'] = get_theme_file_path( "assets/css/$block_name.css" ),
			);
			wp_enqueue_block_style( "core/$block_name", $args );
		}
	}
add_action( 'after_setup_theme', 'css_setup' );
	function bootstrap_js() {

		wp_register_script('jquery',
		get_stylesheet_directory_uri().'/assets/js/jquery.min.js',
		array(),
		'2.2.3',
		true
		);
		wp_register_script('bootstrap_js',
		get_stylesheet_directory_uri().'/assets/js/bootstrap.bundle.min.js',
		array('jquery'),
		'5.0.2',
		true
		);
		wp_register_script('sticky',
			get_stylesheet_directory_uri().'/assets/js/jquery.sticky.js',
			array('jquery'),
			'1',
			true
		);
		wp_register_script('click-scroll',
			get_stylesheet_directory_uri().'/assets/js/click-scroll.js',
			array('jquery','sticky'),
			'1',
			false
		);
		wp_register_script('custom',
			get_stylesheet_directory_uri().'/assets/js/custom.js',
			array('jquery'),
			'1',
			true
		);/*
		wp_register_script( 'popper_js',
  			'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', 
  			array(), 
  			'1.16.1', 
  			true
  		);
		wp_enqueue_script( 'bootstrap_js',
  			'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js', 
  			array('jquery','popper_js'), 
  			'4.6.2', 
  			true
  		);
		*/

	}
	add_action( 'wp_footer', 'bootstrap_js');

	
    // Register Custom Navigation Walker
    if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
        // file does not exist... return an error.
        return new WP_Error(
			'bootstrap-5-wordpress-navbar-walker-missing',
			__(
				'It appears the class-wp-bootstrap-navwalker.php file may be missing.',
				'wp-bootstrap-navwalker'
			)
        );
    } else {
        // file exists... require it.
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	    add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
	    /**
	     * Use namespaced data attribute for Bootstrap's dropdown toggles.
	     *
	     * @param array    $atts HTML attributes applied to the item's `<a>` element.
	     * @param WP_Post  $item The current menu item.
	     * @param stdClass $args An object of wp_nav_menu() arguments.
	     * @return array
	     */
	    function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
		    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
			    if ( array_key_exists( 'data-toggle', $atts ) ) {
				    unset( $atts['data-toggle'] );
				    $atts['data-bs-toggle'] = 'dropdown';
			    }
		    }
		    return $atts;
	    }
	    register_nav_menu('main-menu', 'Main menu');
    }
