<?php

require_once('../../init.php');

if (!isset($_SESSION['user'])) {
    $_SESSION['errors'] = 'Log in to view this page.';
    header("Location: /login");
    exit();
}

$user = $_SESSION['user'];

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
