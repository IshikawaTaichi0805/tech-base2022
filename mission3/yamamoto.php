<?php
    $filename = "mission_3-5_y.txt";
    $editNo="";
    $editName="";
    $editComment="";
    
    if(!empty($_POST["edit"]) && !empty($_POST["passwd"])){//編集したい＆パスワードが入力されてる時
        $edit = $_POST["edit"];
        $passwd = $_POST["passwd"];
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        foreach($lines as $line){
            $elements = explode("<>", $line);
            if($elements[0] == $edit && $elements[4] == $passwd){//テキストファイルの投稿番号と編集対象番号が一致する時＆パスワードが一致する時
                $editNo = $elements[0];
                $editName = $elements[1];
                $editComment = $elements[2];//元々の名前コメントを編集するためにフォームに表示する
            }
        }
    }//ifおわり　　ここまででは編集したいかどうかの確認
    
    
    if(!empty($_POST["name"]) && !empty($_POST["comment"]) && !empty($_POST["passwd"])){//名前コメントパスワードが入ってるか
        $name = $_POST["name"];
        $comment = $_POST["comment"];
        $passwd = $_POST["passwd"];
        $date = date("Y年m月d日 H:i:s");
        
        if(!empty($_POST["editno"])){//見えてない編集対象番号確認→もし編集対象番号があれば
            $editno = $_POST["editno"];
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
            $fp = fopen($filename, "w");
            
            foreach($lines as $line){
                $elements = explode("<>", $line);
                if($elements[0] == $editno){
                    fwrite($fp, $editno."<>".$name."<>".$comment."<>".$date."<>".$passwd.PHP_EOL);
                }else{
                    fwrite($fp, $line.PHP_EOL);
                }
            }
        }else{
            $fp = fopen($filename, "a");
            $count = count(file($filename)) + 1;
            fwrite($fp, $count."<>".$name."<>".$comment."<>".$date."<>".$passwd.PHP_EOL);
            fclose($fp);
        }
    }//if終わり
    
    
    if(!empty($_POST["delete"]) && !empty($_POST["passwd"])){
        $delete = $_POST["delete"];
        $passwd = $_POST["passwd"];
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        $fp = fopen($filename, "w");
        
        for($i = 0; $i < count($lines); $i++){
            $line = explode("<>", $lines[$i]);
            if($line[0] != $delete || $line[4] != $passwd){
                fwrite($fp, $lines[$i].PHP_EOL);
            }
        }
        fclose($fp);
    }//if終わり
    
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_3-5</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="editno" value="<?php echo $editNo; ?>">
        <input type="text" name="name" placeholder="名前" value="<?php echo $editName; ?>">
        <input type="text" name="comment" placeholder="コメント" value="<?php echo $editComment; ?>">
        <input type="text" name="passwd" placeholder="パスワード">
        <input type="submit" name="送信">
    </form>
    
    <form action="" method="post">
        <input type="number" name="delete" placeholder="削除対象番号">
        <input type="text" name="passwd" placeholder="パスワード">
        <input type="submit" value="削除">
    </form>
    
    <form action="" method="post">
        <input type="number" name="edit" placeholder="編集対象番号">
        <input type="text" name="passwd" placeholder="パスワード">
        <input type="submit" value="編集">
    </form>
    
    
    <?php
        if(file_exists($filename)){
            $lines = file($filename, FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                $elements = explode("<>", $line);
                echo $elements[0]." ".$elements[1]." ".$elements[2]." ".$elements[3]."<br>";
            }
        }
    ?>
</body>
</html>