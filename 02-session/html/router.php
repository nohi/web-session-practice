<?php

/**
 * PHPビルトインサーバーのルーティング処理
 * (ApacheやNginxで行うURLリライト設定の代わり)
 */

$publicDir = __DIR__ . "/public";
$reqUrl = parse_url($_SERVER["REQUEST_URI"]);

if (file_exists($publicDir . preg_replace("/\.(json|html|txt|css|js|jpe?g|png|gif|svg|woff|eot).*\z/i", ".$1", $reqUrl["path"]))) {
    return false; // リクエストされたリソースをそのまま返す
} else {
    require $publicDir . "/index.php"; // 存在しないパスは全てindex.phpにルーティングする
}
