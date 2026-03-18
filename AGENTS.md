# Agent guidance – wp-module-loader

This file gives AI agents a quick orientation to the repo. For full detail, see the **docs/** directory.

## What this project is

- **wp-module-loader** – Registers and manages Newfold modules used within WordPress brand plugins (e.g. Bluehost, HostGator). Host plugins set a shared container and call `setContainer()`; then Composer-loaded modules register with `NewfoldLabs\WP\ModuleLoader\register()`. This package provides the registry, container extension, and the `load()` flow that runs active modules. Maintained by Newfold Labs.

- **Stack:** PHP 7.3+ (see `composer.json` platform). No frontend; consumed as a Composer dependency by brand plugins.

- **Architecture:** Host plugin gets a `NewfoldLabs\Container\Container` (or equivalent), sets it via `NewfoldLabs\WP\ModuleLoader\container($container)`. Modules register with `register([ 'name' => '...', 'label' => '...', 'callback' => ..., 'isActive' => ... ])`. On `after_setup_theme` (priority 100), `load()` runs each active module’s callback with `(container(), module)`.

## Key paths

| Purpose | Location |
|---------|----------|
| Bootstrap | `bootstrap.php` – hooks `load` on `after_setup_theme` |
| Container / Plugin | `includes/Container.php`, `includes/Plugin.php` |
| Module registry & API | `includes/ModuleRegistry.php`, `includes/Module.php` |
| Public API (register, load, container, options) | `includes/functions.php` |
| Tests | `tests/` (Codeception wpunit) |

## Essential commands

```bash
composer install
composer run test        # codecept run wpunit
composer run test-coverage
```

## Documentation

- **Full documentation** for both agents and humans is in **docs/**. Start with **docs/index.md** for a table of contents.
- **CLAUDE.md** in this repo is a symlink to this file (AGENTS.md).

---

## Keeping documentation current

**When you change code, features, or workflows, update the docs so they stay accurate.** Keep **docs/index.md** current: when you add, remove, or rename doc files, update the table of contents (and quick links if present).

- Keep all docs current, not only the ones listed here.
- Prefer updating the appropriate file(s) in **docs/** over leaving docs out of date.
- When adding or changing REST routes or public API, update **api.md** (endpoints table). When adding or changing dependencies, update **dependencies.md**. When cutting a release, update **docs/changelog.md**.
