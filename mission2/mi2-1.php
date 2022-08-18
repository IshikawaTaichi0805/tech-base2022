<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_2-1</title>
</head>   <!--head要素は画面には映らない要素-->
<body>   <!--body要素は画面に映す要素-->
    <form action="" method="post"> <!--getとpostの違い意外と複雑-->
        <input type="text" name="str" value="コメント"><!--numberで数字入力欄-->
        <input type="submit" name="やまもと">
    </form>
    
<?php
        $str = $_POST["str"];//strという変数にpost関数を用いて格納する
    
    
         if (isset($str)){//isset関数（strに何かが格納されているとき）
   
        echo $str. "書き込み成功！<br>";
    }
     
?>
    </body>  
</html>
