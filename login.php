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
    <title>Log In | Guitar Setup Guide</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
          <a href="login.php" class="active">Log In</a>
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
    <div id= "login-main">
      <h2>Log In</h2>
      <div id=currentuser>
      <?php
        if(!isset($_COOKIE["username"])) {  
            echo "No user is currently logged in.<br><br>";
        } else {
            echo "<strong>" . $_COOKIE["username"] . "</strong> is currently logged in." . "<br>You can log in as a different user below.<br><br>";
            echo "<form action='login.php' method='post'>
                    <input type='submit' name='logout' value='Log Out' onclick='resetCookie()'>
                  </form><br><br>";
        }        
        ?>
      </div>   
      <div id="loginstatus">
        <?php
            if ($username != "" && $password != "") {
                // query database for user with matching username and password
                // $row = mysqli_fetch_assoc($result);
                if ($row && $username == $row["username"] && $password == $row["password"]) {
                    setcookie("username", $username, time() + (86400 * 30), '/');
                    header('Location: mycollection.php');
                } else {
                    echo "Incorrect username or password.";
                }
            } else {
                echo "Please enter your username and password.";
            }
            mysqli_close($conn);
        ?>
      </div>
      <br>
      
      <div id="loginfields">
        <form method="post"> Username: <input type="text" name="username"> Password: <input type="password" name="password">
          <input type="submit" value="Submit">
          <a href="signup.php" style="text-decoration: none; margin-top: 5px">Sign Up</a>
        </form>
      </div>
      </div>
    </main>
    <script src="script.js"></script>
  </body>
</html>