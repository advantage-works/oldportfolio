<?php

//テスト用cookieを読み取る

if(isset($_COOKIE["test"])){
    $value = htmlspecialchars($_COOKIE["test"]);
}
$now = new DateTime();
$nowStr = $now->format("Y/m/d H:i:s");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cookieを取得します</title>
</head>
<body>
    <p>現在時刻は<?=$nowStr?>です。</p>
    <?php if(isset($value)){?>
        <p>cookieに「<?=$value?>」と入力されています。</p>
    <?php }else{?>
        <p>cookieの有効期限が切れています。</p>
    <?php }?>
    <p><a href="index.html">トップページへ</a></p>
</body>
</html>