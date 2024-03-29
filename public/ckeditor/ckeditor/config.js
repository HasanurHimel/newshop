/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.removePlugins = 'image,table,tabletools,horizontalrule';
config.removeButtons = 'Anchor,Underline,Strike,Subscript,Superscript';
config.format_tags = 'p;h1;h2;pre';
};
