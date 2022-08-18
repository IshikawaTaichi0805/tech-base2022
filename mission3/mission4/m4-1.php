<?php
//記入例；以下は <?php から ?> で挟まれるPHP領域に記載すること。

    //4-2以降でも毎回接続は必要。
    //$dsnの式の中にスペースを入れないこと！

    // 【サンプル】
    // ・データベース名：tb219876db
    // ・ユーザー名：tb-219876
    // ・パスワード：ZzYyXxWwVv
    // の学生の場合：aaaaaaa

    // DB接続設定
?>

<?php
    $dsn = 'mysql:dbname=tb219876db;host=localhost';
    $user = 'tb-240115';
    $password = 'hGMhzFK95E';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    ?>