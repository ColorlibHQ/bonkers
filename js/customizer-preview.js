/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Logo
	wp.customize( 'bonkers_logo', function( value ) {
		value.bind( function( to ) {
			if ( to != "" ) {
				var logo = '<img src="' + to + '" />';
				$( '.logo_container .ql_logo' ).html( logo );
			}else{
				$( '.logo_container .ql_logo' ).text( wp_customizer.site_name );
			}
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-description, #jqueryslidemenu a, .bonkers-login-btn, .ql_cart-btn, .top-bar' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );




	/*
    Colors
    =====================================================
    */
		//Featured Color
		wp.customize( 'bonkers_hero_color', function( value ) {
			value.bind( function( to ) {
				$( '.btn-ql, .pagination li.active a, .pagination li.active a:hover, .wpb_wrapper .products .product-category h3, .btn-ql:active, .btn-ql.alternative:hover, .btn-ql.alternative-white:hover, .btn-ql.alternative-gray:hover, .hero_bck, .bonkers-nav-btn:hover, .bonkers-nav-btn:active, .cd-popular .cd-select, .no-touch .cd-popular .cd-select:hover, .pace .pace-progress, .woocommerce .products .product .add_to_cart_button:hover, #ql_woo_cart .widget_shopping_cart_content a.button.checkout' ).css( {
						'background-color': to
				} );
				$( '.btn-ql, .pagination li.active a, .pagination li.active a:hover, .btn-ql:active, .btn-ql.alternative, .btn-ql.alternative:hover, .btn-ql.alternative-white:hover, .btn-ql.alternative-gray:hover, .hero_border, .pace .pace-activity, #ql_woo_cart .widget_shopping_cart_content a.button.checkout' ).css( {
						'border-color': to
				} );
				$( '.pagination .current, .pagination a:hover, .widget_recent_posts ul li h6 a, .widget_popular_posts ul li h6 a, .read-more, .read-more i, .btn-ql.alternative, .hero_color, .cd-popular .cd-pricing-header, .cd-popular .cd-currency, .cd-popular .cd-duration, #sidebar .widget ul li > a:hover, #sidebar .widget_recent_comments ul li a:hover' ).css( {
						'color': to
				} );
			} );
		} );

		//Headings Color
		wp.customize( 'bonkers_headings_color', function( value ) {
			value.bind( function( to ) {
				$( 'h1:not(.site-title), h2, h3, h4, h5, h6, h1 a, h2, a, h3 a, h4 a, h5 a, h6 a' ).css( {
						'color': to
				} );
			} );
		} );
		//Logo Color  
		wp.customize( 'bonkers_logo_color', function( value ) {
			value.bind( function( to ) {
				$( '.logo_container .ql_logo' ).css( {
						'color': to
				} );
			} );
		} );
		//Text Color
		wp.customize( 'bonkers_text_color', function( value ) {
			value.bind( function( to ) {
				$( 'body' ).css( {
						'color': to
				} );
			} );
		} );
		//Link Color
		wp.customize( 'bonkers_link_color', function( value ) {
			value.bind( function( to ) {
				$( 'a' ).css( {
						'color': to
				} );
			} );
		} );
		//Content Background Color
		wp.customize( 'bonkers_content_background_color', function( value ) {
			value.bind( function( to ) {
				$( '.ql_background_padding, .product_text, .blog article, search article, archive article, .woocommerce .product .summary .summary-top, .woocommerce .product .summary .entry, .woocommerce .product .summary .summary-bottom, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, #ql_load_more' ).css( {
						'background-color': to
				} );
			} );
		} );

		//Footer Background Color
		wp.customize( 'bonkers_footer_background', function( value ) {
			value.bind( function( to ) {
				$( '#footer, .bonkers-footer-wrap' ).css( {
						'background-color': to
				} );
				$( '.footer-top ul li' ).css( {
						'border-bottom-color': to
				} );
			} );
		} );

		//Header Background Color
		wp.customize( 'bonkers_header_bck_color', function( value ) {
			value.bind( function( to ) {
				$( '#header, .single-product #header, .bonkers-sidenav #header, .top-bar, .single-product .top-bar' ).css( {
						'background-color': to
				} );
			} );
		} );

	
	/*
    Site
    =====================================================
    */
    //Background Color
	wp.customize( 'bonkers_site_background_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( {
					'background-color': to
			} );
		} );
	} );


	/*
    Sections
    =====================================================
    */

    	/*
    	Welcome
    	------------------------------ */
    	//Welcome Message
		wp.customize( 'bonkers_addons_welcome_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-welcome-section .bonkers-intro-line' ).html( to );
			} );
		} );
		//Link Title
		wp.customize( 'bonkers_addons_welcome_link_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-welcome-section .bonkers-welcome-intro .ql_border_btn' ).text( to );
			} );
		} );
		//Link URL
		wp.customize( 'bonkers_addons_welcome_link_url', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-welcome-section .bonkers-welcome-intro .ql_border_btn' ).attr( 'href', to );
			} );
		} );
		//Background Image
		wp.customize( 'bonkers_addons_welcome_image', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-welcome-section' ).css( 'background-image', 'url(' + to + ')' );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'bonkers_addons[bonkers_addons_welcome_enable]', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.bonkers-welcome-section' ).show();	
				}else{
					$( '.bonkers-welcome-section' ).hide();
				}
			} );
		} );

		/*
    	Services
    	------------------------------ */
		//Enable/Disable Section
		wp.customize( 'bonkers_addons[bonkers_addons_services_enable]', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.bonkers-services-section' ).show();	
				}else{
					$( '.bonkers-services-section' ).hide();
				}
			} );
		} );

		/*
    	Image
    	------------------------------ */
    	//Title
		wp.customize( 'bonkers_addons_image_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-image-section .bonkers-image-section-title' ).text( to );
			} );
		} );
		//Text
		wp.customize( 'bonkers_addons_image_text', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-image-section .bonkers-image-section-content' ).prepend( to );
			} );
		} );
		//Link Title
		wp.customize( 'bonkers_addons_image_link_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-image-section .bonkers-image-section-content .ql_border_btn' ).text( to );
			} );
		} );
		//Link URL
		wp.customize( 'bonkers_addons_image_link_url', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-image-section .bonkers-image-section-content .ql_border_btn' ).attr( 'href', to );
			} );
		} );
		//Background Image
		wp.customize( 'bonkers_addons_image_image', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-image-section-image' ).css( 'background-image', 'url(' + to + ')' );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'bonkers_addons[bonkers_addons_image_enable]', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.bonkers-image-section' ).show();	
				}else{
					$( '.bonkers-image-section' ).hide();
				}
			} );
		} );

		/*
    	Phone
    	------------------------------ */
		//Background Image
		wp.customize( 'bonkers_addons_phone_image', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-phone-screenshot' ).css( 'background-image', 'url(' + to + ')' );
			} );
		} );
		//Background Color
		wp.customize( 'bonkers_addons_phone_color', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-phone-section' ).css( {
						'background-color': to
				} );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'bonkers_addons[bonkers_addons_phone_enable]', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.bonkers-phone-section' ).show();	
				}else{
					$( '.bonkers-phone-section' ).hide();
				}
			} );
		} );

		/*
    	Call To Action
    	------------------------------ */
		//Background Image
		wp.customize( 'bonkers_addons_cta_image', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-cta-section' ).css( 'background-image', 'url(' + to + ')' );
			} );
		} );
		//Welcome Message
		wp.customize( 'bonkers_addons_cta_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-cta-section .bonkers-cta-title' ).text( to );
			} );
		} );
		//Link Title
		wp.customize( 'bonkers_addons_cta_link_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-cta-section .bonkers-cta-button' ).text( to );
			} );
		} );
		//Link URL
		wp.customize( 'bonkers_addons_cta_link_url', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-cta-section .bonkers-cta-button' ).attr( 'href', to );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'bonkers_addons[bonkers_addons_cta_enable]', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.bonkers-cta-section' ).show();	
				}else{
					$( '.bonkers-cta-section' ).hide();
				}
			} );
		} );

		/*
    	Video
    	------------------------------ */
		//Title
		wp.customize( 'bonkers_addons_video_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-video-section .bonkers-video-title' ).text( to );
			} );
		} );
		//Content
		wp.customize( 'bonkers_addons_video_text', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-video-section .bonkers-video-content' ).text( to );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'bonkers_addons[bonkers_addons_video_enable]', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.bonkers-video-section' ).show();	
				}else{
					$( '.bonkers-video-section' ).hide();
				}
			} );
		} );

		/*
    	Team
    	------------------------------ */
		//Title
		wp.customize( 'bonkers_addons_team_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-team-section .bonkers-section-title' ).text( to );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'bonkers_addons[bonkers_addons_team_enable]', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.bonkers-team-section' ).show();	
				}else{
					$( '.bonkers-team-section' ).hide();
				}
			} );
		} );

		/*
    	Subscribe
    	------------------------------ */
		//Title
		wp.customize( 'bonkers_addons_subscribe_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-subscribe-section .bonkers-subscribe-title' ).text( to );
			} );
		} );
		//Content
		wp.customize( 'bonkers_addons_subscribe_text', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-subscribe-section .bonkers-subscribe-text' ).text( to );
			} );
		} );
		//Subscribe Button
		wp.customize( 'bonkers_addons_subscribe_link_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-subscribe-section .bonkers-subscribe-content .bonkers-subscribre-form-wrapper .contact-form input[type="submit"]' ).val( to );
			} );
		} );
		//Placeholder
		wp.customize( 'bonkers_addons_subscribe_link_placeholder', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-subscribe-section .bonkers-subscribe-content .bonkers-subscribre-form-wrapper .contact-form input[type="email"]' ).attr( 'placeholder', to );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'bonkers_addons[bonkers_addons_subscribe_enable]', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.bonkers-subscribe-section' ).show();	
				}else{
					$( '.bonkers-subscribe-section' ).hide();
				}
			} );
		} );

		/*
    	Clients
    	------------------------------ */
		//Title
		wp.customize( 'bonkers_addons_clients_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-clients-section .bonkers-section-title' ).text( to );
			} );
		} );

		/*
    	Contact
    	------------------------------ */
		//Title
		wp.customize( 'bonkers_addons_contact_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-contact-section .bonkers-contact-content .bonkers-contact-title' ).text( to );
			} );
		} );
		//Button Text
		wp.customize( 'bonkers_addons_contact_link_title', function( value ) {
			value.bind( function( to ) {
				$( '.bonkers-contact-section .bonkers-contact-form input.wpcf7-submit[type="submit"]' ).val( to );
			} );
		} );
		//Enable/Disable Section
		wp.customize( 'bonkers_addons[bonkers_addons_contact_enable]', function( value ) {
			value.bind( function( to ) {
				if ( to == true ) {
					$( '.bonkers-contact-section' ).show();	
				}else{
					$( '.bonkers-contact-section' ).hide();
				}
			} );
		} );









} )( jQuery );

function hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}










































































































