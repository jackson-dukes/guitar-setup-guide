<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setting Pickup Height | Guitar Setup Guide</title>
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
          <a href="pickups.php" class="active">Pickup Height</a>
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
      <h2>Setting Pickup Height</h2>
      <div class="body-text">
      <img src="images/pickup-height.png">  
      <p>
          Adjusting the height of the pickups on an electric guitar can have a significant impact on the tone and volume of the instrument. When pickups are too close to the strings, they can cause distortion and a harsh sound, while when they are too far away, the sound can become weak and thin. By adjusting the height of the pickups, the player can achieve a balanced and optimal tone, as well as improve playability and sustain. Additionally, adjusting the pickups can also help to eliminate unwanted noise and hum caused by interference.
        </p>
        <ol>
          <li>Adjust the pole pieces: Before adjusting the overall height of the pickup, make sure the pole pieces are properly adjusted. Use a screwdriver to raise or lower the individual pole pieces until they are evenly spaced and level with the strings.</li>
          <li>Measure the distance: Use a ruler or a specialized pickup height gauge to measure the distance between the bottom of the pickup and the top of the strings. The appropriate distance will vary depending on the guitar, the type of pickup. and personal preference. Enter your guitar and pickups below for a good starting point.</li>
          <form id="guitarselect" onsubmit="return(showPickupHeight())">
            <label for="guitar">Choose your guitar:</label>
            <select id="guitar" name="guitar">
              <option value="Fender Stratocaster">Fender Stratocaster</option>
              <option value="Fender Telecaster">Fender Telecaster</option>
              <option value="Fender Precision Bass">Fender Precision Bass</option>
              <option value="Fender Jazz Bass">Fender Jazz Bass</option>
              <option value="Gibson Les Paul">Gibson Les Paul</option>
              <option value="Gibson SG">Gibson SG</option>
              <option value="Gibson ES-335">Gibson ES-335</option>
            </select>
            <br>
            <label for="pickups">Choose your guitar's pickups:</label>
            <select id="pickups" name="pickups">
              <option value="Texas Specials">Texas Specials</option>
            </select>
            <br>
            <input type="submit" value="Submit">
            <br>
          </form>
          <!-- limits options to only 12" for Gibson guitars -->
          <script>
            const guitarSelect = document.getElementById('guitar');
            const pickupsSelect = document.getElementById('pickups');
            const defaultPickupsOptions = '<option value="Texas Specials">Texas Specials</option><option value="Vintage style">Vintage style</option><option value="Noiseless Series">Noiseless™ Series</option><option value="Standard Single-Coil">Standard Single-Coil</option><option value="Humbuckers">Humbuckers</option><option value="Lace Sensors">Lace Sensors</option>';
            pickupsSelect.innerHTML = defaultPickupsOptions;
            guitarSelect.addEventListener('change', () => {
              const selectedGuitar = guitarSelect.value;
              let options = defaultPickupsOptions;
              switch (selectedGuitar) {
                case 'Gibson Les Paul':
                case 'Gibson SG':
                case 'Gibson ES-335':
                  options = '<option value="Humbuckers">Humbuckers</option><option value="P-90s">P-90s</option>';
                  break;
                case 'Fender Precision Bass':
                  options = '<option value="Vintage style">Vintage style</option><option value="Noiseless Series">Noiseless™ Series</option><option value="Standard P">Standard "P"</option><option value="Special Design Humbuckers">Special Design Humbuckers</option>';
                  break;
                case 'Fender Jazz Bass':
                  options = '<option value="Vintage style">Vintage style</option><option value="Noiseless Series">Noiseless™ Series</option><option value="Standard J">Standard "J"</option><option value="Special Design Humbuckers">Special Design Humbuckers</option>';
                  break;
                default:
                  break;
              }
              pickupsSelect.innerHTML = options;
            });
          </script>
          <div id=showpickupheight></div>
          <script>
            function showPickupHeight() {
              guitar = $("#guitar").val();
              pickups = $("#pickups").val();
              console.log(guitar);
              console.log(pickups);
              $.get("./pickupsajax.php", {
                "cmd": "select",
                "guitar": guitar,
                "pickups": pickups
              }, function(data) {
                $("#showpickupheight").html(data);
              });
              return (false);
            }
          </script>
          <li>Adjust the height: Use a screwdriver to adjust the height of the pickup. Most pickups have two screws on either side of the pickup that can be raised or lowered to adjust the height. Make small adjustments and check the sound and feel of the guitar between each adjustment.</li>
          <li>Test the sound: Play the guitar and listen for any changes in tone or volume. If the pickup is too close to the strings, the sound may be too loud and distorted, while if it is too far away, the sound may be too weak or thin. Make additional adjustments as needed until the sound and feel of the guitar is just right.</li>
          <li>Repeat for each pickup: If the guitar has multiple pickups, repeat the process for each one.</li>
        </ol>
        <p>
          It's important to note that pickup height can have a significant impact on the sound and playability of a guitar, so take your time and make small adjustments until you find the right balance for your playing style and preferences.
        </p>  
      </div>  
    </main>
    <script src="script.js"></script>
  </body>
</html>