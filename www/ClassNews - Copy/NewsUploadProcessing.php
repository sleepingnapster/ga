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

$max = 1/2*1024 * 1024;
$feedback="";
$result = array();
if (isset($_POST['upload'])) {
	require '../src/foundationphp/UploadFile2.php';
	$destination = __DIR__ . '/ClassNewsImages/';
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
	echo "<p>".$message."</p>";
}
header(sprintf("Location: index.php?error=".$feedback));
}
?>
<?php if (isset($finalName0)) {echo "<p>".$finalName0."</p>";

//database entry
$tim=date("now");
  $insertSQL = sprintf("INSERT INTO classnews ( cn_collegeid, cn_img, cn_title, cn_by,  cn_uploaddate, cn_summary, cn_content, cn_class) VALUES (%s, %s, %s, %s,CURDATE(), %s, %s, %s )",
                       
                       GetSQLValueString($_POST['cn_collegeid'], "text"),
                       GetSQLValueString($finalName0, "text"),
                       GetSQLValueString($_POST['cn_title'], "text"),
                       GetSQLValueString($_POST['cn_by'], "text"),
                       GetSQLValueString($_POST['cn_summary'], "text"),
                       GetSQLValueString($_POST['cn_content'], "text"),
                       GetSQLValueString($_POST['cn_class'], "text")
                  );
					   
  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($insertSQL, $greenassign) or die(mysql_error());

  $insertGoTo = "index.php";//?feedback=.$feedback;
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>