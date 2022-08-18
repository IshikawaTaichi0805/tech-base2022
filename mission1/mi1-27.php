<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-27</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="str"><!--numberで数字入力欄-->
        <input type="submit" name="submit">
    </form>
    <?php
   
     $str = $_POST["str"];//strという変数にpost関数を用いて格納する
    
    $filename="mission_1-27.txt";//filenameという変数をmissionと紐付ける
     if (isset($str)){//isset関数（strに何かが格納されているとき）
        $fp = fopen($filename,"a");//fikenameをaモードで開く
        fwrite($fp, $str.PHP_EOL);//開いたfilenameにstrを改行しながら書いていく
        fclose($fp);//開いていたfilenameを閉じる
    echo "書き込み成功！<br>";
        }
    if(file_exists($filename)){ //ファイルが存在するときに処理する
        $lines = file($filename,FILE_IGNORE_NEW_LINES);//変数に最終行を無視してファイルの中身を配列として代入する
    foreach($lines as $line){//配列内のすべての変数について、下記の処理を行う
        if($line%3==0 && $line%5==0){
        echo "FizzBuzz<br>";
    }elseif ($line%3==0){
        echo "Fizz<br>";
    }elseif($line%5==0){
        echo "Buzz<br>";
    }else{
        echo $line . "<br>";
         }
        }
    
}
    ?>
</body>



 


<!--入力フォーム-->
<!--POST送信-->
<!--POST受信-->
<!--受信したものがあり、中身が空でないときに以下の処理を行う。-->
<!--    変数にPOSTされた数値を代入する-->
<!--    ファイル名を決める-->
<!--    ファイルを追記モードでオープンする-->
<!--    書き込む文字列を変数に代入する-->
<!--    ファイルに書き込む-->
<!--    ファイルをクローズする-->
<!--    「書き込み成功！」と表示する-->

<!--ファイルが存在するときに下記の処理を行う-->
<!--    変数に最終行を無視してファイルの中身を配列として代入する-->
<!--    配列内のすべての変数について、下記の処理を行う-->
<!--        3と5の倍数なら下記の処理を行う-->
<!--            「FizzBuzz」と表示する-->
<!--        上記以外で3の倍数なら下記の処理を行う-->
<!--            「Fizz」と表示する-->
<!--        上記以外で5の倍数なら下記の処理を行う-->
<!--            「Buzz」と表示する-->
<!--        上記以外ならそのまま数値を表示する-->