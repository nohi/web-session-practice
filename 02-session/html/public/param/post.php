<?php
// ページアクセス時の処理(通常はコントローラー等に書く)
$postParams = $_POST; // PHPでは$_POSTにPOSTパラメタが格納される
$filesParams = $_FILES; // PHPでは$_FILESにアップロードファイル情報が格納される

// アップロードファイルのプレビュー用タグ (png, gif, jpeg画像の場合のみ)
$imgTag = null;
if (isset($filesParams['upload_file'])) {
    if (in_array($filesParams['upload_file']['type'], ['image/png', 'image/gif', 'image/jpeg' /* 実際はexifで判定 */])) {
        $imgData = file_get_contents($filesParams['upload_file']['tmp_name']);
        $imgBase64 = base64_encode($imgData);
        $imginfo = getimagesize($filesParams['upload_file']['tmp_name']);

        $src = "data:{$imginfo['mime']};base64,{$imgBase64}";
        $imgTag = '<img src="' . $src . '" style="max-width: 90vw; max-height: 90vh;">';
    }
}






?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP</title>
    <style>
        label {
            display: inline-block;
            width: 125px;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <h1>post page <a href="/index.php">🔙</a></h1>

    <h2>POSTパラメタ</h2>
    <pre><?php var_dump($postParams); ?></pre>

    <hr>

    <h2>アップロードファイル</h2>
    <pre><?php var_dump($filesParams); ?></pre>

    <?php if (!empty($imgTag)) { ?>
        <h3>アップロード画像表示</h3>
        <?= $imgTag ?>
    <?php } ?>
    <hr>

    <!-- サンプルフォームFORM (POST) -->
    <div>
        <form action="/param/post.php" method="post" style="background-color: #CCFFFF; width: fit-content;">
            <p>サンプルフォームFORM (POST)</p>
            <label>post_param:</label><input type="text" name="post_param"><br>
            <input type="submit" value="submit">
        </form>
    </div>

    <!-- サンプルフォームFORM (File upload) -->
    <div>
        <form action="/param/post.php" method="post" enctype="multipart/form-data" style="background-color: #FFCCFF; width: fit-content;">
            <p>サンプルフォームFORM (File upload, プレビュー付き)</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
            <label>upload_file:</label><input type="file" name="upload_file"><br>
            <input type="submit" value="submit">
        </form>
    </div>

    <!-- サンプルフォームFORM (複合) -->
    <div>
        <form action="/param/post.php" method="post" enctype="multipart/form-data" style="background-color: #FFFFCC; width: fit-content;">
            <p>サンプルフォームFORM (複合)</p>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
            <label>post_param2:</label><input type="text" name="post_param2"><br>
            <label>multi_upload[]:</label><input type="file" name="multi_upload[]" multiple><br>
            <label>mytextarea:</label><textarea name="mytextarea" id="mytextarea"></textarea><br>
            <label>myselect:</label><select name="myselect" id="myselect">
                <option value="">---</option>
                <option value="1">選択肢1</option>
                <option value="2">選択肢2</option>
                <option value="3">選択肢3</option>
            </select>
            <br>
            <input type="submit" value="submit">
        </form>
    </div>

    <!-- javascriptからのPOST (API) -->
    <div style="background-color: #FFCCCC; width: fit-content;">
        <script>
            const postByJs = async () => {
                // fetch APIを使ってPOSTリクエストを送信 (これとは別にaxiosやXMLHttpRequest(古い)を使う方法もある)
                // ここではリクエストボディ、レスポンスボディともにJSON形式でやり取りする例
                const resp = await fetch('/api/sample.php', {
                    method: 'post',
                    credentials: 'omit', // same-origin:同一オリジンの場合のみ送信, omit:クッキーを送信しない, include:常にクッキーを送信
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        js_post_param: document.getElementById('js_post_param').value,
                    }),
                });
                const respBodyJson = await resp.json();
                document.getElementById('js_post_result').value = JSON.stringify(respBodyJson, null, 2);
            }
        </script>
        <form action="/param/post.php" method="post" enctype="multipart/form-data">
            <p>javascriptからのPOST (API)</p>
            <label>送信データ(text)</label><input type="text" name="js_post_param" id="js_post_param">
            <button type="button" onclick="postByJs()">js post</button><br>
        </form>

        <br>
        <p style="margin:0;">POST APIレスポンス</p>
        <textarea id="js_post_result" style="width: 50vw; height: 10em;" readonly></textarea>
    </div>
</body>

</html>