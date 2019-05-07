<?php

require_once('../init.php');

if (isset($_SESSION['user'])) {
    header("Location: add-news.php");
    exit();
};


$form = [];
$errors = [];

$page_title = 'Log in';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_content = include_template('login.php', []);
$page_navbar = include_template('navbar.php', ['navbar' => $login_navbar]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = $_POST;

    $required = ['email', 'password'];
    $errors = [];
    foreach ($required as $field) {
        if (empty($form[$field])) {
            $errors[$field] = 'Please, fill this field';
        }
    }

    // если есть пустые поля, подключаем шаблон и отправляем в него ошибки
    if (count($errors)) {
        $page_content = include_template('login.php', ['form' => $form, 'errors' => $errors]);
    } // если все поля заполнены, выполняем проверку емайла (ищем юзера)
    else {
        $email = mysqli_real_escape_string($con, $form['email']);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($con, $sql);

        $user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;

        // если юзер с емайлом найден, проверяем пароль
        if ($user) { // если хэш совпал, то открываем сессию и передаем туда массив user
            if (password_verify($form['password'], $user['password'])) {
                if (!is_email_confirmed($con, $email)) { // если учетная запись не подтверждена
                    $_SESSION['errors'] =
                        'Your account hasn\'t been confirmed. Please, check your email for the confirmation link. 
                        Don\'t forget to <b>check the spam</b> folder.<br>
                        To receive new confirmation link, <a href="get-confirmation-link.php">click here</a>.';
                } else {
                    $_SESSION['user'] = $user;
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        header("Location: admin/add-news.php");
                    } else {
                        $page_content = include_template('login.php', []);
                    }
                }

            } // если хэш не совпал, то грузим шаблон и отправляем ошибку
            else {
                $errors['password'] = "Password is incorrect";
            }
        } // если юзер не найден, то грузим шаблон и отправляем ошибку
        else {
            $errors['email'] = "User with this email wasn't found";
        }
    }
}
$page_content = include_template('login.php', ['form' => $form, 'errors' => $errors]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => $page_title,
    'menu' => $menu
]);

print($layout_content);