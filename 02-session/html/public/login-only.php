<?php

/**
 * ログインしている場合のみアクセス可能なページ
 */

// ログインしてない場合はlogin.phpにリダイレクト
if (!isset($_SESSION['login_data']['user'])) {
    header('Location: /login.php');
    return;
}





?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ログインユーザー専用コンテンツ <a href="/index.php">🔙</a></h1>

    <p>こんにちは、<span style="color: red;"><?= $_SESSION['login_data']['user'] ?></span> さん</p>

    <pre><?php var_dump($_SESSION); ?></pre>

    <a href="/logout.php">ログアウト</a>
</body>

</html>