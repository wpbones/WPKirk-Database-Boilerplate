<?php

namespace WPKirk\Http\Controllers\Examples;

use WPKirk\Http\Controllers\Controller;

if (!defined('ABSPATH')) {
  exit();
}

class DatabaseController extends Controller
{
  public function db()
  {
    return WPKirk()
      ->view('examples.db')
      ->withAdminStyle('prism')
      ->withAdminScript('prism')
      ->withAdminStyle('wp-kirk-common');
  }

  public function simpleModel()
  {
    return WPKirk()
      ->view('examples.model')
      ->withAdminStyle('prism')
      ->withAdminScript('prism')
      ->withAdminStyle('wp-kirk-common');
  }

  public function noPrefixModel()
  {
    return WPKirk()
      ->view('examples.model-no-prefix')
      ->withAdminStyle('prism')
      ->withAdminScript('prism')
      ->withAdminStyle('wp-kirk-common');
  }

  public function eloquent()
  {
    return WPKirk()
      ->view('examples.eloquent')
      ->withAdminStyle('prism')
      ->withAdminScript('prism')
      ->withAdminStyle('wp-kirk-common');
  }
}
