<?php

//問い合わせ確認

function myIsnull($a):bool{
    return is_null($a) || $a === "";
}
//inquiry.phpから来てない場合は戻す
if(!($_SERVER["HTTP_REFERER"] == "https://advantage-works.net/inquiry.php" ||
    $_SERVER["HTTP_REFERER"] == "https://advantage-works.net/inquiry.php?e=1" ||
    $_SERVER["HTTP_REFERER"] == "https://advantage-works.net/inquiry.php?e=2" ||
    $_SERVER["HTTP_REFERER"] == "https://advantage-works.net/inquiry.php?e=3" ||
    $_SERVER["HTTP_REFERER"] == "https://advantage-works.net/inquiry.php?e=4")){
    header("Location: https://advantage-works.net/inquiry.php?e=1");
    exit();
}
//入力が抜けていても戻す
if(myIsnull($_POST["userName"]) || myIsnull($_POST["mailAddress"]) || myIsnull($_POST["inquiryBody"])){
    header("Location: https://advantage-works.net/inquiry.php?e=1");
    exit();
}
//ふりがなは全角ひらがなとスペース
if(preg_match("/^[ぁ-ん　]+$/u", $_POST["nameRead"]) != 1){
    header("Location: https://advantage-works.net/inquiry.php?e=2");
    exit();
}
//電話番号は数字とハイフン
if(preg_match("/^[0-9\-]+$/u", $_POST["phone"]) != 1){
    header("Location: https://advantage-works.net/inquiry.php?e=3");
    exit();
}
//メールアドレスは@を含む
if(preg_match("/^[a-zA-Z0-9_\+\-]+(\.[a-zA-Z0-9_\+\-]+)*@([a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/u", $_POST["mailAddress"]) != 1){
    header("Location: https://advantage-works.net/inquiry.php?e=4");
    exit();
}

$userName = htmlspecialchars($_POST["userName"]);
$mailAddress = htmlspecialchars($_POST["mailAddress"]);
$inquiryBody = htmlspecialchars($_POST["inquiryBody"]);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ確認</title>
</head>
<body>
    <p><?=$userName?>様</p>
    <p>お問い合わせ内容はこちらになります。</p>
    <p><?=nl2br($inquiryBody)?></p>
    <p></p>
    <p>送信する場合はボタンを押してください。</p>
    <form action="inquirysend.php" method="post">
        <input type="hidden" name="userName" value="<?=$userName?>">
        <input type="hidden" name="mailAddress" value="<?=$mailAddress?>">
        <input type="hidden" name="inquiryBody" value="<?=$inquiryBody?>">
        <button type="submit" name="send" value="send">送信する</button>
    </form>
    <p><a href="index.html">トップページへ</a></p>
</body>
</html>