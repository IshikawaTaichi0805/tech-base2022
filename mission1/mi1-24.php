<?php
    $str = "Hello World";
    $filename="mission_1-24.txt";
    
    $fp = fopen($filename,"a"); //ファイルネームを開く
    fwrite($fp, $str.PHP_EOL);　//$fpに$strをかきこむ
    //fclose($fp);
    fclose($fp);
    echo "書き込み成功！";
?>