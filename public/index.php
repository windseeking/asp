<?php

require_once('../init.php');

$page_title = 'Home';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', ['navbar' => $index_navbar]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = $_POST['contact'];
    $required = [
        'name',
        'email',
        'message'
    ];
    foreach ($required as $item) {
        if (empty($contact[$item])) {
            $errors[$item] = 'Please, fill this field';
        }
    }
    if (!empty($contact['email'])) {
        if (!filter_var($contact['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Enter a valid email';
        }
    }

    if (empty($errors)) {
        $transport = (new Swift_SmtpTransport('host',
            port))// сюда необходимо вставить данные (хост и порт) вашего сервера исходящей почты SMTP (информация должна находиться на сайте хостинга)
        ->setUsername('username')// указан в вашем почтовом менеджере на хостинге (скорее всего это будет один из email-адресов)
        ->setPassword('password'); // указан в вашем почтовом менеджере на хостинге
        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message('Сообщение с сайта Ассоциации'))// тема письма, задается произвольно
        ->setFrom(['email' => 'Suomi Partnership Association'])// вставьте email, указанный в вашем почтовом менеджере на хостинге, имя задается произвольно
        ->setTo(['email' => 'имя']); // email-адрес, куда вы хотите получать письма, и имя (произвольное, будет отображаться в графе "Кому")

        $message_content = include_template('contact-email.php', [
            'message' => filter_tags($contact['message']),
            'contact_name' => filter_tags($contact['name']),
            'contact_email' => filter_tags($contact['email'])
        ]);

        $message->setBody($message_content, 'text/html');

        try {
            $result = $mailer->send($message);
        } catch (Swift_TransportException $ex) {
            print($ex->getMessage() . '<br>');
        }

        if (!$result) {
            $_SESSION['errors'] = 'The message was not sent. Please, try again or contact us via <a href="mailto:innovationfund@onu.edu.ua">email</a> or <a href="tel:+380995250511">phone</a>.';
        } else {
            $_SESSION['success'] = 'The message was sent successfully!';
        }
    } else {
        $_SESSION['errors'] = 'Please, correct errors in the form.';
    }
}
$page_content = include_template('index.php', [
    'errors' => $errors,
    'contact' => $contact
]);

$layout_content = include_template('layout.php', [
    'title' => $page_title,
    'desc' => $page_desc,
    'menu' => $menu,
    'navbar' => $page_navbar,
    'content' => $page_content,
]);

print($layout_content);
