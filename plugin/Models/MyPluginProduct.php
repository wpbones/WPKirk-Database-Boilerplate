<?php

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
  public $timestamps = false;

  //protected $table = 'my_plugin_products';

  /**
   * Get the table associated with the model.
   */
  public function getTable(): string
  {
    return DB::getTableName('MyPluginProducts');
  }
}
