<div class="wrap">
	<div id="lbg_logo">
			<h2><?php esc_html_e( 'Playlist for slider:' , 'lbg-logoshowcase' );?> <span style="color:#FF0000; font-weight:bold;"><?php echo strip_tags($_SESSION['xname'])?> - ID #<?php echo strip_tags($_SESSION['xid'])?></span></h2>
 	</div>
  <div id="lbg_logoshowcase_updating_witness"><img src="<?php echo plugins_url('images/ajax-loader.gif', dirname(__FILE__))?>" /> <?php esc_attr_e( 'Updating...' , 'lbg-logoshowcase' );?></div>
  <div id="previewDialog"><iframe id="previewDialogIframe" src="" width="100%" height="600" style="border:0;"></iframe></div>

<div style="text-align:center; padding:0px 0px 20px 0px;"><img src="<?php echo plugins_url('images/icons/add_icon.gif', dirname(__FILE__))?>" alt="<?php esc_attr_e( 'add' , 'lbg-logoshowcase' ); ?>" align="absmiddle" /> <a href="?page=lbg_logoshowcase_Playlist&xmlf=add_playlist_record"><?php esc_html_e( 'Add new' , 'lbg-logoshowcase' );?></a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; <img src="<?php echo plugins_url('images/icons/magnifier.png', dirname(__FILE__))?>" alt="<?php esc_attr_e( 'add' , 'lbg-logoshowcase' ); ?>" align="absmiddle" /> <a href="javascript: void(0);" onclick="showDialogPreview(<?php echo strip_tags($_SESSION['xid'])?>)"><?php esc_html_e( 'Preview' , 'lbg-logoshowcase' );?></a></div>
<div style="text-align:left; padding:10px 0px 10px 14px;"><?php esc_html_e( '#Initial Order' , 'lbg-logoshowcase' );?></div>


<ul id="lbg_logoshowcase_sortable">
	<?php foreach ( $result as $row )
	{
		$row=lbg_logoshowcase_unstrip_array($row); ?>
	<li class="ui-state-default cursor_move" id="<?php echo esc_attr($row['id'])?>">#<?php echo esc_html($row['ord'])?> ---  <img src="<?php echo esc_url($row['img'])?>" height="30" align="absmiddle" id="top_image_<?php echo esc_attr($row['id'])?>" /><div class="toogle-btn-closed" id="toogle-btn<?php echo esc_attr($row['ord'])?>" onclick="mytoggle('toggleable<?php echo esc_js($row['ord'])?>','toogle-btn<?php echo esc_js($row['ord'])?>');"></div><div class="options"><a href="javascript: void(0);" onclick="lbg_logoshowcase_delete_entire_record(<?php echo esc_js($row['id'])?>,<?php echo esc_js($row['ord'])?>);" style="color:#F00;">Delete</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="?page=lbg_logoshowcase_Playlist&amp;id=<?php echo strip_tags($_SESSION['xid'])?>&amp;name=<?php echo esc_attr($_SESSION['xname'])?>&amp;duplicate_id=<?php echo esc_attr($row['id'])?>">Duplicate</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
	<div class="toggleable" id="toggleable<?php echo esc_attr($row['ord'])?>">
    <form method="POST" enctype="multipart/form-data" id="form-playlist-lbg_logoshowcase-<?php echo esc_attr($row['ord'])?>">
	    <input name="id" type="hidden" value="<?php echo esc_attr($row['id'])?>" />
        <input name="ord" type="hidden" value="<?php echo esc_attr($row['ord'])?>" />
		<table width="100%" cellspacing="0" class="wp-list-table widefat fixed pages" style="background-color:#FFFFFF;">
		  <tr>
		    <td align="left" valign="middle" width="25%"></td>
		    <td align="left" valign="middle" width="77%"></td>
		  </tr>
		  <tr>
		    <td colspan="2" align="center" valign="middle">&nbsp;</td>
		  </tr>
          <tr>
            <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Image' , 'lbg-logoshowcase' );?></td>
            <td align="left" valign="middle"><input name="img" type="text" id="img" size="100" value="<?php echo stripslashes($row['img']);?>" />
              <input name="upload_img_button_<?php echo esc_attr($row['ord'])?>" type="button" id="upload_img_button_lbg_logoshowcase_<?php echo esc_attr($row['ord'])?>" value="Change Image" />
              <br />
              <?php esc_html_e( 'Enter an URL or upload an image' , 'lbg-logoshowcase' );?></td>
            </tr>
          <tr>
        <td align="right" valign="top" class="row-title">&nbsp;</td>
        <td align="left" valign="middle"><img src="<?php echo esc_attr($row['img'])?>" id="img_<?php echo esc_attr($row['ord'])?>" style="max-width:200px;" /></td>
      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Link For The Image' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="top"><input name="data-link" type="text" size="60" id="data-link" value="<?php echo esc_attr($row['data-link']);?>"/></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Link Target' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="top"><select name="data-target" id="data-target">
              <option value="" <?php echo (($row['data-target']=='')?'selected="selected"':'')?>>select...</option>
		      <option value="_blank" <?php echo (($row['data-target']=='_blank')?'selected="selected"':'')?>>_blank</option>
		      <option value="_self" <?php echo (($row['data-target']=='_self')?'selected="selected"':'')?>>_self</option>

	        </select></td>
	      </tr>
          <tr>
            <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Image Title' , 'lbg-logoshowcase' );?></td>
            <td align="left" valign="top"><input name="title" type="text" size="60" id="title" value="<?php echo stripslashes($row['title']);?>"/></td>
          </tr>

		  <tr>
		    <td colspan="2" align="left" valign="middle">&nbsp;</td>
		  </tr>
		  <tr>
		    <td colspan="2" align="center" valign="middle"><input name="Submit<?php echo esc_attr($row['ord'])?>" id="Submit<?php echo esc_attr($row['ord'])?>" type="submit" class="button-primary" value="Update Playlist Record"></td>
		  </tr>
		</table>


        </form>
            <div id="ajax-message-<?php echo esc_attr($row['ord'])?>" class="ajax-message"></div>
    </div>
    </li>
	<?php } ?>
</ul>

</div>
