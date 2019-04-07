<?php

require_once('../init.php');

$page_title = 'Join us';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$membership_request = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $membership_request = $_POST['membership_request'];
    $required = [
        'name',
        'email',
        'company_name',
        'trade_number',
        'business_ID',
        'official_address',
        'postal_address',
        'phone',
        'fax',
        'website',
        'company_email',
        'banking',
        'signors',
        'contact_person',
        'description'
    ];
    foreach ($required as $item) {
        if (empty($membership_request[$item])) {
            $errors[$item] = 'Please, fill this field';
        }
    }
    if (!empty($membership_request['email'])) {
        if (!filter_var($membership_request['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Enter a valid email';
        }
    }

    if (empty($errors)) {
        $transport = (new Swift_SmtpTransport('host',
            port))// сюда необходимо вставить данные (хост и порт) вашего сервера исходящей почты SMTP (информация должна находиться на сайте хостинга)
        ->setUsername('username')// указан в вашем почтовом менеджере на хостинге (скорее всего это будет один из email-адресов)
        ->setPassword('password'); // указан в вашем почтовом менеджере на хостинге
        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message('Запрос на вступление в Ассоциацию'))// тема письма, задается произвольно
        ->setFrom(['email' => 'Suomi Partnership Association'])// вставьте email, указанный в вашем почтовом менеджере на хостинге (должен совпадать с логином), имя задается произвольно
        ->setTo(['email' => 'name']); // email-адрес, куда вы хотите получать письма, и имя (произвольное, будет отображаться в графе "Кому")

        $message_content = include_template('membership-request-email.php', [
            'contact_name' => filter_tags($membership_request['name']),
            'contact_email' => filter_tags($membership_request['email']),
            'company_name' => filter_tags($membership_request['company_name']),
            'trade_number' => filter_tags($membership_request['trade_number']),
            'business_ID' => filter_tags($membership_request['business_ID']),
            'official_address' => filter_tags($membership_request['official_address']),
            'postal_address' => filter_tags($membership_request['postal_address']),
            'phone' => filter_tags($membership_request['phone']),
            'fax' => filter_tags($membership_request['fax']),
            'website' => filter_tags($membership_request['website']),
            'company_email' => filter_tags($membership_request['company_email']),
            'banking' => filter_tags($membership_request['banking']),
            'signors' => filter_tags($membership_request['signors']),
            'contact_person' => filter_tags($membership_request['contact_person']),
            'description' => filter_tags($membership_request['description'])
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
$page_content = include_template('become-member.php', [
    'errors' => $errors,
    'membership_request' => $membership_request
]);

$layout_content = include_template('layout.php', [
    'title' => $page_title,
    'desc' => $page_desc,
    'menu' => $menu,
    'content' => $page_content
]);

print($layout_content);
