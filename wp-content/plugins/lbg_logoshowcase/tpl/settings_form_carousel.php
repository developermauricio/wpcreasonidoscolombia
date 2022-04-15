  <div style="padding:30px;">
  <p><strong><?php esc_html_e( 'CAROUSEL showcase settings' , 'lbg-logoshowcase' );?></strong></p>
<table class="wp-list-table widefat fixed pages" cellspacing="0">

		  <tr>
		    <td align="right" valign="top" class="row-title" width="30%"><?php esc_html_e( 'Showcase Name' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="top" width="80%"><input name="name" type="text" size="40" id="name" value="<?php echo strip_tags($_SESSION['xname']);?>"/></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Skin' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="top"><select name="skin" id="skin">
              <option value="black" <?php echo (($_POST['skin']=='black')?'selected="selected"':'')?>>black</option>
              <option value="white" <?php echo (($_POST['skin']=='white')?'selected="selected"':'')?>>white</option>
            </select></td>
   		  </tr>
		  <tr>
            <td width="30%" align="right" valign="top" class="row-title"><?php esc_html_e( 'Showcase Width' , 'lbg-logoshowcase' );?></td>
		    <td width="80%" align="left" valign="top"><input name="width" type="text" size="15" id="width" value="<?php echo strip_tags($_POST['width']);?>"/> px</td>
	      </tr>
		  <tr>
            <td width="30%" align="right" valign="top" class="row-title"><?php esc_html_e( 'Auto Play' , 'lbg-logoshowcase' );?></td>
		    <td width="80%" align="left" valign="top"><input name="autoPlay" type="text" size="15" id="autoPlay" value="<?php echo strip_tags($_POST['autoPlay']);?>"/>
		      seconds</td>
	    </tr>
        <tr>
            <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Number Of Thumbs Per Screen' , 'lbg-logoshowcase' );?></td>
            <td align="left" valign="middle"><input name="numberOfThumbsPerScreen" type="text" size="15" id="numberOfThumbsPerScreen" value="<?php echo strip_tags($_POST['numberOfThumbsPerScreen']);?>"/> px<br />
              <i>If you set it to 0, it will be calculated automatically. You can set a fixed number, for example 3</i></td>
        </tr>
        <tr>
		    <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Enable Touch Screen' , 'lbg-logoshowcase' );?></td>
		    <td align="left" valign="middle"><select name="enableTouchScreen" id="enableTouchScreen">
              <option value="true" <?php echo (($_POST['enableTouchScreen']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['enableTouchScreen']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
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
			<td align="right" valign="top" class="row-title"><?php esc_html_e( 'Center Plugin' , 'lbg-logoshowcase' );?></td>
			<td align="left" valign="middle"><select name="centerPlugin" id="centerPlugin">
						<option value="true" <?php echo (($_POST['centerPlugin']=='true')?'selected="selected"':'')?>>true</option>
						<option value="false" <?php echo (($_POST['centerPlugin']=='false')?'selected="selected"':'')?>>false</option>
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
		    <td colspan="2" align="right" valign="top" class="row-title"><hr style="border:1px solid #CCC; border-collapse:collapse;" /></td>
    </tr>
		  <tr>
            <td width="30%" align="right" valign="top" class="row-title"><?php esc_html_e( 'Image Width' , 'lbg-logoshowcase' );?></td>
		    <td width="80%" align="left" valign="top"><input name="imageWidth" type="text" size="15" id="imageWidth" value="<?php echo strip_tags($_POST['imageWidth']);?>"/> px</td>
	      </tr>
	    <tr>
          <td width="30%" align="right" valign="top" class="row-title"><?php esc_html_e( 'Image Height' , 'lbg-logoshowcase' );?></td>
		    <td width="80%" align="left" valign="top"><input name="imageHeight" type="text" size="15" id="imageHeight" value="<?php echo strip_tags($_POST['imageHeight']);?>"/> px</td>
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
        <tr>
          <td colspan="2" align="right" valign="top" class="row-title"><hr style="border:1px solid #CCC; border-collapse:collapse;" /></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show All Controllers' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="middle"><select name="showAllControllers" id="showAllControllers">
            <option value="true" <?php echo (($_POST['showAllControllers']=='true')?'selected="selected"':'')?>>true</option>
            <option value="false" <?php echo (($_POST['showAllControllers']=='false')?'selected="selected"':'')?>>false</option>
          </select></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Navigation Arrows' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="middle"><select name="showNavArrows" id="showNavArrows">
            <option value="true" <?php echo (($_POST['showNavArrows']=='true')?'selected="selected"':'')?>>true</option>
            <option value="false" <?php echo (($_POST['showNavArrows']=='false')?'selected="selected"':'')?>>false</option>
          </select></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Navigation Arrows On Init' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="middle"><select name="showOnInitNavArrows" id="showOnInitNavArrows">
            <option value="true" <?php echo (($_POST['showOnInitNavArrows']=='true')?'selected="selected"':'')?>>true</option>
            <option value="false" <?php echo (($_POST['showOnInitNavArrows']=='false')?'selected="selected"':'')?>>false</option>
          </select></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Auto Hide Navigation Arrows' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="middle"><select name="autoHideNavArrows" id="autoHideNavArrows">
            <option value="true" <?php echo (($_POST['autoHideNavArrows']=='true')?'selected="selected"':'')?>>true</option>
            <option value="false" <?php echo (($_POST['autoHideNavArrows']=='false')?'selected="selected"':'')?>>false</option>
          </select></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Show Bottom Navigation' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="middle"><select name="showBottomNav" id="showBottomNav">
            <option value="true" <?php echo (($_POST['showBottomNav']=='true')?'selected="selected"':'')?>>true</option>
            <option value="false" <?php echo (($_POST['showBottomNav']=='false')?'selected="selected"':'')?>>false</option>
          </select></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Bottom Nav Position' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="top"><select name="bottomNavPosition" id="bottomNavPosition">
            <option value="left" <?php echo (($_POST['bottomNavPosition']=='left')?'selected="selected"':'')?>>left</option>
            <option value="center" <?php echo (($_POST['bottomNavPosition']=='center')?'selected="selected"':'')?>>center</option>
            <option value="right" <?php echo (($_POST['bottomNavPosition']=='right')?'selected="selected"':'')?>>right</option>
          </select></td>
        </tr>
        <tr>
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Bottom Nav Margin-Bottom' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="top"><input name="bottomNavMarginBottom" type="text" size="15" id="bottomNavMarginBottom" value="<?php echo strip_tags($_POST['bottomNavMarginBottom']);?>"/> px</td>
        </tr>


      </table>



</div>

<div style="text-align:center; padding:20px 0px 20px 0px;"><input name="Submit" type="submit" id="Submit" class="button-primary" value="Update Settings"></div>
