<?php

require_once('../init.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $code = intval($_GET['code']);
    $user = get_user_by_email($con, $email);
    if (!empty($user)) { // если пользователь найден
        if (intval($user[0]['is_confirmed']) === 1) { // если уже подтвержден
            $_SESSION['errors'] = 'Your account has already been confirmed.';
        } elseif ($code != $user[0]['confirm_email_code']) { // если еще не подтвержден, но код подтверждения неверный
            $_SESSION['errors'] = 'You\'ve entered a wrong code.';
        } else { // если еще не подтвержден и код подтверждения верный
            $sql = "UPDATE users SET is_confirmed = 1 WHERE email = '$email'";
            if (mysqli_query($con, $sql)) { // если аккаунт подтвердился (произошла запись в БД)
                $_SESSION['success'] = 'Your account has been confirmed! Now you can <a href="login.php">log in</a>.';
                $sql = "UPDATE users SET confirm_email_code = 0 WHERE email = '$email'"; // сброс кода подтверждения
                mysqli_query($con, $sql);
            } else { // если аккаунт не подтвердился (не произошла запись в БД)
                $_SESSION['errors'] = 'Something went wrong. Please, try again later. Error: ' . mysqli_error($con);
            }
        }
    } else { // если пользователь не найден
        $_SESSION['errors'] = 'User with such email wasn\'t found.';
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
