<?php
/*    
    for($i=0;$i<100;$i++){
        if($i%3==0 && $i%5==0){
            echo "FizzBuzz<br>";
        }elseif($i%3==0){
            echo "Fizz<br>";
        }elseif($i%5==0){
            echo "Buzz<br>";
        }else{
            echo $i . "<br>";
        }
    }
    echo"<br>";
*/    
    for($l=1;$l<100;$l++){
        if($l%15==0){
            echo "FizzBuzz<br>";
        }elseif($l%3==0){
            echo "Fizz<br>";
        }elseif($l%5==0){
            echo"Buzz<br>";
        }else{
            echo "$l<br>";
        }
    }
    
?>