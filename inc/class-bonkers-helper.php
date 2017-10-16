<?php

if ( ! class_exists( 'Bonkers_Helper' ) ) {
	/**
	 * Class Bonkers_Helper
	 */
	class Bonkers_Helper {

		public static function get_plugins( $plugin_folder = '' ) {
			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}

			return get_plugins( $plugin_folder );
		}

		public static function _get_plugin_basename_from_slug( $slug ) {
			$keys = array_keys( Bonkers_Helper::get_plugins() );

			foreach ( $keys as $key ) {
				if ( preg_match( '|^' . $slug . '/|', $key ) ) {
					return $key;
				}
			}

			return $slug;
		}

		/**
		 * @return bool
		 */
		public static function is_not_static_page() {
			return 'page' == get_option( 'show_on_front' ) ? true : false;
		}

		/**
		 * @return bool
		 */
		public static function check_plugin_is_installed( $slug ) {
			$plugin_path = Bonkers_Helper::_get_plugin_basename_from_slug( $slug );
			if ( file_exists( ABSPATH . 'wp-content/plugins/' . $plugin_path ) ) {
				return true;
			}

			return false;
		}

		/**
		 * @return bool
		 */
		public static function check_plugin_is_active( $slug ) {
			$plugin_path = Bonkers_Helper::_get_plugin_basename_from_slug( $slug );
			if ( file_exists( ABSPATH . 'wp-content/plugins/' . $plugin_path ) ) {
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

				return is_plugin_active( $plugin_path );
			}
		}

		/**
		 * @return bool
		 */
		public static function has_plugin( $slug = null ) {

			$check = array(
				'installed' => self::check_plugin_is_installed( $slug ),
				'active'    => self::check_plugin_is_active( $slug ),
			);

			if ( ! $check['installed'] || ! $check['active'] ) {
				return false;
			}

			return true;
		}

		/**
		 * @return bool
		 */
		public static function create_plugin_title( $plugin_title, $plugin_slug ) {
			$installed = self::check_plugin_is_installed( $plugin_slug );
			if ( ! $installed ) {
				return __( 'Install : ', 'bonkers' ) . $plugin_title;
			} elseif ( ! self::check_plugin_is_active( $plugin_slug ) && $installed ) {
				return __( 'Activate : ', 'bonkers' ) . $plugin_title;
			} else {
				return __( 'Update : ', 'bonkers' ) . $plugin_title;
			}
		}

		/**
		 * @return bool
		 */
		public static function is_not_template_front_page() {
			$page_id = get_option( 'page_on_front' );

			return get_page_template_slug( $page_id ) == 'page-templates/template-front-page.php' ? true : false;
		}

		/**
		 * @return array
		 */
		public static function get_google_font_subsets() {
			return array(
				'cyrillic'     => 'Cyrillic',
				'cyrillic-ext' => 'Cyrillic Extended',
				'devanagari'   => 'Devanagari',
				'greek'        => 'Greek',
				'greek-ext'    => 'Greek Extended',
				'khmer'        => 'Khmer',
				'latin'        => 'Latin',
				'latin-ext'    => 'Latin Extended',
				'vietnamese'   => 'Vietnamese',
				'hebrew'       => 'Hebrew',
				'arabic'       => 'Arabic',
				'bengali'      => 'Bengali',
				'gujarati'     => 'Gujarati',
				'tamil'        => 'Tamil',
				'telugu'       => 'Telugu',
				'thai'         => 'Thai',
			);
		}

		public static function check_installed_data() {

			$import = get_option( 'bonkers_import_content' );

			if ( $import ) {
				return true;
			}

			return false;

		}

		public static function get_bootstrap_class( $no_columns ) {
			switch ( $no_columns ) {
				case 2:
					return 'col-md-2 col-sm-4 col-xs-12';
					break;
				case 3:
					return 'col-md-3 col-sm-6 col-xs-12';
					break;
				case 4:
					return 'col-md-4 col-sm-4 col-xs-12';
					break;
				case 5:
					return 'col-md-5 col-sm-6 col-xs-12';
					break;
				case 6:
					return 'col-md-6 col-sm-6 col-xs-12';
					break;
				case 7:
					return 'col-md-7 col-sm-6 col-xs-12';
					break;
				case 8:
					return 'col-md-8 col-sm-8 col-xs-12';
					break;
				case 9:
					return 'col-md-9 col-sm-6 col-xs-12';
					break;
				case 10:
					return 'col-md-10 col-sm-8 col-xs-12';
					break;
				default:
					return 'col-md-12';
					break;
			}
		}
	}
}// End if().
