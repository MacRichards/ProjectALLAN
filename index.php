<!DOCTYPE html>
<html>
<title>2017 OA Hackathon</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="chatbox.js"></script>
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}

/**
 * Bootstrap navbar
 */
    @media only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 1.3 / 1), only screen and (min-resolution: 125dpi), only screen and (min-resolution: 1.3dppx) {
      .navbar-fixed-top .container .navbar-header .navbar-brand {
        background-image: url("/images/logos/western-region@2x.png");
        background-size: contain; } }
  @media (min-width: 768px) {
    .navbar-fixed-top .container .navbar-header .navbar-brand {
      width: 240px; } }
  .navbar-fixed-top .container ul.navbar-nav > li > a {
    border: none;
    color: inherit;
    text-decoration: none;
    padding-top: 10px;
    margin-top: 10px;
    padding-bottom: 10px;
    margin-bottom: 10px; }
    .navbar-fixed-top .container ul.navbar-nav > li > a:hover {
      background: none; }
  .navbar-fixed-top .container ul.navbar-nav > li:hover > a {
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    background-color: rgba(219, 183, 128, 0.2); }
  .navbar-fixed-top .container .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #1a1a1a;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 50px; }
    .navbar-fixed-top .container .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #999;
      display: block;
      transition: 0.3s;
      border-bottom: 0px;
      white-space: nowrap; }
      .navbar-fixed-top .container .sidenav a:hover {
        color: #fff; }
  .navbar-fixed-top .container .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px !important;
    margin-left: 50px; }
  @media screen and (max-height: 480px) {
    .navbar-fixed-top .container .sidenav {
      padding-top: 15px; }
      .navbar-fixed-top .container .sidenav a {
        font-size: 18px; } }

	.navbar-toggle {
	  margin-right: 15px;
	  padding: 9px 10px;
	  margin-top: 13px;
	  margin-bottom: 13px;
	  color: white;
	  background-color: #1a1a1a;
	  background-image: none;
	  border: 0px solid #1a1a1a;
	  border-radius: 0;
	}

  #siginInButt {
    background-color:white;
    border:0px solid white;
  }

  #chatBox{
    max-height: 200px;
    overflow-y: scroll;
    overflow-wrap: break-word;
  }

  #serverRes{
    display: none;
  }


  .page-footer {
  position: relative;
  display: block;
  height: auto;
  width: 100% !important;
  margin-top: 25px;
  padding-top: 50px;
  padding-bottom: 50px;
  text-align: center;
  font-size: 11px;
  background: #e03a3c;
  color: #f8f8f2;
  text-transform: uppercase;
}
.page-footer a {
  color: #f8f8f2 !important;
}




.all-items {
  display: none;
}

.show-all {
  display: none;
}

label::before {
  content: "Login";
}

.show-all:checked ~ .all-items {
  display: block;
}

.show-all:checked + label:before {
  content: "Hide";
}

</style>
<body onbeforeunload="signInForm.signInButt.name='signOut';signInOut()" onload="hideShow('hide')">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" onclick="openNav()" aria-expanded="false" aria-controls="navbar"><i class="fa fa-comments"></i> Chat</button>
      <a class="navbar-brand" href="/"></a>
    </div>
    <div id="navbar" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>

        <div class="w3-text-white w3-margin-bottom">
        <div class="w3-container">
        <input type="checkbox" class="show-all" id="show-all">
  		  <label class="w3-btn" for="show-all"></label>
        <div class="all-items">
          <form action="login.php" id="login">
            <input id="usr" name="usr" type="text" placeholder="Username">
            <input id="pwd" name="pwd" type="password" placeholder="Password">
            <input id="send" type="submit" value="Login">
          </form>
  		  </div>
		  <h2>Pinned Content</h2>
      <?php

      $path    = 'upload/';
      $files = scandir($path);
      $files = array_diff(scandir($path), array('.', '..'));
      foreach ($files as $value) {
          echo "<a href=\"upload/$value\" target=\"_blank\">$value</a><br />\n";
      }
      ?>

      <hr>

    </div>
	  <div class="w3-text-white">
        <div class="w3-container">
		  <h2>Chat App</h2>
      <form onsubmit="signInOut();return false" id="signInForm">
      	<input id="userName" type="text">
      	<input id="signInButt" name="signIn" type="submit" value="Sign in">
      	<span id="signInName">User name</span>
      	</form>
        <hr>

      	<div id="chatBox"></div>
      	<form onsubmit="sendMessage();return false" id="messageForm">
      		<input id="message" type="text">
      		<input id="send" type="submit" value="Send">
      <div id="serverRes"></div></form>
        </div><br>

      </div>

    </div>
    <script>
      function openNav() {
	    document.getElementById("navbar").style.width = "250px";
	  }
      function closeNav() {
        document.getElementById("navbar").style.width = "0";
      }
    </script>
  </div>
</nav>

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">


    <!-- Right Column -->
    <div class="w3-col">

      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16" style="margin-bottom:0px !important">Project ALLAN</h2> Awesome Lodge LAN Accessible Network<br><hr><br>
		<iframe src="site/website/index.html" scrolling="auto" class="wrapper" width="100%" height="700" frameborder="0">
	  This option will not work correctly. Unfortunately, your browser does not support inline frames.</iframe>
        <div class="w3-container">
        </div>
    <!-- End Right Column -->
    </div>

  <!-- End Grid -->
  </div>

      <!-- Left Column -->
    <div class="w3-third w3-margin-bottom">


	<!-- End Left Column -->
	</div>


  <!-- End Page Container -->
</div>


<footer class="page-footer">

	<div style="text-align:center; color:white; font-size:12px;">
		Copyright &copy; 2017 Order of the Arrow, Boy Scouts of America. All Rights Reserved.<br><br>
	</div>

</footer>

</body>
</html>
