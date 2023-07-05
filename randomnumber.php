<?php

//乱数を生成し、表示する

//空欄であるかチェック
function myIsnull($a) {
    return is_null($a) || $a === "";
}
//整数であるかチェック
function intCheck($a) {
    if(preg_match("/^\-{0,1}[0-9]+$/u", $a) == 1){
        return true;
    }
    return false;
}
//自然数であるかチェック
function plusCheck($a) {
    if(preg_match("/^[0-9]+$/u", $a) == 1 && $a >= 1){
        return true;
    }
    return false;
}

if(isset($_GET["min"])){ //$_GETが存在する、つまり初回入力でない場合
    if(myIsnull($_GET["min"]) || myIsnull($_GET["max"]) || myIsnull($_GET["amount"])){ //いずれかの欄が空欄である場合
        $error = "すべて入力してください。";
    }elseif(!intCheck($_GET["min"]) || !intCheck($_GET["max"]) || !plusCheck($_GET["amount"])){ //いずれかの欄が正しくない場合
        $error = "整数で入力してください。";
    }elseif($_GET["min"] > $_GET["max"]){ //上限が下限以下である場合
        $error = "上限は下限以上にしてください。";
    }else{
        $min = $_GET["min"];
        $max = $_GET["max"];
        $amount = $_GET["amount"];
        $sum = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>乱数生成アプリ</title>
</head>
<body>
    <?php
        if(isset($error)){
            ?>
            <p><?=$error?></p>
            <?php
        }elseif(isset($min)){
            for($i = 1; $i < $amount + 1; $i++){
                $random = random_int($min, $max);
                $sum += $random;
                ?>
                <p><?=$i?>回目の乱数は<?=$random?>です。</p>
                <?php
            }
            $average = $sum / $amount;
            ?>
            <p>乱数の合計値は<?=$sum?>、平均値は<?=$average?>です。</p>
            <?php
        }
    ?>
    <form name="rand" action="" method="get">
        <p>生成する乱数の下限(整数):<input type="text" name="min" value=""></p>
        <p>生成する乱数の上限(整数、下限以上):<input type="text" name="max" value=""></p>
        <p>乱数を生成する回数(1以上の整数):<input type="text" name="amount" value=""></p>
        <button type="submit">生成する</button>
    </form>
    <p><a href="index.html">トップページへ</a></p>
</body>
</html>