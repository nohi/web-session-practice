<?php

/**
 * サンプルAPI (post.php用)
 */

// POSTパラメータを取得
// application/x-www-form-urlencoded または multipart/form-data 以外の場合は$_POSTには値が入らないので注意
$reqBody = file_get_contents("php://input");
$dataArray = json_decode($reqBody, true);

// レスポンスヘッダー
header('Content-Type: application/json');

// レスポンスボディ
// 現在日時とタイムゾーンをJSON形式で返す
$tz = new DateTimeZone('Asia/Tokyo');
$dt = new DateTime('now', $tz);
echo json_encode([
    'datetime' => $dt->format('Y-m-d H:i:s'),
    'timezone' => $tz->getName(),
    'js_post_param' => $dataArray['js_post_param'] ?? '',
    'cookie' => $_COOKIE,
]);
