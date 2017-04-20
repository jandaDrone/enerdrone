<?php

    $server = "sql.endora.cz:3307";
    $user = "enerdrone";
    $pass = "pOwerba11";
    $db = "enerdrone";

    $con = mysqli_connect($server, $user, $pass, $db);

    $sql = "SELECT * FROM dp  ORDER BY id DESC limit 10";

    if ($result = mysqli_query($con, $sql)) {

        echo '  {
            "cols": [
                {"id":"","label":"Time","pattern":"","type":"string"},
                {"id":"","label":"Current","pattern":"","type":"number"}
              ],
            "rows": [
        ';


        while ($row = mysqli_fetch_array($result)) {
            $newArray[] = $row;
        }

        $newArray = array_reverse($newArray);

        foreach ($newArray as &$row) {
            $time = date("H:i",strtotime($row['1']));
            echo '{"c":[{"v":"' . $time . '","f":null},{"v":' . $row['current'] . ',"f":null}]},';
        }

        echo '  ]
            }';
    }
