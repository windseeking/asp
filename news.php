<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('functions.php');
require_once('config.php');
require_once('data.php');

session_start();

$con = get_connection($database_config);
$news = get_news($con);
$cats = get_news_cats($con);


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $search = $_GET['search'] ?? '';
    if ($search) {
        $sql =
            'SELECT * FROM news n '
            . 'WHERE MATCH(title, text) AGAINST(?)';
        $stmt = db_get_prepare_stmt($con, $sql, [$search]);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $news = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $apply = $_GET['cat'] ?? '';
    if ($apply) {
        $sql =
            'SELECT * FROM news '
            . 'WHERE cat = ?';
        $stmt = db_get_prepare_stmt($con, $sql, [$apply]);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        $news = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
}

//if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//    $sort = $_GET['sort'] ?? '';
//    if ($sort) {
//        if ($sort = 'asc') {
//            $sql =
//                'SELECT * FROM news ORDER BY created_at ASC';
//        } elseif ($sort = 'desc') {
//            $sql =
//                'SELECT * FROM news ORDER BY created_at DESC';
//        } else {
//            $news = get_news($con);
//        }
//        $stmt = db_get_prepare_stmt($con, $sql, [$sort]);
//        mysqli_stmt_execute($stmt);
//        $res = mysqli_stmt_get_result($stmt);
//        $news = mysqli_fetch_all($res, MYSQLI_ASSOC);
//    }
//}

$page_title = 'News';
$page_desc = 'Association «Suomi Partnership» (ASP) is a non-profit and 
non-governmental association of businesses aimed at fostering
cooperation between Ukrainian and Finnish companies';
$page_content = include_template('news.php', ['news' => $news, 'cats' => $cats]);

$layout_content = include_template('layout.php', [
    'title' => $page_title,
    'desc' => $page_desc,
    'menu' => $menu,
    'content' => $page_content
]);

print($layout_content);
