<?php
/**
 * Settings
 *
 * Settings Class
 *
 * @category   Components
 * @package    forms\core
 */

namespace forms\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Settings
 *
 * @package core
 *
 * Holds settings for the app
 */
class Settings {

	/** Should contain array of settings. 
	 *
	 *  @var array 
	 */
	protected static $settings = array();
	const NAME                 = 'campaign_monitor_forms_account_settings';

	/**
	 * Add a setting
	 * 
	 * @param string $setting setting name.
	 * @param string $value setting value.
	 */
	public static function add( $setting, $value ) {
		self::$settings             = Options::getArray( self::NAME );
		self::$settings[ $setting ] = $value;
		Options::update( self::NAME, self::$settings );
	}

	/**
	 * Reset all the settings
	 */
	public static function clear() {
		return Options::update( self::NAME, array() );
	}

	/**
	 * Get a specific settings or all of them if no argument is provided
	 * 
	 * @param string $setting setting name.
	 * @return array | null
	 */
	public static function get( $setting = '' ) {
		if ( null == $setting ) {
			return Options::getArray( self::NAME );
		} else {
			$settings = Options::getArray( self::NAME );
			if ( ! empty( $settings ) ) {
				if ( array_key_exists( $setting, $settings ) ) {
					return $settings[ $setting ];
				}
			}
		}

		return null;
	}
}
