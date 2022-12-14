CKEDITOR.plugins.add( 'readmore', {
    icons: 'readmore',
    init: function( editor ) {
        editor.addCommand( 'insertReadmore', { 
            modes : { wysiwyg:1, source:0 }, canUndo : true,
            exec: function( editor ) {   
			
                editor.insertHtml( '<p style="border-top: 1px dotted #999999;background: url(' + CKEDITOR.plugins.getPath('readmore') + 'icons/readmore.png' + ') no-repeat center center;"><!--readmore--></p>' );

            },
            editorFocus : true
        });
        editor.ui.addButton( 'Readmore', {
            label: 'Insert Readmore',
            command: 'insertReadmore'
        });
    }
});