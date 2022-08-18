<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-3</title>
</head>   
<body>   
    <form action="" method="post"> 
        名前：<br/>
        <input type="text" name="name" value="" placeholder="名前"><br>
        コメント：<br/>
        <textarea name="inquiry" cols="50" rows="" placeholder="コメント"></textarea>
         <br/>
    <input type="submit" value="送信" />
     
    </form>
    
    <form action="" method="post">
       削除：
      <input type="number" name = "delete" placeholder="削除対象番号">
      <input type="submit" value="削除" />
      
    </form>
        
<?php
        $str = $_POST["name"];
        $str_1 = $_POST["inquiry"];
        $filename="mission_3-3.txt";
        $date = date("Y年m月d日 H時i分s秒");
        $delete = $_POST["delete"];
          
        
          
        if (isset($_POST["name"])&&$_POST["name"]!=""){/*フォームに入力されてるかの判断*/
            $fp = fopen($filename,"a");
                $count=count(file($filename))+1;
                $lines = file($filename,FILE_IGNORE_NEW_LINES);
                $line = explode("<>", $lines[$i]);
                
                // fwrite($fp,$count.$line[1].$line[2].$line[3].PHP_EOL);
            fwrite($fp, $count."<>".$str."<>".$str_1."<>".$date.PHP_EOL);/*テキストファイルになにを書くか*/
            fclose($fp);
            
        }elseif(isset($_POST["delete"])&&$_POST["delete"]!=""){
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            $fp = fopen( $filename, "w");
            
            for ($i = 0; $i < count($lines); $i++){
                $line = explode("<>", $lines[$i]);//explode(区切り文字、文字列、最大要素数)　$lineでtxtの横１行を<>で区切り配列に収めてる
                $postnum = $line[0];//$line[0]は、(count(file($filename))+1)."<>".$str."<>".$str_1."<>".$date.PHP_EOL、の(count(file($filename))+1投稿番号を表してる
                    if ($postnum != $delete){ //投稿番号と削除入力した番号が一致するかしないか
                        $count=count(file($filename))+1;
                        fwrite($fp,$count."<>".$line[1]."<>".$line[2]."<>".$line[3].PHP_EOL);
                        // fwrite($fp, $lines[$i].PHP_EOL);//一致しなければ,$lines[0]を書き込む、またループに戻る
                }//if終わり
            } fclose($fp);  //for終わり
        }//elseof終わり
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
                foreach($lines as $line){
                $line_1=explode("<>",$line);
                     echo  $line_1[0] .$line_1[1] .$line_1[2] .$line_1[3]. "<br>";
 }    
        
        
    
?>
 </body>  
</html>