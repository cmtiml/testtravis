<?php

use forms\core\Options;
use forms\core\Settings;

class TestSettings extends WP_UnitTestCase {

	public function test_ClearAndReAddSettings_ShouldSetValidArrayItem() {
		// Arrange.
		Settings::clear();

		// Act.	
		Settings::add( 'client_secret', 'test_secret' );      
		$cm_settings = Settings::get();
		print_r($cm_settings);
		// Assert.
		$this->assertTrue( is_array( $cm_settings ) );
		$this->assertSame( $cm_settings['client_secret'], 'test_secret' );
	}

	public function test_InvalidSettingsAndAddNewSettings_ShouldReSetEmptyArrayAndAddItem() {
		// Arrange.
		Options::update( Settings::NAME, 'InvalidString' );

		// Act.
		Settings::add( 'client_secret', 'test_secret' );      
		$cm_settings = Settings::get();
		print_r($cm_settings);
		// Assert.
		$this->assertTrue( is_array( $cm_settings ) );
		$this->assertSame( $cm_settings['client_secret'], 'test_secret' );
	}
}
