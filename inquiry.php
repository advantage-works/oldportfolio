<?php

//問い合わせをするページ

function myIsnull($a){
    return is_null($a) || $a === "";
}


if(count($_GET) == 1){
    //エラーコードがついていれば判定
    if($_GET["e"] == 1){
        $error = "このページから正しく入力してください。";
    }elseif($_GET["e"] == 2){
        $error = "ふりがなはひらがなと全角スペースで入力してください。";
    }elseif($_GET["e"] == 3){
        $error = "電話番号は半角数字とハイフンで入力してください。";
    }elseif($_GET["e"] == 4){
        $error = "メールアドレスを正しく入力してください。";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせフォーム</title>
</head>
<body>
    <?php
        if(isset($error)){
            ?>
            <p><?=$error?></p>
            <?php
        }
    ?>
    <p>※本ページはテストページです。確認を送信するだけで、お問い合わせ内容は実際には記録していないので、問い合わせ内容には答えかねます。</p>
    <form name="inquiry" action="inquirycheck.php" method="post">
        <p>名前:<input type="text" name="userName" value=""></p>
        <p>ふりがな:<input type="text" name="nameRead" value=""></p>
        <p>メールアドレス:<input type="text" name="mailAddress" value=""></p>
        <p>電話番号:<input type="text" name="phone" value=""></p>
        <p>内容:<textarea name="inquiryBody" rows="4" cols="40"></textarea></p>
        <button type="submit" name="send" value="send">問い合わせる</button>
    </form>
    <p><a href="index.html">トップページへ</a></p>
</body>
</html>