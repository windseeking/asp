<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('functions.php');
require_once('config.php');
require_once ('data.php');

session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['errors'] = 'Log in to view this page.';
    header("Location: /login.php");
    exit();
}

$user = $_SESSION['user'];
$con = get_connection($database_config);
$news = [];
$errors = [];

$page_title = 'Add news';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', [ 'navbar' => $hello_navbar ]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $news = $_POST['news'];
    $required = ['title', 'cat', 'text'];
    foreach ($required as $item) {
        if (empty($news[$item])) {
            $errors[$item] = 'Please, fill this field';
        }
    }
    if (is_news_exist($con, $news['title'])) {
        $errors['title'] = 'News with this title already exists';
    }
    if (empty($errors)) {
        $is_added_news = add_news($con, $news);
        if ($is_added_news) {
            $_SESSION['success'] = 'News item created successfully!';
            header('Location: news.php');
            die();
        }
        $admin_content = include_template('add_news.php', ['news' => $news, 'errors' => $errors]);
    }
    $admin_content = include_template('add_news.php', ['news' => $news, 'errors' => $errors]);
}
$admin_content = include_template('add_news.php', ['news' => $news, 'errors' => $errors]);

$page_content = include_template('hello.php', [
  'content' => $admin_content,
  'navbar' => $page_navbar,
  'user' => $user
]);

$layout_content = include_template('layout.php', [
  'content' => $page_content,
  'title' => $page_title,
  'navbar' => $page_navbar,
  'menu' => $menu
]);

print($layout_content);
