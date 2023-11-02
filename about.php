<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us | Guitar Setup Guide</title>
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
          <a href="about.php" class="active">About</a>
          <a href="description.php">Site Description</a>
          <a href="checklist.php">Checklist</a>
          <a href="javascript:void(0);" class="hamburger-icon" onclick="openNav()">
            <i class="fa fa-bars"></i>
          </a>
        </div>
      </nav>
    </header>
    <main>
      <h2>About Us</h2>
      <h3>Who I am:</h3>
      <p>My name is Jackson Dukes. I'm a soon-to-be Computer Science graduate from Georgia State University (May 2023). I love playing and tinkering with guitars, amps, and pedals. The continuing improvement and tangible troubleshooting aspect are what keep me interested. I also enjoy playing in the band and helping with live sound at my church. I'm a proud husband and father of two small children.</p>

      <h3>Project Description and why I chose this project:</h3>
      <p>I created this website to help guitar players set up their electric guitars. I provide detailed information on how to adjust various settings, such as neck relief, action, and pickup height. My website also allows users to enter their specific guitar and pickup models to receive personalized recommendations for their setup. In addition, users can keep track of their guitar collection and reference recommended specs for each guitar they own.</p>
      <p>I created this project out of my own need for a centralized resource for guitar setup information. As an experienced guitar player who has set up many guitars, I saw the value in having all of this information in one place. With my website, users can save time and money by learning how to set up their own guitars and having a quick reference for their collection. Overall, my project aims to make guitar setup more accessible and user-friendly for players of all skill levels.</p>

      <h3>Description of technology used for my site:</h3>
      <p>This website uses a phpMyAdmin database with 3 tables. The tables are "users", "guitar_data", and "collection_data". Users are inserted to the "users" table by completing the "Sign Up" process, which can be reached from the "Log In" page. The "guitar_data" table holds all of the specifications that are given on the "Truss Rod", "Setting Action", and "Pickup Height" pages, and this data is displayed dependent on what options the user selects. Data is inserted into the "collection_data" table when a logged in user adds a guitar to their collection on the "My Collection" page. The "collection_data" is then queried to determine what data to display from the "guitar_data" table on the "My Collection" page, dependent on which user is logged in and what guitars they have saved in their collection.</p>
      <p>Ajax is used on the pages "My Collection", "Truss Rod", "Setting Action", "Pickup Hight", and "Sign Up"(accessed through "Log In"). It is used to alter databases and reflect their changes in real-time.</p>
      <p>I developed my own CSS theme that is consistent across all pages of the website.</p>
      <p>The "Tuner" page implements an embedded guitar tuner app from guitarapp.com. Requesting access to a user's microphone requires a secure connection (HTTPS) for the website to be granted permission. To ensure that the embedded tuner worked properly, I had to secure guitarsetup.info by configuring the Apache server to serve the website with an SSL/TLS certificate. I used Certbot to generate the SSL/TLS certificate.</p>
      <p>Javascript is used heavily across the entire website, including on this checklist. The checkboxes have onclick listeners to display a message when all are checked. Another example is as different guitars are chosen in the select forms, the following forms will update their options based on what has been chosen. I implemented this using event listeners and switch statements.</p>
      <p>"My Collection" is only accessible when a user is signed in. If a user who is not signed in tries to navigate to the page, they will be redirected to the "Log In" screen. If they do not have a login, they will be able to click a link under the form to sign up. This was accomplished using cookies and headers.</p>  

      <h3>What I have learned in this class:</h3>
      <p>Throughout this class, I have learned various web development technologies and frameworks. I have gained a solid understanding of HTML, CSS, and JavaScript and how they work together to create interactive web pages. Additionally, I have learned about jQuery, a popular JavaScript library that simplifies DOM manipulation and event handling.</p>
      <p>I have also learned about server-side technologies such as PHP, and how it can be used to interact with databases. I gained an understanding of how cookies work, including their use in tracking user sessions and maintaining login status.</p>
      <p>Furthermore, I gained experience in deploying web applications to the cloud using Amazon Web Services (AWS). I also learned how to use SFTP to remotely log in to servers and update files using tools like Cyberduck.</p>
      <p>I also learned about WordPress, a popular content management system, and how to create custom themes and plugins using PHP, HTML, CSS, and JavaScript.</p>  
    </main>
    <script src="script.js"></script>
  </body>
</html>