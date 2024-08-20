<?php
// ページアクセス時の処理(通常はコントローラー等に書く)
$serverParams = $_SERVER; // PHPでは$_SERVERにサーバー情報やリクエストURIなど、さまざまな情報が格納される。
$cookieParams = $_COOKIE; // PHPでは$_COOKIEにCookie情報が格納される
$sessionParams = $_SESSION; // PHPでは$_SESSIONにセッション情報が格納される





?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP</title>
</head>

<body>
    <h1>server page <a href="/index.php">🔙</a></h1>

    <h2>サーバー情報および実行時の環境情報</h2>
    <pre><?php var_dump($serverParams); ?></pre>

    <h2>Cookie</h2>
    <pre><?php var_dump($cookieParams); ?></pre>
    <button onclick="document.cookie = 'cookie_param=foo'">Set Cookie (cookie_param=foo)</button><br>
    <button onclick="document.cookie = 'cookie_param=; max-age=0'">Clear Cookie (cookie_param)</button><br>
    <button onclick="location.reload()">Reload</button>

    <h2>セッションデータ</h2>
    <pre><?php var_dump($sessionParams); ?></pre>

</body>

</html>