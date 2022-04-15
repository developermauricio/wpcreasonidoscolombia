<div class="wrap">
	<div id="lbg_logo">
			<h2>Manage Showcases</h2>
 	</div>
    <div><p>From this section you can add multiple showcases.</p>
    </div>

<div id="previewDialog"><iframe id="previewDialogIframe" src="" width="100%" height="600" style="border:0;"></iframe></div>

<div style="text-align:center; padding:0px 0px 20px 0px;"><img src="<?php echo plugins_url('images/icons/add_icon.gif', dirname(__FILE__))?>" alt="<?php esc_attr_e( 'add' , 'lbg-logoshowcase' ); ?>" align="absmiddle" /> <a href="?page=lbg_logoshowcase_Add_New">Add new (Showcase)</a></div>

<table width="100%" class="widefat">

			<thead>
				<tr>
					<th scope="col" width="5%"><?php esc_html_e( 'ID' , 'lbg-logoshowcase' );?></th>
					<th scope="col" width="26%"><?php esc_html_e( 'Name' , 'lbg-logoshowcase' );?></th>
					<th scope="col" width="26%"><?php esc_html_e( 'Shorcode' , 'lbg-logoshowcase' );?></th>
					<th scope="col" width="36%"><?php esc_html_e( 'Actions' , 'lbg-logoshowcase' );?></th>
					<th scope="col" width="7%"><?php esc_html_e( 'Preview' , 'lbg-logoshowcase' );?></th>
				</tr>
			</thead>

<tbody>
<?php foreach ( $result as $row )
	{
		$row=lbg_logoshowcase_unstrip_array($row); ?>
							<tr class="alternate author-self status-publish" valign="top">
					<td><?php echo esc_html($row['id'])?></td>
					<td><?php echo esc_html($row['name'])?></td>
					<td>[lbg_logoshowcase settings_id='<?php echo esc_html($row['id'])?>']</td>
					<td>
						<a href="?page=lbg_logoshowcase_Settings&amp;id=<?php echo esc_attr($row['id'])?>&amp;name=<?php echo esc_attr($row['name'])?>"><?php esc_html_e( 'Showcase Settings' , 'lbg-logoshowcase' );?></a> &nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="?page=lbg_logoshowcase_Playlist&amp;id=<?php echo esc_attr($row['id'])?>&amp;name=<?php echo esc_attr($row['name'])?>"><?php esc_html_e( 'Playlist' , 'lbg-logoshowcase' );?></a> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href="?page=lbg_logoshowcase_Manage_Showcases&id=<?php echo esc_attr($row['id'])?>" onclick="return confirm('Are you sure?')" style="color:#F00;"><?php esc_html_e( 'Delete' , 'lbg-logoshowcase' );?></a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="?page=lbg_logoshowcase_Manage_Showcases&amp;duplicate_id=<?php echo esc_attr($row['id'])?>"><?php esc_html_e( 'Duplicate' , 'lbg-logoshowcase' );?></a></td>
					<td align="center"><a href="javascript: void(0);" onclick="showDialogPreview(<?php echo esc_js($row['id'])?>)"><img src="<?php echo plugins_url('images/icons/magnifier.png', dirname(__FILE__))?>" alt="<?php esc_attr_e( 'preview' , 'lbg-logoshowcase' ); ?>" border="0" align="absmiddle" /></a></td>
	            </tr>
<?php } ?>
						</tbody>
		</table>


</div>
