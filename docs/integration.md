---
name: wp-module-loader
title: Integration
description: How the module registers and integrates.
updated: 2025-03-18
---

# Integration

## How the loader fits in

Host plugins (e.g. Bluehost WordPress Plugin) use wp-module-loader to:

1. **Set the container** – The host creates a `NewfoldLabs\Container\Container` (or compatible), registers the plugin instance and any shared config (e.g. brand, cache types), then calls `NewfoldLabs\WP\ModuleLoader\container($container)` so the loader (and modules) use that single instance.
2. **Load modules** – Other Newfold packages (e.g. `wp-module-performance`, `wp-module-coming-soon`) are Composer dependencies. When they are loaded, they call `NewfoldLabs\WP\ModuleLoader\register([ ... ])` with a name, label, callback, and default active state.
3. **Run callbacks** – On `after_setup_theme` (priority 100), the loader’s `load()` runs. It iterates over active modules and calls each callback with `(container(), module)`.

So the host never calls `load()` directly; it is hooked in `bootstrap.php`. The host only sets the container before other modules are loaded.

## Container and options

- **Container:** Extended in this package as `NewfoldLabs\WP\ModuleLoader\Container` (adds `plugin()`). The host usually sets `plugin` and other keys before passing the container to the loader.
- **Options:** Active state is stored via `WP_Forge\Options\Options` under the option name `newfold_active_modules`. Keys are module names; values are booleans. The loader reads/writes this in `ModuleRegistry` and at the end of `load()`.

## Registering a module

From another package (e.g. wp-module-performance), typically in its bootstrap or main file:

```php
use function NewfoldLabs\WP\ModuleLoader\register;

register([
    'name'     => 'performance',
    'label'    => 'Performance',
    'callback' => function ( $container, $module ) {
        // Bootstrap the module using $container and $module.
    },
    'isActive' => true,
    'isHidden' => false,
]);
```

Required: `name`, `label`, `callback`. Optional: `isActive` (default `false`), `isHidden` (default `false`). The callback receives the shared container and the module instance.

## Hooks

- **`newfold_container_set`** – Fired when the container is set (in `container()`). Passes the container instance. Host plugins can use this to configure the container before modules run.
