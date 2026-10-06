<?php

if (!defined('ABSPATH')) {
  exit();
}

use WPKirk\WPBones\Database\Migration;
use WPKirk\Models\MyPluginBooks;

/*
 * Converted from database/seeders/BookSeeder.php by php bones migrate:to-v3.
 */
return new class extends Migration {
  protected $usePrefix = false;

  public function up()
  {
    // The seeder had $runOnce: it seeded the table only while it was empty, and so does this.
    if (!$this->isEmpty('my_plugin_books')) {
      return;
    }

    // insert by using the model class
    MyPluginBooks::insert([
      ['name' => 'Book iMac', 'price' => '100000'],
      ['name' => 'Book iPhone', 'price' => '20000'],
      ['name' => 'Book iPad', 'price' => '30000'],
      ['name' => 'Book iPod', 'price' => '10000'],
    ]);

    // insert by using the Seeder class
    // $this->insert(
    //   "(name) VALUES
    //         ('Book iMac'),
    //         ('Book iPod'),
    //         ('Book iPhone'),
    //         ('Book iPad')
    //         "
    // );
  }
};
