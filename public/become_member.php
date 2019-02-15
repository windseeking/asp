<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../functions/functions.php');
require_once('../system/data.php');
require_once('../system/config.php');

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
        if (mail("windseeking2@gmail.com", "ASP membership request",
            "Full name of the company: " . $membership_request['name'] .
            "Trade register number: " . $membership_request['trade_number'] .
            "Y-tunnus (Business ID): " . $membership_request['business_ID'] .
            "Official address: " . $membership_request['official_address'] .
            "Postal address: " . $membership_request['postal_address'] .
            "Phone: " . $membership_request['phone'] .
            "Fax: " . $membership_request['fax'] .
            "Website: " . $membership_request['website'] .
            "Email: " . $membership_request['email'] .
            "Banking details: " . $membership_request['banking'] .
            "Names of the authorized signors: " . $membership_request['signors'] .
            "Name of the contact person: " . $membership_request['contact_person'] .
            "Branch of industry and product description: " . $membership_request['description'],
            "From: no-reply@asp.ua \r\n")) {
            $_SESSION['success'] = 'The form was sent.';
            header('Location: become_member#form');
            die();
        }
        $_SESSION['error'] = 'The form was not sent. Please contact us.';
        header('Location: become_member#form');
        die();
    }
    $page_content = include_template('become_member.php',
        ['errors' => $errors, 'membership_request' => $membership_request]);
}
$page_content = include_template('become_member.php', [
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
