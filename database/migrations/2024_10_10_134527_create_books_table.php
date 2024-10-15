<?php

use WPKirk\WPBones\Database\Migrations\Migration;

return new class extends Migration {

  protected $usePrefix = false;

  public function up()
  {
    $this->create(
      'my_plugin_books',
      "(
         id bigint(20) unsigned NOT NULL auto_increment,
         user_id bigint(20) unsigned NOT NULL default '0',
         name varchar(20) NOT NULL default '',
         description varchar(20) NOT NULL default '',
         price bigint(20) unsigned NOT NULL default '0',
         created_at datetime NOT NULL default '0000-00-00 00:00:00',
         updated_at datetime NOT NULL default '0000-00-00 00:00:00',
         foo_bar varchar(20) NOT NULL default '1',
         `foo-bar` varchar(20) NOT NULL default '2',
         PRIMARY KEY  (id),
         KEY user_id (user_id)
         ) {$this->charsetCollate};"
    );
  }
};
