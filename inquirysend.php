<?php

//問い合わせを送った確認メールを送る

if(!($_SERVER["HTTP_REFERER"] == "https://advantage-works.net/inquirycheck.php")){
    header("Location: https://advantage-works.net/inquiry.php?e=1");
}
$mailBody = $_POST["userName"]. "様". PHP_EOL. "この度はお問い合わせをいただき、誠にありがとうございます。". PHP_EOL;
$mailBody = $mailBody. "下記の通りお問い合わせをいただきました。ご確認ください。". PHP_EOL;
$mailBody = $mailBody. "なお、当お問い合わせページはテストページのため、実際にはお問い合わせには答えかねます。ご了承ください。". PHP_EOL;
$mailBody = $mailBody. "内容:". PHP_EOL. $_POST["inquiryBody"]. PHP_EOL. PHP_EOL. "advantage-works.net管理人";
$mailHeader = "From: auto\nReply-To: ". $_POST["mailAddress"]. "\n";
$mailSend = mb_send_mail($_POST["mailAddress"], "advantage-works.netお問い合わせ", $mailBody, $mailHeader);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせありがとうございます</title>
</head>
<body>
    <?php
        if($mailSend){
            ?>
            <p>送信が完了しました。</p>
            <?php
        }else{
            ?>
            <p>送信に失敗しました。</p>
            <?php
        }
    ?>
    <p><a href="index.html">トップページへ</a></p>
</body>
</html>