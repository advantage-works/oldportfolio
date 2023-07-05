<?php

//入力された2つの数値を足して返す
//エラーチェックを行う

function myIsnull($a){
    return is_null($a) || $a === "";
}
function remove0($a){
    if(abs($a) >= 1){ //絶対値が1以上なら先頭と末尾の0と小数点はすべて除去
        $ans = preg_replace("/^0+/u", "", $a);
        $ans = preg_replace("/0*$/u", "", $ans);
        return preg_replace("/\.$/u", "", $ans);
    }
    $ans = preg_replace("/^0+/u", "0" ,$a); //絶対値が1未満の場合、先頭の0を1つ残し、0以外の場合は末尾の0を削除
    if($a != 0){
        return preg_replace("/0*$/u", "", $ans);
    }
    //0の場合、末尾の処理を行う必要がない
    return $ans;
}

if(isset($_POST["add1"]) && isset($_POST["add2"])){ //2変数が埋まっているか確認
    if(is_numeric($_POST["add1"]) && is_numeric($_POST["add2"])){ //2変数とも数値であるか確認
        $sum1 = remove0($_POST["add1"]); //余計な0を削除
        $sum2 = remove0($_POST["add2"]);
        $sum = $sum1 + $sum2; //数値であれば計算
    }elseif(!myIsnull($_POST["add1"]) && !myIsnull($_POST["add2"])){
        $error="文字列は計算できません。"; //両方入力されていて数値でないときのエラー
    }else{
        $error="両方とも入力してください。"; //片方しか入力されていないときのエラー
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>足し算アプリ</title>
</head>
<body>
    <?php
    if(isset($sum)){
        ?>
        <p><?=$sum1?>+<?=$sum2?>=<?=$sum?>です。</p>
        <?php
    }
    if(isset($error)){
        ?>
        <p><?=$error?></p>
        <?php
    }
    ?>
    <form name="add" action="add.php" method="post">
        <input type="text" name="add1" value="">
        +
        <input type="text" name="add2" value="">
        を
        <button type="submit" name="add" value="send">計算する</button>
    </form>
    <p><a href="index.html">トップページへ</a></p>
</body>
</html>
