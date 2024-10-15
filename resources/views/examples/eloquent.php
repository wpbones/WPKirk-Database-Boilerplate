<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->
<?php

use WPKirk\Models\EloquentProduct as Product;
use WPKirk\Models\EloquentBook as Book;
use WPKirk\Models\EloquentUser as User;
use WPKirk\Models\MyPluginProduct;

ob_start();

?>

<div class="wp-kirk wrap wp-kirk-sample">

  <h1><?php _e('Eloquent ORM', 'wp-kirk'); ?></h1>

  <div class="wp-kirk-toc-content">

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('illuminate', __('Illuminate Eloquent ORM', 'wp-kirk')); ?>

    <p><?php _e('You may include the Eloquent ORM to provide a beautiful, simple ActiveRecord implementation for working with your database. Each database table has a corresponding "Model" which is used to interact with that table. Models allow you to query for data in your tables, as well as insert new records into the table.', 'wp-kirk'); ?></p>

    <p><?php _e('You may install Eloquent ORM in your plugin by using', 'wp-kirk'); ?></p>

    <?php wpkirk_code('sh', "composer install illuminate/database") ?>

    <p><?php _e('As we are using the complete illuminate database package, for further documentation on using the various database facilities this library provides, consult the', 'wp-kirk'); ?> <a href="https://laravel.com/docs/8.x/eloquent"><?php _e('Laravel framework documentation', 'wp-kirk'); ?></a></p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('query-wp', __('Query WordPress users table', 'wp-kirk')); ?>

    <?php wpkirk_code('php', "&lt;?php
    namespace WPKirk\Models;

    use Illuminate\Database\Eloquent\Model;
    use WPKirk\WPBones\Database\DB;

    class EloquentUser extends Model
    {
      /**
       * The primary key for the model.
       *
       * @var string
       */
      protected \$primaryKey = 'ID';

      /**
       * Get the table associated with the model.
       *
       * @return string
       */
      public function getTable(): string
      {
        return DB::getTableName('Users');
      }
    }") ?>

    <?php wpkirk_code('php', "&lt;?php
use WPKirk\Models\EloquentUser as User;
var_dump(User::all());") ?>

    <?php wpkirk_output(fn() => var_dump(User::all())) ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('find', __('Find a user by ID', 'wp-kirk')); ?>

    <p><?php _e('Of course, you\'ll be able to use all eloquent features', 'wp-kirk'); ?></p>

    <?php wpkirk_code('php', "&lt;?php
use WPKirk\Models\EloquentUser as User;
var_dump(User::find(1)->user_email);") ?>

    <?php wpkirk_execute_code('json', fn() => var_dump(User::find(1)->user_email)); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('custom-table', __('Custom Database Table', 'wp-kirk')); ?>

    <p><?php _e('Alongside the WordPress table you may use eloquent for your custom database table', 'wp-kirk'); ?></p>

    <?php wpkirk_code('php', "&lt;?php
    namespace WPKirk\Models;

    use Illuminate\Database\Eloquent\Model;
    use WPKirk\WPBones\Database\DB;

    class MyPluginProduct extends Model
    {
      /**
       * Disable Illuminate timestamp columns.
       *
       * @var bool
       */
      public \$timestamps = false;

      //protected \$table = 'my_plugin_products';

      /**
       * Get the table associated with the model.
       */
      public function getTable(): string
      {
        return DB::getTableName('MyPluginProducts');
      }
    }
") ?>

    <?php wpkirk_code('php', "echo MyPluginProduct::all()->count()"); ?>
    <?php wpkirk_execute_code('', fn() => MyPluginProduct::all()->count()); ?>

    <?php wpkirk_code('php', "echo MyPluginProduct::find(1)->name"); ?>
    <?php wpkirk_execute_code('', fn() => MyPluginProduct::find(1)->name); ?>

    <?php wpkirk_code('php', "&lt;?php
    namespace WPKirk\Models;

    use Illuminate\Database\Eloquent\Model;
    use WPKirk\WPBones\Database\DB;

    class EloquentProduct extends Model
    {
      /**
       * Disable Illuminate timestamp columns.
       *
       * @var bool
       */
      public \$timestamps = false;

      /**
       * Get the table associated with the model.
       */
      public function getTable(): string
      {
        return DB::getTableName('MyPluginProducts');
      }
    }") ?>

    <?php wpkirk_code('php', "&lt;?php
use WPKirk\Models\EloquentProduct as Product;
var_dump(Product::all());") ?>

    <?php wpkirk_output(fn() => var_dump(Product::all())); ?>

    <p><?php _e('and get single column value', 'wp-kirk'); ?></p>

    <?php wpkirk_code('php', "&lt;?php
    use WPKirk\Models\EloquentProduct as Product;
    var_dump(Product::find(3)->name);") ?>

    <?php wpkirk_output(fn() => var_dump(Product::find(3)->name)); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('loop-into', __('Loop into', 'wp-kirk')); ?>

    <p><?php _e('You can loop into the results', 'wp-kirk'); ?></p>

    <?php wpkirk_code('php', "&lt;?php
    use WPKirk\Models\EloquentProduct as Product;
    Product::all()->each(function (\$e) {
      var_dump(\$e->name);
    });") ?>

    <?php wpkirk_output(function () {
      Product::all()->each(function ($e) {
        var_dump($e->name);
      });
    }); ?>

    <p><?php _e('For further documentation on using the various database facilities this library provides, consult the', 'wp-kirk'); ?> <a target="_blank" href="https://laravel.com/docs/5.8/eloquent"><?php _e('Laravel framework documentation', 'wp-kirk'); ?></a></p>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('no-prefix', __('Eloquent Model with no WordPress prefix', 'wp-kirk')); ?>

    <p><?php _e('You can use an Eloquent model without the WordPress prefix. Just define your model as shown below.', 'wp-kirk'); ?></p>
    <p><?php
        printf(
          __('In short, use %s as the second parameter in %s', 'wp-kirk'),
          '<code class="language-php inline">false</code>',
          '<code class="language-php inline">DB::getTableName()</code>'
        );
        ?></p>

    <?php wpkirk_code('php', "&lt;?php
    namespace WPKirk\Models;

    use Illuminate\Database\Eloquent\Model;
    use WPKirk\WPBones\Database\DB;

    class EloquentBook extends Model
    {
      /**
       * Disable Illuminate timestamp columns.
       *
       * @var bool
       */
      public \$timestamps = false;

      /**
       * Get the table associated with the model.
       */
      public function getTable(): string
      {
        return DB::getTableName('MyPluginBooks', false);
      }
    }
    ") ?>

    <?php wpkirk_code('php', "&lt;?php
    use WPKirk\Models\EloquentBook as Book;
    var_dump(Book::all());") ?>

    <?php wpkirk_output(function () {
      var_dump(Book::all());
    }); ?>

    <p><?php _e('and loop into the results', 'wp-kirk'); ?></p>

    <?php wpkirk_code('php', "&lt;?php
    use WPKirk\Models\EloquentBook as Book;
    Book::all()->each(function (\$e) {
      var_dump(\$e->name);
    });") ?>

    <?php wpkirk_execute_code('json', function () {
      Book::all()->each(function ($e) {
        var_dump($e->name);
      });
    }); ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('class-model', __('Eloquent Class Model', 'wp-kirk')); ?>

    <p><?php _e('You can use the model class to interact with the database.', 'wp-kirk'); ?></p>
    <?php wpkirk_code('php', "&lt;?php
    namespace WPKirk\Models;

    use Illuminate\Database\Eloquent\Model;
    use WPKirk\WPBones\Database\DB;

    class MyPluginProduct extends Model
    {
      /**
       * Disable Illuminate timestamp columns.
       *
       * @var bool
       */
      public \$timestamps = false;

      //protected \$table = 'my_plugin_products';

      /**
       * Get the table associated with the model.
       */
      public function getTable(): string
      {
        return DB::getTableName('MyPluginProducts');
      }
    }
") ?>

    <?php wpkirk_code('php', "echo MyPluginProduct::all()->count()"); ?>
    <?php wpkirk_execute_code('', fn() => MyPluginProduct::all()->count()); ?>

    <?php wpkirk_code('php', "echo MyPluginProduct::find(1)->name"); ?>
    <?php wpkirk_execute_code('', fn() => MyPluginProduct::find(1)->name); ?>

  </div>

  <?php wpkirk_toc() ?>

</div>