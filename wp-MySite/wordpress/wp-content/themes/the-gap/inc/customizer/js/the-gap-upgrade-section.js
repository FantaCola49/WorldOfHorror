(function( $ ) {
 
    wp.customize.bind( 'ready', function() { // Ready?

    var customize = this; // Customize object alias.
	
		customize.sectionConstructor['thegap-customize-upgrade-section'] = customize.Section.extend(
			{

				attachEvents: function() {
				},

			
				isContextuallyActive: function() {
					return true
				}
			}
		)
	}

 
})( jQuery );
