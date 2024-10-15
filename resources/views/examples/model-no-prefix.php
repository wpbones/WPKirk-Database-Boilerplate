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

  <h1 id="model">No WordPress prefix handling</h1>

  <div class="wp-kirk-toc-content">

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('no-prefix', __('No Prefix', 'wp-kirk')); ?>

    <p>In your Plugin you may use the Database Model class instead of the <a target="_blank"
        href="https://wpbones.com/docs/DatabaseORM/query-builder">Query
        Builder</a>.</p>
    <p>To use the Model convection you need to extend the Model class:</p>

    <?php wpkirk_code('php', "&lt;?php
namespace WPKirk\Models;

use WPKirk\WPBones\Database\Model;

class MyPluginBooks extends Model
{
}") ?>

    <p>We don't support the automatic plural naming of the table at the moment. Anyway, the default table name will be
      the "snake case" of the class name. For example, the class <code class="language-php inline">Users</code> will be associated with the table
      <code class="language-php inline">users</code>. The class <code class="language-php inline">UsersLogged</code> will be associated with the table
      <code class="language-php inline">users_logged</code>.
    </p>

    <p>If your model's corresponding database table does not fit this convention, you may manually specify the model's
      table name by defining a <code class="language-php inline">table</code> property on the model:</p>


    <?php wpkirk_code('php', "&lt;?php
namespace WPKirk\Models;

use WPKirk\WPBones\Database\Model;

class MyPluginBooks extends Model
{
  protected $table = 'my_plugin_books';
  protected $usePrefix = false;
}") ?>

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section('example', __('Example', 'wp-kirk')); ?>
    <?php wpkirk_code('php', "&lt;?php MyPluginBooks::all()") ?>

    <?php wpkirk_output(fn() => MyPluginBooks::all()->dump()); ?>

    <p>You can find more <a target="_blank"
        href="https://wpbones.com/docs/DatabaseORM/model">example
        here</a></>

  </div>

  <?php wpkirk_toc() ?>

</div>