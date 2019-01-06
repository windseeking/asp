<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('functions.php');
require_once('config.php');

$con = get_connection($database_config);
$page_content = include_template('register.php', [
]);

$layout_content = include_template('layout.php', [
  'content' => $page_content,
  'title' => 'Register'
]);

print($layout_content);