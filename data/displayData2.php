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

    $sql = "SELECT * FROM dp ORDER BY timestamp DESC limit 1";

    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_row($result)) {

            echo ' <div class="panel-body bg-tertiary">
                                    <div class="widget-summary">
                                        <div class="widget-summary-col widget-summary-col-icon" >
                                            <div class="summary-icon"  style="padding-top: 5px;">
                                                <i class="fa fa-flag-checkered" style=" line-height: 2;"></i>
                                            </div>
                                        </div>
                                        <div class="widget-summary-col">
                                            <div class="summary">';
            if ($row[2] == true) {
                echo '<h5 class="title">Successful landing</h5>';
            }else{
                echo '<h5 class="title">Waiting for landing</h5>';
            }

            echo ' <div class="info">';

            if ($row[2] == true) {
                echo '<strong class="amount">Drone detected</strong>';
            }else{
                echo '<strong class="amount">Drone flying</strong>';
            }
            echo '
                                                </div>
                                            </div>
                                            <div class="summary-footer">
                                                <p class="text-uppercase">(actual state)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>';

        }

    }
}
