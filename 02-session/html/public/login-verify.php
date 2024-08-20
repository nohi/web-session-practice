<?php

/**
 * ログイン処理を行う
 */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'POSTメソッドでアクセスしてください';
    return;
}

// ログイン済みの場合はindexにリダイレクト
if (isset($_SESSION['login_data'])) {
    header('Location: /login-only.php');
    return;
}


$user = $_POST['user'] ?? '';
$userRecord = getUserByName($user);
if ($userRecord === false) {
    echo 'ユーザーが見つかりません';
    return;
}

// パスワードの検証
if (password_verify($_POST['pass'], $userRecord['pass'])) {
    // ログイン情報をセッションに保存
    $_SESSION['login_data'] = $userRecord;
    header('Location: /login-only.php');
} else {
    // ログイン失敗
    echo 'ログイン失敗';
    return;
}


/**
 * ユーザー名からユーザー情報を取得
 */
function getUserByName($name)
{
    // ユーザー情報(実際はDBなどから取得. パスワードは実際にはハッシュ化して保存されている)
    $users = [
        ['user' => 'alice', 'pass' => password_hash('test',  PASSWORD_DEFAULT)],
        ['user' => 'bob',   'pass' => password_hash('test2', PASSWORD_DEFAULT)],
    ];

    // ユーザー名で検索
    // 実際にはDBなどから取得する (ex: SELECT user, pass FROM users WHERE user = :user)
    foreach ($users as $user) {
        if ($user['user'] === $name) {
            return $user;
        }
    }

    return false;
}
