<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checklist | Guitar Setup Guide</title>
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
          <a href="about.php">About</a>
          <a href="description.php">Site Description</a>
          <a href="checklist.php" class="active">Checklist</a>
          <a href="javascript:void(0);" class="hamburger-icon" onclick="openNav()">
            <i class="fa fa-bars"></i>
          </a>
        </div>
      </nav>
    </header>
    <main>
      <h2>Checklist</h2>
      <div class="checklist">
      <div class="checklist-item">
        <input type="checkbox" id="database-usage">
        <label for="database-usage">Database Usage</label>
        <p>This website uses a phpMyAdmin database with three tables: "users", "guitar_data", and "collection_data". Users sign up through the <a href="login.php">Log In</a> page and their information is added to the "users" table. The "guitar_data" table stores specifications for <a href="trussrod.php">Truss Rod</a>, <a href="action.php">Setting Action</a>, and <a href="pickups.php">Pickup Height</a> pages and displays the data based on user selections. The "collection_data" table holds guitar information for logged-in users who add guitars to their collection on the <a href="mycollection.php">My Collection</a> page.</p>
      </div>
      <div class="checklist-item">
        <input type="checkbox" id="ajax-usage">
        <label for="ajax-usage">Ajax Usage</label>
        <p>Ajax is used on the <a href="mycollection.php">My Collection</a>, <a href="trussrod.php">Truss Rod</a>, <a href="action.php">Setting Action</a>, <a href="pickups.php">Pickup Height</a>, and <a href="signup.php">Sign Up</a> pages to reflect changes in real-time.<br></p>       
      </div>
      <div class="checklist-item">
        <input type="checkbox" id="theme">
        <label for="theme">Theme</label>
        <p>The website uses a custom CSS theme for a consistent look and feel across all pages.</p>
      </div>
      <div class="checklist-item">
        <input type="checkbox" id="new-library-usage">
        <label for="new-library-usage">New Library Usage</label>
        <p>The <a href="tuner.php">Tuner</a> page implements an in-browser guitar tuner from guitarapp.com. Requesting access to a user's microphone requires a secure connection (HTTPS) for the website to be granted permission. To ensure that the embedded tuner worked properly, guitarsetup.info had to be secured by configuring the Apache server to serve the website with an SSL/TLS certificate. Certbot was used to generate the SSL/TLS certificate.</p>
        <p>Also, Font Awesome was imported for icons and Google Fonts was imported for typography in the CSS styling for the website.</p>
      </div>
      <div class="checklist-item">
        <input type="checkbox" id="javascript-usage">
        <label for="javascript-usage">Javascript Usage</label>
        <p>Javascript is used extensively throughout the website, including for the checkboxes on this checklist. When all checkboxes are checked, a message is displayed. As different guitars are selected, the following forms update their options based on user input.</p>
      </div>
      <div class="checklist-item">
        <input type="checkbox" id="membership-area">
        <label for="membership-area">Membership Area</label>
        <p>The <a href="mycollection.php">My Collection</a> page is accessible only to signed-in users. If a non-signed-in user tries to navigate to the page, they will be redirected to the <a href="login.php">Log In</a> screen. If the user does not have an account, they can click a link under the form to <a href="signup.php">sign up</a>. This functionality is achieved using cookies and headers.</p>
      </div>
      <div class="checklist-item">
        <input type="checkbox" id="general-user">
        <label for="general-user">General User</label>
        <p>
          username: demouser<br>
          password: ThisIsForWPClass<br>
          <a href="login.php" target="_blank" rel="noopener noreferrer" onclick="window.open(this.href,'_blank','width=800,height=600');return false;">Log In</a>
        </p>
      </div>
    </div>
    <div class="checklist-complete" style="display: none;">
      All items complete!
    <script>
      const checkboxes = document.querySelectorAll('.checklist-item input[type="checkbox"]');
      const completeMessage = document.querySelector('.checklist-complete');

      checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
          const checkedCount = document.querySelectorAll('.checklist-item input[type="checkbox"]:checked').length;
          if (checkedCount === checkboxes.length) {
            completeMessage.style.display = 'block';
            alert("All items complete!");
          } else {
            completeMessage.style.display = 'none';
          }
        });
      });
    </script>
    </div>
    </main>
    <script src="script.js"></script>
  </body>
</html>