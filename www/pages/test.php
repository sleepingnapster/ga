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

$colname_rsLoginSubs = "-1";
if (isset($_POST['xxxxxxxx'])) {
  $colname_rsLoginSubs = $_POST['xxxxxxxx'];
}
mysql_select_db($database_greenassign, $greenassign);
$query_rsLoginSubs = sprintf("SELECT * FROM sub WHERE sub_by_tid = %s ORDER BY sub_id ASC", GetSQLValueString($colname_rsLoginSubs, "int"));
$rsLoginSubs = mysql_query($query_rsLoginSubs, $greenassign) or die(mysql_error());
$row_rsLoginSubs = mysql_fetch_assoc($rsLoginSubs);
$totalRows_rsLoginSubs = mysql_num_rows($rsLoginSubs);

mysql_free_result($rsLoginSubs);
?>
