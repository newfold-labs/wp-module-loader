---
name: wp-module-loader
title: Dependencies
description: Composer and npm dependencies.
updated: 2025-03-18
---

# Dependencies

This document lists the main Composer dependencies of wp-module-loader and how they are used. Routine WordPress core or dev tooling is omitted.

## Runtime

| Package | Purpose |
|---------|---------|
| **newfold-labs/container** | PSR-11-compatible DI container. This package extends it as `NewfoldLabs\WP\ModuleLoader\Container` and adds `plugin()`. The host plugin sets the container instance; modules receive it in their callback. |
| **wp-forge/collection** | `ModuleRegistry::collection()` uses `Collection::make()` to store registered modules. Used for `put`, `forget`, `get`, `has`, `where`, `pluck`. |
| **wp-forge/fluent** | `Module` and `Plugin` extend `Fluent` for attribute-style access (e.g. `$module->name`, `$module->callback`). |
| **wp-forge/wp-options** | `Options` (option name `newfold_active_modules`) persists which modules are active. Used in `ModuleRegistry` and in `load()` to save state. |

## Dev

- **johnpbloch/wordpress** – WordPress core for WPUnit tests.
- **lucatume/wp-browser** – Codeception and WPUnit integration.
- **phpunit/phpcov** – Coverage merging and HTML report.

All runtime deps are required by host plugins that depend on wp-module-loader; they are part of the loader’s public contract (container, options key, and collection behavior).
