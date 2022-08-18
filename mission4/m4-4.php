<?php
    $dsn = 'mysql:dbname=tb240115db;host=localhost';//繋げたいデータベースを書いてる
    $user = 'tb-240115';
    $password = 'hGMhzFK95E';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//phpでデータベースに繋げる
    $sql ='SHOW CREATE TABLE tbtest';
    $result = $pdo -> query($sql);
    foreach ($result as $row){
        echo $row[1];
    }
    echo "<hr>";
    ?>