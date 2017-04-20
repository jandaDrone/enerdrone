<?php

$server = "sql.endora.cz:3307";
$user = "enerdrone";
$pass = "pOwerba11";
$db = "enerdrone";

$con = mysqli_connect($server, $user, $pass, $db);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
    if (isset($_GET['last24'])) {
        $sql = "SELECT * FROM dp WHERE timestamp >= DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY timestamp DESC";
    }else{
        $sql = "SELECT * FROM dp ORDER BY timestamp DESC";
    }
if ($result = mysqli_query($con, $sql)) {

    $handle = fopen("chargingLog.txt", "w");
    fwrite($handle, "#\tTime\tCharged\tDetect\tCurrent\tCharging\tDetection\tTemperature\tHumidity\tCharging time\r\n");
    while ($rowD = mysqli_fetch_row($result)) {

        fwrite($handle, $rowD[0]."\t".$rowD[1]."\t".$rowD[2]."\t".$rowD[3]."\t".$rowD[4]."\t".$rowD[5]."\t".$rowD[6]."\t".$rowD[7]."\t".$rowD[8]."\t" .$rowD[9]."\t".$rowD[10]."\r\n");
    }
    fclose($handle);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename('chargingLog.txt'));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('chargingLog.txt'));
    readfile('chargingLog.txt');
}
