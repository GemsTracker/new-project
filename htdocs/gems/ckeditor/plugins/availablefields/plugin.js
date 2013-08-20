CKEDITOR.plugins.add('availablefields',
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
					css: [ editor.config.contentsCss, CKEDITOR.getUrl(editor.skinPath + 'editor.css' ) ],
					// CKEditor 4 way: 
					//css: [ editor.config.contentsCss, CKEDITOR.skin.getPath('editor') ],
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