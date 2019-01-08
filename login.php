<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('functions.php');
require_once('config.php');
require_once ('data.php');

session_start();
if (isset($_SESSION['user'])) {
    header("Location: hello.php");
    exit();
};

$con = get_connection($database_config);
$form = [];
$errors = [];

$page_title = 'Log in';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_content = include_template('login.php', []);
$page_navbar = include_template('navbar.php', [ 'navbar' => $login_navbar ]);

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
                $_SESSION['user'] = $user;
                if (isset($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                    $page_navbar = $hello_navbar;
                    header("Location: /login.php");
                }
                else {
                    $page_content = include_template('login.php', []);
                }

            } // если хэш не совпал, то грузим шаблон и отправляем ошибку
            else {
                $errors['password'] = "Password is incorrect";
                $page_content = include_template('login.php', ['form' => $form, 'errors' => $errors]);
            }
        } // если юзер не найден, то грузим шаблон и отправляем ошибку
        else {
            $errors['email'] = "User with this email wasn't found";
            $page_content = include_template('login.php', ['form' => $form, 'errors' => $errors]);
        }
    }
}

$layout_content = include_template('layout.php', [
  'content' => $page_content,
  'title' => $page_title,
  'navbar' => $page_navbar,
  'menu' => $menu
]);

print($layout_content);