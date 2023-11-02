<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adjusting Intonation | Guitar Setup Guide</title>
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
          <a href="intonation.php" class="active">Intonation</a>
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
      <h2>Adjusting Intonation</h2>
      <img src="images/tuning-les-paul.png">
      <p>Intonation is the ability of a guitar to play in tune across the entire fretboard. On an electric guitar, intonation is affected by the length of the strings, the distance between the frets and the bridge, and the gauge of the strings. When the intonation is off, the notes played higher up on the fretboard may sound out of tune or out of pitch with the lower notes.</p>
      <ol>
        <li>Start by tuning the guitar to pitch using an electronic tuner. If you don't own a tuner, you can use the one on the <a href="tuner.php">Tuner</a> page.</li>
        <li>Play the harmonic at the 12th fret of the low E string. A harmonic is produced by lightly touching the string directly above the 12th fret and plucking the string with your other hand.</li>
        <li>Compare the pitch of the harmonic with the pitch of the fretted note at the 12th fret. If the fretted note is sharp, the string length needs to be increased, and if it's flat, the string length needs to be decreased.</li>
        <li>Loosen the string and adjust the saddle position with a small screwdriver, moving it forward or backward, depending on whether you need to increase or decrease the string length.</li>
        <li>Retune the string to pitch and play the harmonic and the 12th fret note again. Repeat the adjustment process until the harmonic and the 12th fret note match perfectly.</li>
        <li>Repeat the above steps for all strings, one at a time.</li>
        <li>After adjusting the intonation, play through some chords and check if the guitar sounds in tune across the fretboard. If it still doesn't sound right, repeat the process.</li>
      </ol>
      <p>Regular intonation adjustments are necessary to keep an electric guitar playing in tune. Changes in string gauge, action, and neck relief can also affect intonation, so it's recommended to check and adjust the intonation periodically.</p>
    </main>
    <script src="script.js"></script>
  </body>
</html>