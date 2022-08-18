<?php
    $dsn = 'mysql:dbname=tb240115db;host=localhost';//繋げたいデータベースを書いてる
    $user = 'tb-240115';
    $password = 'hGMhzFK95E';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//phpでデータベースに繋げる
    
    $sql = "CREATE TABLE IF NOT EXISTS bbs"
    ."("
    ."id INT AUTO_INCREMENT PRIMARY KEY,"
    ."name char(32),"
    ."comment TEXT,"
    ."passward TEXT,"
    ."date DATETIME"
    .");";
    $stmt = $pdo->query($sql);

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
            $sql = 'UPDATE bbs SET name=:name, comment=:comment, passward=:passward, date=:date WHERE id=:id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':passward', $passward, PDO::PARAM_STR);
            $stmt->bindParam(':id', $editno, PDO::PARAM_INT);
            $stmt->execute();
    
        }//テキストファイルを新たに更新作業終わり
               
            else{//編集モードでないならば
                $sql = $pdo -> prepare("INSERT INTO bbs (name, comment, passward, date) VALUES (:name, :comment, :passward, :date)");
                $sql -> bindParam(':name', $name, PDO::PARAM_STR);
                $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
                $sql -> bindParam(':passward', $passward, PDO::PARAM_STR);
                $sql -> bindParam(':date', $date, PDO::PARAM_STR);
                $sql -> execute();
        }//else終わり 　ここまででフォーム入力機能or編集機能おわり 
       
    elseif($_POST["delete"]!=NULL&&$_POST["pass"]!=NULL){//フォームに名前とコメントが入ってなく削除機能欄が空でない時
  
            $sql = 'delete from bbs where id=:id AND passwd=:passward';
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindParam(':id', $delete, PDO::PARAM_INT);
            $stmt -> bindParam(':passward', $passward, PDO::PARAM_STR);
            $stmt -> execute();
        }

    elseif($_POST["edit"]!=NULL){//フォームに名前とコメントが入ってなく削除機能欄が空で編集機能欄が空でないとき
            $sql = 'SELECT * FROM bbs WHERE id=:id AND passward=:passward';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $edit, PDO::PARAM_INT);
            $stmt->bindParam(':passward', $passward, PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll();
                foreach($results as $row){
                    $newnumber= $row['id'];
                    $newname= $row['name'];
                    $newcomment = $row['comment'];
            }
        }
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
        $sql = 'SELECT * FROM bbs';
        $stmt = $pdo -> query($sql);
        $results = $stmt -> fetchAll();
            foreach($results as $row){
                echo $row['id']." ";
                echo $row['name']." ";
                echo $row['comment']." ";
                echo $row['date']."<br>";
                echo "<hr>";
        }  
    ?>
</body>
</html>
    