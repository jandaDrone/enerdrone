<?php
$server = "sql.endora.cz:3307";
$user = "enerdrone";
$pass = "pOwerba11";
$db = "enerdrone";

$mysqli = mysqli_connect($server, $user, $pass, $db); //připojení k MySQL

if($mysqli and isset($_GET['land'])){


    $land = $_GET['land'];


    $sql = "INSERT INTO intL (land) VALUES (".$land.")"; //sestavení SQL
    $doSql = $mysqli->query($sql); //vykonání SQL

    if($doSql){ //test úspěchu
        echo 'Zápis byl úspěšný';
    }
    else{
        echo 'špatně sql dotaz';
    }

}
else{
    echo "Nepřipojeno nebo hodnota špatně";
}

?>
