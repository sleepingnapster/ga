<?php
//check GET
//Check Session
//Check Cookie
//if cookie set > set session
//if cookie is not set > go to selectclass.php?page=TT.php
//header(gdocs...."classname.pdf")
session_start();
if(isset($_SESSION['class_compactname'])){
header("Location: http://docs.google.com/viewer?url=http%3A%2F%2Fgreenassign.com%2FSyllabus%2F".$_SESSION['class_compactname'].".pdf");
	exit;
}
header("Location: SelectClass.php?page=Syllabus");
exit;
?>