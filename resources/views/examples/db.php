<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->
<?php ob_start() ?>

<div class="wp-kirk wrap wp-kirk-sample">

  <div class="wp-kirk-toc-content">

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Query Builder', 'wp-kirk')); ?>

    <p><?php _e("WP Bones's database query builder provides a convenient, fluent interface to creating and running database queries. It can be used to perform most database operations in your WordPress instance.", 'wp-kirk'); ?></p>

    <?php wpkirk_code("use WPKirk\WPBones\Database\DB;

echo DB::table('users')->all()->dump();", ['eval' => true, 'details' => false]) ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Example', 'wp-kirk')); ?>

    <?php wpkirk_code('use WPKirk\WPBones\Database\DB;

foreach (DB::table(\'users\')->get() as $user) {
  echo "{$user->user_login}\n";
}', ['eval' => true]) ?>

    <p><?php _e("You can find more", 'wp-kirk'); ?> <a target="_blank" href="https://wpbones.com/docs/DatabaseORM/query-builder"><?php _e("example here", 'wp-kirk'); ?></a></p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Migrations & Seeders', 'wp-kirk')); ?>

    <p><?php _e("You may use the migrations to create your own custom database tables.", 'wp-kirk'); ?></p>

    <?php wpkirk_code('@/database/migrations/2015_12_12_134527_create_products_table.php'); ?>

    <p><?php _e("And the Seeder to insert default records", 'wp-kirk'); ?></p>
    <?php wpkirk_code('@/database/seeders/ProductSeeder.php'); ?>

    <?php wpkirk_section(__('No Prefix', 'wp-kirk')); ?>

    <p><?php wpkirk_md(__('You can set the `usePrefix` property to false in the model to not use the WordPress prefix.', 'wp-kirk'),); ?></p>

    <?php wpkirk_code('use WPKirk\WPBones\Database\DB;

echo DB::table(\'my_plugin_books\', \'id\', false)->all()->dump();', ['eval' => true, 'details' => false]) ?>

    <p><?php wpkirk_md(__('Or you can use the `tableWithoutPrefix()` method as shorthand.', 'wp-kirk'),); ?></p>

    <?php wpkirk_code('use WPKirk\WPBones\Database\DB;

echo DB::tableWithoutPrefix(\'my_plugin_books\')->all()->dump();', ['eval' => true, 'details' => false]) ?>

  </div>

  <?php wpkirk_toc('DB Class') ?>

</div>