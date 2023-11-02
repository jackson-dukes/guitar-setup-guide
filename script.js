function openNav() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
    document.querySelector('.hamburger-icon i').classList.replace('fa-bars', 'fa-times');
  } else {
    x.className = "topnav";
    document.querySelector('.hamburger-icon i').classList.replace('fa-times', 'fa-bars');
  }
}

function setCookie(name, value) {
  document.cookie = name + "=" + value + "; path=/";
}

function resetCookie() {
  document.cookie = 'username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
}

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