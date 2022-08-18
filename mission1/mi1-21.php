<!--
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-21</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="str">
        <input type="submit" name="submit">
    </form>
    <?php
    /*
    {
           $str = $_POST["str"];
           {
           
        if($str%15==0){
            echo "FizzBuzz<br>";
        }elseif($str%3==0){
            echo "Fizz<br>";
        }elseif($str%5==0){
            echo"Buzz<br>";
        }else{
            echo "$str<br>";
        }
           }
    }
          
    */
    ?>
</body>

<!--$〇〇=$_POST["〇〇"];  ポスト変数
-->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>mission_1-21</title>
</head>
<body>
    <form action="" method="post"><!--送信後の更新がない-->
        <input type="number" name="num" placeholder="数字を入力してください"><!--数字入力欄-->
       <input type="submit" name="submit"><!--送信ボタン-->
       
    </form>
    <?php
        $num = $_POST["num"];
        if ($num % 3 == 0 && $num % 5 == 0) {
            echo "FizzBuzz<br>";
        } elseif ($num % 3 == 0) {
            echo "Fizz<br>";
        } elseif ($num % 5 == 0) {
            echo "Buzz<br>";
        } else {
            echo $num . "<br>";
        }
    ?>
</body>
</html>