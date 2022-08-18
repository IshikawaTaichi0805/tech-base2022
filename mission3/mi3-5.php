<?php
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $filename="mission_3-5.txt";
        $date = date("Y年m月d日 H時i分s秒");
        $delete = $_POST["delete"];
        $edit=$_POST["edit"]; //編集対象番号
        $newname="";//編集番号一致した時フォームに編集対象を出す際の箱
        $newcomment="";//編集番号一致した時フォームに編集対象を出す際の箱
        $newnumber="";//編集番号一致した時フォームに編集対象を出すさいの見えない箱??
        $passward=$_POST["pass"];
        
        
          
        if ($_POST["name"]!=NULL&&$_POST["comment"]!=NULL&&$_POST["pass"]!=NULL){//フォームに名前とコメントが書かれているかならば
             $newnumber=$_POST["new"];//＄newnumberはフォームからは見えない編集対象番号を表示することで編集モードというのを認識させる
              if($newnumber!=NULL){//$newnumberに入力されていれば
                    $lines = file($filename,FILE_IGNORE_NEW_LINES);
                    $fp = fopen( $filename, "w");//ファイルを上書きしながら書いていく
                        foreach($lines as $line){
                            $editnum = explode("<>", $line);//投稿番号を変数に入れた
                            
                            
                                if($newnumber==$editnum[0]){//編集対象番号と投稿番号が同じなら
                                    fwrite($fp,$newnumber."<>".$name."<>".$comment."<>".$date."<>".$passward.PHP_EOL);//対象の投稿番号．新しい名前．新しいコメント
                                }else{//編集対象番号と投稿番号が同じでないなら
                                    fwrite($fp,$line.PHP_EOL);//ファイル内の一行をそのまま書く
                        }//else終り
                    }//テキストファイルを新たに更新作業終わり
                    
            }else{//編集モードでないならば
                $fp = fopen($filename,"a");
                    $count=count(file($filename))+1;
                    fwrite($fp, $count."<>".$name."<>".$comment."<>".$date."<>".$passward.PHP_EOL);//フォームから投稿内容を拾って来る
                    fclose($fp);
            }//else終わり 　ここまででフォーム入力機能or編集機能おわり 
            
        }elseif($_POST["delete"]!=NULL&&$_POST["pass"]!=NULL){//フォームに名前とコメントが入ってなく削除機能欄が空でない時
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            $fp = fopen( $filename, "w");
            
            for ($i = 0; $i < count($lines); $i++){
                $line = explode("<>", $lines[$i]);//explode(区切り文字、文字列、最大要素数)　$lineでtxtの横１行を<>で区切り配列に収めてる
                $postnum = $line[0];//$line[0]は、(count(file($filename))+1)."<>".$str."<>".$str_1."<>".$date.PHP_EOL、の(count(file($filename))+1投稿番号を表してる
                if ($postnum != $delete||$line[4]!=$passward){ //投稿番号と削除入力した番号が一致するかしないか
                    fwrite($fp, $lines[$i].PHP_EOL);//一致しなければ,$lines[0]を書き込む、またループに戻る
                }//if終わり　削除の番号一致の確認
            } fclose($fp);  
            
        }elseif($_POST["edit"]!=NULL){//フォームに名前とコメントが入ってなく削除機能欄が空で時編集機能欄が空でないとき
            $lines_1 = file($filename,FILE_IGNORE_NEW_LINES);//テキストファイルを変数に入れる
            
             
            for ($i = 0; $i < count($lines_1); $i++){//$i=0のときcount($lines)はテキストファイルの行数は０より小さいか
                $line = explode("<>", $lines_1[$i]);//テキストファイルの０行目を<>で区切っていく
                $postnum = $line[0];//テキストの０行目の一文字目（投稿番号）を変数に格納する
                if ($postnum == $edit&&$line[4]==$passward){//編集機能で選択した番号とpostnumが一致しているか
                    $newname=$line[1];//$line[1]は$str
                    $newcomment=$line[2];//$line[2]は$str_1
                    $newnumber=$line[0];
                    
                      
                }//if終わり
            }//for終わり
        }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-5</title>
</head>   
<body>   
    <form action="" method="post"> 
        名前：コメント<br/>
        <input type="text" name="name"  placeholder="名前" value="<?php echo $newname ; ?>"><br>
       
        <textarea name="comment" cols="50" rows="1" placeholder="コメント" ><?php echo $newcomment ; ?></textarea>
            <br/>
        <input type="text" name = "pass" placeholder="パスワード">
        <input type="submit" value="送信" />
            <br/>
    <!--編集しようとしてる番号をわかるようにする（後で隠す）-->
        <input type="hidden" name="new" value="<?php echo $newnumber ; ?>">
    </form>
    
    <!--削除機能-->
    <form action="" method="post">
        削除：<br/>
        <input type="number" name = "delete" placeholder="削除対象番号"><br/>
        <input type="text" name = "pass" placeholder="パスワード">
        <input type="submit" value="削除" />
    </form>
    <!--編集機能-->
    <form action="" method="post">
       編集：<br/>
        <input type="number" name = "edit" placeholder="編集対象番号"><br/>
        <input type="text" name = "pass" placeholder="パスワード">
        <input type="submit" value="編集" />
      
    </form>
    
    
<?php
            $lines_2= file($filename,FILE_IGNORE_NEW_LINES);
                foreach($lines_2 as $line_1){
                    explode("<>",$line_1);
                        echo "$line_1.<br>";
            }    
?>

 </body>  
</html>