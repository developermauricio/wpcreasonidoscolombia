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
            <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Number Of Visible Items' , 'lbg-logoshowcase' );?></td>
            <td align="left" valign="middle"><input name="numberOfVisibleItems" type="text" size="15" id="numberOfVisibleItems" value="<?php echo strip_tags($_POST['numberOfVisibleItems']);?>"/>
              odd number</td>
        </tr>
        <tr>
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Elements Horizontal Spacing' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="middle"><input name="elementsHorizontalSpacing" type="text" size="15" id="elementsHorizontalSpacing" value="<?php echo strip_tags($_POST['elementsHorizontalSpacing']);?>"/>
              px</td>
        </tr>
        <tr>
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Elements Vertical Spacing' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="middle"><input name="elementsVerticalSpacing" type="text" size="15" id="elementsVerticalSpacing" value="<?php echo strip_tags($_POST['elementsVerticalSpacing']);?>"/>
              px</td>
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
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Animation Time' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="middle"><input name="animationTime" type="text" size="15" id="animationTime" value="<?php echo strip_tags($_POST['animationTime']);?>"/>
          seconds</td>
        </tr>
        <tr>
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Easing' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="middle"><select name="easing" id="easing">
		      <option value="easeInQuad" <?php echo (($_POST['easing']=='easeInQuad')?'selected="selected"':'')?>>easeInQuad</option>
		      <option value="easeOutQuad" <?php echo (($_POST['easing']=='easeOutQuad')?'selected="selected"':'')?>>easeOutQuad</option>
              <option value="easeInOutQuad" <?php echo (($_POST['easing']=='easeInOutQuad')?'selected="selected"':'')?>>easeInOutQuad</option>
              <option value="easeInCubic" <?php echo (($_POST['easing']=='easeInCubic')?'selected="selected"':'')?>>easeInCubic</option>
              <option value="easeOutCubic" <?php echo (($_POST['easing']=='easeOutCubic')?'selected="selected"':'')?>>easeOutCubic</option>
              <option value="easeInOutCubic" <?php echo (($_POST['easing']=='easeInOutCubic')?'selected="selected"':'')?>>easeInOutCubic</option>
              <option value="easeInQuart" <?php echo (($_POST['easing']=='easeInQuart')?'selected="selected"':'')?>>easeInQuart</option>
              <option value="easeOutQuart" <?php echo (($_POST['easing']=='easeOutQuart')?'selected="selected"':'')?>>easeOutQuart</option>
              <option value="easeInOutQuart" <?php echo (($_POST['easing']=='easeInOutQuart')?'selected="selected"':'')?>>easeInOutQuart</option>
              <option value="easeInSine" <?php echo (($_POST['easing']=='easeInSine')?'selected="selected"':'')?>>easeInSine</option>
              <option value="easeOutSine" <?php echo (($_POST['easing']=='easeOutSine')?'selected="selected"':'')?>>easeOutSine</option>
              <option value="easeOutSine" <?php echo (($_POST['easing']=='easeOutSine')?'selected="selected"':'')?>>easeOutSine</option>
              <option value="easeInExpo" <?php echo (($_POST['easing']=='easeInExpo')?'selected="selected"':'')?>>easeInExpo</option>
              <option value="easeOutExpo" <?php echo (($_POST['easing']=='easeOutExpo')?'selected="selected"':'')?>>easeOutExpo</option>
              <option value="easeInOutExpo" <?php echo (($_POST['easing']=='easeInOutExpo')?'selected="selected"':'')?>>easeInOutExpo</option>
              <option value="easeInQuint" <?php echo (($_POST['easing']=='easeInQuint')?'selected="selected"':'')?>>easeInQuint</option>
              <option value="easeOutQuint" <?php echo (($_POST['easing']=='easeOutQuint')?'selected="selected"':'')?>>easeOutQuint</option>
              <option value="easeInOutQuint" <?php echo (($_POST['easing']=='easeInOutQuint')?'selected="selected"':'')?>>easeInOutQuint</option>
              <option value="easeInCirc" <?php echo (($_POST['easing']=='easeInCirc')?'selected="selected"':'')?>>easeInCirc</option>
              <option value="easeOutCirc" <?php echo (($_POST['easing']=='easeOutCirc')?'selected="selected"':'')?>>easeOutCirc</option>
              <option value="easeInOutCirc" <?php echo (($_POST['easing']=='easeInOutCirc')?'selected="selected"':'')?>>easeInOutCirc</option>
              <option value="easeInElastic" <?php echo (($_POST['easing']=='easeInElastic')?'selected="selected"':'')?>>easeInElastic</option>
              <option value="easeOutElastic" <?php echo (($_POST['easing']=='easeOutElastic')?'selected="selected"':'')?>>easeOutElastic</option>
              <option value="easeInOutElastic" <?php echo (($_POST['easing']=='easeInOutElastic')?'selected="selected"':'')?>>easeInOutElastic</option>
              <option value="easeInBack" <?php echo (($_POST['easing']=='easeInBack')?'selected="selected"':'')?>>easeInBack</option>
              <option value="easeOutBack" <?php echo (($_POST['easing']=='easeOutBack')?'selected="selected"':'')?>>easeOutBack</option>
              <option value="easeInOutBack" <?php echo (($_POST['easing']=='easeInOutBack')?'selected="selected"':'')?>>easeInOutBack</option>
              <option value="easeInBounce" <?php echo (($_POST['easing']=='easeInBounce')?'selected="selected"':'')?>>easeInBounce</option>
              <option value="easeOutBounce" <?php echo (($_POST['easing']=='easeOutBounce')?'selected="selected"':'')?>>easeOutBounce</option>
              <option value="easeInOutBounce" <?php echo (($_POST['easing']=='easeInOutBounce')?'selected="selected"':'')?>>easeInOutBounce</option>
              <option value="swing" <?php echo (($_POST['easing']=='swing')?'selected="selected"':'')?>>swing</option>
              <option value="linear" <?php echo (($_POST['easing']=='linear')?'selected="selected"':'')?>>linear</option>
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
          <td align="right" valign="top" class="row-title"><?php esc_html_e( 'Bottom Nav Margin-Bottom' , 'lbg-logoshowcase' );?></td>
          <td align="left" valign="top"><input name="bottomNavMarginBottom" type="text" size="15" id="bottomNavMarginBottom" value="<?php echo strip_tags($_POST['bottomNavMarginBottom']);?>"/> px</td>
        </tr>


      </table>

</div>

<div style="text-align:center; padding:20px 0px 20px 0px;"><input name="Submit" type="submit" id="Submit" class="button-primary" value="Update Settings"></div>
