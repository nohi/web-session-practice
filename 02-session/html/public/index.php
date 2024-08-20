<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP</title>
</head>

<body>
    <h1>index page</h1>

    <details open style="margin: 2em 0;">
        <summary>Pages</summary>
        <div>
            <a href="/param/get.php">/param/get.php</a><br>
            <a href="/param/post.php">/param/post.php</a><br>
            <a href="/param/server.php">/param/server.php</a><br>
            <br>
            <a href="/login.php">/login.php</a><br>
            <a href="/login-only.php">/login-only.php</a><br>
            <a href="/logout.php">/logout.php</a><br>
            <br>
            <a href="/etc/info.php">/etc/info.php</a><br>
        </div>
    </details>

    <details>
        <summary>リクエスト・レスポンス・サーバー情報等</summary>
        <div>
            <h2>GETパラメタ</h2>
            <pre><?php var_dump($_GET); ?></pre>

            <h2>POSTパラメタ</h2>
            <pre><?php var_dump($_POST); ?></pre>

            <h2>アップロードファイル</h2>
            <pre><?php var_dump($_FILES); ?></pre>

            <h2>サーバー情報および実行時の環境情報</h2>
            <pre><?php var_dump($_SERVER); ?></pre>

            <h2>Cookie</h2>
            <pre><?php var_dump($_COOKIE); ?></pre>

            <h2>セッションデータ</h2>
            <pre><?php var_dump($_SESSION); ?></pre>
        </div>
    </details>

</body>

</html>