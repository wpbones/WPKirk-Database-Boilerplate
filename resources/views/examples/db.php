<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->
<?php

use WPKirk\WPBones\Database\DB;

ob_start()
?>

<div class="wp-kirk wrap wp-kirk-sample">

  <h1><?php _e('Database', 'wp-kirk'); ?></h1>

  <div class="wp-kirk-toc-content">

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('query-builder', __('Query Builder', 'wp-kirk')); ?>

    <p><?php _e("WP Bones's database query builder provides a convenient, fluent interface to creating and running database queries. It can be used to perform most database operations in your WordPress instance.", 'wp-kirk'); ?></p>

    <?php wpkirk_code('php', "DB::table('users')
    ->all();") ?>


    <?php wpkirk_output(fn() => DB::table('users')->all()->dump()) ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('example', __('Example', 'wp-kirk')); ?>

    <?php wpkirk_code(
      'php',
      'foreach (DB::table(\'users\')->get() as $user) {
  echo "{$user->user_login}\n";
 }'
    ) ?>

    <?php wpkirk_output(function () {
      foreach (DB::table('users')->get() as $user) {
        echo "{$user->user_login}\n";
      }
    }) ?>

    <p><?php _e("You can find more", 'wp-kirk'); ?> <a target="_blank" href="https://wpbones.com/docs/DatabaseORM/query-builder"><?php _e("example here", 'wp-kirk'); ?></a></p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('no-prefix', __('No Prefix', 'wp-kirk')); ?>

    <p><?php printf(
          __('You can set the %s property to false in the model to not use the WordPress prefix.', 'wp-kirk'),
          '<code class="language-php inline">usePrefix</code>'
        ); ?></p>

    <?php wpkirk_code('php', 'DB::table(\'my_plugin_books\', \'id\', false)->all();') ?>

    <?php wpkirk_output(fn() => DB::table('my_plugin_books', 'id', false)->all()->dump()) ?>

    <p><?php printf(
          __('Or you can use the %s method as shorthand.', 'wp-kirk'),
          '<code class="language-php inline">tableWithoutPrefix()</code>'
        ); ?></p>

    <?php wpkirk_code('php', 'DB::tableWithoutPrefix(\'my_plugin_books\')->all();') ?>

    <?php wpkirk_output(fn() => DB::tableWithoutPrefix('my_plugin_books')->all()->dump()) ?>

  </div>

  <?php wpkirk_toc() ?>

</div>