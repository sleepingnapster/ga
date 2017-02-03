<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Connections/GreenAssign3.php'); ?>
<?php
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

?>
<?php
/*
 * Sample application for Google+ client to server authentication.
 * Remember to fill in the OAuth 2.0 client id and client secret,
 * which can be obtained from the Google Developer Console at
 * https://code.google.com/apis/console
 *
 * Copyright 2013 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * Note (Gerwin Sturm):
 * Include path is still necessary despite autoloading because of the require_once in the libary
 * Client library should be fixed to have correct relative paths
 * e.g. require_once '../Google/Model.php'; instead of require_once 'Google/Model.php';
 */
set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__ .'/vendor/google/apiclient/src');

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpFoundation\RedirectResponse;
/**
 * Simple server to demonstrate how to use Google+ Sign-In and make a request
 * via your own server.
 *
 * @author silvano@google.com (Silvano Luciani)
 */

/**
 * Replace this with the client ID you got from the Google APIs console.
 */
const CLIENT_ID = '191620013863-scpn258lhe16lb25q4lut39t2eargv2t.apps.googleusercontent.com';

/**
 * Replace this with the client secret you got from the Google APIs console.
 */
const CLIENT_SECRET = '5ay9k2O2PCKQ3akdcxp4Mvnd';

/**
 * Optionally replace this with your application's name.
 */
const APPLICATION_NAME = "GreenAssign";

$client = new Google_Client();
$client->setApplicationName(APPLICATION_NAME);
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri('postmessage');

$plus = new Google_Service_Plus($client);

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__,
));
$app->register(new Silex\Provider\SessionServiceProvider());

// Initialize a session for the current user, and render index.html.
$app->get('/', function () use ($app) {
    $state = md5(rand());
    $app['session']->set('state', $state);
    return $app['twig']->render('index3.html', array(
        'CLIENT_ID' => CLIENT_ID,
        'STATE' => $state,
        'APPLICATION_NAME' => APPLICATION_NAME
    ));
});

// Upgrade given auth code to token, and store it in the session.
// POST body of request should be the authorization code.
// Example URI: /connect?state=...&gplus_id=...&displayName=...
$app->post('/connect', function (Request $request) use ($app, $client) {
    $token = $app['session']->get('token');
	//$galoggedin=$app['session']->get('galoggedin');
	if(!isset($_SESSION))
{
	session_start();
	}
    if (empty($token)) {
        // Ensure that this is no request forgery going on, and that the user
        // sending us this connect request is the user that was supposed to.
        if ($request->get('state') != ($app['session']->get('state'))) {
            return new Response('Invalid state parameter', 401);
        }

        // Normally the state would be a one-time use token, however in our
        // simple case, we want a user to be able to connect and disconnect
        // without reloading the page.  Thus, for demonstration, we don't
        // implement this best practice.
        //$app['session']->set('state', '');

        $code = $request->getContent();
        // Exchange the OAuth 2.0 authorization code for user credentials.
        $client->authenticate($code);
        $token = json_decode($client->getAccessToken());
		
		
		
		

        // You can read the Google user ID in the ID token.
        // "sub" represents the ID token subscriber which in our case
        // is the user ID. This sample does not use the user ID.
        $attributes = $client->verifyIdToken($token->id_token, CLIENT_ID)
            ->getAttributes();
        $gplus_id = $attributes["payload"]["sub"];
		
		
		
		
		//check if 'id' present in db $idthere=false
		//check for refresh token $rtthere=false
		//if no 'id'
		//       if RT save id+rt
		//  	 else save 
		/*
		$hostname_GreenAssign3 = "66.7.195.61";
		$database_GreenAssign3 = "hostrabb_greenassign";
		$username_GreenAssign3 = "hostrabb";
		$password_GreenAssign3 = "annihilate666$";
		*/
		$hostname_GreenAssign3 = "rdsgainsta0.ck0a0mw9m6jc.ap-southeast-1.rds.amazonaws.com:3306";
		$database_GreenAssign3 = "greenass_gadb";
		$username_GreenAssign3 = "greenass_ryan1";
		$password_GreenAssign3 = "Stream09";
		$GreenAssign3 = mysql_pconnect($hostname_GreenAssign3, $username_GreenAssign3, $password_GreenAssign3) or trigger_error(mysql_error(),E_USER_ERROR); 
		
				
		
mysql_select_db($database_GreenAssign3, $GreenAssign3);
$query_RsGid = "SELECT * FROM user WHERE gplus_id = ".$request->get('gplus_id');
$RsGid = mysql_query($query_RsGid, $GreenAssign3) or die(mysql_error());
$row_RsGid = mysql_fetch_assoc($RsGid);
$totalRows_RsGid = mysql_num_rows($RsGid);
		
		$idPresent =false;		
		if($totalRows_RsGid==1){$idPresent =true;}
		
		$rtPresent=false;
		if(isset($token->refresh_token)&&($token->refresh_token!="")){$rtPresent =true;}
		
		if(!$idPresent){
			if($rtPresent){
				//block 1 working 
				//insert id and rt to db
$insertSQL = sprintf("INSERT INTO user (gplus_id,name,rt,email,entrytime) VALUES (%s,%s,%s,%s,now())",
                       GetSQLValueString($gplus_id, "text"),
					   GetSQLValueString($request->get('displayName'), "text"),
					   GetSQLValueString($token->refresh_token, "text"),
					   GetSQLValueString($request->get('gmailAddress'), "text"));

  mysql_select_db($database_GreenAssign3, $GreenAssign3);
  $Result1 = mysql_query($insertSQL, $GreenAssign3) or die(mysql_error());
  
  $queryUidSQL = sprintf("SELECT u_id FROM user WHERE gplus_id =%s",
                       GetSQLValueString($gplus_id, "text"));

  mysql_select_db($database_GreenAssign3, $GreenAssign3);
  $ResultUid = mysql_query($queryUidSQL, $GreenAssign3) or die(mysql_error());
  $row_RsUid = mysql_fetch_assoc($ResultUid);
					$_SESSION['GA_u_id'] = $row_RsUid['u_id'];
					$_SESSION['GA_loggedin'] = false;
					$_SESSION['GA_name']=$request->get('displayName');
  					$_SESSION['email']= $request->get('gmailAddress');
					$_SESSION['gimageurl']=$request->get('gimageurl');
  				$response = 'http://www.greenassign.com/Signup/';
				//block 1 working 
            }
			else{
				//block 2 working 
				//somthings wrong
				//force sign up
				
				$response = 'http://www.greenassign.com/custom.php?forceSignup=onreadyTriggerASigninWithForceToGetRt';
				/*
				$insertSQL = sprintf("INSERT INTO user (gplus_id,name) VALUES (%s,%s)",
                       GetSQLValueString($gplus_id, "text"),
					   GetSQLValueString($request->get('displayName'), "text"));

  mysql_select_db($database_GreenAssign3, $GreenAssign3);
  $Result1 = mysql_query($insertSQL, $GreenAssign3) or die(mysql_error());
				*/
				//block 2 working 
			}
		}
		else{	
				
				
				
				//check for custom data
				//if no
				if($row_RsGid['custom']=='0')
				{	
					//block 3 working
					$_SESSION['GA_loggedin'] = false;
					$_SESSION['GA_u_id']= $row_RsGid['u_id'];
					$_SESSION['email']=$request->get('gmailAddress');
					$_SESSION['GA_name']=$request->get('displayName');
					$_SESSION['gimageurl']=$request->get('gimageurl');
					$response = 'http://www.greenassign.com/Signup/';
					//block 3 working
				}
				else
				{
					//check type
					//if type==student get his class details and  log student in and set session and send to url 
					//if teacher check if verified if yes get details and log teacher in and set session and send to url
					// if teacher not verified then only guest
					if($row_RsGid['type']=='student'){
									$_SESSION['email']=$request->get('gmailAddress');
									$_SESSION['gimageurl']=$request->get('gimageurl');
									$_SESSION['GA_usertype']="student";
									//$_SESSION['displayName']=$request->get('displayName');
									
									$colname_RsStudent = $request->get('gmailAddress');
									mysql_select_db($database_GreenAssign3, $GreenAssign3);
					$query_RsStudent = sprintf("SELECT * FROM user_student \n"
    . "JOIN class\n"
    . "ON us_class_id = class_id\n"
    . "\n"
    . "JOIN institute\n"
    . "ON class_insti_id = insti_id\n"
    . "\n"
    . "WHERE email = %s LIMIT 0, 30 ;", GetSQLValueString($colname_RsStudent, "text"));
									$RsStudent = mysql_query($query_RsStudent, $GreenAssign3) or die(mysql_error());
									$row_RsStudent = mysql_fetch_assoc($RsStudent);
									$totalRows_RsStudent = mysql_num_rows($RsStudent);
									
									$_SESSION['GA_loggedin'] = 1;
									$_SESSION['GA_pid'] = $row_RsStudent['us_pid'];
									$_SESSION['GA_rollno'] = $row_RsStudent['us_rollno'];
									$_SESSION['GA_name'] = $row_RsStudent['us_displayname'];
									$_SESSION['class_id']=$row_RsStudent['us_class_id'];
									$_SESSION['class_readablename']=$row_RsStudent['class_readablename'];
									$_SESSION['class_compactname']=$row_RsStudent['class_compactname'];
									$_SESSION['GA_batch']=$row_RsStudent['us_batch'];
									$_SESSION['GA_insti_id']=$row_RsStudent['class_insti_id'];
									$_SESSION['GA_institute']=$row_RsStudent['insti_abv'];
									$app['session']->set('token', json_encode($token));

									$response = 'http://www.greenassign.com/CollegeNews.php';
	
						}
					if($row_RsGid['type']=='teacher'){
							if($row_RsGid['verified']=='1'){
	
									//starts a new session.. not sure if its necessary
									//if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
									$_SESSION['gimageurl']=$request->get('gimageurl');
									$_SESSION['GA_usertype']="teacher";
									$_SESSION['email']=$request->get('gmailAddress');
									//$_SESSION['displayName']=$request->get('displayName');
									
									$colname_RsTeacher = $request->get('gmailAddress');
									mysql_select_db($database_GreenAssign3, $GreenAssign3);
									$query_RsTeacher = sprintf("SELECT `user_teacher`.*, `institute`.`insti_abv`  FROM user_teacher INNER JOIN institute ON `institute`.`insti_id`= `user_teacher`.`ut_insti_id` WHERE ut_email = %s", GetSQLValueString($colname_RsTeacher, "text"));
									$RsTeacher = mysql_query($query_RsTeacher, $GreenAssign3) or die(mysql_error());
									$row_RsTeacher = mysql_fetch_assoc($RsTeacher);
									$totalRows_RsTeacher = mysql_num_rows($RsTeacher);
									
									$_SESSION['GA_loggedin'] = true;
									$_SESSION['GA_ut_id'] = $row_RsTeacher['ut_id'];
									$_SESSION['GA_name'] = $row_RsTeacher['ut_displayname'];
									$_SESSION['MM_UserGroup'] = "";
									$_SESSION['MM_Username'] = $row_RsTeacher['ut_displayname'];
									$_SESSION['GA_institute'] = $row_RsTeacher['insti_abv'];
									$_SESSION['GA_insti_id'] = $row_RsTeacher['ut_insti_id'];
									$app['session']->set('token', json_encode($token));
											
				$colname_rsLoginSubs = "-1";
				if (isset($row_RsTeacher['ut_id'])) {
				  $colname_rsLoginSubs = $row_RsTeacher['ut_id'];
				}
				mysql_select_db($database_GreenAssign3, $GreenAssign3);
				$query_rsLoginSubs = sprintf("SELECT  `class` . * ,  `sub` . * 
FROM class
INNER JOIN sub
INNER JOIN subteacher ON  `class`.`class_id` =  `sub`.`sub_class_id` 
AND  `subteacher`.`subid` =  `sub`.`sub_id`
WHERE `subteacher`.`tid` = %s 
			ORDER BY `sub`.`sub_id` ASC", GetSQLValueString($colname_rsLoginSubs, "int"));
			
				$rsLoginSubs = mysql_query($query_rsLoginSubs, $GreenAssign3) or die(mysql_error());
				$row_rsLoginSubs = mysql_fetch_assoc($rsLoginSubs);
				$totalRows_rsLoginSubs = mysql_num_rows($rsLoginSubs);
				
			//enter the subs in the session array as well as the subs count
			$i=0;
				  do { 
					$_SESSION['MM_Subids'][$i]=array('subid' => $row_rsLoginSubs['sub_id'],'subabbv' => $row_rsLoginSubs['sub_abbv'], 'subname' => $row_rsLoginSubs['sub_name'], 'subclass' => $row_rsLoginSubs['class_readablename'], 'subclasscompact' => $row_rsLoginSubs['class_compactname'], 'classid' => $row_rsLoginSubs['class_id']);
				$i=$i+1;//while ($row_rsAssigns = mysql_fetch_assoc($rsAssigns));
			  } while ($row_rsLoginSubs = mysql_fetch_assoc($rsLoginSubs)); 
			  mysql_free_result($rsLoginSubs);
				$_SESSION['MM_Subcount']=$i;
				
					$response = 'http://www.greenassign.com/CollegeNews.php';
								}
								else{
									
									
									$_SESSION['gimageurl']=$request->get('gimageurl');
									$_SESSION['GA_usertype']="teacher";
									$_SESSION['email']=$request->get('gmailAddress');
									
									
									
									$colname_RsTeacher = $request->get('gmailAddress');
									mysql_select_db($database_GreenAssign3, $GreenAssign3);
									$query_RsTeacher = sprintf("SELECT `user_teacher`.*, `institute`.`insti_abv`  FROM user_teacher INNER JOIN institute ON `institute`.`insti_id`= `user_teacher`.`ut_insti_id` WHERE ut_email = %s", GetSQLValueString($colname_RsTeacher, "text"));
									
									$RsTeacher = mysql_query($query_RsTeacher, $GreenAssign3) or die(mysql_error());
									$row_RsTeacher = mysql_fetch_assoc($RsTeacher);
									$totalRows_RsTeacher = mysql_num_rows($RsTeacher);
									
									$_SESSION['GA_loggedin'] = true;
									$_SESSION['GA_name'] = $row_RsTeacher['ut_displayname'];
									$_SESSION['MM_UserGroup'] = "";
									$_SESSION['MM_Username'] = $row_RsTeacher['ut_displayname'];
									$_SESSION['GA_institute'] = $row_RsTeacher['insti_abv'];
									$_SESSION['GA_insti_id'] = $row_RsTeacher['ut_insti_id'];
									$app['session']->set('token', json_encode($token));
									
									$response = 'http://www.greenassign.com/CollegeNews.php';
									}
						}
					//if yes
					//set session data
					//Store the token in the session for later use.
					//$app['session']->set('email', $request->get('gmailAddress'));
					//$app['session']->set('galoggedin', true);
					//$app['session']->set('token', json_encode($token));
					//$app['session']->set('name', $request->get('displayName'));
					//$response = 'http://www.greenassign.com/home.php';
					
				}
			}
		
    } else {
        $response = 'http://www.greenassign.com/CollegeNews.php?token=BCTokenHai';
    }

    return new Response($response, 200);
});



$app->run();
//mysql_free_result($RsGid);
