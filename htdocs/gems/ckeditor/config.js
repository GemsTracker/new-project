/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.extraPlugins = 'bbcode';
	config.toolbar = [
		[ 'Source','-','Undo','Redo' ],
		[ 'Find','Replace','-','SelectAll','RemoveFormat' ],
		[ 'Link', 'Unlink', 'Image', 'SpecialChar' ],
		'/',
		[ 'Bold', 'Italic','Underline' ],
		[ 'NumberedList','BulletedList','-','Blockquote' ],
		[ 'Maximize' ],
	];
};
