<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Truss Rod Adjustment | Guitar Setup Guide</title>
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
          <a href="trussrod.php" class="active">Truss Rod</a>
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
      <h2>Truss Rod Adjustment</h2>
      
      <img src="images/tele-truss-rod.png">
      <p>A truss rod is a metal rod that runs through the length of the guitar neck and is used to adjust the curvature or relief of the neck. The truss rod can be adjusted to counteract the tension exerted on the neck by the strings and to maintain the ideal neck relief.</p>
      <ol>
        <li>Before you start, make sure the guitar is properly tuned to pitch.</li>
        <li>Loosen the strings by turning the tuning pegs counterclockwise until you can remove the truss rod cover at the headstock of the guitar.</li>
        <li>Use a specialized tool, like a truss rod wrench, to make adjustments to the truss rod. Insert the tool into the adjustment nut, which is located at the base of the neck near the body of the guitar.</li>
        <li>Depending on the direction you need to turn the truss rod, use the tool to either tighten or loosen the adjustment nut. Turning the nut clockwise will tighten the rod, while turning it counterclockwise will loosen it.</li>
        <li>Make small adjustments, no more than 1/8 of a turn at a time, and then re-tune the guitar to pitch. </li>
        <li>After making the adjustment, check the neck relief by pressing down the first and last frets on the low E string and observing the gap between the string and the frets in the middle of the neck. When measuring the neck relief gap, enter your guitar and fretboard radius below for a good starting point.</li>
          <form id="guitarselect" onsubmit="return(showNeckRelief())">
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
          <div id=showneckrelief></div>
          <script>
            function showNeckRelief() {
              guitar = $("#guitar").val();
              radius = $("#radius").val();
              console.log(guitar);
              console.log(radius);
              $.get("./trussrodajax.php", {
                "cmd": "select",
                "guitar": guitar,
                "radius": radius
              }, function(data) {
                $("#showneckrelief").html(data);
              });
              return (false);
            }
          </script>
        <li>If the neck relief is still not optimal, repeat the process until the desired amount of relief is achieved.</li>
        <li>Once the adjustment is complete, replace the truss rod cover and re-tune the guitar to pitch.</li>
      </ol>
      <p>It's important to exercise caution when adjusting the truss rod, as over-tightening can damage the neck or cause the neck to bow in the opposite direction. If you are unsure about how to make the adjustment, it's recommended to take your guitar to a professional technician.</p>
    </main>
    <script src="script.js"></script>
  </body>
</html>