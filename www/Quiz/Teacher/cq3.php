<?php require_once('../../Connections/greenassign.php'); ?>
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



$LastQuizID=-1;

//..insert of quiz title, by & type
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO quiz_tests (test_title, test_by, test_type) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['by'], "text"),
                       GetSQLValueString($_POST['type'], "text"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($insertSQL, $greenassign) or die(mysql_error());
  //..get quiz_id
  $LastQuizID = mysql_insert_id();
}



	
if($_POST['type']=='personal')
{
	//..enter quizid + classids 
	$aClass = $_POST['classcheckbox'];
    $N = count($aClass);
	
	$strclass="";
	
    for($i=1; $i < $N; $i++)
    {
      $strclass .= ", (NULL, '$LastQuizID', '$aClass[$i]')";
	}
	
 	$insertSQL2 = sprintf("INSERT INTO `hostrabb_greenassign`.`quiz_tests_classids` (`test_classids_id`, `test_id`, `class_id`) VALUES 
					(NULL, '$LastQuizID', '$aClass[0]')". 
					$strclass
					); 
		
  	mysql_select_db($database_greenassign, $greenassign);
  	$Result2 = mysql_query($insertSQL2, $greenassign) or die(mysql_error());
			
}
else
{
//..enter quiz id + subids 
	$aSub = $_POST['subcheckbox'];
	$N = count($aSub);
	
	$strsub="";
	
    for($i=1; $i < $N; $i++)
    {
      $strsub .= ", (NULL, '$LastQuizID', '$aSub[$i]')";
	}
	
 	$insertSQL3 = sprintf("INSERT INTO `hostrabb_greenassign`.`quiz_tests_subids` (`test_subids_id`, `test_id`, `sub_id`) VALUES 
					(NULL, '$LastQuizID', '$aSub[0]')". 
					$strsub
					); 
		
  	mysql_select_db($database_greenassign, $greenassign);
  	$Result3 = mysql_query($insertSQL3, $greenassign) or die(mysql_error());
	
}




header("Location: http://greenassign.com/Quiz/Teacher/CreateQuiz.php?q=".$LastQuizID);

?>

