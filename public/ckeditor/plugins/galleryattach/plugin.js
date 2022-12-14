CKEDITOR.plugins.add('galleryattach',
{
	init : function(editor)
	{
		// Add the link and unlink buttons.
		CKEDITOR.dialog.addIframe('galleryattach_dialog', 'Select Gallery', SITE_URL + 'admin/editorgallery',800,400,function(){}, {
			onLoad: function(){
				var id = '#'+this.parts.contents.getId();
				$('.cke_dialog_page_contents', id).css({height:'100%'});
			}
		});
		editor.addCommand('galleryattach', {exec:galleryattach_onclick} );
		editor.ui.addButton('galleryattach',{ label:'Select Gallery.', command:'galleryattach', icon:this.path+'images/icon.png' });

		// Register selection change handler for the unlink button.
		editor.on( 'selectionChange', function( evt )
		{
			/*
			 * Despite our initial hope, files.queryCommandEnabled() does not work
			 * for this in Firefox. So we must detect the state by element paths.
			 */
			var command = editor.getCommand( 'galleryattach' ),
				element = evt.data.path.lastElement.getAscendant( 'a', true );

			// If nothing or a valid files
			if ( ! element || (element.getName() == 'a' && ! element.hasClass('pyro-files')))
			{
				command.setState(CKEDITOR.TRISTATE_OFF);
			}

			else
			{
				command.setState(CKEDITOR.TRISTATE_DISABLED);
			}
		});

	}
} );

function galleryattach_onclick(e)
{
	update_instance();
    // run when pyro button is clicked]
    CKEDITOR.currentInstance.openDialog('galleryattach_dialog')
}