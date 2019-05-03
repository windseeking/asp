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

    if (!empty($form['code'])) {
        $sql =
            'SELECT id FROM users ' .
            'WHERE reset_pass_code = ?';
        $values = [$code];
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
            $_SESSION['success'] = 'Password was changed successfully. Now you can <a href="login.php">log in</a>';
        } else {
            $_SESSION['errors'] = 'Password was not changed. Try again later';
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

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $form = $_POST;
//
//    $required = ['email', 'password'];
//    $errors = [];
//    foreach ($required as $field) {
//        if (empty($form[$field])) {
//            $errors[$field] = 'Please, fill this field';
//        }
//    }
//
//    // если есть пустые поля, подключаем шаблон и отправляем в него ошибки
//    if (count($errors)) {
//        $page_content = include_template('login.php', ['form' => $form, 'errors' => $errors]);
//    } // если все поля заполнены, выполняем проверку емайла (ищем юзера)
//    else {
//        $email = mysqli_real_escape_string($con, $form['email']);
//        $sql = "SELECT * FROM users WHERE email = '$email'";
//        $res = mysqli_query($con, $sql);
//
//        $user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;
//
//        // если юзер с емайлом найден, проверяем пароль
//        if ($user) { // если хэш совпал, то открываем сессию и передаем туда массив user
//            if (password_verify($form['password'], $user['password'])) {
//                $_SESSION['user'] = $user;
//                if (isset($_SESSION['user'])) {
//                    $user = $_SESSION['user'];
//                    header("Location: /add-news.php");
//                }
//                else {
//                    $page_content = include_template('login.php', []);
//                }
//
//            } // если хэш не совпал, то грузим шаблон и отправляем ошибку
//            else {
//                $errors['password'] = "Password is incorrect";
//                $page_content = include_template('login.php', ['form' => $form, 'errors' => $errors]);
//            }
//        } // если юзер не найден, то грузим шаблон и отправляем ошибку
//        else {
//            $errors['email'] = "User with this email wasn't found";
//            $page_content = include_template('login.php', ['form' => $form, 'errors' => $errors]);
//        }
//    }
//}

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => $page_title,
    'menu' => $menu
]);

print($layout_content);