<?php use foundationphp\UploadFile;
require '../src/foundationphp/UploadFile2.php';
$max=1024*1024+1;
?>
<?php
if(!isset($_SESSION))
{
	session_start();
}
 if(!((isset($_SESSION['GA_name']))&&(isset($_SESSION['email'])))){header("Location: ../");exit;} ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GreenAssign</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
         <?php include '../includes/header.php';
         if (!isset($_SESSION['maxfiles'])) {
	$_SESSION['maxfiles'] = 5;
	$_SESSION['postmax'] = UploadFile::convertToBytes(ini_get('post_max_size'));
	$_SESSION['displaymax'] = UploadFile::convertFromBytes($_SESSION['postmax']);
}?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                	<?php /*
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
					*/?>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    
                    <?php include '../includes/menu.php';?>
                    
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><i class="fa fa-bullhorn"></i>
                        &nbsp;&nbsp;SFIT News
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">SFIT News</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                
                
                
                 <form action="NewsUploadProcessing.php" method="POST" name="form" enctype="multipart/form-data">
<p>



<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
<label for="filename">Upload File:</label>
</p>

                  
                 	
                     <div class="col-md-12 col-lg-8">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Post New News</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="cn_title" class="form-control" placeholder="Enter ..." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Summary</label>
                                        <input type="text" name="cn_summary" class="form-control" placeholder="Enter ..."/>
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea class="form-control" name="cn_content" rows="3" placeholder="Enter ..."></textarea>
                                    </div>
                                 	<div class="form-group">
                                            <label for="exampleInputFile">Upload Image</label>
                                            <input type="file" name="filename[]" id="filename" multiple
                                            data-maxfiles="<?php echo $_SESSION['maxfiles'];?>"
                                            data-postmax="<?php echo $_SESSION['postmax'];?>"
                                            data-displaymax="<?php echo $_SESSION['displaymax'];?>">
                                            <p class="help-block"><ul>
    <li>Up to <?php echo $_SESSION['maxfiles'];?> files can be uploaded simultaneously.</li>
    <li>Each file should be no more than <?php echo UploadFile::convertFromBytes($max);?>.</li>
    <li>Combined total should not exceed <?php echo $_SESSION['displaymax'];?>.</li>
</ul></p>
                                	</div>
                                </div>
                                <div class="box-footer">
                                
					<input type="hidden" name="cn_by_email" value="<?php echo $_SESSION['email'];?>">
					<input type="hidden" name="cn_by_usertype" value="<?php echo $_SESSION['GA_usertype'];?>"> 
                    <input type="text" name="cn_class_id" value="<?php if(isset($_SESSION['class_id'])){echo $_SESSION['class_id'];}else{
					 header(sprintf("Location: ../pages/SelectClass.php?page=ClassNews"));} ?>" hidden>
                    <input type="text" name="cn_by" value="<?php echo $_SESSION['GA_name']; ?>" hidden>
                 	<input type="submit" class="btn btn-primary" name="upload" value="Upload File"/>
                                </div>
            		</div>
                                       
                    
                    </form>
                  <p>&nbsp;</p>
                </section>
                <!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
       
        <script src="../js/checkmultiple.js"></script>
    </body>
</html>