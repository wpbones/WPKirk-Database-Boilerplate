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
?>

<div class="wp-kirk wrap wp-kirk-sample">

  <h1><?php _e('Eloquent ORM', 'wp-kirk'); ?></h1>

  <div class="wp-kirk-toc clearfix">
    <ul>
      <li><a href="#illuminate"><?php _e('Illuminate Eloquent ORM', 'wp-kirk'); ?></a></li>
      <li><a href="#query-wp"><?php _e('Query WordPress users table', 'wp-kirk'); ?></a></li>
      <li><a href="#find"><?php _e('Find', 'wp-kirk'); ?></a></li>
      <li><a href="#custom-table"><?php _e('Custom Tables', 'wp-kirk'); ?></a></li>
      <li><a href="#loop-into"><?php _e('Loop Into', 'wp-kirk'); ?></a></li>
      <li><a href="#no-prefix"><?php _e('No WordPress Prefix', 'wp-kirk'); ?></a></li>
    </ul>
  </div>

  <div class="wp-kirk-toc-content">

    <!-- ----------------------------------------------------- -->

    <h2 id="illuminate"><?php _e('Illuminate Eloquent ORM', 'wp-kirk'); ?></h2>

    <p><?php _e('You may include the Eloquent ORM to provide a beautiful, simple ActiveRecord implementation for working with your database. Each database table has a corresponding "Model" which is used to interact with that table. Models allow you to query for data in your tables, as well as insert new records into the table.', 'wp-kirk'); ?></p>

    <p><?php _e('You may install Eloquent ORM in your plugin by using', 'wp-kirk'); ?></p>

    <pre><code class="language-sh">composer install illuminate/database</code></pre>

    <p><?php _e('As we are using the complete illuminate database package, for further documentation on using the various database facilities this library provides, consult the', 'wp-kirk'); ?> <a href="https://laravel.com/docs/8.x/eloquent"><?php _e('Laravel framework documentation', 'wp-kirk'); ?></a></p>

    <!-- ----------------------------------------------------- -->

    <h2 id="query-wp"><?php _e('Query WordPress users table', 'wp-kirk'); ?></h2>

    <?php wpkirk_code('php', "&lt;?php
use WPKirk\Models\EloquentUser as User;
var_dump(User::all());") ?>

    <details>
      <summary><?php _e('Output', 'wp-kirk'); ?></summary>
      <?php wpkirk_execute_code('json', fn() => var_dump(User::all())); ?>
    </details>

    <!-- ----------------------------------------------------- -->

    <h2 id="find"><?php _e('Find', 'wp-kirk'); ?></h2>

    <p><?php _e('Of course, you\'ll be able to use all eloquent features', 'wp-kirk'); ?></p>

    <?php wpkirk_code('php', "&lt;?php
use WPKirk\Models\EloquentUser as User;
var_dump(User::find(1)->user_email);") ?>

    <?php wpkirk_execute_code('json', fn() => var_dump(User::find(1)->user_email)); ?>

    <!-- ----------------------------------------------------- -->

    <h2 id="custom-table"><?php _e('Custom Table', 'wp-kirk'); ?></h2>

    <p><?php _e('Alongside the WordPress table you may use eloquent for your custom database table', 'wp-kirk'); ?></p>

    <?php wpkirk_code('php', "&lt;?php
use WPKirk\Models\EloquentProduct as Product;
var_dump(Product::all());") ?>

    <details>
      <summary><?php _e('Output', 'wp-kirk'); ?></summary>
      <?php wpkirk_execute_code('json', fn() => var_dump(Product::all())); ?>
    </details>

    <p><?php _e('and get single column value', 'wp-kirk'); ?></p>

    <?php wpkirk_code('php', "&lt;?php
    use WPKirk\Models\EloquentProduct as Product;
    var_dump(Product::find(3)->name);") ?>

    <details>
      <summary><?php _e('Output', 'wp-kirk'); ?></summary>
      <?php wpkirk_execute_code('json', fn() => var_dump(Product::find(3)->name)); ?>
    </details>

    <!-- ----------------------------------------------------- -->

    <h2 id="loop-into"><?php _e('Loop into', 'wp-kirk'); ?></h2>

    <p><?php _e('You can loop into the results', 'wp-kirk'); ?></p>

    <?php wpkirk_code('php', "&lt;?php
    use WPKirk\Models\EloquentProduct as Product;
    Product::all()->each(function (\$e) {
      var_dump(\$e->name);
    });") ?>

    <details>
      <summary><?php _e('Output', 'wp-kirk'); ?></summary>
      <?php wpkirk_execute_code(
        'json',
        function () {
          Product::all()->each(function ($e) {
            var_dump($e->name);
          });
        }
      ); ?>
    </details>

    <p><?php _e('For further documentation on using the various database facilities this library provides, consult the', 'wp-kirk'); ?> <a target="_blank" href="https://laravel.com/docs/5.8/eloquent"><?php _e('Laravel framework documentation', 'wp-kirk'); ?></a></p>


    <!-- ----------------------------------------------------- -->

    <h2 id="no-prefix"><?php _e('Eloquent Model with no WordPress prefix', 'wp-kirk'); ?></h2>

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

    <details>
      <summary><?php _e('Output', 'wp-kirk'); ?></summary>
      <?php wpkirk_execute_code('json', function () {
        var_dump(Book::all());
      }); ?>
    </details>

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

    <h2>Test</h2>

    <?php echo MyPluginProduct::all()->count() ?>
    <?php echo MyPluginProduct::find(1)->name ?>
    <?php echo MyPluginProduct::where('name', 'iPad')->first()->id ?>
    <?php
    $products =  MyPluginProduct::all();
    foreach ($products as $product) {
      echo $product->name;
    }
    ?>


  </div>
</div>