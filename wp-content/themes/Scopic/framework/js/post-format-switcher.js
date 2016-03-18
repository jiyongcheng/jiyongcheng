/**
 * 
 * Shows/Hides Post Format Meta Boxes on selection.
 * 
 */
jQuery(document).ready(function() {

/**
 * Audio Post Format
 */

	var audioOptions = jQuery('#pf_audio');
	var audioTrigger = jQuery('#post-format-audio');
	
	audioOptions.css('display', 'none');
	
/**
 * Chat Post Format
 */

	var chatOptions = jQuery('#pf_chat');
	var chatTrigger = jQuery('#post-format-chat');
	
	chatOptions.css('display', 'none');
	
/**
 * Gallery Post Format
 */

	var galleryOptions = jQuery('#pf_gallery');
	var galleryTrigger = jQuery('#post-format-gallery');
	
	galleryOptions.css('display', 'none');
	
/**
 * Image Post Format
 */

	var imageOptions = jQuery('#pf_image');
	var imageTrigger = jQuery('#post-format-image');
	
	imageOptions.css('display', 'none');
	
/**
 * Link Post Format
 */

	var linkOptions = jQuery('#pf_link');
	var linkTrigger = jQuery('#post-format-link');
	
	linkOptions.css('display', 'none');
	
/**
 * Quote Post Format
 */

	var quoteOptions = jQuery('#pf_quote');
	var quoteTrigger = jQuery('#post-format-quote');
	
	quoteOptions.css('display', 'none');
	
/**
 * Status Post Format
 */

	var statusOptions = jQuery('#pf_status');
	var statusTrigger = jQuery('#post-format-status');
	
	statusOptions.css('display', 'none');

/**
 * Video Post Format
 */

	var videoOptions = jQuery('#pf_video');
	var videoTrigger = jQuery('#post-format-video');
	
	videoOptions.css('display', 'none');
	
/**
 * Functions
 */

	var group = jQuery('#post-formats-select input');

	
	group.change( function() {
		
		if(jQuery(this).val() == 'audio') {
			audioOptions.css('display', 'block');
			htHideAll(audioOptions);
		
		} else if(jQuery(this).val() == 'chat') {
			chatOptions.css('display', 'block');
			htHideAll(chatOptions);		
		
		} else if(jQuery(this).val() == 'gallery') {
			galleryOptions.css('display', 'block');
			htHideAll(galleryOptions);		
			
		} else if(jQuery(this).val() == 'image') {
			imageOptions.css('display', 'block');
			htHideAll(imageOptions);
		
		} else if(jQuery(this).val() == 'link') {
			linkOptions.css('display', 'block');
			htHideAll(linkOptions);		
		
		} else if(jQuery(this).val() == 'quote') {
			quoteOptions.css('display', 'block');
			htHideAll(quoteOptions);		
		
		} else if(jQuery(this).val() == 'status') {
			statusOptions.css('display', 'block');
			htHideAll(statusOptions);		
			
		} else if(jQuery(this).val() == 'video') {
			videoOptions.css('display', 'block');
			htHideAll(videoOptions);		
								
		} else {
			audioOptions.css('display', 'none');
			chatOptions.css('display', 'none');
			galleryOptions.css('display', 'none');
			linkOptions.css('display', 'none');
			quoteOptions.css('display', 'none');
			statusOptions.css('display', 'none');
			videoOptions.css('display', 'none');
		}
		
	});
	

	if(audioTrigger.is(':checked'))
		audioOptions.css('display', 'block');
	if(chatTrigger.is(':checked'))
		chatOptions.css('display', 'block');
	if(galleryTrigger.is(':checked'))
		galleryOptions.css('display', 'block');
	if(imageTrigger.is(':checked'))
		imageOptions.css('display', 'block');
	if(quoteTrigger.is(':checked'))
		quoteOptions.css('display', 'block');
	if(statusTrigger.is(':checked'))
		statusOptions.css('display', 'block');
	if(videoTrigger.is(':checked'))
		videoOptions.css('display', 'block');
		
	function htHideAll(notThisOne) {
		audioOptions.css('display', 'none');
		chatOptions.css('display', 'none');
		galleryOptions.css('display', 'none');
		imageOptions.css('display', 'none');
		linkOptions.css('display', 'none');
		quoteOptions.css('display', 'none');
		statusOptions.css('display', 'none');
		videoOptions.css('display', 'none');
		notThisOne.css('display', 'block');
	}
	
	

});