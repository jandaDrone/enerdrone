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

    $sql = "SELECT * FROM dp ORDER BY timestamp DESC limit 25";

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
                                                <th>Land</th>
                                                <th>Charged</th>
                                                <th>Detect</th>
                                                <th>Current</th>
                                                <th>Charging</th>
                                                <th>Detection</th>
                                                <th>Temperature</th>
                                                <th>Humidity</th>
                                                <th>Charging time</th>
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
                                            <td>" . $rowD[5] . "</td>
                                            <td>" . $rowD[6] . "</td>
                                            <td>" . $rowD[7] . "</td>
                                            <td>" . $rowD[8] . "</td>
                                            <td>" . $rowD[9] . "</td>
                                            <td>" . $rowD[10] . "</td>
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
