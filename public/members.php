<?php

require_once('../init.php');

$members = get_members($con);

$page_title = 'Members';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_navbar = include_template('navbar.php', [ 'navbar' => $members_navbar ]);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $search = $_GET['search'] ?? '';
    if ($search) {
        $sql =
            'SELECT * FROM members m '
            . 'WHERE MATCH(m.name, activities) AGAINST(?)';
        $stmt = db_get_prepare_stmt($con, $sql, [$search]);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $members = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
}

$page_content = include_template('members.php', [ 'members' => $members ]);

$layout_content = include_template('layout.php', [
  'title' => $page_title,
  'desc' => $page_desc,
  'menu' => $menu,
  'navbar' => $page_navbar,
  'content' => $page_content,
]);

print($layout_content);
