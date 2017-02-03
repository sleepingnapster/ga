<?php require_once('../Connections/greenassign.php'); ?>
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


use foundationphp\UploadFile;

$max = 7 * 1024 * 1024;
$feedback="";
$result = array();
if (isset($_POST['upload'])) {
	require '../src/foundationphp/UploadFile.php';
	$destination = "../submfiles/SFIT/".$_POST['subid']."/";
	try {
		$upload = new UploadFile($destination);
		//$upload->allowAllTypes();
		$upload->upload();
		$result = $upload->getMessages();
		$finalName0=$upload->getFinalName();
	} catch (Exception $e) {
		$result[] = $e->getMessage();
	}
}
?>
<?php if ($result) { foreach ($result as $message) {$feedback.= $message." ";}} ?>
<?php if (isset($finalName0)) {//echo "<p>".$finalName0."</p>";

//database entry

mysql_select_db($database_greenassign, $greenassign);
$query_rsAssign = sprintf("SELECT a_subdate FROM assign WHERE assign_id = %s", GetSQLValueString($_POST['ass_id'], "int"));
$rsAssign = mysql_query($query_rsAssign, $greenassign) or die(mysql_error());
$row_rsAssign = mysql_fetch_assoc($rsAssign);


if(time()<=strtotime($row_rsAssign['a_subdate'])){$status= "Submitted";}else{$status="Late";}
if($_POST['type']=='freshtype'){
	

  $insertSQL = sprintf("INSERT INTO submissions (subm_ass_id, subm_email, subm_file, subm_comment, subm_status) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ass_id'], "int"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($finalName0, "text"),
                       GetSQLValueString($_POST['comment'], "text"),
					   GetSQLValueString($status, "text"));
}
else if($_POST['type']=='replacetype')
{//update only status, submtime, comment, file, 

$colname_RsOldSubmissionFile = "-1";
if (isset($_POST['ass_id'])) {
  $colname_RsOldSubmissionFile = $_POST['ass_id'];
}
$colname2_RsOldSubmissionFile = "-1";
if (isset($_POST['email'])) {
  $colname2_RsOldSubmissionFile = $_POST['email'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_RsOldSubmissionFile = sprintf("SELECT subm_file FROM submissions WHERE subm_ass_id = %s AND subm_email=%s", GetSQLValueString($colname_RsOldSubmissionFile, "int"), GetSQLValueString($colname2_RsOldSubmissionFile, "text"));
$RsOldSubmissionFile = mysql_query($query_RsOldSubmissionFile, $greenassign) or die(mysql_error());
$row_RsOldSubmissionFile = mysql_fetch_assoc($RsOldSubmissionFile);
$totalRows_RsOldSubmissionFile = mysql_num_rows($RsOldSubmissionFile);
//delete old submission file

$file = "../submfiles/SFIT/".$_POST['subid']."/".$row_RsOldSubmissionFile['subm_file'];
unlink($file);


$insertSQL = sprintf("UPDATE submissions SET  subm_file=%s, subm_comment=%s, subm_status=%s, subm_timestamp=NOW() WHERE subm_email=%s AND subm_ass_id=%s ",      
		   GetSQLValueString($finalName0, "text"),
		   GetSQLValueString($_POST['comment'], "text"),
		   GetSQLValueString($status, "text"),
		   GetSQLValueString($_POST['email'], "text"),
		   GetSQLValueString($_POST['ass_id'], "int"));
	}

  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($insertSQL, $greenassign) or die(mysql_error());

  $insertGoTo = "index.php?success=1&subid=".$_POST['subid'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
else{header ("Location: assignview.php?subid=".$_POST['subid']."&assignid=".$_POST['ass_id']."&success=0&feedback=".$feedback);}
//redirect back to upload page and send result message to that page to be diplayed
  
mysql_free_result($RsOldSubmissionFile);
?>
