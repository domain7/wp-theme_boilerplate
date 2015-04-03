(function($){

	$('img').each(function() {

		// Figure out if the image is linking to itself, and if so, do fresco
		var src = $(this).attr('src');
		var imageExt = src.split('.');
		imageExt = imageExt[imageExt.length - 1];

		var link = $(this).parent('a');
		var linkHref = link.attr('href');

		if ( linkHref ) {

			var linkExt = linkHref.split('.');
			linkExt = linkExt[linkExt.length - 1];

			if ( linkExt == imageExt ) {

				link.click(function(event){

					Fresco.show($(this).attr('href'));
					event.preventDefault();

				});

			}

		}

	}); // fresco

})(jQuery);
