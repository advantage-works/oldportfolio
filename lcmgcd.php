<?php

//最小公倍数と最大公約数を計算する

//値が空であるかをチェック
function check($a):bool{
    return !(is_null($a) || $a === "");
}
//最小公倍数を計算
function getLcm(int $a, int $b):int{
    $i = 1;
    while(1){
        if(($a * $i) % $b === 0){
            return $a * $i;
        }
        $i++;
    }
}
//最大公約数を計算
function getGcd(int $a, int $b){
    for($i = $a; $i >= 1; $i--){
        if($a % $i === 0 && $b % $i === 0){
            return $i;
        }
    }
}
//先頭の0はすべて除去
function remove0($a):string {
    return preg_replace("/^0+/u", "", $a);    
}

if(isset($_POST["calc1"]) && isset($_POST["calc2"])){ //2変数が埋まっているか確認
    if(preg_match("/^[0-9]+$/u", $_POST["calc1"]) && preg_match("/^[0-9]+$/u", $_POST["calc2"]) && $_POST["calc1"] > 0 && $_POST["calc2"] > 0){ //2変数とも整数であるか確認
        $a = remove0($_POST["calc1"]);
        $b = remove0($_POST["calc2"]);
        $lcm = getLcm($a, $b);
        $gcd = getGcd($a, $b);
    }elseif(is_numeric($_POST["calc1"]) && is_numeric($_POST["calc2"])){
        $error = "1以上の整数で入力してください。"; //数値ではあるが整数でないときのエラー
    }elseif(check($_POST["calc1"]) && check($_POST["calc2"])){
        $error = "文字列は計算できません。"; //両方入力されていて数値でないときのエラー
    }else{
        $error = "両方とも入力してください。"; //片方しか入力されていないときのエラー
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>最小公倍数と最大公約数アプリ</title>
</head>
<body>
    <?php
    if(isset($lcm)){
        ?>
        <p><?=$a?>と<?=$b?>の最小公倍数は<?=$lcm?>、最大公約数は<?=$gcd?>です。</p>
        <?php
    }
    if(isset($error)){
        ?>
        <p><?=$error?></p>
        <?php
    }
    ?>
    <p>最小公倍数と最大公約数を求めます。</p>
    <form name="calc" action="lcmgcd.php" method="post">
        <input type="text" name="calc1" value="">
        と
        <input type="text" name="calc2" value="">
        で
        <button type="submit" name="add" value="send">計算する</button>
    </form>
    <p><a href="index.html">トップページへ</a></p>
</body>
</html>
