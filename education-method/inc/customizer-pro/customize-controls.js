( function( api ) {

	// Extends our custom "education-method" section.
	api.sectionConstructor['education-method'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
