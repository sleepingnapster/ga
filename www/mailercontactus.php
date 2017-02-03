<?php 
if (!isset($_SESSION)) {
  session_start();
}

// multiple recipients

$to = 'ryanaugustine@greenassign.com';

// subject
$subject = 'GA Contact-us';

// message
$message = '
Name:'.$_POST["nameyo"].'<br>
Message:'.$_POST["messageyo"].'<br>
Contact:'.$_POST["phoneyo"].'<br>
Email:'.$_POST["emailyo"].'
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From:GreenAssign<no-reply@greenassign.com>' . "\r\n";
$headers .= "Reply-To: GreenAssign<no-reply@greenassign.com>\r\n";

// Mail it
mail($to, $subject, $message, $headers);


header(sprintf("Location: index.php?msgsent=1"));
?>