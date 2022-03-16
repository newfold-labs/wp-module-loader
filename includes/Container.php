<?php

namespace NewfoldLabs\WP\ModuleLoader;

class Container extends \WP_Forge\Container\Container {

	/**
	 * Get plugin data.
	 *
	 * @return Plugin
	 */
	public function plugin() {
		return $this->get( 'plugin' );
	}

}
