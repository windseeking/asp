<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('functions.php');
require_once('config.php');
require_once ('data.php');

session_start();

$con = get_connection($database_config);
$members = get_members($con);

$page_title = 'Members';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', [ 'navbar' => $members_navbar ]);
$page_content = include_template('members.php', [ 'members' => $members ]);

$layout_content = include_template('layout.php', [
  'title' => $page_title,
  'desc' => $page_desc,
  'menu' => $menu,
  'navbar' => $page_navbar,
  'content' => $page_content,
]);

print($layout_content);
