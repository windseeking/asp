<?php

require_once('../init.php');
$errors = [];
$password = [];
$code = [];
$email = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = mysqli_real_escape_string($con, $_GET['email']);

    $sql = "SELECT * FROM users WHERE is_confirmed = 1 AND email = '$email'";
    if (mysqli_query($con, $sql)) {
        $_SESSION['errors'] = 'Your account has already been confirmed.';
    } else {
        $code = intval($_GET['code']);
        $sql = "SELECT id FROM users WHERE confirm_email_code = " . $code . " AND email = '" . $email . "'";
        if (!mysqli_query($con, $sql)) {
            $errors['code'] = 'You entered a wrong code';
        } else {
            $sql = "UPDATE users SET is_confirmed = 1 WHERE email = '" . $email . "'";
            if (mysqli_query($con, $sql)) {
                $_SESSION['success'] = 'Your account has been confirmed! Now you can <a href="login.php">log in</a>.';
                $sql = "UPDATE users SET confirm_email_code = 0 WHERE email = '$email'";
                if (!mysqli_query($con, $sql)) {
                    print mysqli_error($con);
                }
            } else {
                $_SESSION['errors'] = 'Something went wrong. Please, try again later. Error: ' . mysqli_error($con);
            }
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
