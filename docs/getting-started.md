---
name: wp-module-loader
title: Getting started
description: Prerequisites, install, and run.
updated: 2025-03-18
---

# Getting started

## Prerequisites

- **PHP** 7.3+ (see `composer.json` platform).
- **Composer** for dependencies.
- **Git** for the repository.

## Install

From the package root:

```bash
composer install
```

This pulls in `newfold-labs/container`, `wp-forge/collection`, `wp-forge/fluent`, and `wp-forge/wp-options`.

## Run tests

```bash
composer run test
```

Uses Codeception with the `wpunit` suite. For coverage:

```bash
composer run test-coverage
```

Then open `tests/_output/html/index.html` to view the report.

## Using the loader in a host plugin

This package is consumed as a Composer dependency. In the host plugin you typically:

1. Create a container and set it with `NewfoldLabs\WP\ModuleLoader\container($container)`.
2. Require or autoload other `newfold-labs/wp-module-*` packages; each calls `register()` with its name, label, callback, and default state.
3. On `after_setup_theme`, the loader’s `load()` runs (hooked in `bootstrap.php`), which invokes each active module’s callback with `(container(), module)`.

See [integration.md](integration.md) for details.
