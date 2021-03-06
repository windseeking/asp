<?php

require_once('../../init.php');

if (!isset($_SESSION['user'])) {
    $_SESSION['errors'] = 'Log in to view this page.';
    header("Location: /login");
    exit();
}

$user = $_SESSION['user'];
$news = [];
$errors = [];

$page_title = 'Add news';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', ['navbar' => $admin_navbar]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $news = $_POST['news'];
    $required = ['title', 'text'];
    foreach ($required as $item) {
        if (empty($news[$item])) {
            $errors[$item] = 'Please, fill this field';
        }
    }
    if (is_news_exist($con, $news['title'])) {
        $errors['title'] = 'News item with this title already exists';
    }
    if (!empty($_FILES['image_path']['name'])) {
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $file_name = $_FILES['image_path']['tmp_name'];
        $file_size = $_FILES['image_path']['size'];
        $file_type = finfo_file($file_info, $file_name);
        if ($file_type !== 'image/jpeg') {
            if ($file_type !== 'image/png') {
                $errors['image_path'] = 'File should be PNG or JPEG';
            }
        }
        if ($file_size > 5242880) {
            $errors['image_path'] = 'Max size is 5Mb';
        } else {
            if ($file_type == 'image/jpeg') {
                $file_type = '.jpeg';
            } elseif ($file_type == 'image/png') {
                $file_type = '.png';
            }
            $news_name = implode('-', explode(' ', $news['title']));
            $file_name = 'news' . '-' . $news_name . $file_type;
            move_uploaded_file($_FILES['image_path']['tmp_name'], 'img/' . $file_name);
            $news['image_path'] = '/img/' . $file_name;
        }
    } else {
        $news['image_path'] = null;
    }
    if (empty($errors)) {
        $news['cat'] = $_POST['cat'];
        $is_added_news = add_news($con, $news);
        if ($is_added_news) {
            $_SESSION['success'] = 'News item added successfully!';
            header('Location: news.php');
            die();
        }
        $page_content = include_template('add-news.php', ['errors' => $errors, 'news' => $news]);
    }
    $page_content = include_template('add-news.php', ['errors' => $errors, 'news' => $news]);
}
$page_content = include_template('add-news.php', ['errors' => $errors, 'news' => $news
]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => $page_title,
    'user' => $user,
    'navbar' => $page_navbar,
    'tabs' => $admin_tabs,
    'menu' => $menu
]);

print($layout_content);
