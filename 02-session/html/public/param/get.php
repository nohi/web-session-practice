<?php
// ページアクセス時の処理(通常はコントローラー等に書く)
$getParams = $_GET; // PHPでは$_GETにGETパラメタが格納される





?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP</title>
</head>

<body>
    <h1>GET page <a href="/index.php">🔙</a></h1>

    <h2>GETパラメタ</h2>
    <pre><?php var_dump($getParams); ?></pre>

    <h2>Link</h2>
    <p><a href="/param/get.php">/param/get.php</a></p>
    <p><a href="/param/get.php?">/param/get.php?</a></p>
    <p><a href="/param/get.php?get_param=123">/param/get.php?get_param=123</a></p>
    <p><a href="/param/get.php?get_param=foo&get_param2=bar">/param/get.php?get_param=foo&get_param2=bar</a></p>
    <p><a href="/param/get.php?get_param[]=aaa&get_param[]=bbb">/param/get.php?get_param[]=aaa&get_param[]=bbb</a></p> <!-- 配列形式のGETパラメタ -->
</body>

</html>