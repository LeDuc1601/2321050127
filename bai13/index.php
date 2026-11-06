<?php
    // noi dung php o day
    echo "Hello World<br>";
    // bien: $ + ten bien = gia tri 
    $hoten="tuat";
    $tuoi= 22;
    echo $hoten . " ". $tuoi. "<br>";

    echo strlen($hoten)."<br>";

    //dem so tu
    echo str_word_count($hoten)."<br>";

    //tim kiem tu
    echo strpos($hoten,"t")."<br>";

    //thay the
    echo str_replace("tuat","con cho",$hoten)."<br>";

    $so1=10;
    $so2=5;

    echo $so1 + $so2 ."<br>";

    echo $so1 - $so2 ."<br>";
    
    echo $so1 * $so2 ."<br>";
    
    echo $so1 / $so2 ."<br>";

    echo $so1 % $so2 ."<br>";

    $so1 += $so2;
    echo $so1 ."<br>";

    echo $so1 == $so2 ;

    echo $so1 >= $so2 ;  
    echo "<br>";
    //dieu kien 

    $kq= $so1 + $so2;
    if($kq>15){
        echo "tong lon hon 15";
    }elseif($kq<15){
        echo "tong be hon 15";
    }else{
        echo "tong bang 15";
    }
    
    echo "<br>";

    $color="red";
    switch($color){
        case "red":
            echo "is red";
            break;
        case "blue":
            echo "is blue";
            break;
        default:
            echo "no color";
            break;
    }

    echo "<br>";

    for($i=0;$i<10;$i++){
        echo $i . "<br>";
        }

    $mang=["anh","nhat anh","vu anh"];
    echo count ($mang)."<br>";

    echo $mang[1]."<br>";

    $mang[]="quang anh";
    print_r($mang);

    echo "<br>";
    unset($mang[3]);
    print_r($mang);

?>