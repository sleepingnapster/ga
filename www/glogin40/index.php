<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '191620013863-scpn258lhe16lb25q4lut39t2eargv2t.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = '5ay9k2O2PCKQ3akdcxp4Mvnd'; //Google CLIENT SECRET
$redirectUrl = 'http://www.greenassign.com/glogin40/';  //return url (url to script)
$homeUrl = 'http://www.greenassign.com/glogin40/';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('GreenAssign');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);






//include_once("includes/functions.php");

//print_r($_GET);die;

if(isset($_REQUEST['code'])){
	$gClient->authenticate();
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	$userProfile = $google_oauthV2->userinfo->get();
	
	
	
	
	//DB Insert
	/*
	$gUser = new Users();
	
	$gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);
	*/
	
	$_SESSION['google_data'] = $userProfile; // Storing Google User Data in Session
	
	
	header("location: account.php");
	
	$_SESSION['token'] = $gClient->getAccessToken();
	
} else {
	$authUrl = $gClient->createAuthUrl();
}

if(isset($authUrl)) {
	echo '<a href="'.$authUrl.'"><img src="images/glogin.png" alt=""/></a>';
} else {
	echo '<a href="logout.php?logout">Logout</a>';
}

?>