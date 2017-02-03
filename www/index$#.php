<?php
session_destroy();
session_start(); //session start

require_once ('libraries/Google/autoload.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '191620013863-scpn258lhe16lb25q4lut39t2eargv2t.apps.googleusercontent.com'; 
$client_secret = '5ay9k2O2PCKQ3akdcxp4Mvnd';
$redirect_uri = 'http://www.greenassign.com';



//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
  
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}


//Display user info or display login url as per the info we have.
echo '<div style="margin:20px">';
if (isset($authUrl)){ 
/*
	//show login url
	echo '<div align="center">';
	echo '<h3>Login with Google -- Demo</h3>';
	echo '<div>Please click login button to connect to Google.</div>';
	echo '<a class="login" href="' . $authUrl . '"><img src="images/google-login-button.png" /></a>';
	echo '</div>';
	*/
} 
else {
	
	$user = $service->userinfo->get(); //get user info 
	
	echo "<h1>%%%%%%%%%%%%%^^^^^^^^^^$$$$$$$$$$$$$###########".$user->id."</h1>";
	
	
	
	/*
	A gapi.auth2.BasicProfile object. You can retrieve this object's properties with the following methods:

    BasicProfile.getId()
    BasicProfile.getName()
    BasicProfile.getGivenName()
    BasicProfile.getFamilyName()
    BasicProfile.getImageUrl()
    BasicProfile.getEmail()



	// auth2 is initialized with gapi.auth2.init() and a user is signed in.
		
		if (auth2.isSignedIn.get()) {
		  var profile = auth2.currentUser.get().getBasicProfile();
		  console.log('ID: ' + profile.getId());
		  console.log('Full Name: ' + profile.getName());
		  console.log('Given Name: ' + profile.getGivenName());
		  console.log('Family Name: ' + profile.getFamilyName());
		  console.log('Image URL: ' + profile.getImageUrl());
		  console.log('Email: ' + profile.getEmail());
		}



	 console.log(auth2.currentUser.get().getId());


	*/
	
	
	
	// connect to database
	require_once('Connections/GreenAssign3.php'); 
	
		  
	mysql_select_db($database_GreenAssign3, $GreenAssign3);
	$query_RsGid = "SELECT * FROM user WHERE gplus_id = ".$user->id;
	$RsGid = mysql_query($query_RsGid, $GreenAssign3) or die(mysql_error());
	$row_RsGid = mysql_fetch_assoc($RsGid);
	$totalRows_RsGid = mysql_num_rows($RsGid);
	
	
	//user or id is false by default
	//if row==1 the user present or id =true
	$idPresent =false;		
	if($totalRows_RsGid==1){$idPresent=true;}
	//check if user exist in database using COUNT
	
	
	
	echo "<h1>%%%$user->name%%%%%%%%%%^^^^$user->email^^^$user->picture^^^$$$$$$$$$$$$$###########".$user->id." ".$_SERVER['DOCUMENT_ROOT']." >".$idPresent."<</h1>";
	
	
	
	
		if(!$idPresent){
			
				echo "<h1>%%+++++++++++++</h1>";
				//block 1 working 
				//insert new user to db and redirect to Signup
  $insertSQL = sprintf("INSERT INTO user (gplus_id,name,picture,email,entrytime) VALUES (%s,%s,%s,%s,now())",
                       GetSQLValueString($user->id, "text"),
					   GetSQLValueString($user->name, "text"),
					   GetSQLValueString($user->picture, "text"),
					   GetSQLValueString($user->email, "text"));

  mysql_select_db($database_GreenAssign3, $GreenAssign3);
  $Result1 = mysql_query($insertSQL, $GreenAssign3) or die(mysql_error());
  echo "<h1>%%+++++++++++++</h1>";
  
  $queryUidSQL = sprintf("SELECT u_id FROM user WHERE gplus_id =%s",
                       GetSQLValueString($user->id, "text"));
  mysql_select_db($database_GreenAssign3, $GreenAssign3);
  $ResultUid = mysql_query($queryUidSQL, $GreenAssign3) or die(mysql_error());
  $row_RsUid = mysql_fetch_assoc($ResultUid);
  echo "<h1>%%+++++++++++++</h1>";
  
					$_SESSION['GA_u_id'] = $row_RsUid['u_id'];
					$_SESSION['GA_loggedin'] = false;
					$_SESSION['GA_name']=$user->name;
  					$_SESSION['email']= $user->email;
					$_SESSION['gimageurl']=$user->picture;
					
					echo "<h1>%%+++++++++".$row_RsUid['u_id']."++++</h1>";
					
  				header('Location: http://www.greenassign.com/Signup/');
				exit;
				//block 1 working 
            
		}
	
	
	
	
	
	
	
	
	
	
	
	}



?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GreenAssign</title>
    
    <!-- Google + signin shit -->
  
  <!-- JavaScript specific to this application that is not related to API
     calls -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
       <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
       
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="">GreenAssign</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
           </div>
        <!-- /.container -->
       </nav>
     


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                    	
                        <h1><img src="img/mainlogo0.png" width="100%"></h1>
                        <h3>Communicate | Learn | Stay Organised</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                        
                            <li>
                            	<div id="customBtn" >
									<?php
                                    if (isset($authUrl)){ 
                                            //show login url
                                            echo '<a class="login" href="' . $authUrl . '"><img src="images/google-login-button.png" /></a>';
                                        }
                                    ?>
                                </div>
                            </li>
                            <li>
                            <div style="border-radius:0px;text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseine; display: inline-block; width: 240px; height: 50px; position: relative; background: transparent;">
                                <a href="pages/SelectClass.php" style="border-radius:0px;opacity: 1; z-index: 10000; left: 0px; top: 0px; position: absolute; cursor: pointer; outline: 0px; width: 240px; height: 50px;color: #757575;" class="btn btn-default btn-lg"><span class="network-name">Sign in as GUEST</span></a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">What is GreenAssign?</h2>
                    <p class="lead">GreenAssign is a web service for colleges & schools.
<br>We provide:
<ol><li><b>Communication</b> between students and staff</li>
<li>Study <b>Resources</b></li>
<li>Online <b>Assignments</b></li></ol></p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/ipad.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
    <!-- /.content-section-b -->
    <!-- /.content-section-a -->

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <form action="mailercontactus.php" name="sentMessage" id="contactForm" method="post" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input style="height:61px" type="text" class="form-control" placeholder="Your Name *" id="name" name="nameyo" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input style="height:61px" type="email" class="form-control" placeholder="Your Email *" id="email" name="emailyo" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input style="height:61px" type="tel" class="form-control" placeholder="Your Phone *" id="phone" name="phoneyo" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea rows="10" required class="form-control" id="message" name="messageyo" placeholder="Your Message *" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-default btn-lg">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; GreenAssign 2015. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<div id="authOps"><div id="errors"><p></p></div></div>

   <!-- google sign in shit -->
 <style type="text/css">
    #customBtn {
      display: inline-block;
      background: white;
      color: #444;
      width: 190px;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
    }
    #customBtn:hover {
      cursor: pointer;
    }
    span.label {
      font-family: serif;
      font-weight: normal;
    }
    span.icon {
      background: url('/identity/sign-in/g-normal.png') transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
      width: 42px;
      height: 42px;
    }
    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      padding-left: 42px;
      padding-right: 42px;
      font-size: 14px;
      font-weight: bold;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'Roboto', sans-serif;
    }
  </style>
</body>


</html>
