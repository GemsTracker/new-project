CKEDITOR.config.strinsert_strings =	 [
			{'name': 'Name', 'value': '*|VALUE|*'},
			{'name': 'Group 1'},
			{'name': 'Another name', 'value': 'totally_different', 'label': 'Good looking'},
		];

/**
 * String to use as the button label.
 */
CKEDITOR.config.strinsert_button_label = 'Insert';

/**
 * String to use as the button title.
 */
CKEDITOR.config.strinsert_button_title = 'Insert content';

/**
 * String to use as the button voice label.
 */
CKEDITOR.config.strinsert_button_voice = 'Insert content';

CKEDITOR.plugins.add('availablefields',
{
	requires : ['richcombo'],
	init : function( editor )
	{
		var config = editor.config;

		// Gets the list of insertable strings from the settings.
		var strings = config.availablefields;

		// add the menu to the editor
		editor.ui.addRichCombo('availablefields',
		{
			label: 		editor.config.availablefieldsLabel,
			title: 		editor.config.availablefieldsLabel,
			voiceLabel: editor.config.availablefieldsLabel,
			className: 	'cke_format',
			multiSelect:false,
			panel:
			{
				css: [ editor.config.contentsCss, CKEDITOR.skin.getPath('editor') ],
				voiceLabel: editor.lang.panelVoiceLabel
			},

			init: function()
			{
				// Header
				this.startGroup(editor.config.availablefieldsLabel);
				
				for (var property in strings) {
					var label = String(strings[property]);
					if (label == 'null') {
						label = property;
					}

					// Param1: What gets inserted
					// Param2: What is shown in the dropdown
					// Param3: What is shown as title on hover in the dropdown

					this.add(property, property, String(label));
				}
			},

			onClick: function( value )
			{
				editor.focus();
				editor.fire( 'saveSnapshot' );
				editor.insertHtml(value);
				editor.fire( 'saveSnapshot' );
			},

		});
	}
});

/*CKEDITOR.plugins.add('availablefields',
{
	requires : ['richcombo'],
	init : function( editor )
	{
		
		if (editor.config.availablefields) {
			// add the menu to the editor
			editor.ui.addRichCombo('availablefields',
			{
				label: 		editor.config.availablefieldsLabel,
				title: 		editor.config.availablefieldsLabel,
				voiceLabel: editor.config.availablefieldsLabel,
				className: 	'cke_format',
				multiSelect:false,
				panel:
				{
					// CKEditor 3:
					//css: [ editor.config.contentsCss, CKEDITOR.getUrl(editor.skinPath + 'editor.css' ) ],
					// CKEditor 4 way: 
					css: [ editor.config.contentsCss, CKEDITOR.skin.getPath('editor') ],
					voiceLabel: editor.lang.panelVoiceLabel
				},
				init: function()
				{	
					// Header
					this.startGroup(editor.config.availablefieldsLabel);
					
						for (var property in editor.config.availablefields) {
							// Param1: What gets inserted
							// Param2: What is shown in the dropdown
							// Param3: What is shown as title on hover in the dropdown
							this.add(property, property, editor.config.availablefields[property]);
						}
				},
				onClick: function( value )
				{
					editor.focus();
					editor.fire( 'saveSnapshot' );
					editor.insertHtml(value);
					editor.fire( 'saveSnapshot' );
				}
			});
		}
	}
});
*/