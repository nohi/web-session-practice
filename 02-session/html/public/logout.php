<?php

// ログアウト処理 (セッションを破棄)
session_destroy();
header('Location: /login.php');
