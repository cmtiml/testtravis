<?php
/**
 * To help manage WordPress options
 *
 * Options Class
 *
 * @category   Components
 * @package    forms\core
 */

namespace forms\core;

/**
 * Class Options
 *
 * @package core
 *
 * Holds helper functions for managing WordPress settings
 */
class Options extends Config {


	/**
	 * WordPress option wrapper
	 *
	 * @param string $name option name.
	 * @param string $value options value.
	 * @param string $autoload default to yes.
	 */
	public static function add( $name, $value = '', $autoload = 'yes' ) {
		$option_name = self::getName() . '_' . $name;
		add_option( $option_name, $value, '', $autoload );
	}

	/**
	 * WordPress option wrapper
	 *
	 * @param string $name option name.
	 * @param string $value options value.
	 * @param null   $autoload default to null.
	 * @return bool
	 */
	public static function update( $name, $value, $autoload = null ) {
		$option_name = self::getName() . '_' . $name;
		return update_option( $option_name, $value, $autoload );
	}

	/**
	 * Wrapper for the WordPress options
	 *
	 * @param string $name option name.
	 * @param bool   $mixed default to false.
	 * @return mixed|void
	 */
	public static function get( $name, $mixed = false ) {
		$option_name = self::getName() . '_' . $name;
		$option      = get_option( $option_name, $mixed );
		return $option;
	}

	/**
	 * Wrapper for the WordPress options
	 *
	 * @param string $name option name.
	 * @param array  $default default to empty array.
	 * @return mixed|void
	 */
	public static function getArray( $name, $default = array() ) {
		$option_name = self::getName() . '_' . $name;
		$option      = get_option( $option_name, $default );
		if ( ! is_array( $option ) ) {            
			$option = array();
		}
		return $option;
	}

	/**
	 * Wrapper for the WordPress options
	 *
	 * @param string $name option name.
	 */
	public static function delete( $name ) {
		$option_name = self::getName() . '_' . $name;
		delete_option( $option_name );
	}
}
