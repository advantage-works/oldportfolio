<?php
//セッション変数を使用する
session_start();
$_SESSION["test"] = "test";
$_SESSION["time"] = time();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sessionをセットします</title>
</head>
<body>
    <p>session変数をセットしました。</p>
    <p><a href="index.html">トップページへ</a></p>
</body>
</html>