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

?>

<div class="wp-kirk wrap wp-kirk-sample">

  <h1><?php _e('Database', 'wp-kirk'); ?></h1>

  <div class="wp-kirk-toc clearfix">
    <ul>
      <li><a href="#query-builder"><?php _e('Query Builder', 'wp-kirk'); ?></a></li>
      <li><a href="#example"><?php _e('Example', 'wp-kirk'); ?></a></li>
      <li><a href="#no-prefix"><?php _e('No Prefix', 'wp-kirk'); ?></a></li>
    </ul>
  </div>

  <div class="wp-kirk-toc-content">

    <h2 id="query-builder"><?php _e('Query Builder', 'wp-kirk'); ?></h2>

    <p><?php _e("WP Bones's database query builder provides a convenient, fluent interface to creating and running database queries. It can be used to perform most database operations in your WordPress instance.", 'wp-kirk'); ?></p>

    <?php wpkirk_code('php', "DB::table('users')
    ->all();") ?>

    <details>
      <summary><?php _e('Output', 'wp-kirk'); ?></summary>
      <?php wpkirk_execute_code('json', fn() => DB::table('users')->all()->dump()); ?>
    </details>

    <h2 id="example"><?php _e('Example', 'wp-kirk'); ?></h2>

    <?php wpkirk_code(
      'php',
      'foreach (DB::table(\'users\')->get() as $user) {
  echo "{$user->user_login}\n";
 }'
    ) ?>

    <details>
      <summary><?php _e('Output', 'wp-kirk'); ?></summary>
      <?php wpkirk_execute_code(
        '',
        function () {
          foreach (DB::table('users')->get() as $user) {
            echo "{$user->user_login}\n";
          }
        }
      ); ?>
    </details>

    <p><?php _e("You can find more", 'wp-kirk'); ?> <a target="_blank" href="https://wpbones.com/docs/DatabaseORM/query-builder"><?php _e("example here", 'wp-kirk'); ?></a></p>

    <h2 id="no-prefix"><?php _e('No Prefix', 'wp-kirk'); ?></h2>

    <p><?php printf(
          __('You can set the %s property to false in the model to not use the WordPress prefix.', 'wp-kirk'),
          '<code class="language-php inline">usePrefix</code>'
        ); ?></p>

    <?php wpkirk_code('php', 'DB::table(\'my_plugin_books\', \'id\', false)->all();') ?>

    <details>
      <summary><?php _e('Output', 'wp-kirk'); ?></summary>
      <?php wpkirk_execute_code('json', fn() => DB::table('my_plugin_books', 'id', false)->all()->dump()); ?>
    </details>

    <p><?php printf(
          __('Or you can use the %s method as shorthand.', 'wp-kirk'),
          '<code class="language-php inline">tableWithoutPrefix()</code>'
        ); ?></p>

    <?php wpkirk_code('php', 'DB::tableWithoutPrefix(\'my_plugin_books\')->all();') ?>

    <details>
      <summary><?php _e('Output', 'wp-kirk'); ?></summary>
      <?php wpkirk_execute_code('json', fn() => DB::tableWithoutPrefix('my_plugin_books')->all()->dump()); ?>
    </details>

  </div>
</div>