<?php

require_once('functions.php');
require_once ('data.php');

$page_title = 'News';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', [ 'navbar' => $news_navbar ]);
$page_content = include_template ('news.php', [ 'partners' => $partners ]);

$layout_content = include_template ('layout.php', [
  'title' => $page_title,
  'desc' => $page_desc,
  'menu' => $menu,
  'navbar' => $page_navbar,
  'content' => $page_content,
]);

print($layout_content);
