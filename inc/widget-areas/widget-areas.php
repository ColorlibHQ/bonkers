<?php

	/*
	Sidebar
	===================================
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bonkers' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	/*
	Front Page Sections
	===================================
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page - Services Section', 'bonkers' ),
		'id'            => 'services-section',
		'description'   => esc_html__( 'This is the Services Section in the Front Page. Here Add the "Bonkers - Service widget"', 'bonkers' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page - Phone Section Left', 'bonkers' ),
		'id'            => 'phone-section-left',
		'description'   => esc_html__( 'This is the left Phone Section in the Front Page. Here Add the "Bonkers - Phone Feature"', 'bonkers' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page - Phone Section Right', 'bonkers' ),
		'id'            => 'phone-section-right',
		'description'   => esc_html__( 'This is the right Phone Section in the Front Page. Here Add the "Bonkers - Phone Feature"', 'bonkers' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page - Team Section', 'bonkers' ),
		'id'            => 'team-section',
		'description'   => esc_html__( 'This is the Team Section in the Front Page. Here Add the "Bonkers - Team Member"', 'bonkers' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page - Clients Section', 'bonkers' ),
		'id'            => 'clients-section',
		'description'   => esc_html__( 'This is the Clients Section in the Front Page. Here Add the "Bonkers - Client Logo"', 'bonkers' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	/*
	Footer
	===================================
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widgets Area', 'bonkers' ),
		'id'            => 'first-footer-widgets',
		'description'   => esc_html__( 'These are widgets for the first footer area', 'bonkers' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widgets Area', 'bonkers' ),
		'id'            => 'second-footer-widgets',
		'description'   => esc_html__( 'These are widgets for the second footer area', 'bonkers' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Third Footer Widgets Area', 'bonkers' ),
		'id'            => 'third-footer-widgets',
		'description'   => esc_html__( 'These are widgets for the third footer area', 'bonkers' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Fourth Footer Widgets Area', 'bonkers' ),
		'id'            => 'fourth-footer-widgets',
		'description'   => esc_html__( 'These are widgets for the fourth footer area', 'bonkers' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
