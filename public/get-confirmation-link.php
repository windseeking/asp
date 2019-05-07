<?php

require_once('../init.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = $_POST;

    if (empty($form['email'])) {
        $errors['email'] = 'Please, fill this field';
    } else { // если все поля заполнены, выполняем проверку емайла (ищем юзера)
        $email = mysqli_real_escape_string($con, $form['email']);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($con, $sql);

        $user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;

        if ($user) { // если юзер с емайлом найден
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
                    $_SESSION['success'] = /** @lang text */
                        'Confirmation link has been sent to your email.';
                } else { // если сообщение не отправлено
                    $_SESSION['errors'] = /** @lang text */
                        'Something went wrong. Confirmation email hasn\'t been sent. Please, try again later. Error: ' . mysqli_error($con);
                }
            } else { //если код не сохранился в БД
                $_SESSION['errors'] = /** @lang text */
                    'Something went wrong. Please, try again later. Error: ' . mysqli_error($con);
            }
        } else {
            $errors['email'] = 'User with this email wasn\'t found';
        }
    }
}

$page_content = include_template('get-confirmation-link.php', [
    'form' => $form,
    'errors' => $errors
]);

$page_title = 'Get confirmation link';
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
