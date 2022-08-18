<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-27</title>
</head>   <!--head要素は画面には映らない要素-->
<body>   <!--body要素は画面に映す要素-->
    <form action="" method="post"> <!--getとpostの違い意外と複雑-->
        <input type="text" name="str" value="コメント"><!--numberで数字入力欄-->
        <input type="submit" name="送信">
    </form>
    
<?php
        $str = $_POST["str"];//strという変数にpost関数を用いて格納する
    
    
        
   $filename="mission_2-2.txt";//filenameという変数をmissionと紐付ける
     if (/*isset($str)&&*/$_POST["str"]!=""){//isset関数（strに何かが格納されているとき）
        $fp = fopen($filename,"a");//fikenameをaモードで開く
        fwrite($fp, $str.PHP_EOL);//開いたfilenameにstrを改行しながら書いていく
        fclose($fp);//開いていたfilenameを閉じる
            if($str=="完成"){
                echo $str. "素晴らしい！<br>";}
            else{
                echo $str. "入力完了";  
        }
    }
          
?>
    </body>  
</html>
