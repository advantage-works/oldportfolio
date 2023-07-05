<?php
//入力された文字列に置換を行う
//HTMLエスケープを行う

if(isset($_POST["target"])){ //初期画面では出力を生成しない
    $str=str_replace($_POST["change"], "@", htmlspecialchars($_POST["target"])); //htmlエンティティにし、文字列を変換する
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文字列変換アプリ</title>
</head>
<body>
    <?php
        if(isset($str)){
            ?>
            <div>変換後のテキストは<br><?=nl2br($str)?><br>です。</div>
            <?php
        }
    ?>
    <form name="str" action="strchange.php" method="post">
        <p>対象のテキストから指定の文字列を「@」に変換します。</p>
        <div><textarea name="target" rows="4" cols="40">ここに検索元テキストを入力してください</textarea></div>
        <div><input type="text" name="change" value="変換文字列"></div>
        <button type="submit" name="send">テキストを変換する</button>
    </form>
    <p><a href="index.html">トップページへ</a></p>
</body>
</html>