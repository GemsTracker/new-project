/*jslint browser: true*/
/*global jQuery */
/*
	Jquery plugin to toggle the visibility of a certain target when a radio or checkbox has been set.
 */

(function( $ ) {

	/**
	 * Option:
	 * - showInput: 	The input radio or checkbox that needs to be checked to change the output
	 */

	$.fn.showOnChecked = function(options) {
		//console.log(options);
		var targetOutput = this;
		var settings = $.extend({
			showInput: false,
		}, options);

		var showInputType = settings.showInput.prop('type');
			
		// Initial check
		if (((showInputType === 'radio') || (showInputType === 'checkbox')) && settings.showInput.prop('checked') === true) {
	        targetOutput.each(function() {
	        	$(this).show();
	        });

	    } else {
	        targetOutput.each(function() {
	        	$(this).hide();
	        })
        }

        // check for change on all radio buttons
        var senseTarget = settings.showInput;
        if (showInputType === 'radio') {
            var senseTarget = $('input[name='+settings.showInput.prop('name')+']');    
        }
        
        senseTarget.on('change', function(e) {
        	if (((showInputType === 'radio') || (showInputType === 'checkbox')) && settings.showInput.prop('checked') === true) {
                targetOutput.each(function() {
                	$(this).show();
	        	});

            } else {
                targetOutput.each(function() {
	        		$(this).hide();
	        	});
            }
    	});

    	return this;
	}
} (jQuery));