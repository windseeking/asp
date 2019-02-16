<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../../functions/functions.php');
require_once('../../system/data.php');
require_once('../../system/config.php');

session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['errors'] = 'Log in to view this page.';
    header("Location: /login");
    exit();
}

$user = $_SESSION['user'];
$con = get_connection($database_config);

$page_title = "My account";
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', ['navbar' => $admin_navbar]);

$page_content = include_template('account.php', []);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => $page_title,
    'navbar' => $page_navbar,
    'menu' => $menu,
    'tabs' => $admin_tabs,
    'user' => $user
]);

print($layout_content);
