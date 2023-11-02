<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Collection | Guitar Setup Guide</title>
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
          <a href="mycollection.php" class="active">My Collection</a>
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
      <h2>My Collection</h2>
      <div>View your saved guitars and all of their specifications in one place.</div><br>
      <div id=currentuser>
      <?php
      if (!isset($_COOKIE["username"])) {
          echo "<script>
                  alert('Please log in to use \"My Collection\"');
                  window.location.href = 'login.php';
                </script>";
      } else {
          echo "<strong>" . $_COOKIE["username"] . "</strong> is currently logged in.<br><br>";
          echo "<form action='login.php' method='post'>
                <input type='submit' name='logout' value='Log Out' onclick='resetCookie()'>
              </form><br><br>";
      }  
      ?>
      </div>
      <div id="collection">
      <form id="guitarselect">
        <label for="guitar">Choose your guitar:</label>
        <select id="guitar" name="guitar">
          <option value="Fender Stratocaster" selected>Fender Stratocaster</option>
          <option value="Fender Telecaster">Fender Telecaster</option>
          <option value="Fender Precision Bass">Fender Precision Bass</option>
          <option value="Fender Jazz Bass">Fender Jazz Bass</option>
          <option value="Gibson Les Paul">Gibson Les Paul</option>
          <option value="Gibson SG">Gibson SG</option>
          <option value="Gibson ES-335">Gibson ES-335</option>
        </select>
        <br>
        <label for="radius">Choose your guitar's fretboard radius:</label>
        <select id="radius" name="radius">
          <option value="7.25" selected>7.25"</option>
          <option value="9.5 to 12">9.5" to 12"</option>
          <option value="15 to 17">15" to 17"</option>
        </select>
        <br>
        <label for="pickups">Choose your guitar's pickups:</label>
        <select id="pickups" name="pickups">
          <option value="Texas Specials" selected>Texas Specials</option>
          <option value="Vintage style">Vintage style</option>
          <option value="Noiseless Series">Noiseless™ Series</option>
          <option value="Standard Single-Coil">Standard Single-Coil</option>
          <option value="Humbuckers">Humbuckers</option>
          <option value="Lace Sensors">Lace Sensors</option>';
        </select>
        <br>
        <input type="submit" value="Add Guitar" id="add-guitar-btn">
        <br>
      </form>
      <div id=insertguitar></div>
      <div id=showguitars></div>
      <script>
        
        const guitarSelect = document.getElementById('guitar');
        const radiusSelect = document.getElementById('radius');
        const pickupsSelect = document.getElementById('pickups');
        
        const insertGuitarBtn = document.getElementById('add-guitar-btn');

        const defaultRadiusOptions = '<option value="7.25">7.25"</option><option value="9.5 to 12">9.5" to 12"</option><option value="15 to 17">15" to 17"</option>';
        const defaultPickupsOptions = '<option value="Texas Specials">Texas Specials</option><option value="Vintage style">Vintage style</option><option value="Noiseless Series">Noiseless™ Series</option><option value="Standard Single-Coil">Standard Single-Coil</option><option value="Humbuckers">Humbuckers</option><option value="Lace Sensors">Lace Sensors</option>';

        radiusSelect.innerHTML = defaultRadiusOptions;
        pickupsSelect.innerHTML = defaultPickupsOptions;

        guitarSelect.addEventListener('change', () => {
          const selectedGuitar = guitarSelect.value;
          
          let radiusOptions = defaultRadiusOptions;
          let pickupsOptions = defaultPickupsOptions;

          switch (selectedGuitar) {
            case 'Fender Stratocaster':
            case 'Fender Telecaster':
              radiusOptions = defaultRadiusOptions;
              pickupsOptions = defaultPickupsOptions;
              radiusSelect.innerHTML = radiusOptions;
              pickupsSelect.innerHTML = pickupsOptions;
              break;
            
            case 'Fender Precision Bass':
              radiusOptions = defaultRadiusOptions;
              pickupsOptions = '<option value="Vintage style">Vintage style</option><option value="Noiseless Series">Noiseless™ Series</option><option value="Standard P">Standard "P"</option><option value="Special Design Humbuckers">Special Design Humbuckers</option>';
              radiusSelect.innerHTML = radiusOptions;
              pickupsSelect.innerHTML = pickupsOptions;
              break;
            
            case 'Fender Jazz Bass':
              radiusOptions = defaultRadiusOptions;
              pickupsOptions = '<option value="Vintage style">Vintage style</option><option value="Noiseless Series">Noiseless™ Series</option><option value="Standard J">Standard "J"</option><option value="Special Design Humbuckers">Special Design Humbuckers</option>';
              radiusSelect.innerHTML = radiusOptions;
              pickupsSelect.innerHTML = pickupsOptions;
              break;
            
            case 'Gibson Les Paul':
            case 'Gibson SG':
            case 'Gibson ES-335':
              radiusOptions = '<option value="12">12"</option>';
              pickupsOptions = '<option value="Humbuckers">Humbuckers</option><option value="P-90s">P-90s</option>';
              radiusSelect.innerHTML = radiusOptions;
              pickupsSelect.innerHTML = pickupsOptions;
              break;  
          }
        });

        insertGuitarBtn.addEventListener('click', (event) => {
          event.preventDefault(); // prevent the form from submitting
          insertGuitar(); // call the insertGuitar() function
          showGuitars();
        });
              
        function showGuitars() {
          username = document.cookie.replace(/(?:(?:^|.*;\s*)username\s*\=\s*([^;]*).*$)|^.*$/, "$1");
          guitar = $("#guitar").val();
          radius = $("#radius").val();
          pickups = $("#pickups").val();
          $.get("./mycollectionajax.php", {
            "cmd": "select",
            "username": username,
          }, function(data) {
            $("#showguitars").html(data);
          });
          return (false);
        }

        function insertGuitar() {
          username = document.cookie.replace(/(?:(?:^|.*;\s*)username\s*\=\s*([^;]*).*$)|^.*$/, "$1");
          guitar = $("#guitar").val();
          radius = $("#radius").val();
          pickups = $("#pickups").val();
          console.log(username);
          console.log(guitar);
          console.log(radius);
          console.log(pickups);
          $.get("./mycollectionajax.php", {
            "cmd": "create",
            "username": username,
            "guitar": guitar,
            "radius": radius,
            "pickups": pickups
          }, function(data) {
            $("#insertguitar").html(data);
          });
          showGuitars();
          return(false);
        }

        function deleteGuitar(username, guitar, radius, pickups) {
          $.get("./mycollectionajax.php",{
            "cmd": "delete",
            "username": username,
            "guitar": guitar,
            "radius": radius,
            "pickups": pickups
          }, function(data) {
              $("#deleteguitar").html(data);
          });
          showGuitars();
          return(false);
        }
        showGuitars();
        </script> 
      </div>  
    </main>  
    <script src="script.js"></script>
  </body>
</html>