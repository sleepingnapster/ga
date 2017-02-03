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
	$destination = __DIR__ . '/LecturePPTs/';
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
<?php if ($result) { 
	foreach ($result as $message) {
    $feedback.= $message." ";
}}
?>
<?php if (isset($finalName0)) {//echo "<p>".$finalName0."</p>";

//database entry
  $insertSQL = sprintf("INSERT INTO lectureppts (lec_filename, lec_uploadedby, lec_subid) VALUES (%s, %s, %s)",
                       GetSQLValueString($finalName0, "text"),
                       GetSQLValueString("Student", "text"),
                       GetSQLValueString($_POST['subid'], "int"));

  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($insertSQL, $greenassign) or die(mysql_error());

  $insertGoTo = "index.php?success=1";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
else{header ("Location:  index.php?success=0&subid=".$_POST['subid']."&feedback=".$feedback);}
//redirect back to upload page and send result message to that page to be diplayed
  ?>



