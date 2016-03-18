// Start Wrapper
jQuery(document).ready(function($) {

// Mobile Nav Menu
$(function menuToggle() {

 $('#nav-primary-mobile .menu-toggle').click(function() {
	  $('#nav-primary-mobile ul').slideToggle('slow', function() {
		});
	return false;
	});
});


// Initialization Lightbox

// Gallery Post Format
$('.hentry .entry-gallery').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
		delegate: 'a', // child items selector, by clicking on it popup will open
		type: 'image',
		image: { titleSrc: 'title'  },
		gallery: { 
			enabled: true ,
			navigateByImgClick: true,
		},
		// Animation
		removalDelay: 300,
		mainClass: 'mfp-fade'
    });
}); 


// WordPress Gallery Shortcode
$('.entry-content .gallery').magnificPopup({
  delegate: 'a', // child items selector, by clicking on it popup will open
  type: 'image',
  image: { titleSrc: 'title'  },
  gallery: { 
  	enabled: true ,
	navigateByImgClick: true,
  },
  // Animation
  removalDelay: 300,
  mainClass: 'mfp-fade'
});

//	End Wrapper
});	