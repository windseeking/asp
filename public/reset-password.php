<?php

require_once('../init.php');
$form = [];
$errors = [];
$password = [];
$code = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = $_POST['form'];
    $required = ['code', 'password', 'confirm_password'];

    foreach ($required as $field) {
        if (empty($form[$field])) {
            $errors[$field] = 'Please, fill this field';
        }
    }

    $code = mysqli_real_escape_string($con, $form['code']);
    $password = mysqli_real_escape_string($con, $form['password']);
    $email = $_GET['email'];

    if (!empty($form['code'])) {
        $sql =
            'SELECT id FROM users ' .
            'WHERE reset_pass_code = ? AND email = ?';
        $values = [
            $code,
            $email
        ];
        if (!db_fetch_data($con, $sql, $values)) {
            $errors['code'] = 'You entered a wrong code';
            $page_content = include_template('reset-password.php', [
                'form' => $form,
                'errors' => $errors
            ]);
        }
    }

    if (!empty($form['password'])) {
        if (strlen($password) < 8) {
            $errors['password'] = 'Password should contain at least 8 symbols';
        }
        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            $errors['password'] = 'You can use only numbers 0-9 and letters A-Z';
        }
        if ($form['password'] !== $form['confirm_password']) {
            $errors['confirm_password'] = 'Passwords don\'t match';
        }
    }

    if (empty($errors)) {
        $sql = 'UPDATE users SET password = "' . password_hash($password, PASSWORD_DEFAULT) . '" WHERE reset_pass_code = ' . $code;
        if (mysqli_query($con, $sql)) {
            $_SESSION['success'] = 'Password was changed successfully. Now you can <a href="login.php">log in</a>.';
        } else {
            $_SESSION['errors'] = 'Password was not changed. Try again later.';
            echo mysqli_error($con);
        }
    }
}
$page_content = include_template('reset-password.php', [
    'form' => $form,
    'errors' => $errors
]);

$page_title = 'Password reset';
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