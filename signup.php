<?php
    define('DB_NAME', 'guitar_setup_guide');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'Shor3lin3 Gold');
    define('DB_HOST', 'localhost');

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    //Check connection    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row["id"];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up | Guitar Setup Guide</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <script src="./jquery/jquery-3.6.3.min.js"></script>
  </head>
  <body>
    <header>
      <h1>Guitar Setup Guide</h1>
      <img src="images/logo.png" class="logo">
      <nav>
        <div class="topnav" id="myTopnav">
          <a href="index.php" class="home-icon">
            <i class="fa fa-home"></i>
          </a>
          <a href="login.php">Log In</a>
          <a href="mycollection.php">My Collection</a>
          <a href="tuner.php">Tuner</a>
          <a href="strings.php">Changing Strings</a>
          <a href="trussrod.php">Truss Rod</a>
          <a href="action.php">Setting Action</a>
          <a href="intonation.php">Intonation</a>
          <a href="pickups.php">Pickup Height</a>
          <!-- <a href="about.php">About</a>
          <a href="description.php">Site Description</a>
          <a href="checklist.php">Checklist</a> -->
          <a href="javascript:void(0);" class="hamburger-icon" onclick="openNav()">
            <i class="fa fa-bars"></i>
          </a>
        </div>
      </nav>
    </header>
    <main>
      <h2>Sign Up</h2> 
      <div id="signupstatus">
      <?php
        if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];

            // Check if username is available
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "This username is not available.";
            } elseif ($password !== $confirm_password) {
                echo "Passwords do not match.";
            } else {
                $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    mysqli_close($conn);
                    setCookie(username, $username);
                    echo "<script>alert('User created successfully!');
                    window.location.href = 'mycollection.php';</script>";
                    exit();
                } else {
                    echo "Error creating user.";
                }
            }
            mysqli_close($conn);
        } else {
            echo "Please create a username and password.";
        }
        ?>
        </div> 
    <br>
    <div id="signupfields">
    <form method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password">
        Confirm Password: <input type="password" name="confirm_password"><br>
        <input type="submit" value="Submit">
    </form>
    </div>
    </main>
    <script src="script.js"></script>
  </body>
</html>