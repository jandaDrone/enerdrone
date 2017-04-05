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

    $sql = "SELECT * FROM arduino ORDER BY time DESC limit 1";


    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_row($result)) {
            echo '    <section class="panel">
                                <div class="panel-body bg-secondary">
                                    <div class="widget-summary">
                                        <div class="widget-summary-col widget-summary-col-icon" >
                                            <div class="summary-icon"  style="padding-top: 5px;">
                                                <i class="fa fa-power-off" style=" line-height: 2;"></i>
                                            </div>
                                        </div>
                                        <div class="widget-summary-col">
                                            <div class="summary">
                                                <h5 class="title">Process</h5>
                                                <div class="info">';
            if ($row[7] == true) {
                echo '<strong class="amount">Charging...</strong>';
            } else {
                echo '<strong class="amount">Complete...</strong>';
            }
            echo '</div>
                                            </div>
                                            <div class="summary-footer">
                                                <p class="text-uppercase">(actual state)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="panel panel-transparent">
                                <div class="panel-body">
                                    <section class="panel panel-featured-left panel-featured-tertiary">
                                        <div class="panel-body">
                                            <div class="widget-summary widget-summary-sm">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-tertiary" style="padding-top: 13px;">
                                                        <i class="fa fa-clock-o fa-1x"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Charging time:</h4>
                                                        <div class="info">
                                                            <strong class="amount">00:08:21</strong>
                                                        <span class="text-tertiary">hours</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section><section class="panel panel-featured-left panel-featured-tertiary">
                                        <div class="panel-body">
                                            <div class="widget-summary widget-summary-sm">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-tertiary" style="padding-top: 13px;">
                                                        <i class="fa fa-sun-o"  style=" line-height: 1;"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Temperature</h4>
                                                        <div class="info">
                                                        <strong class="amount">' . $row[2] . '</strong>
                                                        <span class="text-tertiary">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section class="panel panel-featured-left panel-featured-tertiary">
                                        <div class="panel-body">
                                            <div class="widget-summary widget-summary-sm">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon bg-tertiary" style="padding-top: 13px;">
                                                        <i class="fa fa-cloud"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title">Humidity</h4>
                                                        <div class="info">
                                                        <strong class="amount">' . $row[3] . '</strong>
                                                        <span class="text-tertiary">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </section>';

        }

    }
}
