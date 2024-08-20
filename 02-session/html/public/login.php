<?php
// ログイン済みの場合はlogin-onlyにリダイレクト
if (isset($_SESSION['login_data'])) {
    header('Location: /login-only.php');
    return;
}





?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            display: inline-block;
            width: 125px;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <h1>ログインページ <a href="/index.php">🔙</a></h1>
    <form action="/login-verify.php" method="post">
        <label for="user">ユーザー</label><input type="text" name="user" id="user"><br>
        <label for="pass">パスワード</label><input type="password" name="pass" id="pass"><br>
        <input type="submit" value="ログイン">
    </form>

    <div>
        <p>
            ■ユーザー/パスワード<br>
            alice/test<br>
            bob/test2
        </p>
    </div>
</body>

</html>