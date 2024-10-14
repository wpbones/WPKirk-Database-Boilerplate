<?php

if (!defined('ABSPATH')) {
  exit();
}

/*
|--------------------------------------------------------------------------
| Global functions
|--------------------------------------------------------------------------
|
| Here you can insert your global function loaded by composer settings.
|
*/

if (!function_exists('wpkirk_code')) {
  function wpkirk_code($language = 'php', $func = '')
  {
    echo '<pre><code class="language-' . $language . '">';
    echo $func;
    echo '</code></pre>';
  }
}

if (!function_exists('wpkirk_execute_code')) {
  function wpkirk_execute_code($language = 'php', $func = '')
  {
    echo '<pre><code class="language-' . $language . '">';
    if (is_callable($func)) {
      echo $func();
    }

    if (is_string($func)) {
      echo eval($func);
    }

    echo '</code></pre>';
  }
}
