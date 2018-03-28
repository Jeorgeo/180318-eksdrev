/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	
	// %REMOVE_START%
	// The configuration options below are needed when running CKEditor from source files.
	config.plugins = 'basicstyles,dialogui,dialog,clipboard,panel,floatpanel,menu,contextmenu,resize,button,toolbar,elementspath,enterkey,entities,popup,filebrowser,floatingspace,listblock,richcombo,format,horizontalrule,htmlwriter,wysiwygarea,image,indent,indentlist,fakeobjects,link,list,magicline,maximize,pastetext,pastefromword,removeformat,showborders,sourcearea,specialchar,menubutton,scayt,stylescombo,tab,table,tabletools,undo,wsc';
	config.skin = 'minimalist';
	// %REMOVE_END%

	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
//		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
//		{ name: 'forms' },
//		{ name: 'tools' },
//		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
//		{ name: 'others' },
/*		'/',*/
		{ name: 'basicstyles', groups: [ 'basicstyles'/*, 'cleanup' */] },
		{ name: 'paragraph',   groups: [ 'list'/*, 'indent', 'blocks', 'align', 'bidi'*/ ] },
		{ name: 'insert' },
		{ name: 'links' },
//		{ name: 'iframe' },
		{ name: 'clipboard',   groups: [ 'undo' ] },
//		{ name: 'styles' },
//		{ name: 'colors' },
//		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript,Paste,Cut,Copy,PasteText,PasteFromWord,Anchor,SpecialChar,HorizontalRule';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced';

	 // File manager
    // CKFSYS_PATH — путь к файловому менеджеру у вас, чтото типа /path/to/ckeditor/filemanager,
    // путь указывать от DOCUMENT_ROOT
    config.filebrowserBrowseUrl = '/includes/ckeditor/ckfsys-master/browser/default/browser.html?Connector=/includes/ckeditor/ckfsys-master/connectors/php/connector.php';
    config.filebrowserImageBrowseUrl = '/includes/ckeditor/ckfsys-master/browser/default/browser.html?type=Image&Connector=/includes/ckeditor/ckfsys-master/connectors/php/connector.php';

	
	
};
