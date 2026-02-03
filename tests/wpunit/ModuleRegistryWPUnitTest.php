<?php

namespace NewfoldLabs\WP\ModuleLoader;

/**
 * ModuleRegistry wpunit tests.
 *
 * @coversDefaultClass \NewfoldLabs\WP\ModuleLoader\ModuleRegistry
 */
class ModuleRegistryWPUnitTest extends \lucatume\WPBrowser\TestCase\WPTestCase {

	/**
	 * Has returns false for unregistered module name.
	 *
	 * @return void
	 */
	public function test_has_returns_false_for_unregistered() {
		$this->assertFalse( ModuleRegistry::has( 'nonexistent-module-name-' . wp_rand( 1, 99999 ) ) );
	}

	/**
	 * Get returns null for unregistered module name.
	 *
	 * @return void
	 */
	public function test_get_returns_null_for_unregistered() {
		$name = 'unregistered-' . wp_rand( 1, 99999 );
		$this->assertNull( ModuleRegistry::get( $name ) );
	}

	/**
	 * GetActive returns a collection (may be empty).
	 *
	 * @return void
	 */
	public function test_get_active_returns_collection() {
		$active = ModuleRegistry::getActive();
		$this->assertInstanceOf( \WP_Forge\Collection\Collection::class, $active );
	}
}
