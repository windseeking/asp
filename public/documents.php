<?php

require_once('../init.php');

$page_title = 'Documents';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', ['navbar' => $documents_navbar]);
$page_content = include_template('documents.php', []);

$layout_content = include_template('layout.php', [
    'title' => $page_title,
    'desc' => $page_desc,
    'menu' => $menu,
    'navbar' => $page_navbar,
    'content' => $page_content
]);

print($layout_content);
