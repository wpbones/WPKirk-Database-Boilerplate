<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->
<?php

use WPKirk\Models\MyPluginBooks;

ob_start()

?>

<div class="wp-kirk wrap wp-kirk-sample">

  <div class="wp-kirk-toc-content">

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('No Prefix', 'wp-kirk')); ?>

    <?php wpkirk_code('@/database/migrations/2024_10_10_134527_create_books_table.php'); ?>
    <?php wpkirk_code('@/database/seeders/BookSeeder.php'); ?>
    <?php wpkirk_code('@/plugin/Models/MyPluginBooks.php'); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Example', 'wp-kirk')); ?>
    <?php wpkirk_code("use WPKirk\Models\MyPluginBooks;

echo MyPluginBooks::all()->dump();", ['eval' => true]) ?>

    <p>
      <a class="button button-primary" target="_blank"
        href="https://wpbones.com/docs/DatabaseORM/model"><?php _e("More Examples", 'wp-kirk') ?> ↗</a>
    </p>

  </div>

  <?php wpkirk_toc('No WordPress Prefix') ?>

</div>