/**
 * This file contains the JavaScript for the MHA Image Links WordPress plugin.
 * This file is only needed if you are using the Slideshow effect on the
 * image links.
 */
(function($) {
	ImageLinks = {
		enableImageLinkBackgroundSlideshows: function(){
			$('.mha-image-link-slideshow').each(function(index, item){
				$item = $(item);
				setTimeout(ImageLinks._imageLinkBackgroundSlideshowNextImage, ImageLinks.getRandomDelay(), $item);
			});
		},
		getRandomDelay: function(min, max) {
			// From: https://stackoverflow.com/questions/1527803/generating-random-whole-numbers-in-javascript-in-a-specific-range#1527820
			var min = 2000;
			var max = 8000;
			return Math.floor(Math.random() * (max - min + 1)) + min;
		},
		_imageLinkBackgroundSlideshowNextImage: function($item){
			var nextBackgroundIndex = $item.data('next_background_index');
			// If we don't have a current item start from 0, otherwise
			// increment the current item.
			if ( undefined === nextBackgroundIndex ) {
				nextBackgroundIndex = 1;
			}

			var nextBackgroundSrc = $item.data('background' + nextBackgroundIndex);

			// If we didn't find a valid nextBackground - go back to zero and try again.
			if ( undefined === nextBackgroundSrc ) {
				$item.data('next_background_index', 0);
				return ImageLinks._imageLinkBackgroundSlideshowNextImage($item);
			}

			// Save the next index
			$item.data('next_background_index', nextBackgroundIndex + 1);
			// Fade the item out
			$item.animate({opacity: 0}, 750, 'linear').promise().then(function(){
			  // Change the backgroun
			  $item.css('background-image', 'url(' + nextBackgroundSrc + ')');

			  // Then fade it back in - and return the item (so we can get the promise
			  // if we want)
			  return $item.animate({opacity: 1}, 750, 'linear');
			});
			setTimeout(ImageLinks._imageLinkBackgroundSlideshowNextImage, ImageLinks.getRandomDelay(2000,8000), $item);
		},
	}
	ImageLinks.enableImageLinkBackgroundSlideshows();
})(jQuery); // Fully reference jQuery after this point.
