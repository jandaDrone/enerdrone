<?php
$server = "sql.endora.cz:3307";
$user = "enerdrone";
$pass = "pOwerba11";
$db = "enerdrone";

$mysqli = mysqli_connect($server, $user, $pass, $db); //připojení k MySQL

if($mysqli  and
    isset($_GET['land'])  and
    isset($_GET['charge'])  and
    isset($_GET['detect'])  and
    isset($_GET['current']) and
    isset($_GET['relayCharge']) and
    isset($_GET['relayMeasure']) and
    isset($_GET['temperature'])  and
    isset($_GET['humidity'])){


    $land = $_GET['land'];
    $charge = $_GET['charge'];
    $detect = $_GET['detect'];
    $current = $_GET['current'];
    $relayCharge = $_GET['relayCharge'];
    $relayMeasure = $_GET['relayMeasure'];
    $temperature = $_GET['temperature'];
    $humidity = $_GET['humidity'];


    $sql = "INSERT INTO dp (land,charge,detect,current,realayCharge,relayMeasure,temperature,humidity)
                    VALUES (".$land.",".$charge.",".$detect.",".$current.",".$relayCharge.",".$relayMeasure.",".$temperature.",".$humidity.")"; //sestavení SQL
    $doSql = $mysqli->query($sql); //vykonání SQL

    if($doSql){ //test úspěchu
        echo 'Zápis byl úspěšný';
    }
    else{
        echo 'Něco se nepovedlo';
    }

}
else{
    echo "Neco je špatně";
}

?>
