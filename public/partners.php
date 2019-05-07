<?php

require_once('../init.php');

$partners = get_partners($con);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $search = $_GET['search'] ?? '';
    if ($search) {
        $sql =
            'SELECT * FROM partners p '
            . 'WHERE MATCH(p.name, description) AGAINST(?)';
        $stmt = db_get_prepare_stmt($con, $sql, [$search]);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $partners = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
}

$page_title = 'Partners';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', ['navbar' => $partners_navbar]);
$page_content = include_template('partners.php', ['partners' => $partners]);

$layout_content = include_template('layout.php', [
    'title' => $page_title,
    'desc' => $page_desc,
    'menu' => $menu,
    'navbar' => $page_navbar,
    'content' => $page_content
]);

print($layout_content);
