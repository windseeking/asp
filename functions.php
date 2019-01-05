<?php

function get_connection(array $database_config) {
    $con = mysqli_connect($database_config['host'], $database_config['user'], $database_config['password'], $database_config['database']);
    if (!$con) {
        die(mysqli_connect_error());
    }
    mysqli_set_charset($con, 'utf8');
    return $con;
};

// Шаблонизатор
function include_template($name, $data) {
  $name = 'templates/' . $name;
  $result = '';
    if (!file_exists($name)) {
    return $result;
  }

  ob_start();
  extract($data);
    require $name;

   $result = ob_get_clean();
    return $result;
};

// Выделение активной страницы
function active($page) {
  if ($value['title'] == $page) {
    print('active');
  }
};

function get_partners ($con): array {
    $sql =
      'SELECT * FROM partners';
    $res = mysqli_query($con, $sql);
    return $partners = mysqli_fetch_all($res, MYSQLI_ASSOC);
};

function get_members ($con): array {
    $sql =
      'SELECT * FROM members';
    $res = mysqli_query($con, $sql);
    return $members = mysqli_fetch_all($res, MYSQLI_ASSOC);
};