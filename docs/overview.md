---
name: wp-module-loader
title: Overview
description: What the module does and who maintains it.
updated: 2025-03-18
---

# Overview

## What the module does

**wp-module-loader** is the core component that handles registration and management of Newfold modules inside WordPress brand plugins. It does not ship a UI; it provides:

- A **container** (extending `NewfoldLabs\Container\Container`) that host plugins set and pass to modules.
- A **module registry**: modules register with `name`, `label`, `callback`, and default `isActive`/`isHidden`.
- **Persistence** of active state via `WP_Forge\Options\Options` (option key `newfold_active_modules`).
- A **load** step on `after_setup_theme`: runs each active module’s callback with `(container(), module)`.

Brand plugins (e.g. Bluehost, HostGator) depend on this package via Composer, set the container, then require other `newfold-labs/wp-module-*` packages that call `register()` during their bootstrap.

## Who maintains it

- **Newfold Labs** (Newfold Digital) maintains the package. It is distributed via the Newfold Satis repository and used by all Newfold WordPress brand plugins.

## High-level features

- **Container:** Host sets the DI container via `container($container)`; modules receive it in their callback.
- **Module API:** `register()`, `unregister()`, `activate()`, `deactivate()`, `isActive()`, `load()`.
- **Options:** Active state is stored in a single WordPress option so it survives requests.
