<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('functions.php');
require_once('config.php');
require_once ('data.php');

$con = get_connection($database_config);
$user = [];
$errors = [];
$is_added_user = true;

$page_title = 'Create an account';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', [ 'navbar' => $register_navbar ]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $required = ['email', 'password', 'name', 'lastname', 'username'];
    foreach ($required as $item) {
        if (empty($user[$item])) {
            $errors[$item] = 'Please, fill this field';
        }
    }
    if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email';
    }
    if (is_email_exist($con, $user['email'])) {
        $errors['email'] = 'User with this email already exists';
    }
    if (is_username_exist($con, $user['username'])) {
        $errors['username'] = 'User with this email already exists';
    }
    if (empty($errors)) {
        $is_added_user = true;
        add_user($con, $user);
        if ($is_added_user) {
            header('Location: login.php');
            die();
        }
        $page_content = include_template('register.php',
          [ 'user' => $user,
            'errors' => 'Something went wrong. Registration failed',
            'is_added_user' => $is_added_user
          ]);
    }
    $page_content = include_template('register.php', ['user' => $user, 'errors' => $errors, 'is_added_user' => $is_added_user]);
}
$page_content = include_template('register.php', [ 'is_added_user' => $is_added_user ]);

$layout_content = include_template('layout.php', [
  'content' => $page_content,
  'title' => $page_title,
  'navbar' => $page_navbar,
  'menu' => $menu
]);

print($layout_content);