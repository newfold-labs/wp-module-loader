---
name: wp-module-loader
title: Development
description: Lint, test, and workflow.
updated: 2025-03-18
---

# Development

## Testing

- **WPUnit (Codeception):** `composer run test` runs the `wpunit` suite.
- **Coverage:** `composer run test-coverage` generates a merged coverage report; open `tests/_output/html/index.html` to view.

Test bootstrap and helpers live under `tests/` (e.g. `tests/_support/`, `tests/wpunit/`).

## Code style

There is no custom lint script in this repo. Follow WordPress PHP coding standards when contributing. Host plugins that depend on this package may run their own PHPCS config over vendor source if needed.

## Day-to-day workflow

1. Make changes in `includes/` or `bootstrap.php`.
2. Run `composer run test` before committing.
3. When adding or changing the public API (e.g. new helper in `functions.php`), update [integration.md](integration.md) and [overview.md](overview.md) as needed.

## Version and release

This package is versioned and released to the Newfold Satis repository. Version is defined in `composer.json`. When cutting a release, update **docs/changelog.md** with the changes for that version.
