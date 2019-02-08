<?php

require_once('functions.php');
require_once('data.php');

session_start();

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
        'trade_number',
        'business_ID',
        'official_address',
        'postal_address',
        'phone',
        'fax',
        'website',
        'email',
        'banking',
        'signors',
        'contact_person',
        'description'
    ];
    foreach ($required as $item) {
        if (empty($member[$item])) {
            $errors[$item] = 'Please, fill this field';
        }
    }
    if (empty($errors)) {
        mail("windseeking@mail.ru", "ASP membership request",
            "Name of the company:".$membership_request['name'].". Trade number: ".$membership_request['trade_number'] ,"From: example2@mail.ru \r\n");
        }
        $page_content = include_template('become_member.php', ['errors' => $errors, 'membership_request' => $membership_request]);
    }
    $page_content = include_template('become_member.php', ['errors' => $errors, 'membership_request' => $membership_request]);
}
$page_content = include_template('become_member.php', ['errors' => $errors, 'membership_request' => $membership_request]);

$layout_content = include_template('layout.php', [
    'title' => $page_title,
    'desc' => $page_desc,
    'menu' => $menu,
    'content' => $page_content,
    'admin_panel' => $admin_panel
]);

print($layout_content);
