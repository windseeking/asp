<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../functions/functions.php');
require_once ('../system/data.php');
require_once('../system/config.php');

session_start();

$con = get_connection($database_config);
$user = [];
$errors = [];

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
    if (!empty($user['email'])) {
        if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Enter a valid email';
        }
    }
    if (!empty($user['password'])) {
        if (strlen($user['password']) < 8) {
        $errors['password'] = 'Password should contain at least 8 symbols';
        }
    }
    if (is_email_exist($con, $user['email'])) {
        $errors['email'] = 'User with this email already exists';
    }
    if (preg_match('/[^A-Za-z]/', $user['name'])) {
        $errors['name'] = 'You can use only letters A-Z';
    }
    if (preg_match('/[^A-Za-z]/', $user['lastname'])) {
        $errors['lastname'] = 'You can use letters A-Z';
    }
    if (preg_match('/[^A-Za-z]/', $user['username'])) {
        $errors['username'] = 'You can use only numbers 0-9 and letters A-Z';
    }
    if (is_username_exist($con, $user['username'])) {
        $errors['username'] = 'User with this username already exists';
    }
    if (empty($errors)) {
        $is_added_user = add_user($con, $user);
        if ($is_added_user) {
            $_SESSION['success'] = /** @lang text */
              'Account created successfully! <br> Now you can log in.';
            header('Location: login.php');
            die();
        }
        $page_content = include_template('register.php', ['user' => $user, 'errors' => $errors]);
    }
    $page_content = include_template('register.php', [ 'user' => $user, 'errors' => $errors ]);
}
$page_content = include_template('register.php', [ 'user' => $user, 'errors' => $errors ]);

$layout_content = include_template('layout.php', [
  'content' => $page_content,
  'title' => $page_title,
  'navbar' => $page_navbar,
  'menu' => $menu
]);

print($layout_content);