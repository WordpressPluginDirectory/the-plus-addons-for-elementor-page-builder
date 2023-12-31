<?php
/**
 * This is use for Remove Databsh Entry
 *
 * @link       https://posimyth.com/
 * @since      5.3.3
 *
 * @package    Theplus
 * @subpackage ThePlus/Notices
 * */

namespace Tp\Notices\Remove;

/**
 * Exit if accessed directly.
 * */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Tp_Notices_Remove' ) ) {

	/**
	 * This class used for only load All Notice Files
	 *
	 * @since 5.3.3
	 */
	class Tp_Notices_Remove {

		/**
		 * Instance
		 *
		 * @since 5.3.3
		 * @access private
		 * @static
		 * @var instance of the class.
		 */
		private static $instance = null;

		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 5.3.3
		 * @access public
		 * @static
		 * @return instance of the class.
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * Perform some compatibility checks to make sure basic requirements are meet.
		 *
		 * @since 5.3.3
		 * @access public
		 */
		public function __construct() {
			$this->tp_black_friday_2023();
		}

		/**
		 * Delete Notice Black Friday In Databash 
		 *
		 * @since 5.3.3
		 * @access public
		 */
		public function tp_black_friday_2023() {
			if ( get_user_meta( get_current_user_id(), 'tp_dismissed_notice_blackfy', true ) ) {
				delete_user_meta( get_current_user_id(), 'tp_dismissed_notice_blackfy' );
			}
		}

		/**
		 * Delete Notice TPAG Install Plugin Currency Not active this function
		 *
		 * @since 5.3.3
		 * @access public
		 */
		public function tp_tpag_install_notice() {
			if ( get_user_meta( get_current_user_id(), 'theplus_tpag_blocks_dismissed_notice', true ) ) {
				delete_user_meta( get_current_user_id(), 'theplus_tpag_blocks_dismissed_notice' );
			}
		}

		/**
		 * Delete Notice Horizontal Scroll Banner Widget Currency Not active this function
		 *
		 * @since 5.3.3
		 * @access public
		 */
		public function tp_widget_notice() {
			if ( get_user_meta( get_current_user_id(), 'tp_dismissed_notice_widget', true ) ) {
				delete_user_meta( get_current_user_id(), 'tp_dismissed_notice_widget' );
			}
		}
	}

	Tp_Notices_Remove::instance();
}
