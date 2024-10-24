( function( api ) {

	// Extends our custom "example-1" section.
	api.sectionConstructor['plugin-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );


function spabizsfrontpagesectionsscroll( section_id ){
    var scroll_section_id = "slider-section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {

        case 'accordion-section-info_setting':
        scroll_section_id = "info-home";
        break;
		
		case 'accordion-section-service_setting':
		scroll_section_id = "service-home";
		break;
		
		case 'accordion-section-funfact_setting':
        scroll_section_id = "funfact-home";
        break;
		
		case 'accordion-section-blog_setting':
        scroll_section_id = "blog-home";
        break;
    }

    if( $contents.find('#'+scroll_section_id).length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + scroll_section_id ).offset().top
        }, 1000);
    }
}

 jQuery('body').on('click', '#sub-accordion-panel-spabiz_frontpage_sections .control-subsection .accordion-section-title', function(event) {
        var section_id = jQuery(this).parent('.control-subsection').attr('id');
        spabizsfrontpagesectionsscroll( section_id );
});