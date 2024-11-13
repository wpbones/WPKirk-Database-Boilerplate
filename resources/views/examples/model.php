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
    <?php wpkirk_section(__('Class Model', 'wp-kirk')); ?>

    <p><?php _e('In your Plugin you may use the Database Model class instead of the', 'wp-kirk') ?> <a target="_blank"
        href="https://wpbones.com/docs/DatabaseORM/query-builder">Query
        Builder</a>.</p>
    <p><?php _e('To use the Model convection you need to extend the Model class:', 'wp-kirk'); ?></p>


    <?php wpkirk_code("@/plugin/Models/MyPluginProducts.php") ?>

    <p><?php wpkirk_md(__('We don\'t support the automatic plural naming of the table at the moment. Anyway, the default table name will be
      the "snake case" of the class name. For example, the class `Users` will be associated with the table `users`. The class `UsersLogged` will be associated with the table `users_logged`.', 'wp-kirk'), 'php') ?></p>

    <p><?php wpkirk_md(__('If your model\'s corresponding database table does not fit this convention, you may manually specify the model\'s table name by defining a `table` property on the model:', 'wp-kirk'), 'php') ?></p>

    <p><?php wpkirk_md(__('You can also disable the prefix by setting the `usePrefix` property to `false`.', 'wp-kirk'), 'php') ?></p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Example', 'wp-kirk')); ?>

    <?php wpkirk_code("use WPKirk\Models\MyPluginProducts;

echo MyPluginProducts::all();", ['eval' => true]) ?>

    <p>
      <a class="button button-primary" target="_blank"
        href="https://wpbones.com/docs/DatabaseORM/model"><?php _e("More Examples", 'wp-kirk') ?> ↗</a>
    </p>

    <p><?php _e('You may also define a WP Bones Model and use the class directly.', 'wp-kirk'); ?></p>

    <?php wpkirk_code("@/plugin/Models/MyPluginBooks.php") ?>

    <?php wpkirk_code("use WPKirk\Models\MyPluginBooks;

echo MyPluginBooks::all()->count();", ['eval' => true]); ?>

  </div>

  <?php wpkirk_toc('Models') ?>

</div>