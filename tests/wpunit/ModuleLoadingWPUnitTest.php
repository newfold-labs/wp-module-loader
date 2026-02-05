<?php

namespace NewfoldLabs\WP\ModuleLoader;

/**
 * Module loading wpunit tests.
 *
 * @coversDefaultClass \NewfoldLabs\WP\ModuleLoader\Container
 */
class ModuleLoadingWPUnitTest extends \lucatume\WPBrowser\TestCase\WPTestCase {

	/**
	 * Verify core module classes exist.
	 *
	 * @return void
	 */
	public function test_module_classes_load() {
		$this->assertTrue( class_exists( Container::class ) );
		$this->assertTrue( class_exists( Module::class ) );
		$this->assertTrue( class_exists( ModuleRegistry::class ) );
		$this->assertTrue( class_exists( Plugin::class ) );
	}

	/**
	 * Verify loader functions exist.
	 *
	 * @return void
	 */
	public function test_loader_functions_exist() {
		$this->assertTrue( function_exists( 'NewfoldLabs\WP\ModuleLoader\register' ) );
		$this->assertTrue( function_exists( 'NewfoldLabs\WP\ModuleLoader\container' ) );
		$this->assertTrue( function_exists( 'NewfoldLabs\WP\ModuleLoader\options' ) );
	}

	/**
	 * Verify WordPress factory is available.
	 *
	 * @return void
	 */
	public function test_wordpress_factory_available() {
		$this->assertTrue( function_exists( 'get_option' ) );
		$this->assertNotEmpty( get_option( 'blogname' ) );
	}
}
