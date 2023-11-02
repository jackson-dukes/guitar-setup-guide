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

function ShowPickupHeight() {
    global $conn;

    if ($_GET["cmd"] == "select") { // check for "select" command
        $guitar = $_GET["guitar"];
        $pickups = $_GET["pickups"];
        
        // modify SQL query to include guitar and pickups values
        $sql = "SELECT pickup_height_bass_neck, pickup_height_treble_neck, pickup_height_bass_bridge, pickup_height_treble_bridge FROM guitar_data WHERE guitar='$guitar' AND pickups='$pickups' LIMIT 1";
        $result = mysqli_query($conn, $sql);
     
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td><strong>Neck pickup height:</strong></td></tr>
                      <tr><td>at low E string:</td><td>" . $row["pickup_height_bass_neck"] . "</td></tr>
                      <tr><td>at high E string:</td><td>" . $row["pickup_height_treble_neck"] . "</td></tr>
                      <tr><td></td></tr>
                      <tr><td></td></tr>
                      <tr><td></td></tr>
                      <tr><td><strong>Bridge pickup height:</strong></td></tr>
                      <tr><td>at low E string:</td><td>" . $row["pickup_height_bass_bridge"] . "</td></tr>
                      <tr><td>at high E string:</td><td>" . $row["pickup_height_treble_bridge"] . "</td></tr>
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

ShowPickupHeight();

mysqli_close($conn);

?>
