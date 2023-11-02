<?php
define( 'DB_NAME', 'guitar_setup_guide' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'Shor3lin3 Gold' );
define( 'DB_HOST', 'localhost' );

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//Check connection    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function ShowNeckRelief() {
    global $conn;

    if ($_GET["cmd"] == "select") { // check for "select" command
        $guitar = $_GET["guitar"];
        $radius = $_GET["radius"];
        
        // modify SQL query to include guitar and radius values
        $sql = "SELECT neck_relief FROM guitar_data WHERE guitar='$guitar' AND radius='$radius' LIMIT 1";
        $result = mysqli_query($conn, $sql);

       
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td><strong>Neck Relief:</strong></td>
                    <td>0" . $row["neck_relief"] . "</td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>";
            }
            echo "</table><br>";
        } else {
            echo "0 results";
        }

    } else {
        echo "Invalid command";
    }
}

ShowNeckRelief();

mysqli_close($conn);

?>
