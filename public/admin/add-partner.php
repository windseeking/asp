<?php

require_once('../../init.php');

if (!isset($_SESSION['user'])) {
    $_SESSION['errors'] = 'Log in to view this page.';
    header("Location: /login");
    exit();
}

$user = $_SESSION['user'];
$con = get_connection($database_config);
$partner = [];
$errors = [];

$page_title = 'Add partner';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', ['navbar' => $admin_navbar]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $partner = $_POST['partner'];
    $required = ['name', 'description'];
    foreach ($required as $item) {
        if (empty($partner[$item])) {
            $errors[$item] = 'Please, fill this field';
        }
    }
    if (is_partner_exist($con, $partner['name'])) {
        $errors['name'] = 'Partner with this name already exists';
    }
    if (!empty($_FILES['image_path']['name'])) {
        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $file_name = $_FILES['image_path']['tmp_name'];
        $file_size = $_FILES['image_path']['size'];
        $file_type = finfo_file($file_info, $file_name);
        if ($file_type !== 'image/jpeg') {
            if ($file_type !== 'image/png') {
                $errors['image_path'] = 'File should be PNG or JPEG';
            }
        }
        if ($file_size > 5242880) {
            $errors['image_path'] = 'Max size is 5Mb';
        } else {
            if ($file_type == 'image/jpeg') {
                $file_type = '.jpeg';
            } elseif ($file_type == 'image/png') {
                $file_type = '.png';
            }
            $partner_name = implode('-', explode(' ', $partner['name']));
            $file_name = 'partner' . '-' . $partner_name . $file_type;
            move_uploaded_file($_FILES['image_path']['tmp_name'], 'img/' . $file_name);
            $partner['image_path'] = '/img/' . $file_name;
        }
    } else {
        $partner['image_path'] = null;
    }
    if (empty($errors)) {
        $is_added_partner = add_partner($con, $partner);
        if ($is_added_partner) {
            $_SESSION['success'] = /** @lang text */
                'Partner added successfully!';
            header('Location: partners.php');
            die();
        }
        $page_content = include_template('add-partner.php', ['partner' => $partner, 'errors' => $errors]);
    }
    $page_content = include_template('add-partner.php', ['partner' => $partner, 'errors' => $errors]);
}
$page_content = include_template('add-partner.php', ['partner' => $partner, 'errors' => $errors]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'title' => $page_title,
    'navbar' => $page_navbar,
    'tabs' => $admin_tabs,
    'user' => $user,
    'menu' => $menu
]);

print($layout_content);