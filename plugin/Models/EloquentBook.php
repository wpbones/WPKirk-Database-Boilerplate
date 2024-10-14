<?php

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
  public $timestamps = false;

  /**
   * Get the table associated with the model.
   */
  public function getTable(): string
  {
    return DB::getTableName('MyPluginBooks', false);
  }
}
