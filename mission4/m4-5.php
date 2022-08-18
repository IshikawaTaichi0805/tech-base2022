<?php
    $dsn = 'データベース';//繋げたいデータベースを書いてる
    $user = 'ID';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//phpでデータベースに繋げる
    $sql = $pdo -> prepare("INSERT INTO tbtest (name, comment) VALUES (:name, :comment)");
    $sql -> bindParam(':name', $name, PDO::PARAM_STR);
    $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
    $name = '石川';
    $comment = 'ハロー'; //好きな名前、好きな言葉は自分で決めること
    $sql -> execute();
    //bindParamの引数名
    ?>
