<?php
/*
Plugin Name: Logos Showcase - Grid / Carousel / Perspective
Description: This plugin will allow you to easily display on your website: logos, clients, partners, sponsors, brands, portfolio items...
Version: 1.3.8
Author: Lambert Group
Author URI: https://1.envato.market/OZ5Zr
Text Domain: lbg-logoshowcase
*/

ini_set('display_errors', 0);
$lbg_logoshowcase_path = trailingslashit(dirname(__FILE__));  //empty

//all the messages
$lbg_logoshowcase_messages = array(
		'version' => __( '<div class="error">Logos Showcase - Grid / Carousel / Perspective plugin requires WordPress 3.0 or newer. <a href="https://codex.wordpress.org/Upgrading_WordPress">Please update!</a></div>' , 'lbg-logoshowcase' ),
		'empty_img' => __( 'Image - required' , 'lbg-logoshowcase' ),
		'empty_name' => __( 'Name - required' , 'lbg-logoshowcase' ),
		'invalid_request' => __( 'Invalid Request!' , 'lbg-logoshowcase' ),
		'generate_for_this_showcase' => __( 'You can start customizing this Showcase.' , 'lbg-logoshowcase' ),
		'data_saved' => __( 'Data Saved!' , 'lbg-logoshowcase' )
	);


global $wp_version;

if ( !version_compare($wp_version,"3.0",">=")) {
	wp_die (esc_html($lbg_logoshowcase_messages['version'], 'lbg-logoshowcase' ));
}




function lbg_logoshowcase_activate() {
	//db creation, create admin options etc.
	global $wpdb;

	$lbg_logoshowcase_collate = ' COLLATE utf8_general_ci';

	$sql0 = "CREATE TABLE `" . $wpdb->prefix . "lbg_logoshowcase_showcases` (
			`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
			`name` VARCHAR( 255 ) NOT NULL ,
			PRIMARY KEY ( `id` )
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

	$sql1 = "CREATE TABLE `" . $wpdb->prefix . "lbg_logoshowcase_settings` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL DEFAULT 'grid',
  `width` smallint(5) unsigned NOT NULL DEFAULT '960',
  `width100Proc` varchar(8) NOT NULL DEFAULT 'false',
  `height100Proc` varchar(8) NOT NULL DEFAULT 'false',
	`centerPlugin` varchar(8) NOT NULL DEFAULT 'false',
  `skin` varchar(255) NOT NULL DEFAULT 'black',
  `autoPlay` smallint(5) unsigned NOT NULL DEFAULT '5',
  `target` varchar(8) NOT NULL DEFAULT '_blank',
  `showAllControllers` varchar(8) NOT NULL DEFAULT 'true',
  `showNavArrows` varchar(8) NOT NULL DEFAULT 'true',
  `showOnInitNavArrows` varchar(8) NOT NULL DEFAULT 'true',
  `autoHideNavArrows` varchar(8) NOT NULL DEFAULT 'true',
  `showBottomNav` varchar(8) NOT NULL DEFAULT 'true',
  `enableTouchScreen` varchar(8) NOT NULL DEFAULT 'true',
  `responsive` varchar(8) NOT NULL DEFAULT 'true',
  `responsiveRelativeToBrowser` varchar(8) NOT NULL DEFAULT 'false',
  `columWidth` smallint(5) unsigned NOT NULL DEFAULT '100',
  `gutter` smallint(5) unsigned NOT NULL DEFAULT '25',
  `margin_left` smallint(5) unsigned NOT NULL DEFAULT '25',
  `margin_right` smallint(5) unsigned NOT NULL DEFAULT '25',
  `margin_top` smallint(5) unsigned NOT NULL DEFAULT '10',
  `showTooltip` varchar(8) NOT NULL DEFAULT 'true',
  `grayscale` varchar(8) NOT NULL DEFAULT 'false',
  `border` smallint(5) unsigned NOT NULL DEFAULT '0',
  `borderColorOFF` varchar(12) NOT NULL DEFAULT 'transparent',
  `borderColorON` varchar(12) NOT NULL DEFAULT 'FF0000',
  `imageWidth` smallint(5) unsigned NOT NULL DEFAULT '155',
  `imageHeight` smallint(5) unsigned NOT NULL DEFAULT '100',
  `bottomNavPosition` varchar(8) NOT NULL DEFAULT 'center',
  `numberOfThumbsPerScreen` smallint(5) unsigned NOT NULL DEFAULT '0',
  `animationTime` float NOT NULL DEFAULT '0.8',
  `easing` varchar(12) NOT NULL DEFAULT 'easeOutQuad',
  `numberOfVisibleItems` smallint(5) unsigned NOT NULL DEFAULT '3',
  `elementsHorizontalSpacing` smallint(5) unsigned NOT NULL DEFAULT '120',
  `elementsVerticalSpacing` smallint(5) unsigned NOT NULL DEFAULT '10',
  `bottomNavMarginBottom` smallint(5) NOT NULL DEFAULT '-45',
	  PRIMARY KEY  (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8";

	$sql2 = "CREATE TABLE `". $wpdb->prefix . "lbg_logoshowcase_playlist` (
	  `id` int(10) unsigned NOT NULL auto_increment,
	  `showcaseid` int(10) unsigned NOT NULL,
	  `img` text,
	  `title` text,
	  `data-link` text,
	  `data-target` varchar(8),
	  `ord` int(10) unsigned NOT NULL,
	  PRIMARY KEY  (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8";


	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql0.$lbg_logoshowcase_collate);
	dbDelta($sql1.$lbg_logoshowcase_collate);
	dbDelta($sql2.$lbg_logoshowcase_collate);


	//initialize the showcases table with the first showcase type
	$rows_count = $wpdb->get_var( "SELECT COUNT(*) FROM ". $wpdb->prefix ."lbg_logoshowcase_showcases;" );
	if (!$rows_count) {
		$wpdb->insert(
			$wpdb->prefix . "lbg_logoshowcase_showcases",
			array(
				'name' => 'First Showcase'
			),
			array(
				'%s'
			)
		);
	}

	// initialize the settings
	$rows_count = $wpdb->get_var( "SELECT COUNT(*) FROM ". $wpdb->prefix ."lbg_logoshowcase_settings;" );
	if (!$rows_count) {
		lbg_logoshowcase_insert_settings_record(1);
	}

}



function lbg_logoshowcase_insert_settings_record($showcase_id) {
	global $wpdb;
	$wpdb->insert(
			$wpdb->prefix . "lbg_logoshowcase_settings",
			array(
				'width' => 960,
				'skin' => 'black'
			),
			array(
				'%d',
				'%s'
			)
		);
}


function lbg_logoshowcase_init_sessions() {
	global $wpdb;
	if (is_admin()) {
		if (!session_id()) {
			session_start();

			//initialize the session
			if (!isset($_SESSION['xid'])) {
				$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_logoshowcase_showcases) LIMIT 0, 1";
				$row = $wpdb->get_row($safe_sql,ARRAY_A);
				$_SESSION['xid'] = $row['id'];
				$_SESSION['xname'] = $row['name'];
			}
		}
	}
}

function lbg_logoshowcase_end_sessions() {
		if (is_admin()) {
			session_destroy();
		}
}


function lbg_logoshowcase_load_styles() {
	global $wpdb;
	if(strpos($_SERVER['PHP_SELF'], 'wp-admin') !== false) {
		$page = (isset($_GET['page'])) ? $_GET['page'] : '';
		if(preg_match('/lbg_logoshowcase/i', $page)) {
			wp_enqueue_style('lbg-jquery-ui-custom_css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/pepper-grinder/jquery-ui.min.css');
			wp_enqueue_style('lbg-logoshowcase-css', plugins_url('css/styles.css', __FILE__));
			wp_enqueue_style('lbg-logoshowcase-colorpicker-css', plugins_url('css/colorpicker/colorpicker.css', __FILE__));

			wp_enqueue_style('thickbox');
		}
	} else if (!is_admin()) { //loads css in front-end
		wp_enqueue_style('lbg-logoshowcase-site-grid-css', plugins_url('grid/css/logogridshowcase.css', __FILE__));
		wp_enqueue_style('lbg-logoshowcase-site-carousel-css', plugins_url('carousel/css/logo_carousel.css', __FILE__));
		wp_enqueue_style('lbg-logoshowcase-site-perspective-css', plugins_url('perspective/css/logo_perspective.css', __FILE__));
	}
}

function lbg_logoshowcase_load_scripts() {
	global $is_IE;
	$page = (isset($_GET['page'])) ? $_GET['page'] : '';
	if(preg_match('/lbg_logoshowcase/i', $page)) {
			wp_enqueue_script('jquery');


			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-widget');
			wp_enqueue_script('jquery-ui-mouse');
			wp_enqueue_script('jquery-ui-accordion');
			wp_enqueue_script('jquery-ui-autocomplete');
			wp_enqueue_script('jquery-ui-slider');
			wp_enqueue_script('jquery-ui-tabs');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_script('jquery-ui-draggable');
			wp_enqueue_script('jquery-ui-droppable');
			wp_enqueue_script('jquery-ui-selectable');
			wp_enqueue_script('jquery-ui-position');
			wp_enqueue_script('jquery-ui-datepicker');
			wp_enqueue_script('jquery-ui-resizable');
			wp_enqueue_script('jquery-ui-dialog');
			wp_enqueue_script('jquery-ui-button');

			wp_enqueue_script('jquery-form');
			wp_enqueue_script('jquery-color');
			wp_enqueue_script('jquery-masonry');
			wp_enqueue_script('jquery-ui-progressbar');
			wp_enqueue_script('jquery-ui-tooltip');

			wp_enqueue_script('jquery-effects-core');
			wp_enqueue_script('jquery-effects-blind');
			wp_enqueue_script('jquery-effects-bounce');
			wp_enqueue_script('jquery-effects-clip');
			wp_enqueue_script('jquery-effects-drop');
			wp_enqueue_script('jquery-effects-explode');
			wp_enqueue_script('jquery-effects-fade');
			wp_enqueue_script('jquery-effects-fold');
			wp_enqueue_script('jquery-effects-highlight');
			wp_enqueue_script('jquery-effects-pulsate');
			wp_enqueue_script('jquery-effects-scale');
			wp_enqueue_script('jquery-effects-shake');
			wp_enqueue_script('jquery-effects-slide');
			wp_enqueue_script('jquery-effects-transfer');

			wp_register_script('lbg-colorpicker', plugins_url('js/colorpicker/colorpicker.js', __FILE__));
			wp_enqueue_script('lbg-colorpicker');

			wp_register_script('lbg-admin-toggle', plugins_url('js/myToggle.js', __FILE__));
			wp_enqueue_script('lbg-admin-toggle');


			wp_enqueue_script('media-upload'); // before w.p 3.5
			wp_enqueue_media();// from w.p 3.5
			wp_enqueue_script('thickbox');

	} else if (!is_admin()) { //loads scripts in front-end
			wp_enqueue_script('jquery');
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-draggable');
			wp_enqueue_script('jquery-ui-tooltip');

			wp_enqueue_script('jquery-effects-core');


		wp_register_script('lbg-touchSwipe', plugins_url('carousel/js/jquery.touchSwipe.min.js', __FILE__));
		wp_enqueue_script('lbg-touchSwipe');

		wp_register_script('lbg-logoshowcase-grid', plugins_url('grid/js/logogridshowcase.js', __FILE__));
		wp_enqueue_script('lbg-logoshowcase-grid');

		wp_register_script('lbg-logoshowcase-carousel', plugins_url('carousel/js/logo_carousel.js', __FILE__));
		wp_enqueue_script('lbg-logoshowcase-carousel');

		wp_register_script('lbg-logoshowcase-perspective', plugins_url('perspective/js/logo_perspective.js', __FILE__));
		wp_enqueue_script('lbg-logoshowcase-perspective');


	}




}



// adds the menu pages
function lbg_logoshowcase_plugin_menu() {
	add_menu_page('LBG-LOGOSHOWCASE Admin Interface', 'LOGOS SHOWCASE', 'edit_posts', 'lbg_logoshowcase', 'lbg_logoshowcase_overview_page',
	plugins_url('images/plg_icon.png', __FILE__));
	add_submenu_page( 'lbg_logoshowcase', 'LBG-LOGOSHOWCASE Overview', 'Overview', 'edit_posts', 'lbg_logoshowcase', 'lbg_logoshowcase_overview_page');
	add_submenu_page( 'lbg_logoshowcase', 'LBG-LOGOSHOWCASE Manage Showcases', 'Manage Showcases', 'edit_posts', 'lbg_logoshowcase_Manage_Showcases', 'lbg_logoshowcase_manage_showcases_page');
	add_submenu_page( 'lbg_logoshowcase', 'LBG-LOGOSHOWCASE Manage Showcases Add New', 'Add New', 'edit_posts', 'lbg_logoshowcase_Add_New', 'lbg_logoshowcase_manage_showcases_add_new_page');
	add_submenu_page( 'lbg_logoshowcase_Manage_Showcases', 'LBG-LOGOSHOWCASE Showcase Settings', 'Showcase Settings', 'edit_posts', 'lbg_logoshowcase_Settings', 'lbg_logoshowcase_settings_page');
	add_submenu_page( 'lbg_logoshowcase_Manage_Showcases', 'LBG-LOGOSHOWCASE Showcase Playlist', 'Playlist', 'edit_posts', 'lbg_logoshowcase_Playlist', 'lbg_logoshowcase_playlist_page');
	add_submenu_page( 'lbg_logoshowcase', 'LBG-LOGOSHOWCASE Help', 'Help', 'edit_posts', 'lbg_logoshowcase_Help', 'lbg_logoshowcase_help_page');
}


//HTML content for overview page
function lbg_logoshowcase_overview_page()
{
	global $lbg_logoshowcase_path;
	include_once($lbg_logoshowcase_path . 'tpl/overview.php');
}

//HTML content for Manage Banners
function lbg_logoshowcase_manage_showcases_page()
{
	global $wpdb;
	global $lbg_logoshowcase_messages;
	global $lbg_logoshowcase_path;

	//delete showcase
	if (isset($_GET['id'])) {




		//delete from wp_lbg_logoshowcase_showcases
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_logoshowcase_showcases WHERE id = %d",$_GET['id']));

		//delete from wp_lbg_logoshowcase_settings
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_logoshowcase_settings WHERE id = %d",$_GET['id']));


		//delete from wp_lbg_logoshowcase_playlist
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_logoshowcase_playlist WHERE showcaseid = %d",$_GET['id']));

		//initialize the session
		$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_logoshowcase_showcases) ORDER BY id";
		$row = $wpdb->get_row($safe_sql,ARRAY_A);
		$row=lbg_logoshowcase_unstrip_array($row);
		if ($row['id']) {
			$_SESSION['xid']=$row['id'];
			$_SESSION['xname']=$row['name'];
		}
	}


	if (array_key_exists('duplicate_id', $_GET) && $_GET['duplicate_id']!='') {
			//showcases
			$safe_sql=$wpdb->prepare( "INSERT INTO ".$wpdb->prefix ."lbg_logoshowcase_showcases ( `name` ) SELECT `name` FROM (".$wpdb->prefix ."lbg_logoshowcase_showcases) WHERE id = %d",$_GET['duplicate_id'] );
			$wpdb->query($safe_sql);
			$showcaseid=$wpdb->insert_id;

			//settings
			$safe_sql=$wpdb->prepare( "INSERT INTO ".$wpdb->prefix ."lbg_logoshowcase_settings (`type` ,`width` ,`width100Proc`,`centerPlugin` ,`height100Proc` ,`skin` ,`autoPlay` ,`target` ,`showAllControllers` ,`showNavArrows` ,`showOnInitNavArrows` ,`autoHideNavArrows` ,`showBottomNav` ,`enableTouchScreen` ,`responsive` ,`responsiveRelativeToBrowser` ,`columWidth` ,`gutter` ,`margin_left` ,`margin_right` ,`margin_top` ,`showTooltip` ,`grayscale` ,`border` ,`borderColorOFF` ,`borderColorON` ,`imageWidth` ,`imageHeight` ,`bottomNavPosition` ,`numberOfThumbsPerScreen` ,`animationTime` ,`easing` ,`numberOfVisibleItems` ,`elementsHorizontalSpacing` ,`elementsVerticalSpacing` ,`bottomNavMarginBottom`  ) SELECT `type` ,`width` ,`width100Proc`,`centerPlugin` ,`height100Proc` ,`skin` ,`autoPlay` ,`target` ,`showAllControllers` ,`showNavArrows` ,`showOnInitNavArrows` ,`autoHideNavArrows` ,`showBottomNav` ,`enableTouchScreen` ,`responsive` ,`responsiveRelativeToBrowser` ,`columWidth` ,`gutter` ,`margin_left` ,`margin_right` ,`margin_top` ,`showTooltip` ,`grayscale` ,`border` ,`borderColorOFF` ,`borderColorON` ,`imageWidth` ,`imageHeight` ,`bottomNavPosition` ,`numberOfThumbsPerScreen` ,`animationTime` ,`easing` ,`numberOfVisibleItems` ,`elementsHorizontalSpacing` ,`elementsVerticalSpacing` ,`bottomNavMarginBottom`  FROM (".$wpdb->prefix ."lbg_logoshowcase_settings) WHERE id = %d",$_GET['duplicate_id'] );
			$wpdb->query($safe_sql);

			//playlist
			$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_logoshowcase_playlist) WHERE showcaseid = %d",$_GET['duplicate_id'] );
			$result = $wpdb->get_results($safe_sql,ARRAY_A);
			foreach ( $result as $row_playlist ) {
					$row_playlist=lbg_logoshowcase_unstrip_array($row_playlist);

					$safe_sql=$wpdb->prepare( "INSERT INTO ".$wpdb->prefix ."lbg_logoshowcase_playlist ( `showcaseid` ,`img` ,`title` ,`data-link` ,`data-target` ,`ord` ) SELECT ".$showcaseid." ,`img` ,`title` ,`data-link` ,`data-target` ,`ord` FROM (".$wpdb->prefix ."lbg_logoshowcase_playlist) WHERE id = %d",$row_playlist['id'] );
					$wpdb->query($safe_sql);
					$photoid=$wpdb->insert_id;
			}
	}

	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_logoshowcase_showcases) ORDER BY id";
	$result = $wpdb->get_results($safe_sql,ARRAY_A);
	include_once($lbg_logoshowcase_path . 'tpl/showcases.php');

}


//HTML content for Manage Banners - Add New
function lbg_logoshowcase_manage_showcases_add_new_page()
{
	global $wpdb;
	global $lbg_logoshowcase_messages;
	global $lbg_logoshowcase_path;

	if(array_key_exists('Submit', $_POST) && $_POST['Submit'] == 'Add New') {
		$errors_arr=array();
		if (empty($_POST['name']))
			$errors_arr[]=$lbg_logoshowcase_messages['empty_name'];

		if (count($errors_arr)) {
				include_once($lbg_logoshowcase_path . 'tpl/add_showcase.php'); ?>
				<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
		  	<?php } else { // no errors
					$wpdb->insert(
						$wpdb->prefix . "lbg_logoshowcase_showcases",
						array(
							'name' => sanitize_text_field($_POST['name'])
						),
						array(
							'%s'
						)
					);
					//insert default Showcase Settings for this new Showcase
					lbg_logoshowcase_insert_settings_record($wpdb->insert_id);
					?>
						<div class="wrap">
							<div id="lbg_logo">
								<h2>Manage Showcases - Add New Showcase</h2>
				 			</div>
							<div id="message" class="updated"><p><?php esc_html_e($lbg_logoshowcase_messages['data_saved'], 'lbg-logoshowcase' );?></p><p><?php esc_html_e($lbg_logoshowcase_messages['generate_for_this_showcase'], 'lbg-logoshowcase' );?></p></div>
							<div>
								<p>&raquo; <a href="?page=lbg_logoshowcase_Add_New"><?php esc_html_e('Add New (Showcase)', 'lbg-logoshowcase' );?></a></p>
								<p>&raquo; <a href="?page=lbg_logoshowcase_Manage_Showcases"><?php esc_html_e('Back to Manage Showcases', 'lbg-logoshowcase' );?></a></p>
							</div>
						</div>
		  	<?php }
	} else {
		include_once($lbg_logoshowcase_path . 'tpl/add_showcase.php');
	}

}


//HTML content for showcasesettings
function lbg_logoshowcase_settings_page()
{
	global $wpdb;
	global $lbg_logoshowcase_messages;
	global $lbg_logoshowcase_path;

	if (isset($_GET['id']) && isset($_GET['name'])) {
		$_SESSION['xid']=$_GET['id'];
		$_SESSION['xname']=$_GET['name'];
	}


	if(array_key_exists('Submit', $_POST) && $_POST['Submit'] == 'Update Settings') {
		$_GET['xmlf']='';
		$except_arr=array('Submit','name','page_scroll_to_id_instances','pll_ajax_backend');

			$wpdb->update(
				$wpdb->prefix .'lbg_logoshowcase_showcases',
				array(
				'name' => sanitize_text_field($_POST['name'])
				),
				array( 'id' => $_SESSION['xid'] )
			);
			$_SESSION['xname']=stripslashes($_POST['name']);


			foreach ($_POST as $key=>$val){
				if (in_array($key,$except_arr)) {
					unset($_POST[$key]);
				}
			}

			$wpdb->update(
				$wpdb->prefix .'lbg_logoshowcase_settings',
				$_POST,
				array( 'id' => $_SESSION['xid'] )
			);
			?>
			<div id="message" class="updated"><p><?php esc_html_e($lbg_logoshowcase_messages['data_saved'], 'lbg-logoshowcase' );?></p></div>
	<?php

	}


	$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_logoshowcase_settings) WHERE id = %d",$_SESSION['xid'] );
	$row = $wpdb->get_row($safe_sql,ARRAY_A);
	$row=lbg_logoshowcase_unstrip_array($row);
	$_POST = $row;
	$_POST=lbg_logoshowcase_unstrip_array($_POST);

	echo '<div class="wrap"><form method="POST" enctype="multipart/form-data" name="showcaseSettingsForm" id="showcaseSettingsForm">';

	include_once($lbg_logoshowcase_path . 'tpl/settings_form.php');
	include_once($lbg_logoshowcase_path . 'tpl/settings_form_'.$row['type'].'.php');

	echo '</form></div>';
}

function lbg_logoshowcase_playlist_page()
{
	global $wpdb;
	global $lbg_logoshowcase_messages;
	global $lbg_logoshowcase_path;

	if (isset($_GET['id']) && isset($_GET['name'])) {
		$_SESSION['xid']=$_GET['id'];
		$_SESSION['xname']=$_GET['name'];
	}


	if (array_key_exists('xmlf', $_GET) && $_GET['xmlf']=='add_playlist_record') {
		if(array_key_exists('Submit', $_POST) && $_POST['Submit'] == 'Add Record') {
			$errors_arr=array();

		if (count($errors_arr)) {
			include_once($lbg_logoshowcase_path . 'tpl/add_playlist_record.php'); ?>
			<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
	  	<?php } else { // no upload errors
				$max_ord = 1+$wpdb->get_var( $wpdb->prepare( "SELECT max(ord) FROM ". $wpdb->prefix ."lbg_logoshowcase_playlist WHERE showcaseid = %d",$_SESSION['xid'] ) );

				$wpdb->insert(
					$wpdb->prefix . "lbg_logoshowcase_playlist",
					array(
						'showcaseid' => sanitize_text_field($_POST['showcaseid']),
						'img' => sanitize_text_field($_POST['img']),
						'title' => sanitize_text_field($_POST['title']),
						'data-link' => sanitize_text_field($_POST['data-link']),
						'data-target' => sanitize_text_field($_POST['data-target']),
						'ord' => sanitize_text_field($max_ord)
					),
					array(
						'%d',
						'%s',
						'%s',
						'%s',
						'%s',
						'%d'
					)
				);

	  			if (isset($_POST['setitfirst'])) {
					$sql_arr=array();
					$ord_start=$max_ord;
					$ord_stop=1;
					$elem_id=$wpdb->insert_id;
					$ord_direction='+1';

					$sql_arr[]=$wpdb->prepare( "UPDATE ".$wpdb->prefix."lbg_logoshowcase_playlist SET ord=ord+1  WHERE showcaseid = %d and ord>=".$ord_stop." and ord<".$ord_start, $_SESSION['xid']);
					$sql_arr[]=$wpdb->prepare( "UPDATE ".$wpdb->prefix."lbg_logoshowcase_playlist SET ord=".$ord_stop." WHERE id=%d", $elem_id);

					foreach ($sql_arr as $sql)
						$wpdb->query($sql);
				}
				?>
					<div class="wrap">
						<div id="lbg_logo">
							<h2>Playlist for Showcase: <span style="color:#FF0000; font-weight:bold;"><?php echo strip_tags($_SESSION['xname'])?> - ID #<?php echo strip_tags($_SESSION['xid'])?></span> - Add New</h2>
			 			</div>
						<div id="message" class="updated"><p><?php esc_html_e($lbg_logoshowcase_messages['data_saved'], 'lbg-logoshowcase' );?></p></div>
						<div>
							<p>&raquo; <a href="?page=lbg_logoshowcase_Playlist&xmlf=add_playlist_record"><?php esc_html_e('Add New', 'lbg-logoshowcase' );?></a></p>
							<p>&raquo; <a href="?page=lbg_logoshowcase_Playlist"><?php esc_html_e('Back to Playlist', 'lbg-logoshowcase' );?></a></p>
						</div>
					</div>
	  	<?php }
		} else {
			include_once($lbg_logoshowcase_path . 'tpl/add_playlist_record.php');
		}

	} else {
		if (array_key_exists('duplicate_id', $_GET) && $_GET['duplicate_id']!='') {
			$max_ord = 1+$wpdb->get_var( $wpdb->prepare( "SELECT max(ord) FROM ". $wpdb->prefix ."lbg_logoshowcase_playlist WHERE showcaseid = %d",$_SESSION['xid'] ) );
			$safe_sql=$wpdb->prepare( "INSERT INTO ".$wpdb->prefix ."lbg_logoshowcase_playlist ( `showcaseid` ,`img` ,`title` , `data-link` ,`data-target` ,`ord` ) SELECT `showcaseid` ,`img` ,`title` ,`data-link` ,`data-target` ,".$max_ord." FROM (".$wpdb->prefix ."lbg_logoshowcase_playlist) WHERE id = %d",$_GET['duplicate_id'] );
			$wpdb->query($safe_sql);
			$lastID=$wpdb->insert_id;
			echo "<script>location.href='?page=lbg_logoshowcase_Playlist&id=".$_SESSION['xid']."&name=".$_SESSION['xname']."'</script>";

		}

		$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_logoshowcase_playlist) WHERE showcaseid = %d ORDER BY ord",$_SESSION['xid'] );
		$result = $wpdb->get_results($safe_sql,ARRAY_A);

		include_once($lbg_logoshowcase_path . 'tpl/playlist.php');
	}
}





function lbg_logoshowcase_help_page()
{
	global $lbg_logoshowcase_path;
	include_once($lbg_logoshowcase_path . 'tpl/help.php');
}

function lbg_logoshowcase_generate_preview_code($showcaseID) {
	global $wpdb;

	$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_logoshowcase_settings) WHERE id = %d",$showcaseID );
	$row = $wpdb->get_row($safe_sql,ARRAY_A);
	$row=lbg_logoshowcase_unstrip_array($row);

	$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_logoshowcase_playlist) WHERE showcaseid = %d ORDER BY ord",$showcaseID );
	$result = $wpdb->get_results($safe_sql,ARRAY_A);
	$playlist_str='';
	foreach ( $result as $row_playlist ) {

		$row_playlist=lbg_logoshowcase_unstrip_array($row_playlist);

		$img_over='';
		if ($row_playlist['img']!='') {
			if (strpos($row_playlist['img'], 'wp-content',9)===false)
				list($width, $height, $type, $attr) = getimagesize($row_playlist['img']);
			else
				list($width, $height, $type, $attr) = getimagesize( ABSPATH.substr($row_playlist['img'],strpos($row_playlist['img'], 'wp-content',9)) );
			$img_over='<img src="'.$row_playlist['img'].'" width="'.$width.'" height="'.$height.'" alt="'.$row_playlist['title'].'"  title="'.$row_playlist['title'].'" />';
		}


		$playlist_str.='<li data-link="'.$row_playlist['data-link'].'" data-target="'.$row_playlist['data-target'].'" >'.$img_over.'</li>';

	}


	$showcase_function='';
	$myxloader='';
	$list_name='';
	$the_parameters='';
	switch ($row["type"]) {
		case 'grid':
			$showcase_function='logogridshowcase';
			$myxloader='';
			$list_name='logs_list';
			$the_parameters='columWidth:'.$row["columWidth"].',
				gutter:'.$row["gutter"].',
				margin_left:'.$row["margin_left"].',
				margin_right:'.$row["margin_right"].',
				margin_top:'.$row["margin_top"].',
				responsive:'.$row["responsive"].',
				responsiveRelativeToBrowser:'.$row["responsiveRelativeToBrowser"].',
				width100Proc:false,
				height100Proc:false,
				target:"'.$row["target"].'",
				grayscale:'.$row["grayscale"].',
				showTooltip:'.$row["showTooltip"].',
				absUrl:"'.plugins_url("", __FILE__).'/grid/",
				border:'.$row["border"].',
				borderColorOFF:"'.(($row["borderColorOFF"]!='transparent')?'#':'').$row["borderColorOFF"].'",
				borderColorON:"'.(($row["borderColorON"]!='transparent')?'#':'').$row["borderColorON"].'"';
			break;
		case 'carousel':
			$showcase_function='logo_carousel';
			$myxloader='<div class="myloader"></div>';
			$list_name='logo_carousel_list';
			$the_parameters='skin:"'.$row["skin"].'",
				responsive:'.$row["responsive"].',
				responsiveRelativeToBrowser:'.$row["responsiveRelativeToBrowser"].',
				width:'.$row["width"].',
				width100Proc:false,
				height100Proc:false,
				centerPlugin:'.$row["centerPlugin"].',
				autoPlay:'.$row["autoPlay"].',
				target:"'.$row["target"].'",
				grayscale:'.$row["grayscale"].',
				showTooltip:'.$row["showTooltip"].',
				absUrl:"'.plugins_url("", __FILE__).'/carousel/",
				numberOfThumbsPerScreen:'.$row["numberOfThumbsPerScreen"].',
				enableTouchScreen:'.$row["enableTouchScreen"].',
				showAllControllers:'.$row["showAllControllers"].',
				showNavArrows:'.$row["showNavArrows"].',
				showOnInitNavArrows:'.$row["showOnInitNavArrows"].',
				autoHideNavArrows:'.$row["autoHideNavArrows"].',
				showBottomNav:'.$row["showBottomNav"].',
				bottomNavMarginBottom:'.$row["bottomNavMarginBottom"].',
				bottomNavPosition:"'.$row["bottomNavPosition"].'",
				imageWidth:'.$row["imageWidth"].',
				imageHeight:'.$row["imageHeight"].',
				border:'.$row["border"].',
				borderColorOFF:"'.(($row["borderColorOFF"]!='transparent')?'#':'').$row["borderColorOFF"].'",
				borderColorON:"'.(($row["borderColorON"]!='transparent')?'#':'').$row["borderColorON"].'"';
			break;
		case 'perspective':
			$showcase_function='logo_perspective';
			$myxloader='<div class="myloader"></div>';
			$list_name='logo_perspective_list';
			$the_parameters='skin:"'.$row["skin"].'",
				responsive:'.$row["responsive"].',
				responsiveRelativeToBrowser:'.$row["responsiveRelativeToBrowser"].',
				width:'.$row["width"].',
				width100Proc:false,
				height100Proc:false,
				centerPlugin:'.$row["centerPlugin"].',
				autoPlay:'.$row["autoPlay"].',
				target:"'.$row["target"].'",
				grayscale:'.$row["grayscale"].',
				showTooltip:'.$row["showTooltip"].',
				absUrl:"'.plugins_url("", __FILE__).'/perspective/",
				numberOfVisibleItems:'.$row["numberOfVisibleItems"].',
				elementsHorizontalSpacing:'.$row["elementsHorizontalSpacing"].',
				elementsVerticalSpacing:'.$row["elementsVerticalSpacing"].',
				animationTime:'.$row["animationTime"].',
				easing:"'.$row["easing"].'",
				enableTouchScreen:'.$row["enableTouchScreen"].',
				showAllControllers:'.$row["showAllControllers"].',
				showNavArrows:'.$row["showNavArrows"].',
				showOnInitNavArrows:'.$row["showOnInitNavArrows"].',
				autoHideNavArrows:'.$row["autoHideNavArrows"].',
				showBottomNav:'.$row["showBottomNav"].',
				bottomNavMarginBottom:'.$row["bottomNavMarginBottom"].',
				imageWidth:'.$row["imageWidth"].',
				imageHeight:'.$row["imageHeight"].',
				border:'.$row["border"].',
				borderColorOFF:"'.(($row["borderColorOFF"]!='transparent')?'#':'').$row["borderColorOFF"].'",
				borderColorON:"'.(($row["borderColorON"]!='transparent')?'#':'').$row["borderColorON"].'"';
			break;
	}



	return '<script>
		jQuery(function() {
			setTimeout(function(){
					jQuery("#logosshowcase_'.$row["id"].'").'.$showcase_function.'({'.
						$the_parameters.
					'});
			}, 800 );
		});
	</script>
            <div id="logosshowcase_'.$row["id"].'">'.$myxloader.'<ul class="'.$list_name.'">'.$playlist_str.'</ul></div><br style="clear:both;">';
}


function lbg_logoshowcase_shortcode($atts, $content=null) {
	global $wpdb;

	shortcode_atts( array('settings_id'=>''), $atts);
	if ($atts['settings_id']=='')
		$atts['settings_id']=1;

	return lbg_logoshowcase_generate_preview_code($atts['settings_id']);

}



register_activation_hook(__FILE__,"lbg_logoshowcase_activate"); //activate plugin and create the database
add_action('init', 'lbg_logoshowcase_init_sessions');	// initialize sessions
add_action('init', 'lbg_logoshowcase_load_styles');	// loads required styles
add_action('init', 'lbg_logoshowcase_load_scripts');			// loads required scripts
add_action('admin_menu', 'lbg_logoshowcase_plugin_menu'); // create menus
add_shortcode('lbg_logoshowcase', 'lbg_logoshowcase_shortcode');				// LBG-LOGOSHOWCASE shortcode

add_action('wp_logout','lbg_logoshowcase_end_sessions');
add_action('wp_login','lbg_logoshowcase_end_sessions');


/** OTHER FUNCTIONS **/

//stripslashes for an entire array
function lbg_logoshowcase_unstrip_array($array){
	if (is_array($array)) {
		foreach($array as &$val){
			if(is_array($val)){
				$val = unstrip_array($val);
			} else {
				$val = stripslashes($val);

			}
		}
	}
	return $array;
}







/* ajax update playlist record */

add_action('admin_head', 'lbg_logoshowcase_update_playlist_record_javascript');

function lbg_logoshowcase_update_playlist_record_javascript() {
	global $wpdb;
	//Set Your Nonce
	$lbg_logoshowcase_update_playlist_record_ajax_nonce = wp_create_nonce("lbg_logoshowcase_update_playlist_record-special-string");
	$lbg_logoshowcase_preview_record_ajax_nonce = wp_create_nonce("lbg_logoshowcase_preview_record-special-string");


	if(strpos($_SERVER['PHP_SELF'], 'wp-admin') !== false) {
		$page = (isset($_GET['page'])) ? $_GET['page'] : '';
		if(preg_match('/lbg_logoshowcase/i', $page)) {
?>




<script type="text/javascript" >

//delete the entire record
function lbg_logoshowcase_delete_entire_record (delete_id) {
	if (confirm('Are you sure?')) {
		jQuery("#lbg_logoshowcase_sortable").sortable('disable');
		jQuery("#"+delete_id).css("display","none");
		jQuery("#lbg_logoshowcase_updating_witness").css("display","block");
		var data = "action=lbg_logoshowcase_update_playlist_record&security=<?php echo esc_js($lbg_logoshowcase_update_playlist_record_ajax_nonce); ?>&updateType=lbg_logoshowcase_delete_entire_record&delete_id="+delete_id;
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			jQuery("#lbg_logoshowcase_sortable").sortable('enable');
			jQuery("#lbg_logoshowcase_updating_witness").css("display","none");
		});
	}
}






function lbg_logoshowcase_process_val(val,cssprop) {
	retVal=parseInt(val.substring(0, val.length-2));
	if (cssprop=="top")
		retVal=retVal-148;
	return retVal;
}






function showDialogPreview(theShowcaseID) {  //load content and open dialog
	var data ="action=lbg_logoshowcase_preview_record&security=<?php echo esc_js($lbg_logoshowcase_preview_record_ajax_nonce); ?>&theShowcaseID="+theShowcaseID;
	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	jQuery.post(ajaxurl, data, function(response) {
		jQuery('#previewDialogIframe').attr('src','<?php echo plugins_url("tpl/preview.html?d=".time(), __FILE__)?>');
		jQuery("#previewDialog").dialog("open");
	});
}



jQuery(document).ready(function($) {
	/*PREVIEW DIALOG BOX*/
	jQuery( "#previewDialog" ).dialog({
	  minWidth:1200,
	  minHeight:500,
	  title:"Showcase Preview",
	  modal: true,
	  autoOpen:false,
	  hide: "fade",
	  resizable: false,
	  open: function() {
	  },
	  close: function() {
		jQuery('#previewDialogIframe').attr('src','');
	  }
	});

	/* THE PLAYLIST */
	if (jQuery('#lbg_logoshowcase_sortable').length) {
		jQuery( '#lbg_logoshowcase_sortable' ).sortable({
			placeholder: "ui-state-highlight",
			start: function(event, ui) {
	            ord_start = ui.item.prevAll().length + 1;
	        },
			update: function(event, ui) {
	        	jQuery("#lbg_logoshowcase_sortable").sortable('disable');
	        	jQuery("#lbg_logoshowcase_updating_witness").css("display","block");
				var ord_stop=ui.item.prevAll().length + 1;
				var elem_id=ui.item.attr("id");
				var data = "action=lbg_logoshowcase_update_playlist_record&security=<?php echo esc_js($lbg_logoshowcase_update_playlist_record_ajax_nonce); ?>&updateType=change_ord&ord_start="+ord_start+"&ord_stop="+ord_stop+"&elem_id="+elem_id;
				// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				jQuery.post(ajaxurl, data, function(response) {
					jQuery("#lbg_logoshowcase_sortable").sortable('enable');
					jQuery("#lbg_logoshowcase_updating_witness").css("display","none");
				});
			}
		});
	}



	<?php
		$rows_count = $wpdb->get_var( $wpdb->prepare("SELECT COUNT(*) FROM ". $wpdb->prefix . "lbg_logoshowcase_playlist WHERE showcaseid = %d ORDER BY ord",$_SESSION['xid'] ) );
		for ($i=1;$i<=$rows_count;$i++) {
	?>

				jQuery('#upload_img_button_lbg_logoshowcase_<?php echo esc_js($i)?>').click(function(event) {
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
							document.forms["form-playlist-lbg_logoshowcase-"+<?php echo esc_js($i)?>].img.value=attachment.url;
							jQuery('#img_'+<?php echo esc_js($i)?>).attr('src',attachment.url);
						});
						// Finally, open the modal
						file_frame.open();
				});



	jQuery("#form-playlist-lbg_logoshowcase-<?php echo esc_js($i)?>").submit(function(event) {

		/* stop form from submitting normally */
		event.preventDefault();

		//show loading image
		jQuery('#ajax-message-<?php echo esc_js($i)?>').html('<img src="<?php echo plugins_url('lbg_logoshowcase/images/ajax-loader.gif', dirname(__FILE__))?>" />');
		var data ="action=lbg_logoshowcase_update_playlist_record&security=<?php echo esc_js($lbg_logoshowcase_update_playlist_record_ajax_nonce); ?>&"+jQuery("#form-playlist-lbg_logoshowcase-<?php echo esc_js($i)?>").serialize();

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			var new_img = '';
			if (document.forms["form-playlist-lbg_logoshowcase-<?php echo esc_js($i)?>"].img.value!='')
				new_img=document.forms["form-playlist-lbg_logoshowcase-<?php echo esc_js($i)?>"].img.value;
			jQuery('#top_image_'+document.forms["form-playlist-lbg_logoshowcase-<?php echo esc_js($i)?>"].id.value).attr('src',new_img);
			jQuery('#ajax-message-<?php echo esc_js($i)?>').html(response);
		});
	});
	<?php } ?>

});
</script>
<?php
		}
	}
}

//lbg_logoshowcase_update_playlist_record is the action=lbg_logoshowcase_update_playlist_record
add_action('wp_ajax_lbg_logoshowcase_update_playlist_record', 'lbg_logoshowcase_update_playlist_record_callback');

function lbg_logoshowcase_update_playlist_record_callback() {

	check_ajax_referer( 'lbg_logoshowcase_update_playlist_record-special-string', 'security' );
	global $wpdb;
	global $lbg_logoshowcase_messages;
	$errors_arr=array();
	//delete entire record
	if (array_key_exists('updateType', $_POST) && $_POST['updateType']=='lbg_logoshowcase_delete_entire_record') {
		$delete_id=$_POST['delete_id'];
		$safe_sql=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."lbg_logoshowcase_playlist WHERE id = %d",$delete_id);
		$row = $wpdb->get_row($safe_sql, ARRAY_A);
		$row=lbg_logoshowcase_unstrip_array($row);

		//delete the entire record
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_logoshowcase_playlist WHERE id = %d",$delete_id));
		$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."lbg_logoshowcase_playlist SET ord=ord-1 WHERE showcaseid = %d and  ord>".$row['ord'],$_SESSION['xid']));
	}

	//update elements order
	if (array_key_exists('updateType', $_POST) && $_POST['updateType']=='change_ord') {
		$sql_arr=array();
		$ord_start=$_POST['ord_start'];
		$ord_stop=$_POST['ord_stop'];
		$elem_id=(int)$_POST['elem_id'];
		$ord_direction='+1';
		if ($ord_start<$ord_stop)
			$sql_arr[]=$wpdb->prepare( "UPDATE ".$wpdb->prefix."lbg_logoshowcase_playlist SET ord=ord-1  WHERE showcaseid = %d and ord>".$ord_start." and ord<=".$ord_stop, $_SESSION['xid']);
		else
			$sql_arr[]=$wpdb->prepare( "UPDATE ".$wpdb->prefix."lbg_logoshowcase_playlist SET ord=ord+1  WHERE showcaseid = %d and ord>=".$ord_stop." and ord<".$ord_start, $_SESSION['xid']);
		$sql_arr[]=$wpdb->prepare( "UPDATE ".$wpdb->prefix."lbg_logoshowcase_playlist SET ord=".$ord_stop." WHERE id=%d", $elem_id);

		foreach ($sql_arr as $sql)
			$wpdb->query($sql);
	}



	$theid=isset($_POST['id'])?$_POST['id']:0;
	if($theid>0 && !count($errors_arr)) {
		//update playlist
		$wpdb->update(
			$wpdb->prefix .'lbg_logoshowcase_playlist',
				array(
				'img' => sanitize_text_field($_POST['img']),
				'title' => sanitize_text_field($_POST['title']),
				'data-link' => sanitize_text_field($_POST['data-link']),
				'data-target' => sanitize_text_field($_POST['data-target'])
				),
			array( 'id' => $theid )
		);



		?>
			<div id="message" class="updated"><p><?php esc_html_e($lbg_logoshowcase_messages['data_saved'], 'lbg-logoshowcase' );?></p></div>
	<?php
	} else if (!isset($_POST['updateType'])) {
		$errors_arr[]=$lbg_logoshowcase_messages['invalid_request'];
	}

	if (count($errors_arr)) { ?>
		<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
	<?php }

	wp_die(); // this is required to return a proper result
}




add_action('wp_ajax_lbg_logoshowcase_preview_record', 'lbg_logoshowcase_preview_record_callback');

function lbg_logoshowcase_preview_record_callback() {
	check_ajax_referer( 'lbg_logoshowcase_preview_record-special-string', 'security' );
	global $wpdb;
	$safe_sql=$wpdb->prepare( "SELECT type FROM (".$wpdb->prefix ."lbg_logoshowcase_settings) WHERE id = %d",$_POST['theShowcaseID'] );
	$row = $wpdb->get_row($safe_sql,ARRAY_A);
	$row=lbg_logoshowcase_unstrip_array($row);

	$aux_val='<html>
					<head>
					';
	switch ($row["type"]) {
		case 'grid':
			$aux_val.='<link href="'.plugins_url('grid/css/logogridshowcase.css', __FILE__).'" rel="stylesheet" type="text/css">';
			break;
		case 'carousel':
			$aux_val.='<link href="'.plugins_url('carousel/css/logo_carousel.css', __FILE__).'" rel="stylesheet" type="text/css">';
			break;
		case 'perspective':
			$aux_val.='<link href="'.plugins_url('perspective/css/logo_perspective.css', __FILE__).'" rel="stylesheet" type="text/css">';
			break;
	}


	$aux_val.='
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
						<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
						<script src="'.plugins_url('carousel/js/jquery.touchSwipe.min.js', __FILE__).'" type="text/javascript"></script>
						';
	switch ($row["type"]) {
		case 'grid':
			$aux_val.='<script src="'.plugins_url('grid/js/logogridshowcase.js', __FILE__).'" type="text/javascript"></script>';
			break;
		case 'carousel':
			$aux_val.='<script src="'.plugins_url('carousel/js/logo_carousel.js', __FILE__).'" type="text/javascript"></script>';
			break;
		case 'perspective':
			$aux_val.='<script src="'.plugins_url('perspective/js/logo_perspective.js', __FILE__).'" type="text/javascript"></script>';
			break;
	}
	$aux_val.='
					</head>
					<body style="padding:0px;margin:80px 0px 0px 0px;">';

	$aux_val.=lbg_logoshowcase_generate_preview_code($_POST['theShowcaseID']);
	$aux_val.="</body>
				</html>";
	$filename=plugin_dir_path(__FILE__) . 'tpl/preview.html';
	$fp = fopen($filename, 'w+');
	$fwrite = fwrite($fp, $aux_val);

	echo $fwrite;

	wp_die(); // this is required to return a proper result
}



?>
