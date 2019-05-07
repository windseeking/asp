<?php

require_once('../init.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $required = ['email', 'password', 'name', 'lastname', 'username'];
    foreach ($required as $item) {
        if (empty($user[$item])) {
            $errors[$item] = 'Please, fill this field';
        }
    }
    if (!empty($user['email'])) {
        if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Enter a valid email';
        }
    }
    if (!empty($user['password'])) {
        if (strlen($user['password']) < 8) {
            $errors['password'] = 'Password should contain at least 8 symbols';
        }
    }
    if (is_email_exist($con, $user['email'])) {
        $errors['email'] = 'User with this email already exists';
    }
    if (preg_match('/[^A-Za-z]/', $user['name'])) {
        $errors['name'] = 'You can use only letters A-Z';
    }
    if (preg_match('/[^A-Za-z]/', $user['lastname'])) {
        $errors['lastname'] = 'You can use letters A-Z';
    }
    if (preg_match('/[^A-Za-z]/', $user['username'])) {
        $errors['username'] = 'You can use only numbers 0-9 and letters A-Z';
    }
    if (is_username_exist($con, $user['username'])) {
        $errors['username'] = 'User with this username already exists';
    }
    if (empty($errors)) {
        if (add_user($con, $user)) { //если юзер добавлен
            $code = rand(100000, 999999);
            $user_email = mysqli_real_escape_string($con, $user['email']);
            $sql = "UPDATE users SET confirm_email_code = " . $code . " WHERE email = '" . $user_email . "'";

            if (mysqli_query($con, $sql)) { //если код сохранился в БД
                $transport = (new Swift_SmtpTransport('mail.innovationfund.in', 25))
                    ->setUsername('webmaster@innovationfund.in')
                    ->setPassword('pakoWorld6');
                $mailer = new Swift_Mailer($transport);

                $message = (new Swift_Message('Confirm your account registration'))
                    ->setFrom(['webmaster@innovationfund.in' => 'Suomi Partnership Association'])
                    ->setTo([$user['email'] => $user['name']]);

                $message_content = include_template('confirmation-email.php', [
                    'user_name' => $user['name'],
                    'code' => $code,
                    'confirm_email' => filter_tags($user['email'])
                ]);

                $message->setBody($message_content, 'text/html');

                try {
                    $result = $mailer->send($message);
                } catch (Swift_TransportException $ex) {
                    print($ex->getMessage() . '<br>');
                }

                if ($result) { // если сообщение отправлено
                    $_SESSION['warning'] = /** @lang text */
                        'Confirmation link has been sent to your email.';
                } else { // если сообщение не отправлено
                    $_SESSION['errors'] = /** @lang text */
                        'Something went wrong. Confirmation email hasn\'t been sent. Please, try again later. Error: ' . mysqli_error($con);
                }
            } else { //если код не сохранился в БД
                $_SESSION['errors'] = /** @lang text */
                    'Something went wrong. Please, try again later. Error: ' . mysqli_error($con);
            }
        } else { //если юзер не добавлен
            $_SESSION['errors'] = /** @lang text */
                'Something went wrong. Account hasn\'t been created. Error: ' . mysqli_error($con);
        }
    }
}
$page_content = include_template('register.php', [
    'user' => $user,
    'errors' => $errors
]);

$page_title = 'Create an account';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', [
    'navbar' =>
        $register_navbar
]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => $page_title,
    'navbar' => $page_navbar,
    'menu' => $menu
]);

print($layout_content);
