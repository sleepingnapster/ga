<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GreenAssign - Custom</title>
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
        <header class="header">
            <a href="../index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                GreenAssign
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                
                <div class="navbar-right">
                    
                </div>
            </nav>
        </header>
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
                    <ul class="sidebar-menu">
                    <?php //include '../includes/menu.php';?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Sign Up Page
                        <small>Signup form testing</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Sign Up Page</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="col-md-6">
                            <!-- general form elements disabled -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Sign Up</h3> 
                                    
                                </div><!-- /.box-header -->
                                <form role="form">
                                <div class="box-body">
                                   
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="xyz"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control" placeholder="xyz@gmail.com" disabled/>
                                        </div>
										
                                        <!-- radio -->
                                        <div class="form-group">
                                        	<label>User Type</label>
                                            <div class="radio" onClick="">
                                                <label>
                                                    <input type="radio" name="usertype2" id="studentcall" value="student"  checked/>
                                                    Student
                                                </label>
                                            </div>

                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="usertype2" id="staffcall" value="teacher" />
                                                    Staff
                                                </label>
                                            </div>
                                        </div>
                                        <div id="student" style="display:block">
                                        <div class="form-group">
                                            <label>Select Class</label>
                                            <select class="form-control">
                                                <optgroup label="FE">
                                                  <option>FE A</option>
                                                  <option>FE B</option>
                                                  <option>FE C</option>
                                                  <option>FE D</option>
                                                  <option>FE E</option>
                                                  <option>FE F</option>
                                                </optgroup>
                                                <optgroup label="IT">
                                                  <option>IT SE A</option>
                                                  <option>IT SE B</option>
                                                  <option>IT TE A</option>
                                                  <option>IT TE B</option>
                                                  <option>IT BE A</option>
                                                  <option>IT BE B</option>
                                                </optgroup>
                                                <optgroup label="CMPN">
                                                  <option>CMPN SE A</option>
                                                  <option>CMPN SE B</option>
                                                  <option>CMPN TE A</option>
                                                  <option>CMPN TE B</option>
                                                  <option>CMPN BE A</option>
                                                  <option>CMPN BE B</option>
                                                </optgroup>
                                                <optgroup label="EXTC">
                                                  <option>EXTC SE A</option>
                                                  <option>EXTC SE B</option>
                                                  <option>EXTC TE A</option>
                                                  <option>EXTC TE B</option>
                                                  <option>EXTC BE A</option>
                                                  <option>EXTC BE B</option>
                                                </optgroup>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Roll Number</label>
                                            <input type="text" class="form-control" placeholder=""/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Pid Number</label>
                                            <input type="text" class="form-control" placeholder="122251"/>
                                        </div>
                                        </div>
                                        <br> <br>
                                        
                                        
                                         <div id="staff" style="display:block">
                                         
                                         	<div class="form-group">
                                        	<label>Category</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="usertype" id="usertype1" value="student"  checked/>
                                                    Teacher
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="usertype" id="usertype2" value="officestaff" />
                                                    Office Staff
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="usertype" id="usertype3" value="hod" />
                                                    HOD
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="usertype" id="usertype4" value="principal" />
                                                    Principal
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="usertype" id="usertype5" value="other" />
                                                    Other
                                                </label>
                                            </div>
                                        	</div>
                                            
                                         <!-- textarea -->
                                        <div class="form-group">
                                            <label>Short description</label>
                                            <textarea class="form-control" rows="4" placeholder="I teach 
TE CMPN B : OS
SE CMPN A : SOAD..."></textarea>
                                        </div>
                                       	</div>
                                        

                                    
                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                                
                            </div><!-- /.box -->
                        </div>
                    <br>
                    
                    
                    
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


<script type="text/javascript">
var helper = (function() {
  return {
    student: function() {
      
      $('#student').show('slow');
      $('#staff').hide();
    },
	staff: function() {
      
      $('#staff').show('slow');
      $('#student').hide();
    }
	
   
    
  };
})();

/**
 * Perform jQuery initialization and check to ensure that you updated your
 * client ID.
 */
$(document).ready(function() {
  $('#studentcall').click(helper.student);
  $('#staffcall').click(helper.staff);
});
</script>

</script>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
    </body>
</html>
