	<div id="lbg_logo">
			<h2><?php esc_html_e( 'Showcase Settings for slider:' , 'lbg-logoshowcase' );?> <span style="color:#FF0000; font-weight:bold;"><?php echo strip_tags($_SESSION['xname'])?> - ID #<?php echo strip_tags($_SESSION['xid'])?></span></h2>
 	</div>

    <div style="text-align:center; padding:0px 0px 20px 0px;"><img src="<?php echo plugins_url('images/icons/magnifier.png', dirname(__FILE__))?>" alt="<?php esc_attr_e( 'add' , 'lbg-logoshowcase' ); ?>" align="absmiddle" /> <a href="javascript: void(0);" onclick="showDialogPreview(<?php echo strip_tags($_SESSION['xid'])?>)"><?php esc_html_e( 'Preview' , 'lbg-logoshowcase' );?></a></div>

    <div id="previewDialog"><iframe id="previewDialogIframe" src="" width="100%" height="600" style="border:0;"></iframe></div>

	<div style="padding:30px;">
    	<p><strong><?php esc_html_e( 'Please FIRST set showcase type' , 'lbg-logoshowcase' );?></strong></p>
		<table class="wp-list-table widefat fixed pages" cellspacing="0">
              <tr>
                <td align="right" valign="top" class="row-title" width="30%"><?php esc_html_e( 'Type' , 'lbg-logoshowcase' );?></td>
                <td align="left" valign="top" width="80%"><select name="type" id="type" onchange="jQuery('#Submit').click()">
              <option value="grid" <?php echo (($_POST['type']=='grid')?'selected="selected"':'')?>>grid</option>
              <option value="carousel" <?php echo (($_POST['type']=='carousel')?'selected="selected"':'')?>>carousel</option>
              <option value="perspective" <?php echo (($_POST['type']=='perspective')?'selected="selected"':'')?>>perspective (and one-by-one carousel)</option>
            </select></td>
              </tr>
        </table>
    </div>
