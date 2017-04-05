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

        echo '  <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Complete details</h2>
                                    <p class="panel-subtitle">The last 10 measurements</p>
                                </header>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-none" id="responsecontainer">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Time</th>
                                                <th>Temperature</th>
                                                <th>Humidity</th>
                                                <th>Light</th>
                                                <th>Current</th>
                                                <th>Distance</th>
                                            </tr>
                                            </thead>
                                            <tbody>';


        while ($rowD = mysqli_fetch_row($result)) {
            echo "<tr>
                                            <td>" . $rowD[0] . "</td>
                                            <td>" . $rowD[1] . "</td>
                                            <td>" . $rowD[2] . "</td>
                                            <td>" . $rowD[3] . "</td>
                                            <td>" . $rowD[4] . "</td>
                                            <td>" . $rowD[5] / 10 . "</td>
                                            <td>" . $rowD[6] . "</td>
                                        </tr>";
        }
        echo '</tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                               ';
    }
}
