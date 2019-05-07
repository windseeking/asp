<?php

require_once('../init.php');

if (!empty($_SESSION['user'])) { // если в сессии есть данные пользователя
    header("Location: add-news.php");
    exit();
};

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = $_POST;
    $required = ['email', 'password'];
    foreach ($required as $field) {
        if (empty($form[$field])) {
            $errors[$field] = 'Please, fill this field';
        }
    }

    if (count($errors)) { // если есть пустые поля
        $page_content = include_template('login.php', [
            'form' => $form,
            'errors' => $errors
        ]);
    } else { // если все поля заполнены
        $email = mysqli_real_escape_string($con, $form['email']);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($con, $sql);
        $user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;
        if (!empty($user)) { // если юзер с емайлом найден
            if (password_verify($form['password'], $user['password'])) { // если хэши паролей совпали
                if (is_email_confirmed($con, $email)) { // если учетная запись подтверждена
                    $is_admin = get_user_by_email($con, $user['email']);
                    if (intval($is_admin[0]['is_admin']) === 1) { // если юзер является админом
                        $_SESSION['user'] = $user;
                        header("Location: admin/add-news.php");
                    } else { // если юзер не является админом
                        $_SESSION['warning'] = 'Currently personal accounts are only available for administrators. 
                            But your data was saved and you\'ll get access to your personal account as soon as possible. 
                            Stay tuned.';
                    }
                } else { // если учетная запись не подтверждена
                    $_SESSION['errors'] =
                        'Your account hasn\'t been confirmed. Please, check your email for the confirmation link. 
                        Don\'t forget to <b>check the spam</b> folder.<br>
                        To receive new confirmation link, <a href="get-confirmation-link.php">click here</a>.';
                }
            } else { // если хэши паролей не совпали
                $errors['password'] = "Password is incorrect";
            }
        } else { // если юзер не найден
            $errors['email'] = "User with this email wasn't found";
        }
    }
}

$page_content = include_template('login.php', [
    'form' => $form,
    'errors' => $errors
]);

$page_title = 'Log in';
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