


    

<?php
    $dsn = 'データベース';//繋げたいデータベースを書いてる
    $user = 'ID';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    ?>
