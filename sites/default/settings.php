<?php
$update_free_access = FALSE;

$db_url = 'mysql://web@database.internal/main';

$local_settings = dirname(__FILE__) . '/settings.local.php';
if (file_exists($local_settings)) {
  require_once($local_settings);
}
