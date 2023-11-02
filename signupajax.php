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

function InsertUser($username, $password) {
    global $conn;

    $insert = "INSERT INTO users (username, password) 
                VALUES ('$username', '$password')";

    $result = $conn->query($insert);
    
}

function ShowUsers() {
    global $conn;

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            echo "id: " . $row["id"]. "<br> - Username: " . $row["username"] . "<br> - Password: " . $row["password"] . "<br><br>";
        }
    } else {
    echo "0 results";
    }
}

$cmd = $_GET['cmd'];

if($cmd == 'create') {
    InsertUser($_GET['username'],$_GET['password']);
}

ShowUsers();

mysqli_close($conn);

?>