<?php

namespace LearnDash\Hub;
use LearnDash\Hub\Controller\Main_Controller;
use LearnDash\Hub\Controller\Projects_Controller;
use LearnDash\Hub\Controller\Settings_Controller;
use LearnDash\Hub\Controller\Signin_Controller;
use LearnDash\Hub\Traits\License;

/**
 * Everything start from here
 *
 * Class Boot
 *
 * @package Hub
 */
class Boot {
	use License;

	/**
	 * Run all the triggers in init runtime.
	 */
	public function start() {
		if ( $this->is_signed_on() ) {
			$lists = get_site_option( 'learndash_hub_access_list' );

			if ( ! empty( $lists ) ) {
				$current = isset( $lists[ get_current_user_id() ] ) ? $lists[ get_current_user_id() ] : false;
				if ( false === $current ) {
					return;
				}
			}
			// later we will check the permissions for each modules.
			( new Main_Controller() );
			( new Projects_Controller() )->register_hooks();
			( new Settings_Controller() );
		} else {
			( new Signin_Controller() );
		}
	}

	/**
	 * Run the setup scripts when the plugin activating.
	 */
	public function install() {
	}

	/**
	 * Load the text domain
	 *
	 * @return void
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'learndash-hub', false, basename( dirname( __DIR__ ) ) . '/languages/' );
	}

	/**
	 * Clear all the cache
	 */
	public function deactivate() {
		delete_site_option( 'learndash-hub-projects-api' );
		delete_site_option( 'learndash_hub_update_plugins_cache' );
	}
}
