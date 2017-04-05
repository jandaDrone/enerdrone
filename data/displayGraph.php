<?php
if (isset($_POST['data'])) {

    $server = "sql.endora.cz:3307";
    $user = "enerdrone";
    $pass = "pOwerba11";
    $db = "enerdrone";

    $con = mysqli_connect($server, $user, $pass, $db);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "SELECT * FROM arduino ORDER BY time DESC limit 10";


    if ($result = mysqli_query($con, $sql)) {
//        echo'<section class="panel">
//                                <header class="panel-heading">
//                                    <h2 class="panel-title">Current chart</h2>
//                                    <p class="panel-subtitle">Actual current waveform</p>
//                                </header>
//                                <div class="panel-body">
//                                    <div class="chart chart-md" data-sales-rel="Enerdrone" id="flotDashSales1" class="chart-active"></div>
//                                    <script>var flotDashSales1Data = [{data: [';
//
//        while ($row = mysqli_fetch_row($result)) {
//            echo "['14:15',".$row[5] / 10 ."],";
//        }
//        echo'],color: "#2BAAB1"}]; </script> </div>
//                            </section>';
    }
}
