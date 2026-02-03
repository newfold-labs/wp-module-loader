<?php

namespace NewfoldLabs\WP\ModuleLoader;

use InvalidArgumentException;

/**
 * Module wpunit tests.
 *
 * @coversDefaultClass \NewfoldLabs\WP\ModuleLoader\Module
 */
class ModuleWPUnitTest extends \lucatume\WPBrowser\TestCase\WPTestCase {

	/**
	 * Make returns a Module instance with default isActive and isHidden.
	 *
	 * @return void
	 */
	public function test_make_returns_module_instance() {
		$module = Module::make( array(
			'name'     => 'test-module',
			'label'    => 'Test Module',
			'callback' => '__return_true',
		) );
		$this->assertInstanceOf( Module::class, $module );
		$this->assertFalse( $module->isActive );
		$this->assertFalse( $module->isHidden );
		$this->assertSame( 'test-module', $module->name );
	}

	/**
	 * Validate throws when name is missing.
	 *
	 * @return void
	 */
	public function test_validate_throws_when_name_missing() {
		$module = Module::make( array(
			'label'    => 'Test',
			'callback' => '__return_true',
		) );
		$this->expectException( InvalidArgumentException::class );
		$this->expectExceptionMessage( 'Module must have a name!' );
		$module->validate();
	}

	/**
	 * Validate returns true when module has required attributes.
	 *
	 * @return void
	 */
	public function test_validate_returns_true_when_valid() {
		$module = Module::make( array(
			'name'     => 'valid-module',
			'label'    => 'Valid Module',
			'callback' => '__return_true',
		) );
		$this->assertTrue( $module->validate() );
	}
}
