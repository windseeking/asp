<?php

require_once('../init.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = $_POST;
    $errors = [];

    // если поле email пустое, подключаем шаблон и отправляем в него ошибки
    if (empty($form['email'])) {
        $errors['email'] = 'Please, fill this field';
        $page_content = include_template('forgot-password.php', [
            'form' => $form,
            'errors' => $errors
        ]);
    } // если все поля заполнены, выполняем проверку емайла (ищем юзера)
    else {
        $email = mysqli_real_escape_string($con, $form['email']);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($con, $sql);

        $user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;

        // если юзер с емайлом найден ....
        if ($user) {
            $code = rand(100000, 999999);
            $sql = 'UPDATE users SET reset_pass_code = ' . $code . ' WHERE id = ' . $user['id'];
            $res = mysqli_query($con, $sql);
            if ($res) {
                $transport = (new Swift_SmtpTransport('mail.innovationfund.in', 25))
                    ->setUsername('webmaster@innovationfund.in')
                    ->setPassword('pakoWorld6');
                $mailer = new Swift_Mailer($transport);

                $message = (new Swift_Message('Reset password'))
                    ->setFrom(['webmaster@innovationfund.in' => 'Suomi Partnership Association'])
                    ->setTo([$user['email'] => $user['name']]);

                $message_content = include_template('reset-password-email.php', [
                    'code' => $code,
                    'reset_email' => filter_tags($user['email'])
                ]);

                $message->setBody($message_content, 'text/html');

                try {
                    $result = $mailer->send($message);
                } catch (Swift_TransportException $ex) {
                    print($ex->getMessage() . '<br>');
                }

                if (!$result) {
                    $_SESSION['errors'] = 'The message was not sent. Please, try again or if an error still occurs contact us via <a href="mailto:info@suomipartnership.org">email</a> or <a href="tel:+380995250511">phone</a>.';
                } else {
                    $_SESSION['success'] = 'A security code has been sent to ' . '<b>' . $user['email'] . '</b>';
                }
            }
        } // если юзер не найден, то грузим шаблон и отправляем ошибку
        else {
            $errors['email'] = "User with this email wasn't found";
            $page_content = include_template('forgot-password.php', [
                'form' => $form,
                'errors' => $errors
            ]);
        }
    }
}

$page_title = 'Forgot password';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_content = include_template('forgot-password.php', [
    'form' => $form,
    'errors' => $errors
]);
$page_navbar = include_template('navbar.php', ['navbar' => $login_navbar]);

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