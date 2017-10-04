jQuery(window).load(function (){
	( function( $ ) {


		/*
		 * Scroll to show the current section
		 */
		$('body').on('click', '#sub-accordion-panel-bonkers_addons_front_page_sections .control-subsection .accordion-section-title', function(event) {

			var section_id = $(this).parent('.control-subsection').attr('id');
			scrollToSection( section_id );
		});

		function scrollToSection( section_id ){
			var section_class = "welcome-section";
			var $contents = $('#customize-preview iframe').contents();
			switch ( section_id ) {
				case 'accordion-section-bonkers_addons_welcome_section':
			        section_class = "bonkers-welcome-section";
			        break;
				case 'accordion-section-bonkers_addons_services_section':
			        section_class = "bonkers-services-section";
			        break;
			    case 'accordion-section-bonkers_addons_image_section':
			        section_class = "bonkers-image-section";
			        break;
			    case 'accordion-section-bonkers_addons_phone_section':
			        section_class = "bonkers-phone-section";
			        break;
			    case 'accordion-section-bonkers_addons_cta_section':
			        section_class = "bonkers-cta-section";
			        break;
			    case 'accordion-section-bonkers_addons_video_section':
			        section_class = "bonkers-video-section";
			        break;
			    case 'accordion-section-bonkers_addons_team_section':
			        section_class = "bonkers-team-section";
			        break;
			    case 'accordion-section-bonkers_addons_subscribe_section':
			        section_class = "bonkers-subscribe-section";
			        break;
			    case 'accordion-section-bonkers_addons_clients_section':
			        section_class = "bonkers-clients-section";
			        break;
			    case 'accordion-section-bonkers_addons_contact_section':
			        section_class = "bonkers-contact-section";
			        break;
			}
			$contents.find("html, body").animate({
		    	scrollTop: $contents.find( "." + section_class ).offset().top - 30
		    }, 1000);

		}



		/*
		 * Make Front Page Sections Sortable
		 */
		var $front_page_sections = $("#sub-accordion-panel-bonkers_addons_front_page_sections");
		var sort_text = '<div class="sortable-sections-desc description customize-section-description">' + wp_customizer_admin.sortable_text + '</div>';
		$front_page_sections.append(sort_text);
		$front_page_sections.sortable({
			helper: "clone",
			items: "> li.control-section"
		});
		$front_page_sections.on( "sortupdate", function( event, ui ) {
			$front_page_sections.find('.sortable-sections-desc').prepend('<img src="' + wp_customizer_admin.admin_url + '/images/wpspin_light.gif" /> ');
			var items_ar = $front_page_sections.sortable( "toArray" );
			for(var i=0; i < items_ar.length; i++) {
				items_ar[i] = items_ar[i].replace('accordion-section-','');
			}
			$.ajax({
				url: wp_customizer_admin.ajax_url,
				type: 'post',
				dataType: 'json',
				data: {
					action : 'bonkers_addons_save_sortable',
					items: items_ar
				},
			})
			.done(function(data) {
				$front_page_sections.find('.sortable-sections-desc img').remove();
				wp.customize.previewer.refresh()
			});

		} );

		

	} )( jQuery );
});


wp.customize.controlConstructor[ 'bonkers-checkbox-multiple' ] = wp.customize.Control.extend( {
  ready: function() {
    var control = this;
    var values = [];
    control.container.on( 'change', '.bonkers-multi-checkbox', function() {
    	values = [];
      	control.container.find( '.bonkers-multi-checkbox' ).each( function(){
      		if ( jQuery(this).is(":checked") ) {
      			values.push( jQuery(this).val() );
      		}
      	});
     	control.setting( values );
    } );
  }
} );




















