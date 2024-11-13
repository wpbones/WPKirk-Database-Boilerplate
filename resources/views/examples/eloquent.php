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
    <?php wpkirk_section(__('Illuminate Eloquent ORM', 'wp-kirk')); ?>

    <p><?php _e('You may include the Eloquent ORM to provide a beautiful, simple ActiveRecord implementation for working with your database. Each database table has a corresponding "Model" which is used to interact with that table. Models allow you to query for data in your tables, as well as insert new records into the table.', 'wp-kirk'); ?></p>

    <p><?php _e('You may install Eloquent ORM in your plugin by using', 'wp-kirk'); ?></p>

    <?php wpkirk_code("composer install illuminate/database", ['language' => 'sh']) ?>

    <p><?php _e('As we are using the complete illuminate database package, for further documentation on using the various database facilities this library provides, consult the', 'wp-kirk'); ?> <a href="https://laravel.com/docs/8.x/eloquent"><?php _e('Laravel framework documentation', 'wp-kirk'); ?></a></p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Query WordPress users table', 'wp-kirk')); ?>
    <?php wpkirk_code('@/plugin/Models/EloquentUser.php'); ?>

    <?php wpkirk_code("use WPKirk\Models\EloquentUser as User;

var_dump(User::all());", ['eval' => true, 'details' => false]) ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Find a user by ID', 'wp-kirk')); ?>

    <p><?php _e('Of course, you\'ll be able to use all eloquent features', 'wp-kirk'); ?></p>

    <?php wpkirk_code("use WPKirk\Models\EloquentUser as User;

var_dump(User::find(1)->user_email);", ['eval' => true]) ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Custom Database Table', 'wp-kirk')); ?>

    <p><?php _e('Alongside the WordPress table you may use eloquent for your custom database table', 'wp-kirk'); ?></p>
    <?php wpkirk_code('@/plugin/Models/MyPluginProduct.php'); ?>

    <?php wpkirk_code("use WPKirk\Models\MyPluginProduct;

echo MyPluginProduct::all()->count();", ['eval' => true]); ?>

    <?php wpkirk_code("use WPKirk\Models\MyPluginProduct;

echo MyPluginProduct::find(1)->name;", ['eval' => true]); ?>

    <p><?php _e('You can use the Eloquent ORM to interact with your custom database tables.', 'wp-kirk'); ?></p>

    <?php wpkirk_code('@/plugin/Models/EloquentProduct.php'); ?>

    <?php wpkirk_code("use WPKirk\Models\EloquentProduct as Product;

var_dump(Product::all());", ['eval' => true, 'details' => false]) ?>

    <p><?php _e('and get single column value', 'wp-kirk'); ?></p>

    <?php wpkirk_code("use WPKirk\Models\EloquentProduct as Product;

var_dump(Product::find(3)->name);", ['eval' => true]) ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Loop into', 'wp-kirk')); ?>

    <p><?php _e('You can loop into the results', 'wp-kirk'); ?></p>

    <?php wpkirk_code("use WPKirk\Models\EloquentProduct as Product;

Product::all()->each(function (\$e) {
  var_dump(\$e->name);
});", ['eval' => true]) ?>

    <p><?php _e('For further documentation on using the various database facilities this library provides, consult the', 'wp-kirk'); ?> <a target="_blank" href="https://laravel.com/docs/5.8/eloquent"><?php _e('Laravel framework documentation', 'wp-kirk'); ?></a></p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Eloquent Model with no WordPress prefix', 'wp-kirk')); ?>

    <p><?php _e('You can use an Eloquent model without the WordPress prefix. Just define your model as shown below.', 'wp-kirk'); ?></p>
    <p><?php wpkirk_md(
          __('In short, use `false` as the second parameter in `DB::getTableName()`', 'wp-kirk'),
          'php'
        )
        ?></p>

    <?php wpkirk_code('@/plugin/Models/EloquentBook.php'); ?>

    <?php wpkirk_code("use WPKirk\Models\EloquentBook as Book;

var_dump(Book::all());",  ['eval' => true, 'details' => false]) ?>

    <p><?php _e('and loop into the results', 'wp-kirk'); ?></p>

    <?php wpkirk_code("use WPKirk\Models\EloquentBook as Book;

Book::all()->each(function (\$e) {
  var_dump(\$e->name);
});", ['eval' => true]) ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Eloquent Class Model', 'wp-kirk')); ?>

    <p><?php _e('You can use the model class to interact with the database.', 'wp-kirk'); ?></p>

    <?php wpkirk_code('@/plugin/Models/MyPluginProduct.php'); ?>

    <?php wpkirk_code("use WPKirk\Models\MyPluginProduct;

echo MyPluginProduct::all()->count();", ['eval' => true]); ?>

    <?php wpkirk_code("use WPKirk\Models\MyPluginProduct;

echo MyPluginProduct::find(1)->name;", ['eval' => true]); ?>

  </div>

  <?php wpkirk_toc('ORM') ?>

</div>