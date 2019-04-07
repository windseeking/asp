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
        $name = $membership_request['name'];
        $trade_number = $membership_request['trade_number'];
        $business_ID = $membership_request['business_ID'];
        $official_address = $membership_request['official_address'];
        $postal_address = $membership_request['postal_address'];
        $phone = $membership_request['phone'];
        $fax = $membership_request['fax'];
        $website = $membership_request['website'];
        $email = $membership_request['email'];
        $banking = $membership_request['banking'];
        $signors = $membership_request['signors'];
        $contact_person = $membership_request['contact_person'];
        $description = $membership_request['description'];
        if (mail("windseeking2@gmail.com", "ASP membership request",
            "Full name of the company: " . $name .
            "Trade register number: " . $trade_number .
            "Y-tunnus (Business ID): " . $business_ID .
            "Official address: " . $official_address .
            "Postal address: " . $postal_address .
            "Phone: " . $phone .
            "Fax: " . $fax .
            "Website: " . $website .
            "Email: " . $email .
            "Banking details: " . $banking .
            "Names of the authorized signors: " . $signors .
            "Name of the contact person: " . $contact_person .
            "Branch of industry and product description: " . $description,
            "From: no-reply@asp.ua \r\n")) {
            $_SESSION['success'] = 'The form was sent.';
            header('Location: become-member#form');
            die();
        }
        $_SESSION['error'] = 'The form was not sent. Please contact us.';
        header('Location: become-member#form');
        die();
    }
    $page_content = include_template('become-member.php',
        ['errors' => $errors, 'membership_request' => $membership_request]);
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
