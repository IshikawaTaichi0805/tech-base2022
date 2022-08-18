<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-2</title>
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
        $str = $_POST["name"];
        $str_1 = $_POST["inquiry"];
        $filename="mission_3-2.txt";
        $date = date("Y年m月d日 H時i分s秒");
          
        if (isset($_POST["name"])&&$_POST["name"]!=""){/*フォームに入力されてるかの判断*/
            $fp = fopen($filename,"a");
                $count=count(file($filename))+1;//投稿番号の定義
            fwrite($fp, $count."<>".$str."<>".$str_1."<>".$date.PHP_EOL);/*テキストファイルになにを書くか*/
            fclose($fp);
        }//if終わり
        
        $lines = file($filename,FILE_IGNORE_NEW_LINES);//ファイル関数を用いてテキストファイルを変数に格納してる.FILE_IGNORE_NEW_LINESで改行作用
            foreach($lines as $line){/*テキストファイルを一行ずつ変数において処理している*/
                $line_1=explode("<>",$line);
                echo  $line_1[0] .$line_1[1] .$line_1[2] .$line_1[3]. "<br>";//変数をブラウザ表示させている
    }//foreach終わり   
        
    
?>
 </body>  
</html>