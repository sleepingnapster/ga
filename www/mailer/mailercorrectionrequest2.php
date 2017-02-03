<?php 
if (!isset($_SESSION)) {
  session_start();
}

// multiple recipients

$to = 'ryanaugustine@greenassign.com';

// subject
$subject = 'GA Correction Request';

// message
$message = '
Name:----'.$_POST["name0"].'<br>';

for($i=0;$i<$_SESSION['MM_Subcount'];$i++){                                 

$message.= "Subject ".$i." ".$_SESSION['MM_Subids'][$i]['subname']." (".$_SESSION['MM_Subids'][$i]['subabbv'].") ".$_SESSION['MM_Subids'][$i]['subclass']."<br>";
}
$message .='<br>Comments:-----'.$_POST["comments0"];
$message .='<br>Email:---'.$_POST["email0"].'
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From:GreenAssign<no-reply@greenassign.com>' . "\r\n";
$headers .= "Reply-To: GreenAssign<no-reply@greenassign.com>\r\n";

// Mail it
mail($to, $subject, $message, $headers);


header(sprintf("Location: ../Profile/?changerequest=1"));
?>