<?php

//テスト用セッション変数を読み取る

session_start();
if(time() - $_SESSION["time"] > 60){
    session_unset();
    session_destroy();
}
if(isset($_SESSION["test"])){
    $value = htmlspecialchars($_SESSION["test"]);
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
    <title>sessionを取得します</title>
</head>
<body>
<p>現在時刻は<?=$nowStr?>です。</p>
    <?php if(isset($value)){?>
        <p>sessionに「<?=$value?>」と入力されています。</p>
        <?php
            session_unset();
            session_destroy();
        ?>
        <p>sessionを破棄しました。</p>
    <?php }else{?>
        <p>sessionの有効期限が切れているか、破棄されています。</p>
    <?php }?>
    <p><a href="index.html">トップページへ</a></p>
</body>
</html>