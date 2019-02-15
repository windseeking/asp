<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../functions/functions.php');
require_once ('../system/data.php');
require_once('../system/config.php');

session_start();

$page_title = 'Activities';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', [ 'navbar' => $activities_navbar ]);
$page_content = include_template ('activities.php', [ ]);

$layout_content = include_template ('layout.php', [
  'title' => $page_title,
  'desc' => $page_desc,
  'menu' => $menu,
  'navbar' => $page_navbar,
  'content' => $page_content
]);

print($layout_content);
