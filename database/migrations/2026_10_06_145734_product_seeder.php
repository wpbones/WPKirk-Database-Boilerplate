<?php

if (!defined('ABSPATH')) {
  exit();
}

use WPKirk\WPBones\Database\Migration;
use WPKirk\Models\MyPluginProducts;

/*
 * Converted from database/seeders/ProductSeeder.php by php bones migrate:to-v3.
 */
return new class extends Migration {
  public function up()
  {
    // The seeder had $runOnce: it seeded the table only while it was empty, and so does this.
    if (!$this->isEmpty('my_plugin_products')) {
      return;
    }

    // insert by using the model class
    MyPluginProducts::insert([
      ['name' => 'iMac', 'price' => '100000'],
      ['name' => 'iPhone', 'price' => '20000'],
      ['name' => 'iPad', 'price' => '30000'],
      ['name' => 'iPod', 'price' => '10000'],
    ]);

    // insert by using the Seeder class
    // $this->insert(
    //   "(name) VALUES
    //         ('iMac'),
    //         ('iPod'),
    //         ('iPhone'),
    //         ('iPad')
    //         "
    // );
  }
};
