<?php
//session start
if (!isset($_SESSION)) {
  session_start();
}

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
//$redirect_uri = 'http://'.$_SERVER['SERVER_NAME'];
$redirect_uri = 'http://'.$_SERVER['SERVER_NAME'].'/';



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
	
	
	
	
	
	
	
		if(!$idPresent){
				//new user
				//block 1 working
				//insert new user to db and redirect to Signup
  $insertSQL = sprintf("INSERT INTO user (gplus_id,name,picture,email,entrytime) VALUES (%s,%s,%s,%s,now())",
                       GetSQLValueString( $user->id, "text"),
					   GetSQLValueString($user->name, "text"),
					   GetSQLValueString($user->picture, "text"),
					   GetSQLValueString($user->email, "text"));

  mysql_select_db($database_GreenAssign3, $GreenAssign3);
  $Result1 = mysql_query($insertSQL, $GreenAssign3) or die(mysql_error());
  
  
  $queryUidSQL = sprintf("SELECT u_id FROM user WHERE gplus_id =%s",
                       GetSQLValueString($user->id, "text"));
  mysql_select_db($database_GreenAssign3, $GreenAssign3);
  $ResultUid = mysql_query($queryUidSQL, $GreenAssign3) or die(mysql_error());
  $row_RsUid = mysql_fetch_assoc($ResultUid);
  
					$_SESSION['GA_u_id'] 		=$row_RsUid['u_id'];
					$_SESSION['GA_gplus_id']	=$user->id;
					$_SESSION['GA_name']		=$user->name;
  					$_SESSION['email']			=$user->email;
					$_SESSION['gimageurl']		=$user->picture;
					$_SESSION['GA_loggedin'] 	=false;
					
					
				//check if the techer is already registered by admin in user_teacher
				//check via email
				//if registered go to newpage verified-teacher-registration.php 
				//in that page we will update u_id confirm display name ...select * fromm that row and update session and then go to collegenews.php
				//update custom=1 and usertype = teacher
				
					$colname_RsTeacher0 = $user->email;
					mysql_select_db($database_GreenAssign3, $GreenAssign3);
					$query_RsTeacher = sprintf("SELECT  * FROM `user_teacher` WHERE ut_email = %s", GetSQLValueString($colname_RsTeacher0, "text"));
					$RsTeacher0 = mysql_query($query_RsTeacher, $GreenAssign3) or die(mysql_error());
					$row_RsTeacher0 = mysql_fetch_assoc($RsTeacher0);
					$totalRows_RsTeacher0 = mysql_num_rows($RsTeacher0);
					
				
				if($totalRows_RsTeacher0==1)
				{
					
					//Update 'user' set custom=1 and user_type='teacher'
					//custom..type..verified
					
					$updateSQL01 = sprintf("UPDATE `greenass_gadb`.`user` SET `custom` = 1, `type` = 'teacher', `verified` = 1 WHERE `user`.`u_id` = %s ;",
					GetSQLValueString( $row_RsUid['u_id'], "int"));
					mysql_select_db($database_GreenAssign3, $GreenAssign3);
					$Result01 = mysql_query($updateSQL01, $GreenAssign3) or die(mysql_error());
					
					
					//update user_teacher set signup timestamp, ut_u_id
					$updateSQL02 = sprintf("UPDATE `greenass_gadb`.`user_teacher` SET `ut_verified` = 1, `ut_u_id` = %s  WHERE `user_teacher`.`ut_email` = %s ;",
					GetSQLValueString( $row_RsUid['u_id'], "int"),
					GetSQLValueString( $user->email, "text"));
					mysql_select_db($database_GreenAssign3, $GreenAssign3);
					$Result02 = mysql_query($updateSQL02, $GreenAssign3) or die(mysql_error());
					
					
					
					
					//google data in session
					$_SESSION['GA_usertype']="teacher";
					//$_SESSION['displayName']=$request->get('displayName');
					
					$colname_RsTeacher = $user->id;
					mysql_select_db($database_GreenAssign3, $GreenAssign3);
					$query_RsTeacher = sprintf("SELECT  `user_teacher`. * ,  `institute`.`insti_abv` 
					FROM user_teacher
					INNER JOIN user ON  `user`.`u_id` =  `user_teacher`.`ut_u_id` 
					INNER JOIN institute ON  `institute`.`insti_id` =  `user_teacher`.`ut_insti_id` 
					WHERE gplus_id = %s", GetSQLValueString($colname_RsTeacher, "text"));
					$RsTeacher = mysql_query($query_RsTeacher, $GreenAssign3) or die(mysql_error());
					$row_RsTeacher = mysql_fetch_assoc($RsTeacher);
					$totalRows_RsTeacher = mysql_num_rows($RsTeacher);
					
					/*
					ut_id
					ut_u_id
					ut_insti_id
					ut_email
					ut_imageurl
					ut_displayname
					ut_description
					insti_abv
					*/
					
					$_SESSION['GA_loggedin'] = true;
					$_SESSION['GA_ut_id'] = $row_RsTeacher['ut_id'];
					$_SESSION['GA_name'] = $row_RsTeacher['ut_displayname'];
					$_SESSION['MM_UserGroup'] = "";
					$_SESSION['MM_Username'] = $row_RsTeacher['ut_displayname'];
					$_SESSION['GA_institute'] = $row_RsTeacher['insti_abv'];
					$_SESSION['GA_insti_id'] = $row_RsTeacher['ut_insti_id'];
					//$app['session']->set('token', json_encode($token));
					
					/*
					ut_id
					ut_u_id
					ut_insti_id
					ut_email
					ut_imageurl
					ut_displayname
					ut_description
					teacherforsubforbatch_id*
					teacherforsubforbatch_subforbatch*
					teacherforsubforbatch_teacher_id
					teacherforsubforbatch_desc
					subforbatch_id*
					subforbatch_batch_id*
					subforbatch_sub_id
					subforbatch_des
					sub_id
					sub_class_id
					sub_name
					sub_abbv
					batch_id
					batch_class_id
					batch_number
					batch_des
					class_id
					class_insti_id
					class_compactname
					class_capacity
					class_readablename
					*/

						
					$colname_rsLoginSubs = "-1";
					if (isset($row_RsTeacher['ut_id'])) {
					  $colname_rsLoginSubs = $row_RsTeacher['ut_id'];
					}
					mysql_select_db($database_GreenAssign3, $GreenAssign3);
					$query_rsLoginSubs = sprintf("SELECT * 
					FROM  `user_teacher` 
					JOIN activeteacherforsubforbatch ON teacherforsubforbatch_teacher_id = ut_id
					JOIN activesubforbatch ON teacherforsubforbatch_subforbatch = subforbatch_id
					JOIN sub ON sub_id = subforbatch_sub_id
					JOIN activebatch ON subforbatch_batch_id = batch_id
					JOIN activeclass ON batch_class_id = class_id
					WHERE ut_id = %s
					GROUP BY class_id, sub_id
					ORDER BY  `sub`.`sub_id` ASC", GetSQLValueString($colname_rsLoginSubs, "int"));
				
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
			
		 // echo '_SESSION: ' + $_SESSION['MM_Subids'][0]['subabbv'];
		  
		  
				
					header('Location: http://'.$_SERVER['SERVER_NAME'].'/CollegeNews.php');
					exit;
									
					
				}	
					
  				header('Location: http://'.$_SERVER['SERVER_NAME'].'/Signup/');
				exit;
				//block 1 working 
            
		}
		//existing user
		else{	
				
				//check for custom data
				//existing user with no custom data
				//block 3 working
				
				if($row_RsGid['custom']=='0')
				{	
					//block 3 working
					$_SESSION['GA_loggedin'] = false;
					$_SESSION['GA_u_id']= $row_RsGid['u_id'];
					$_SESSION['GA_gplus_id']=$user->id;
					$_SESSION['email']=$user->email;
					$_SESSION['gimageurl']=$user->picture;
					$_SESSION['GA_name']=$user->name;
					
					
					header('Location: http://'.$_SERVER['SERVER_NAME'].'/Signup/');
					exit;
					
				}
				else
				{
					//check type
					//if type==student get his class details and  log student in and set session and send to url 
					//if teacher check if verified if yes get details and log teacher in and set session and send to url
					// if teacher not verified then only guest
					if($row_RsGid['type']=='student'){
						
						
											//update name+email+pic
											/*				
									$updateSQL = sprintf("UPDATE `greenass_gadb`.`user` SET `name` =  %s , `picture` = %s , `email` = %s   WHERE `user`.`u_id` = %s ;)",
									GetSQLValueString($user->name, "text"),
									GetSQLValueString($user->picture, "text"),
									GetSQLValueString($user->email, "text"),
									GetSQLValueString( $user->id, "text"));
				
									mysql_select_db($database_GreenAssign3, $GreenAssign3);
									$Result2 = mysql_query($updateSQL, $GreenAssign3) or die(mysql_error());
											*/
						
						
						
											//update pic
									if($user->picture!=$row_RsGid['picture']){
										$updateSQL = sprintf("UPDATE `greenass_gadb`.`user` SET`picture` = %s  WHERE `user`.`u_id` = %s ;",
										GetSQLValueString($user->picture, "text"),
										GetSQLValueString( $user->id, "text"));
										mysql_select_db($database_GreenAssign3, $GreenAssign3);
										$Result2 = mysql_query($updateSQL, $GreenAssign3) or die(mysql_error());
									}
						
									$_SESSION['GA_gplus_id']=$user->id;
									$_SESSION['email']=$user->email;
									$_SESSION['gimageurl']=$user->picture;
									$_SESSION['GA_usertype']="student";
									
									$colname_RsStudent = $user->id;
									mysql_select_db($database_GreenAssign3, $GreenAssign3);
									
									$query_RsStudent = sprintf("SELECT * 
									FROM (
									SELECT user_student . * , user . * 
									FROM user_student
									INNER JOIN user ON user_student.us_u_id = user.u_id
									WHERE gplus_id = %s
									) AS ss
									JOIN activestudentbatch ON ss.us_id = studentbatch_student
									JOIN activebatch ON studentbatch_batch = batch_id
									JOIN activeclass ON class_id = batch_class_id
									JOIN institute ON class_insti_id = insti_id
									LIMIT 0 , 1", GetSQLValueString($colname_RsStudent, "text"));
												
									$RsStudent = mysql_query($query_RsStudent, $GreenAssign3) or die(mysql_error());
									$row_RsStudent = mysql_fetch_assoc($RsStudent);
									$totalRows_RsStudent = mysql_num_rows($RsStudent);
									
									/*
us_id
us_u_id
us_email
us_imageurl
us_displayname
us_pid
u_id
gplus_id
email
name
picture
rt
entrytime
custom
type
verified
phone0
facebook0
instagram0
twitter0
location0
aboutme0
studentbatch_id
studentbatch_batch
studentbatch_student
studentbatch_rollnumber
studentbatch_des
batch_id
batch_class_id
batch_number
batch_des
class_id
class_insti_id
class_timestate
class_compactname
class_capacity
class_readablename
insti_id
insti_abv
insti_fullname
insti_logo
insti_about
									*/
									
									$_SESSION['GA_loggedin'] = 1;
									$_SESSION['GA_u_id'] 	= $row_RsStudent['u_id'];
									$_SESSION['GA_us_id'] 	= $row_RsStudent['us_id'];
									$_SESSION['GA_pid'] 	= $row_RsStudent['us_pid'];
									$_SESSION['GA_name'] 	= $row_RsStudent['us_displayname'];
									$_SESSION['GA_rollno'] 	= $row_RsStudent['studentbatch_rollnumber'];
									$_SESSION['GA_batch_id'] 	= $row_RsStudent['batch_id'];
									$_SESSION['GA_batch_number'] = $row_RsStudent['batch_number'];
									
									$_SESSION['GA_class_id'] = $row_RsStudent['class_id'];
									$_SESSION['GA_class_readablename'] = $row_RsStudent['class_readablename'];
									$_SESSION['GA_class_compactname'] = $row_RsStudent['class_compactname'];
									
									$_SESSION['class_id'] = $row_RsStudent['class_id'];
									$_SESSION['class_readablename'] = $row_RsStudent['class_readablename'];
									$_SESSION['class_compactname'] = $row_RsStudent['class_compactname'];
									$_SESSION['GA_insti_id'] = $row_RsStudent['insti_id'];
									$_SESSION['GA_institute'] = $row_RsStudent['insti_abv'];
									//$_SESSION['GA_institute_name']=$row_RsStudent['insti_fullname'];
									$_SESSION['GA_timestate'] = 'active';
									
									
									//echo "<h1>".$row_RsStudent['us_u_id']."*".$row_RsStudent['us_id']."*".$row_RsStudent['us_pid']."*".$row_RsStudent['us_rollno']."*".$row_RsStudent['us_displayname']."*".$row_RsStudent['batch_id']."*".$row_RsStudent['batch_number']."*".$row_RsStudent['us_class_id']."*".$row_RsStudent['class_readablename']."*".$row_RsStudent['class_compactname']."*".$row_RsStudent['us_batch']."*".$row_RsStudent['class_insti_id']."*".$row_RsStudent['insti_abv']."</h1>";
									//$app['session']->set('token', json_encode($token));

									header('Location: http://'.$_SERVER['SERVER_NAME'].'/CollegeNews.php');
									exit;
	
						}
					if($row_RsGid['type']=='teacher'){
							if($row_RsGid['verified']=='1'){
									//verified teachers working
								
	
									//starts a new session.. not sure if its necessary
									//if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
									$_SESSION['gimageurl']=$user->picture;
									$_SESSION['GA_usertype']="teacher";
									$_SESSION['email']=$user->email;
									//$_SESSION['displayName']=$request->get('displayName');
									
									$colname_RsTeacher = $user->id;
									mysql_select_db($database_GreenAssign3, $GreenAssign3);
									$query_RsTeacher = sprintf("SELECT  `user_teacher`. * ,  `institute`.`insti_abv` 
									FROM user_teacher
									INNER JOIN user ON  `user`.`u_id` =  `user_teacher`.`ut_u_id` 
									INNER JOIN institute ON  `institute`.`insti_id` =  `user_teacher`.`ut_insti_id` 
									WHERE gplus_id = %s", GetSQLValueString($colname_RsTeacher, "text"));
									$RsTeacher = mysql_query($query_RsTeacher, $GreenAssign3) or die(mysql_error());
									$row_RsTeacher = mysql_fetch_assoc($RsTeacher);
									$totalRows_RsTeacher = mysql_num_rows($RsTeacher);
									
									/*
									ut_id
									ut_u_id
									ut_insti_id
									ut_email
									ut_imageurl
									ut_displayname
									ut_description
									insti_abv
									*/
									
									$_SESSION['GA_loggedin'] = true;
									$_SESSION['GA_ut_id'] = $row_RsTeacher['ut_id'];
									$_SESSION['GA_name'] = $row_RsTeacher['ut_displayname'];
									$_SESSION['MM_UserGroup'] = "";
									$_SESSION['MM_Username'] = $row_RsTeacher['ut_displayname'];
									$_SESSION['GA_institute'] = $row_RsTeacher['insti_abv'];
									$_SESSION['GA_insti_id'] = $row_RsTeacher['ut_insti_id'];
									//$app['session']->set('token', json_encode($token));
							/*				
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
				*/

			/*
ut_id
ut_u_id
ut_insti_id
ut_email
ut_imageurl
ut_displayname
ut_description
teacherforsubforbatch_id*
teacherforsubforbatch_subforbatch*
teacherforsubforbatch_teacher_id
teacherforsubforbatch_desc
subforbatch_id*
subforbatch_batch_id*
subforbatch_sub_id
subforbatch_des
sub_id
sub_class_id
sub_name
sub_abbv
batch_id
batch_class_id
batch_number
batch_des
class_id
class_insti_id
class_compactname
class_capacity
class_readablename
*/

						
				$colname_rsLoginSubs = "-1";
				if (isset($row_RsTeacher['ut_id'])) {
				  $colname_rsLoginSubs = $row_RsTeacher['ut_id'];
				}
				mysql_select_db($database_GreenAssign3, $GreenAssign3);
				$query_rsLoginSubs = sprintf("SELECT * 
				FROM  `user_teacher` 
				JOIN activeteacherforsubforbatch ON teacherforsubforbatch_teacher_id = ut_id
				JOIN activesubforbatch ON teacherforsubforbatch_subforbatch = subforbatch_id
				JOIN sub ON sub_id = subforbatch_sub_id
				JOIN activebatch ON subforbatch_batch_id = batch_id
				JOIN activeclass ON batch_class_id = class_id
				WHERE ut_id = %s
				GROUP BY class_id, sub_id
				ORDER BY  `sub`.`sub_id` ASC", GetSQLValueString($colname_rsLoginSubs, "int"));
			
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
			
		 // echo '_SESSION: ' + $_SESSION['MM_Subids'][0]['subabbv'];
		  
		  
				
					header('Location: http://'.$_SERVER['SERVER_NAME'].'/CollegeNews.php');
					exit;
								}
								else{
									/*
									
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
									
									//$response = 'http://'.$_SERVER['SERVER_NAME'].'/CollegeNews.php';
									header('Location: http://'.$_SERVER['SERVER_NAME'].'/CollegeNews.php');
									exit;
									
									*/
									}
						}
					//if yes
					//set session data
					//Store the token in the session for later use.
					//$app['session']->set('email', $request->get('gmailAddress'));
					//$app['session']->set('galoggedin', true);
					//$app['session']->set('token', json_encode($token));
					//$app['session']->set('name', $request->get('displayName'));
					//$response = 'http://'.$_SERVER['SERVER_NAME'].'/home.php';
					
				}
			}
	
	/*
	$result = $mysqli->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
	$user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist
	*/
	//show user picture
	/*
	echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
	
	if(false) //if user already exist change greeting text to "Welcome Back"
    {
        echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    }
	else //else greeting text "Thanks for registering"
	{ 
        echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
		$statement = $mysqli->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (?,?,?,?,?)");
		$statement->bind_param('issss', $user->id,  $user->name, $user->email, $user->link, $user->picture);
		$statement->execute();
		echo $mysqli->error;
    }
	
	//print user details
	echo '<pre>';
	print_r($user);
	echo '</pre>';
	*/
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
