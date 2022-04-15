<script>
jQuery(document).ready(function() {

	// Uploading files

	jQuery('#upload_img_button').click(function(event) {
		var file_frame;
		event.preventDefault();
		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}
		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: jQuery( this ).data( 'uploader_title' ),
			button: {
			text: jQuery( this ).data( 'uploader_button_text' ),
			},
			multiple: false // Set to true to allow multiple files to be selected
		});
		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {
			// We set multiple to false so only get one image from the uploader
			attachment = file_frame.state().get('selection').first().toJSON();
			// Do something with attachment.id and/or attachment.url here
			jQuery('#img').val(attachment.url);
		});
		// Finally, open the modal
		file_frame.open();
	});


});
</script>

<div class="wrap">
	<div id="lbg_logo">
			<h2><?php esc_html_e( 'Playlist for showcase:' , 'lbg-logoshowcase' );?> <span style="color:#FF0000; font-weight:bold;"><?php echo strip_tags($_SESSION['xname'])?> - ID #<?php echo strip_tags($_SESSION['xid'])?></span> - <?php esc_html_e( 'Add New' , 'lbg-logoshowcase' );?></h2>
 	</div>

    <form method="POST" enctype="multipart/form-data" id="form-add-playlist-record">
	    <input name="showcaseid" type="hidden" value="<?php echo strip_tags($_SESSION['xid'])?>" />
		<table class="wp-list-table widefat fixed pages" cellspacing="0">
		  <tr>
		    <td align="left" valign="middle" width="25%">&nbsp;</td>
		    <td align="left" valign="middle" width="77%"><a href="?page=lbg_logoshowcase_Playlist" style="padding-left:25%;"><?php esc_html_e( 'Back to Playlist' , 'lbg-logoshowcase' );?></a></td>
		  </tr>
		  <tr>
		    <td colspan="2" align="left" valign="middle">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="right" valign="middle" class="row-title"><?php esc_html_e( 'Set It First' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="top"><input name="setitfirst" type="checkbox" id="setitfirst" value="1" checked="checked" />
		      <label for="setitfirst"></label></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Image' , 'lbg-logoshowcase' );?></td>
		    <td width="77%" align="left" valign="top"><input name="img" type="text" id="img" size="60" value="<?php echo (array_key_exists('img', $_POST))?strip_tags($_POST['img']):''?>" /> <input name="upload_img_button" type="button" id="upload_img_button" value="Upload Image" />
	        <br />
	        Enter an URL or upload an image<br /></td>
		  </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Link For The Image' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="top"><input name="data-link" type="text" size="60" id="data-link" value="<?php echo (array_key_exists('data-link', $_POST))?strip_tags($_POST['data-link']):''?>"/></td>
	      </tr>
        <tr>
  		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Link Target' , 'lbg-logoshowcase' );?></td>
  		    <td align="left" valign="top"><select name="data-target" id="data-target">
                <option value="" <?php echo ((array_key_exists('data-target', $_POST) && $_POST['data-target']=='')?'selected="selected"':'')?>>select...</option>
  		      <option value="_blank" <?php echo ((array_key_exists('data-target', $_POST) && $_POST['data-target']=='_blank')?'selected="selected"':'')?>>_blank</option>
  		      <option value="_self" <?php echo ((array_key_exists('data-target', $_POST) && $_POST['data-target']=='_self')?'selected="selected"':'')?>>_self</option>

  	        </select></td>
  	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Image Title' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="top"><input name="title" type="text" size="60" id="title" value="<?php echo (array_key_exists('title', $_POST))?strip_tags($_POST['title']):''?>"/>    </td>
		  </tr>
		  <tr>
            <td align="right" valign="top" class="row-title">&nbsp;</td>
		    <td align="left" valign="top">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left" valign="middle">&nbsp;</td>
		  </tr>
		  <tr>
		    <td colspan="2" align="center" valign="middle"><input name="Submit" id="Submit" type="submit" class="button-primary" value="Add Record"></td>
		  </tr>
		</table>
  </form>


</div>
