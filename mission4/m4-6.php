<?php
    $dsn = 'mysql:dbname=tb240115db;host=localhost';//繋げたいデータベースを書いてる
    $user = 'tb-240115';
    $password = 'hGMhzFK95E';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//phpでデータベースに繋げる
    $sql = 'SELECT * FROM tbtest';
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll();
    foreach ($results as $row){
        //$rowの中にはテーブルのカラム名が入る
        echo $row['id'].',';
        echo $row['name'].',';
        echo $row['comment'].'<br>';
    echo "<hr>";
    }
    ?>