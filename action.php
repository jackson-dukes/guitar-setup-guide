<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setting Action | Guitar Setup Guide</title>
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
          <a href="login.php">Log In</a>
          <a href="mycollection.php">My Collection</a>
          <a href="tuner.php">Tuner</a>
          <a href="strings.php">Changing Strings</a>
          <a href="trussrod.php">Truss Rod</a>
          <a href="action.php" class="active">Setting Action</a>
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
      <h2>Setting Action</h2>
      <img src="images/3-saddle-bridge.png">
      <p>Setting the action on an electric guitar refers to adjusting the height of the strings above the fretboard. This is an important adjustment as it affects the playability and tone of the instrument.</p>
      <p>Here are the steps to set the action on an electric guitar:</p>

      <ol>
        <li>Loosen the strings: Before making any adjustments, it is important to loosen the strings to prevent damage to the guitar or injury to yourself.</li>
        <li>Determine the desired action: The action you set will depend on your playing style, personal preference, and the type of music you play. In general, a lower action will make it easier to play fast, complex passages, while a higher action can result in better tone and sustain.</li>
        <li>Adjust the bridge: The bridge of the guitar is where the strings are anchored to the body. Most electric guitars have adjustable saddles that allow you to adjust the height of the strings. Using a screwdriver, adjust the saddle height by turning the screws clockwise to raise the saddle, and counterclockwise to lower it. Make sure to adjust each saddle to the same height for proper intonation.</li>
        <li>Check the action: Once you have made the necessary adjustments, tune the guitar and check the action. To do this, fret each string at the first and last fret and check the clearance between the string and the frets at the 12th fret. As for the clearance, enter your guitar and fretboard radius below for a good starting point.</li>
          <form id="guitarselect" onsubmit="return(showAction())">
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
            <label for="radius">Choose your guitar's fretboard radius:</label>
            <select id="radius" name="radius">
              <option value="7.25">7.25"</option>
            </select>
            <br>
            <input type="submit" value="Submit">
            <br>
          </form>
          <!-- limits options to only 12" for Gibson guitars -->
          <script>
            const guitarSelect = document.getElementById('guitar');
            const radiusSelect = document.getElementById('radius');
            const defaultRadiusOptions = '<option value="7.25">7.25"</option><option value="9.5 to 12">9.5" to 12"</option><option value="15 to 17">15" to 17"</option>';
            radiusSelect.innerHTML = defaultRadiusOptions;
            guitarSelect.addEventListener('change', () => {
              const selectedGuitar = guitarSelect.value;
              const radiusOptions = (selectedGuitar === 'Gibson Les Paul' || selectedGuitar === 'Gibson SG' || selectedGuitar === 'Gibson ES-335') ? '<option value="12" >12 "</option>' : defaultRadiusOptions;
              radiusSelect.innerHTML = radiusOptions;
            });
          </script>
          <div id=showaction></div>
          <script>
            function showAction() {
              guitar = $("#guitar").val();
              radius = $("#radius").val();
              console.log(guitar);
              console.log(radius);
              $.get("./actionajax.php", {
                "cmd": "select",
                "guitar": guitar,
                "radius": radius
              }, function(data) {
                $("#showaction").html(data);
              });
              return (false);
            }
          </script>
        <li>Make additional adjustments: If the action is still too high or too low, repeat the process and make additional adjustments until you achieve the desired action.</li>
        <li>Stretch and tune the strings: After making adjustments to the guitar's action, it is important to stretch the strings and re-tune the guitar. This will help the strings settle into their new position and ensure proper tuning stability.</li>
      </ol>

      <p>Overall, setting the action on an electric guitar can be a simple process that can greatly improve the playability and tone of your instrument. If you are unsure about making any adjustments yourself, it is always best to seek the help of a professional guitar technician.</p>

    </main>
    <script src="script.js"></script>
  </body>
</html>