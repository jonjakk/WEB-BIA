<?php  
//Starten der Session
session_start();
 require('dbConfig.php');

if(isset($_GET['token'])){

  $token = $_GET['token'];

  $query = "SELECT * FROM `berufe` WHERE token='$token'";
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  $count = mysqli_num_rows($result);
 
  if ($count == 1){
  $_SESSION['token'] = $token;
  }else{

  $fmsg = "Ungültiger Token";
  
  }



}

if (isset($_POST['token'])){

//Werte werden gesetzt
$token = $_POST['token'];


//user wird überprüft

  $query = "SELECT * FROM `berufe` WHERE token='$token'";
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  $count = mysqli_num_rows($result);
 
  if ($count == 1){
  $_SESSION['token'] = $token;
  }else{

  $fmsg = "Ungültiger Token";
  
  }


}

if (isset($_SESSION['token'])){
  $sessiontoken = $_SESSION['token'];
  header('Location: tokenPanel.php');

  
  exit();
   
  }else{
  
  

?>

<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
     <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="https://fonts.google.com/specimen/Slabo+27px" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
      <!--Import Google Icon Font-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    
    <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
      
      /* Button */

	
	.button {
		
		border-radius: 4px;
		border: 0;
		cursor: pointer;
		display: inline-block;
		font-weight: 400;
		height: 4.5em;
		line-height: 3.5em;
		padding: 0 2em 0 2.375em;
		text-align: center;
		text-decoration: none;
		white-space: nowrap;
		text-transform: uppercase;
		letter-spacing: 0.325em;
		font-size: 0.725em;
        width: 30em;
	}


	
	.button {
		background-color: transparent;
		box-shadow: inset 0 0 0 2px #666666;
		color: #444444 !important;
	}

		
		
		.button:hover {
			color: #EF6480 !important;
			box-shadow: inset 0 0 0 2px #EF6480;
		}

		.button.icon:before {
			color: #999999;
		}

      
      
  </style>
</head>

<body>
<!-- Navigationsbar -->
    
  <header>
    <nav class="nav-wrapper transparent" >
        <div class="container" >
          <a href="#" class="brand-logo" style="color: #444444">Token Login</a>
          <a href="#" class="sidenav-trigger" data-target="mobile-menu">
            <i class="material-icons" style="color: #444444">menu</i>    
          </a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#berufe" style="color: #444444"><i class="material-icons left">person</i>Berufe</a></li>
            <li><a href="#login" style="color: #444444"><i class="material-icons left">vpn_key</i>Login</a></li>
          </ul>
          <ul class="sidenav grey lighten-2" style="color: #444444" id="mobile-menu">
            <li><a href="#berufe" ><i class="material-icons left">person</i>Berufe</a></li>
            <li><a href="#login"><i class="material-icons left">vpn_key</i>Login</a></li>
          </ul>
        </div>
      </nav>
    
    
    
  <div class="section"></div>
  <main>
    <center>
      <div class="section"></div>

      <p class="flow-text" style="color: #444444,">Bitte loggen sie sich mit <br>ihrem Berufstoken ein</p>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

        <form class="col s12" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row' style="width: 120%">
              <div class='input-field col s12'>
              <input class='validate' type='text' name='token' id='text'/>
                <label for='text'>Berufetoken</label>
              </div>
            </div>

            
              <label style='float: right;'>
								<a class='pink-text' ><b>Passwort wurde per Email verschickt</b></a>
							</label>
            </div>
            <br />
            <center>
              <div class='row'>
                  <div class="col s12">
                <button type='submit' name='btn_login' class='button' ">Login</button>
                  </div>
              </div>
            </center>
          </form>

        </div>
      </div>
    </center>
    
  </main>
    </header>

<!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
      
    $(document).ready(function(){
      $('.sidenav').sidenav();
      $('.materialboxed').materialbox();
      $('.parallax').parallax();
      $('.tabs').tabs();
      $('.datepicker').datepicker({
        disableWeekends: true,
        yearRange: 1
      });
      $('.tooltipped').tooltip();
      $('.scrollspy').scrollSpy();
    });
      
  </script>
      
    
      
  
</body>

</html>


<?php } ?>