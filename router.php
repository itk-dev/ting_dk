<?php

/**
 * @file
 * Router (rewrite) for Drupal 6 with clean urls.
 */

/*
 * Handle the case when urls are appended to the script (i.e. /router.php/«path»
 * rather than /router.php?q=«path»).
 * Code taken from Drupal 7:
 * https://github.com/drupal/drupal/blob/7.x/includes/bootstrap.inc#L3091-L3105
 */
if (isset($_SERVER['REQUEST_URI'])) {
  $request_path = strtok($_SERVER['REQUEST_URI'], '?');
  $base_path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
  $base_path_len = strlen($base_path);
  // $base_path_len = strlen(rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/'));
  // Unescape and strip $base_path prefix, leaving q without a leading slash.
  $path = substr(urldecode($request_path), $base_path_len + 1);
  // If the path equals the script filename, either because 'index.php' was
  // explicitly provided in the URL, or because the server added it to
  // $_SERVER['REQUEST_URI'] even when it wasn't provided in the URL (some
  // versions of Microsoft IIS do this), the front page should be served.
  if ($path == basename($_SERVER['PHP_SELF'])) {
    $path = '';
  }

  $_REQUEST['q'] = $_GET['q'] = trim($path, '/');
}

require_once __DIR__ . '/index.php';
