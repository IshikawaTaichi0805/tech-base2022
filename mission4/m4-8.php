<?php
    $dsn = 'mysql:dbname=tb240115db;host=localhost';//繋げたいデータベースを書いてる
    $user = 'tb-240115';
    $password = 'hGMhzFK95E';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));//phpでデータベースに繋げる
    $id = 2;
    $sql = 'delete from tbtest where id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    ?>