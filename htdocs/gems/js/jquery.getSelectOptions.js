/*jslint browser: true*/
/*global jQuery */
(function( $ ) {

	/**
	 * Option:
	 * - source: 		The element which suplies the needed info for the change of information
	 * - queryUrl: 		The ajax url
	 * - size: 			Size of the options
	 * - enableAfter: 	Enable the target element after load
	 * - firstValue: 	If optional supply what the first, empty value should be
	 * - defaultValues: The default values that should be set when the source has no value 
	 */

	$.fn.getSelectOptions = function(options) {
		//console.log(options);
		var settings = $.extend({
			queryUrl: false,
			source: false,
			enableAfter: true,
			firstValue: false,
			defaultValues: false,
		}, options);

		var sources = $('#'+settings.source);
		var target = this;

		return sources.each(function(index) {
			var source = $(this);
			source.on('change', function() {
				sourceValue = this.value;
				//console.log(sourceValue);

				if (settings.queryUrl) {
					$.post(settings.queryUrl, { sourceValue: sourceValue }, function (data) {
						var newValues = $.parseJSON(data);
						//console.log(newValues)
						
						var output = [];
						if ($.isEmptyObject(newValues) && settings.defaultValues) {
							for (i = settings.defaultValues.length - 1; i >= 0; --i) {
								output.unshift('<option value="'+settings.defaultValues[i][0]+'">'+settings.defaultValues[i][1]+'</option>');
							}
						} else {
							if (settings.firstValue) {
								if (settings.firstValue === true) {
									output.push('<option />');
								} else if ($.isArray(settings.firstValue)) {
									var keyValue = false;
									if ($.isArray(settings.firstValue[0])) {
										keyValue = true;
									}
									for (i = settings.firstValue.length - 1; i >= 0; --i) {
										if (keyValue) {
		    								output.push('<option value="'+settings.firstValue[i][0]+'">'+settings.firstValue[i][1]+'</option>');
		    							} else {
		    								output.push('<option value="'+settings.firstValue[i]+'">'+settings.firstValue[i]+'</option>');
		    							}
									}
								} else {
									output.push('<option>'+settings.firstValue+'</option>');
								}
							}
							$.each(newValues, function(key, value) {
								output.push('<option value="'+ key +'">'+ value +'</option>');
							});
						}
						target.empty();
						
						target.append(output);
						if (settings.enableAfter) {
							target.attr('disabled', false);
						}
					})
				}
			});
		});
	}
} (jQuery));