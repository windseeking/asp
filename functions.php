<?php

require_once('mysql_helper.php');

function add_member($con, array $member): bool {
    $sql =
      'INSERT INTO members (name, address, phone, email, activities, image_path, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, NOW())';
    $values = [
      $member['name'] = ltrim($member['name']),
      $member['address'] = ltrim($member['address']),
      $member['phone'] = ltrim($member['phone']),
      $member['email'] = ltrim(strtolower($member['email'])),
      $member['activities'] = ltrim($member['activities']),
      $member['image_path']
    ];
    $stmt = db_get_prepare_stmt($con, $sql, $values);
    mysqli_stmt_execute($stmt);

    if (mysqli_error($con)) {
        return false;
    }
    return true;
};

function add_news($con, array $news): bool {
    $sql =
      'INSERT INTO news (title, text, cat, image_path, created_at) 
        VALUES (?, ?, ?, ?, NOW())';
    $values = [
      $news['title'] = ltrim($news['title']),
      $news['text'] = ltrim($news['text']),
      $news['cat'],
      $news['image_path']
    ];
    $stmt = db_get_prepare_stmt($con, $sql, $values);
    mysqli_stmt_execute($stmt);

    if (mysqli_error($con)) {
        return false;
    }
    return true;
};

function add_partner($con, array $partner): bool {
    $sql =
      'INSERT INTO partners (name, description, link, image_path, created_at) 
        VALUES (?, ?, ?, ?, NOW())';
    $values = [
      $partner['name'] = ltrim($partner['name']),
      $partner['description'] = ltrim($partner['description']),
      $partner['link'] = ltrim($partner['link']),
      $partner['image_path'],
    ];
    $stmt = db_get_prepare_stmt($con, $sql, $values);
    mysqli_stmt_execute($stmt);

    if (mysqli_error($con)) {
        return false;
    }
    return true;
};

function add_user($con, array $user): bool {
    $sql =
      'INSERT INTO users (email, password, name, lastname, username, created_at) 
        VALUES (?, ?, ?, ?, ?, NOW())';
    $values = [
      $user['email'] = strtolower($user['email']),
      $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT),
      $user['name'] = ucfirst($user['name']),
      $user['lastname'] = ucfirst($user['lastname']),
      $user['username'] = strtolower($user['username'])
    ];
    $stmt = db_get_prepare_stmt($con, $sql, $values);
    mysqli_stmt_execute($stmt);

    if (mysqli_error($con)) {
        return false;
    }
    return true;
};

// Защита от XSS-атак
function filter_tags(string $str = null): string {
    return $str === null ? '' : strip_tags($str);
};

function get_connection(array $database_config) {
    $con = mysqli_connect($database_config['host'], $database_config['user'], $database_config['password'], $database_config['database']);
    if (!$con) {
        die(mysqli_connect_error());
    }
    mysqli_set_charset($con, 'utf8');
    return $con;
};

function get_members($con): array {
    $sql =
      'SELECT * FROM members ORDER BY created_at DESC';
    $res = mysqli_query($con, $sql);
    return $members = mysqli_fetch_all($res, MYSQLI_ASSOC);
};

function get_news($con): array {
    $sql =
      'SELECT * FROM news n ORDER BY created_at DESC';
    $res = mysqli_query($con, $sql);
    return $news = mysqli_fetch_all($res, MYSQLI_ASSOC);
};

function get_news_cats($con): array {
    $sql =
        'SELECT cat FROM news GROUP BY cat';
    $res = mysqli_query($con, $sql);
    return $cats = mysqli_fetch_all($res, MYSQLI_ASSOC);
};

function get_partners ($con): array {
    $sql =
      'SELECT * FROM partners';
    $res = mysqli_query($con, $sql);
    return $partners = mysqli_fetch_all($res, MYSQLI_ASSOC);
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

function is_admin($con, string $email): bool {
    $sql =
      'SELECT id FROM users '.
      'WHERE is_admin = 1 AND email = ?';
    $values = [$email];
    $admin = db_fetch_data($con, $sql, $values);
    if ($admin) {
        return true;
    }
    return false;
}

function is_email_exist($con, string $email): bool {
    $sql =
      'SELECT id FROM users '.
      'WHERE email = ?';
    $values = [$email];
    $user = db_fetch_data($con, $sql, $values);
    if (!empty($user)) {
        return true;
    }
    return false;
};

function is_member_exist($con, string $name): bool {
    $sql =
      'SELECT id FROM members '.
      'WHERE name = ?';
    $values = [$name];
    $member = db_fetch_data($con, $sql, $values);
    if (!empty($member)) {
        return true;
    }
    return false;
};

function is_news_exist($con, string $title): bool {
    $sql =
      'SELECT id FROM news '.
      'WHERE title = ?';
    $values = [$title];
    $news = db_fetch_data($con, $sql, $values);
    if (!empty($news)) {
        return true;
    }
    return false;
};

function is_partner_exist($con, string $name): bool {
    $sql =
      'SELECT id FROM partners '.
      'WHERE name = ?';
    $values = [$name];
    $partner = db_fetch_data($con, $sql, $values);
    if (!empty($partner)) {
        return true;
    }
    return false;
};

function is_username_exist($con, $username): bool {
    $sql =
      'SELECT id FROM users '.
      'WHERE username = ?';
    $values = [$username];
    $user = db_fetch_data($con, $sql, $values);
    if (!empty($user)) {
        return true;
    }
    return false;
};
