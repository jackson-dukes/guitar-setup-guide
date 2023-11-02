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

function DeleteGuitar($username, $guitar, $radius, $pickups) {
    global $conn;

    $del = "DELETE FROM collection_data WHERE username = '$username' AND guitar = '$guitar' 
    AND radius = '$radius' AND pickups = '$pickups'";

    $result = $conn->query($del);
    
}

function InsertGuitar($username, $guitar, $radius, $pickups) {
    global $conn;
    
    $select = "SELECT * FROM collection_data WHERE username = '$username' AND guitar = '$guitar' 
        AND radius = '$radius' AND pickups = '$pickups'";
    $result = $conn->query($select);
    
    if ($result->num_rows > 0) {
        echo '<script>alert("This guitar already exists in your collection.")</script>';
    } else {
        $insert = "INSERT INTO collection_data (username, guitar, radius, pickups) 
            VALUES ('$username', '$guitar', '$radius', '$pickups')";

        $result = $conn->query($insert);
    }
}

function ShowGuitars($username) {
    global $conn;

    $sql = "SELECT * FROM collection_data WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        while ($row = mysqli_fetch_assoc($result)) {
            $guitar = $row['guitar'];
            $radius = $row['radius'];
            $pickups = $row['pickups'];

            $sql2 = "SELECT neck_relief, action_bass, action_treble, pickup_height_bass_neck, pickup_height_treble_neck, pickup_height_bass_bridge, pickup_height_treble_bridge FROM guitar_data WHERE guitar='$guitar' AND radius='$radius' AND pickups='$pickups'";
            $result2 = mysqli_query($conn, $sql2);
            $delurl = "<a href='' onclick=\"return(deleteGuitar('$username', '$guitar', '$radius', '$pickups'))\">Delete this guitar from collection</a>";

            echo "<tr><td><strong>Guitar:</strong></td>
                <td>" . $guitar . "</td></tr>
                <tr><td><strong>Fretboard Radius:</strong></td>
                <td>" . $radius . "\"</td></tr>
                <tr><td><strong>Pickups:</strong></td>
                <td>" . $pickups . "</td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>";

            if ($row2 = mysqli_fetch_assoc($result2)) {
                echo "<tr><td><strong>Neck Relief:</strong></td>
                    <td>0" . $row2["neck_relief"] . "</td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>";

                echo "<tr><td><strong>Action:</strong></td></tr>
                    <tr><td>at low E string:</td><td>" . $row2["action_bass"] . "</td></tr>
                    <tr><td>at high E string:</td><td>" . $row2["action_treble"] . "</td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>";      

                echo "<tr><td><strong>Neck pickup height:</strong></td></tr>
                    <tr><td>at low E string:</td><td>" . $row2["pickup_height_bass_neck"] . "</td></tr>
                    <tr><td>at high E string:</td><td>" . $row2["pickup_height_treble_neck"] . "</td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td><strong>Bridge pickup height:</strong></td></tr>
                    <tr><td>at low E string:</td><td>" . $row2["pickup_height_bass_bridge"] . "</td></tr>
                    <tr><td>at high E string:</td><td>" . $row2["pickup_height_treble_bridge"] . "</td></tr>
                    <tr><td></td></tr>
                    <tr><td>$delurl</td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>";
            }
        }
        echo "</table><br>";
    } else {
        echo "No guitars have been added yet.";
    }
}    


$cmd = $_GET['cmd'];

if($cmd == 'select') {
    ShowGuitars($_GET['username']);
} elseif($cmd == 'create') {
    InsertGuitar($_GET['username'],$_GET['guitar'],$_GET['radius'],$_GET['pickups']);
} elseif ($cmd == 'delete') {
    DeleteGuitar($_GET['username'],$_GET['guitar'],$_GET['radius'],$_GET['pickups']);
}

mysqli_close($conn);

?>
