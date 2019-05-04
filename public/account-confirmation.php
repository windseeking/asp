<?php

require_once('../init.php');
$errors = [];
$password = [];
$code = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql =
        "SELECT id FROM users WHERE confirm_email_code = ? AND email = '?'";
    $values = [
        $code = intval($_GET['code']),
        $email = mysqli_real_escape_string($con, $_GET['email'])
    ];

    if (!db_fetch_data($con, $sql, $values)) {
        $errors['code'] = 'You entered a wrong code';
    } else {
        $sql = "UPDATE users SET is_confirmed = 1 WHERE email = " . '$email';
        if (mysqli_query($con, $sql)) {
            $_SESSION['success'] = 'Your account has been confirmed! Now you can <a href="login.php">log in</a>.';
        } else {
            $_SESSION['errors'] = 'Something went wrong. Please, try again later. Error: ' . mysqli_error($con);
        }
    }
}
$page_content = include_template('account-confirmation.php', [
    'errors' => $errors
]);

$page_title = 'Account confirmation';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', [
    'navbar' => $login_navbar
]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => $page_title,
    'menu' => $menu
]);

print($layout_content);