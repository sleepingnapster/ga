<?php require_once('Connections/greenassign.php'); ?>
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

$maxRows_rsNews = 5;
$pageNum_rsNews = 0;
if (isset($_GET['pageNum_rsNews'])) {
  $pageNum_rsNews = $_GET['pageNum_rsNews'];
}
$startRow_rsNews = $pageNum_rsNews * $maxRows_rsNews;

mysql_select_db($database_greenassign, $greenassign);
$query_rsNews = "SELECT news_id, news_title, news_img, news_summary, news_content, news_by, news_date FROM news ORDER BY news_date DESC";
$query_limit_rsNews = sprintf("%s LIMIT %d, %d", $query_rsNews, $startRow_rsNews, $maxRows_rsNews);
$rsNews = mysql_query($query_limit_rsNews, $greenassign) or die(mysql_error());
$row_rsNews = mysql_fetch_assoc($rsNews);

if (isset($_GET['totalRows_rsNews'])) {
  $totalRows_rsNews = $_GET['totalRows_rsNews'];
} else {
  $all_rsNews = mysql_query($query_rsNews);
  $totalRows_rsNews = mysql_num_rows($all_rsNews);
}
$totalPages_rsNews = ceil($totalRows_rsNews/$maxRows_rsNews)-1;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ APPLICATION_NAME }}</title>
        <script type="text/javascript">
          (function() {
            var po = document.createElement('script');
            po.type = 'text/javascript'; po.async = true;
            po.src = 'https://plus.google.com/js/client:plusone.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(po, s);
          })();
        </script>
          <!-- JavaScript specific to this application that is not related to API
             calls -->
       	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>
     	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                GreenAssign
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right" id="galoggedout">
                    <ul class="nav navbar-nav">
                        <!-- Google+ Sign in Button -->
                        <li class="dropdown tasks-menu">
                        
                        <div id="gConnect" style="padding-top:9px">
                            <button class="g-signin"
                                data-scope="https://www.googleapis.com/auth/plus.login email"
                                data-requestvisibleactions="http://schemas.google.com/AddActivity"
                                data-clientId="{{ CLIENT_ID }}"
                                data-accesstype="offline"
                                data-callback="onSignInCallback"
                                data-theme="dark"
                                data-cookiepolicy="single_host_origin">
                            </button>
                          </div>
                          <div id="authOps"><div id="errors" style="display:none"><p></p></div></div>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right" id="galoggedin" style="display:block">
                    <ul class="nav navbar-nav">
                    	
                        <!-- User Account: style can be found in dropdown.less -->
                        <?php
                                if(!isset($_SESSION))
							{
								session_start();
								}
							if(isset($_SESSION['GA_name'])){//teacher links
								?>
  
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION['GA_name']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                 <!--   <img src="../../img/avatar3.png" class="img-circle" alt="User Image" />-->
                                 
                                 <img src="<?php echo $_SESSION['gimageurl']; ?>" class="img-circle" alt="User Image" />
                                    <p>
                                      <?php echo $_SESSION['GA_name'] ; ?>
                                        <small><?php echo 'SFITian - '.strtoupper($_SESSION['GA_usertype']);?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Blog</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="pages/logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li><?php }else{ ?>
                        
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                	
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                    menu
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    content header
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php do { ?>
                      <div class="col-xs-7">
                        <div class="box box-solid" >
                          <div class="box-header">
                            <h3 class="box-title"><?php echo "hk".$row_rsNews['news_title']; ?></h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body" align="center">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                      <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                      </ol>
                                      <div class="carousel-inner"><?php if(isset($row_rsNews['news_img'])){?>
                                        <div class="item active"> <img src="CollegeNews/NewsImages/<?php echo $row_rsNews['news_img']; ?>" alt="First slide">
                                          <div class="carousel-caption"> First Slide </div>
                                        </div>
                                        <div class="item"> <img src="CollegeNews/NewsImages/<?php echo $row_rsNews['news_img']; ?>" alt="Second slide">
                                          <div class="carousel-caption"> Second Slide </div>
                                        </div>
                                        <div class="item"> <img src="CollegeNews/NewsImages/<?php echo $row_rsNews['news_img']; ?>" alt="Third slide">
                                          <div class="carousel-caption"> Third Slide </div>
                                        </div><?php } ?>
                                      </div>
                                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> 
                                  </div>
                            <!-- /carousel -->
                            <br />
                            <!-- Default box -->
                                <div class="box collapsed-box">
                                      <div class="box-header">
                                        <h4 class="box-title"><?php echo $row_rsNews['news_summary']; ?></h4>
                                                <div class="box-tools pull-right">
                                                  <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
                                                </div>
                                      </div>
                                      <div class="box-body" style="display: none;">
                                            <h4><?php echo $row_rsNews['news_content']; ?></h4>
                                            <blockquote class="pull-left"> <small>Posted on <?php echo $row_rsNews['news_date']; ?></small> </blockquote>
                                            </h4>
                                            <blockquote class="pull-right"> <small>by <?php echo $row_rsNews['news_by']; ?></small> </blockquote>
                                            <br />
                                            <br />
                                      </div>
                                  <!-- /.box-body collapsed-box -->
                                </div>
                          </div>
                          <!-- /.box -->
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <?php } while ($row_rsNews = mysql_fetch_assoc($rsNews)); ?> 
                        
                        
                        
                        
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
    </body>
    <script type="text/javascript">
var helper = (function() {
  var authResult = undefined;
  var gid=undefined;
  return {
    /**
     * Hides the sign-in button and connects the server-side app after
     * the user successfully signs in.
     *
     * @param {Object} authResult An Object which contains the access token and
     *   other authentication information.
     */
    onSignInCallback: function(authResult) {
     
      if (authResult['access_token']) {
        // The user is signed in
        this.authResult = authResult;
		//get id, displayName, image.url
		gapi.client.load('plus','v1',this.getUserDetails);
		//
      } else if (authResult['error']) {
        // There was an error, which means the user is not signed in.
        // As an example, you can troubleshoot by writing to the console:
        console.log('There was an error: ' + authResult['error']);
        $('#authResult').append('Logged out');
        $('#authOps').hide('slow');
        $('#gConnect').show();
      }
      console.log('authResult', authResult);
    },
   
	/**
	* get gplus id and email
	*/
	getUserDetails: function() {
      var request = gapi.client.plus.people.get( {'userId' : 'me'} );
      
	  request.execute( function(profile) {
         console.log('profile', profile);
          if (profile.error) {
            console.log('profile error', profile.error);
            return;
          }
		  gid=profile.id;
		  var gId= profile.id;
		  var gName= profile.displayName;
		  var gImageUrl= profile.image.url;
		  var gmailAddress=profile.emails[0].value;
        helper.connectServer(gId,gName,gImageUrl,gmailAddress);
        });
		
    },
    
	
    /**
     * Calls the server endpoint to connect the app for the user. The client
     * sends the one-time authorization code to the server and the server
     * exchanges the code for its own tokens to use for offline API access.
     * For more information, see:
     *   https://developers.google.com/+/web/signin/server-side-flow
     */
    connectServer: function(gid,gname,gimageurl,gmailAddress) {
      console.log(this.authResult.code);
      $.ajax({
        type: 'POST',
        url: window.location.href + '/connect?state={{ STATE }}&gplus_id='+gid+'&displayName='+gname+'&gmailAddress='+gmailAddress+'&gimageurl='+gimageurl,
        contentType: 'application/octet-stream; charset=utf-8',
        success: function(result) {
          console.log('connectServer',result);
          //$('#errors').append(result);
		  if(result=='Loggedin'){}
		  else{
		  window.location=result;}
        },
        processData: false,
        data: this.authResult.code
      });
    },
    
  };
})();

/**
 *
 * Calls the helper method that handles the authentication flow.
 *
 * @param {Object} authResult An Object which contains the access token and
 *   other authentication information.
 *
 */
function onSignInCallback(authResult) {
  helper.onSignInCallback(authResult);
}
</script>
</html>
