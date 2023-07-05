<?php
//cookieを設定する
setcookie("test", "test", time() + 60, "/", "", true, true); //期限は60秒
$limit = new DateTime("+1 minutes");
$limitStr = $limit->format("Y/m/d H:i:s");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cookieをセットします</title>
</head>
<body>
    <p>cookieをセットしました。</p>
    <p>有効期限は<?=$limitStr?>です。</p>
    <p><a href="index.html">トップページへ</a></p>
</body>
</html>