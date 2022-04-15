  <div style="padding:30px;">
  <p><strong><?php esc_html_e( 'GRID showcase settings' , 'lbg-logoshowcase' );?></strong></p>
	  <table class="wp-list-table widefat fixed pages" cellspacing="0">

		  <tr>
		    <td align="right" valign="top" class="row-title" width="30%"><?php esc_html_e( 'Showcase Name' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="top" width="80%"><input name="name" type="text" size="40" id="name" value="<?php echo strip_tags($_SESSION['xname']);?>"/></td>
	      </tr>
		  <tr>
            <td width="30%" align="right" valign="top" class="row-title"><?php esc_html_e( 'Colum Width' , 'lbg-logoshowcase' );?></td>
		    <td width="80%" align="left" valign="top"><input name="columWidth" type="text" size="15" id="columWidth" value="<?php echo strip_tags($_POST['columWidth']);?>"/> px</td>
	    </tr>
		  <tr>
            <td width="30%" align="right" valign="top" class="row-title"><?php esc_html_e( 'Gutter' , 'lbg-logoshowcase' );?></td>
		    <td width="80%" align="left" valign="top"><input name="gutter" type="text" size="15" id="gutter" value="<?php echo strip_tags($_POST['gutter']);?>"/> px</td>
	    </tr>
        <tr>
            <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Left Margin' , 'lbg-logoshowcase' );?></td>
            <td align="left" valign="middle"><input name="margin_left" type="text" size="15" id="margin_left" value="<?php echo strip_tags($_POST['margin_left']);?>"/> px</td>
        </tr>
        <tr>
            <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Right Margin' , 'lbg-logoshowcase' );?></td>
            <td align="left" valign="middle"><input name="margin_right" type="text" size="15" id="margin_right" value="<?php echo strip_tags($_POST['margin_right']);?>"/> px</td>
        </tr>
        <tr>
            <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Top Margin' , 'lbg-logoshowcase' );?></td>
            <td align="left" valign="middle"><input name="margin_top" type="text" size="15" id="margin_top" value="<?php echo strip_tags($_POST['margin_top']);?>"/> px</td>
        </tr>
        <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Responsive' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="middle"><select name="responsive" id="responsive">
              <option value="true" <?php echo (($_POST['responsive']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['responsive']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    </tr>
        <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Responsive Relative To Browser' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="middle"><select name="responsiveRelativeToBrowser" id="responsiveRelativeToBrowser">
              <option value="true" <?php echo (($_POST['responsiveRelativeToBrowser']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['responsiveRelativeToBrowser']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    </tr>
      <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Tooltip' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="middle"><select name="showTooltip" id="showTooltip">
              <option value="true" <?php echo (($_POST['showTooltip']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showTooltip']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    </tr>
        <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Grayscale' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="middle"><select name="grayscale" id="grayscale">
              <option value="true" <?php echo (($_POST['grayscale']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['grayscale']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    </tr>

		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Target Window For Link' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="middle"><select name="target" id="target">
		      <option value="_blank" <?php echo (($_POST['target']=='_blank')?'selected="selected"':'')?>>_blank</option>
		      <option value="_self" <?php echo (($_POST['target']=='_self')?'selected="selected"':'')?>>_self</option>
            </select></td>
	      </tr>

        <tr>
	        <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Border Width' , 'lbg-logoshowcase' );?></td>
	        <td align="left" valign="top"><input name="border" type="text" size="15" id="border" value="<?php echo strip_tags($_POST['border']);?>"/> px</td>
        </tr>
        <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Border Color OFF State' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="top"><input name="borderColorOFF" type="text" size="25" id="borderColorOFF" value="<?php echo strip_tags($_POST['borderColorOFF']);?>" style="background-color:#<?php echo strip_tags($_POST['borderColorOFF']);?>" />
          click to<script>
jQuery('#borderColorOFF').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            <?php esc_html_e( 'select the color or just write: transparent' , 'lbg-logoshowcase' );?></td>
	    </tr>
        <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Border Color ON State' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="top"><input name="borderColorON" type="text" size="25" id="borderColorON" value="<?php echo strip_tags($_POST['borderColorON']);?>" style="background-color:#<?php echo strip_tags($_POST['borderColorON']);?>" />
                <script>
jQuery('#borderColorON').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            <?php esc_html_e( 'click to select the color or just write: transparent' , 'lbg-logoshowcase' );?></td>
	    </tr>

      </table>



</div>

<div style="text-align:center; padding:20px 0px 20px 0px;"><input name="Submit" type="submit" id="Submit" class="button-primary" value="Update Settings"></div>
