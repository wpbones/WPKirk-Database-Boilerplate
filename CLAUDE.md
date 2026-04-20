# WPKirk-Database-Boilerplate

Focused demo of the **database layer** in WP Bones — migrations, seeders, the built-in
`DB` query builder, and the optional Eloquent ORM (`illuminate/database`). Covers both the
lightweight path (custom models using WP's `$wpdb`) and the full Eloquent path.

## What this demos

Two parallel model families for the same two domain tables (products, books):

- **Custom models** (`MyPluginProduct`, `MyPluginProducts`, `MyPluginBooks`) — extend the
  framework's `Model` / query-builder classes, talk to `wp_my_plugin_*` tables.
- **Eloquent models** (`EloquentProduct`, `EloquentBook`, `EloquentUser`) — full Eloquent
  via `illuminate/database`, with `getTable()`, relations, typed scopes.
- **Migration files** (`database/migrations/*.php`) — reference implementations using the
  `Migration` base class with `$this->create()`, `$this->drop()`, `$this->charsetCollate`.
  WP Bones ships the base class but no generic `migrate` CLI runner — you trigger migrations
  from `plugin/activation.php` (or a custom command) when the schema needs to change.
- **Seeders** (`database/seeders/*.php`) — reference data-insertion classes extending the
  framework `Seeder` base; again, invoked by plugin code, not a CLI runner.

**Key files to read first:**

| File | What to look at |
| --- | --- |
| `plugin/Models/EloquentProduct.php` | Full Eloquent model with `getTable()` override |
| `plugin/Models/MyPluginProduct.php` | Custom framework model (no Eloquent) |
| `database/migrations/2015_..._create_products_table.php` | Schema migration using `$this->create()` |
| `database/seeders/ProductSeeder.php` | Sample data insert |
| `plugin/Http/Controllers/Dashboard/DashboardController.php` | Admin page showing CRUD examples |

## Smoke test (manual, ~30s)

With the plugin active:

1. Scaffold a new migration file: `php bones migrate:create MyTable` — should produce
   `database/migrations/<timestamp>_my_table.php`. Delete it after.
2. Instantiate a migration manually: `(new \WPKirk\Migrations\CreateProductsTable)->up();`
   via `wp eval` — the `wp_my_plugin_products` table should be created.
3. `wp db query "SHOW TABLES LIKE 'wp_my_plugin_%'"` — should list the table.
4. Open the plugin admin page → the dashboard shows query-builder + Eloquent examples
   without PHP errors.
5. `wp-content/debug.log` should stay clean.

## Use as a template

```sh
# 1. clone from the GitHub template
gh repo create my-db-plugin --template wpbones/WPKirk-Database-Boilerplate --public --clone
cd my-db-plugin

# 2. rename the PHP namespace + plugin slug
composer install
php bones rename "My DB Plugin"

# 3. build + activate
yarn install && yarn build
wp plugin activate my-db-plugin
```

Generate additional models / migrations with `php bones make:model`,
`php bones make:eloquent-model`, `php bones migrate:create`. Put the real table creation DDL
inside `up()`, mirror the drop inside `down()`. Trigger migrations from your
`plugin/activation.php` (the framework base class exposes `up()` / `down()` — invoke them
manually; there's no generic `php bones migrate` runner in v2).

## Framework surface exercised

This boilerplate is the **regression bed** for the database layer:

- `WPKirk\WPBones\Database\Model` + built-in query-builder
- Eloquent via `illuminate/database` bootstrap (see `WPKirk\WPBones\Database\DB`)
- `WPKirk\WPBones\Database\Migrations\Migration` base class with `$this->create()`,
  `$this->drop()`, `$this->charsetCollate`
- `php bones migrate:create` CLI scaffold (actual migration execution happens from
  `plugin/activation.php` or custom commands — no generic `migrate` runner in v2)
- `WPKirk\WPBones\Database\Seeder` base class for bulk data inserts
