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
if(!isset($_SESSION))
{
	session_start();
}


use foundationphp\UploadFile;

$max = 1024 * 1024;
$feedback="";
$result = array();
if (isset($_POST['upload'])) {
	require '../src/foundationphp/UploadFile2.php';
	$destination = __DIR__ . '/NewsImages/';
	try {
		$upload = new UploadFile($destination);
		//$upload->allowAllTypes();
		$upload->upload();
		$result = $upload->getMessages();
		$finalName0=$upload->getFinalName();
		$fileNameToDb=$upload->getfileNameToDb();
	} catch (Exception $e) {
		$result[] = $e->getMessage();
	}
}
//echo "<p>hey1</p>";
?>
<?php if ($result) { 
	foreach ($result as $message) {
    $feedback.= $message." ";
}

$colstr="";
$i=0;
$colval="";


//header(sprintf("Location: index.php?error=".$feedback));
}
?>
<?php if (isset($finalName0)) {//echo "<p>".$finalName0."</p>";

foreach ($fileNameToDb as $fileToDb) {
	
	$colstr.="news_img".$i.", ";
	$i++;
	$colval.= GetSQLValueString($fileToDb, "text");
	$colval.= ",";
}
//echo ">>>".$colval."<<<";
//database entry
$tim=date("now");
  $insertSQL = sprintf("INSERT INTO news ( news_insti_id, news_img,".$colstr."news_imgcount, news_title, news_summary, news_content, news_email, news_by, news_date) VALUES (%s, %s,".$colval." ".$i.", %s,  %s, %s, %s, %s, CURDATE())",
                       
					   GetSQLValueString($_SESSION['insti_id'], "int"),
                       GetSQLValueString($finalName0, "text"),
					   GetSQLValueString($_POST['news_title'], "text"),
                       GetSQLValueString($_POST['news_summary'], "text"),
                       GetSQLValueString($_POST['news_content'], "text"),
                       GetSQLValueString($_POST['news_email'], "text"),
                       GetSQLValueString($_POST['news_by'], "text")
                  );
					   
  mysql_select_db($database_greenassign, $greenassign);
  $Result1 = mysql_query($insertSQL, $greenassign) or die(mysql_error());

  $insertGoTo = "../CollegeNews.php";//?feedback=.$feedback;
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>