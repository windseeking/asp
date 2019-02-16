<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../functions/functions.php');
require_once ('../system/data.php');
require_once('../system/config.php');

session_start();
$errors = [];
$contact = [];

$page_title = 'Home';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', [ 'navbar' => $index_navbar ]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = $_POST['contact'];
    $required = [
        'name',
        'email',
        'message'
    ];
    foreach ($required as $item) {
        if (empty($contact[$item])) {
            $errors[$item] = 'Please, fill this field';
        }
    }
    if (!empty($contact['email'])) {
        if (!filter_var($contact['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Enter a valid email';
        }
    }
    if (empty($errors)) {
        $name = $contact['name'];
        $email = $contact['email'];
        $message = $contact['message'];
        if (mail("windseeking2@gmail.com", "ASP membership request",
            "From: " . $name .
            "Email: " . $email .
            "Message: " . $message,
            "From: no-reply@asp.ua \r\n")) {
            $_SESSION['success'] = 'The form was sent.';
            header('Location: index#contact');
            die();
        }
        $_SESSION['error'] = 'The form was not sent. Please contact us.';
        header('Location: index#contact');
        die();
    }
    $page_content = include_template('index.php', ['errors' => $errors, 'contact' => $contact]);
}
$page_content = include_template('index.php', ['errors' => $errors, 'contact' => $contact]);

$layout_content = include_template ('layout.php', [
  'title' => $page_title,
  'desc' => $page_desc,
  'menu' => $menu,
  'navbar' => $page_navbar,
  'content' => $page_content,
]);

print($layout_content);
