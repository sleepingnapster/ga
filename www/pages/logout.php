<?php




set_include_path(get_include_path() . PATH_SEPARATOR .'../vendor/google/apiclient/src');

require_once '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__,
));
$app->register(new Silex\Provider\SessionServiceProvider());



// *** Logout the current user.
$logoutGoTo = "http://greenassign.com";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;

$_SESSION['email'] = NULL;
$_SESSION['gimageurl'] = NULL;
$_SESSION['GA_usertype'] = NULL;
$_SESSION['GA_name'] = NULL;
$_SESSION['GA_loggedin'] = 0;
$_SESSION['class'] = NULL;
$_SESSION['GA_pid'] = NULL;
$_SESSION['GA_tid'] = NULL;
$_SESSION['GA_rollno'] = NULL;
$_SESSION['MM_Subids'] = NULL;


unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
unset($_SESSION['email']);
unset($_SESSION['GA_usertype']);
unset($_SESSION['GA_name']);
unset($_SESSION['GA_rollno']);
unset($_SESSION['class']);
unset($_SESSION['GA_pid']);
unset($_SESSION['GA_tid']);
unset($_SESSION['MM_Subids']);
 session_destroy();
//$app['session']->destroy();
//gapi.auth.signOut();


if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>
