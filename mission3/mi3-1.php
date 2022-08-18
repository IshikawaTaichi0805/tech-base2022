<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-1</title>
</head>   
<body>   
    <form action="" method="post"> 
        名前：<br/>
        <input type="text" name="name" value=""><br>
        コメント：<br/>
        <textarea name="inquiry" cols="50" rows="1"></textarea><br>
         <br/>
        <input type="submit" value="送信" />
        
    </form>

 
<?php
        $str = $_POST["name"];//nameと紐づく
        $str_1 = $_POST["inquiry"];//nameと紐づく
        $filename="mission_3-1.txt";
        $date = date("Y年m月d日 H時i分s秒");//時間を定義
        
        if (isset($_POST["name"])&&$_POST["name"]!=""){
            $fp = fopen($filename,"a");
            $count=count(file($filename))+1;//投稿番号を定義→count()で()の数をカウント
            fwrite($fp, $count."<>".$str."<>".$str_1."<>".$date.PHP_EOL);//コンマで結合
            fclose($fp);
        }//if終わり
?>
 </body>  
</html>