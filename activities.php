<?php

require_once('functions.php');
require_once ('data.php');

session_start();

$page_title = 'Activities';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', [ 'navbar' => $activities_navbar ]);
$page_content = include_template ('activities.php', [ 'partners' => $partners ]);
$admin_panel = include_template ('admin_panel.php', [ 'user' => $_SESSION['user']]);

$layout_content = include_template ('layout.php', [
  'title' => $page_title,
  'desc' => $page_desc,
  'menu' => $menu,
  'navbar' => $page_navbar,
  'content' => $page_content,
  'admin_panel' => $admin_panel
]);

print($layout_content);
