<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GreenAssign</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="file:///C|/wamp/www/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="file:///C|/wamp/www/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="file:///C|/wamp/www/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="file:///C|/wamp/www/css/AdminLTE.css" rel="stylesheet" type="text/css" />
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
            <a href="file:///C|/wamp/www/index.html" class="logo">
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
                	
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                    
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Sign Up
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Blank page</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					<div class="col-md-6">
                       	<!-- general form elements disabled -->
                        <div class="box box-warning">
                            <div class="box-header">
                                <h3 class="box-title">General Elements</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                    <div class="form-group">
                                    <br>
                                    <label>Select User Type</label>
                                    <select class="form-control" id="institute">
                                         <option value="" id="null"></option>
                                        <optgroup label="Colleges">
                                          <option  value="sfit">Sfit : St. Francis Institute of Technology</option>
                                        </optgroup>   
                                        <optgroup label="Schools">
                                          <option value="svpv">Svpv : Sardar Vallabhai Patel Vidhiyalay</option>
                                        </optgroup>
                                      </select>
                                    </div>
                                    
                                    <!--sfit -->
                                    <div id='sfit' style="display:none">
                                    <div class="form-group">
                                    <br>
                                    <label>Select Your Institute</label>
                                    <select class="form-control" id="sfittype">
                                         <option value="" id="null"></option>
                                          <option value="sfitstudent">Student</option>
                                          <option value="sfitstaff">Staff</option>
                                      </select>
                                    </div>
                                    
                                    <!-- sfitstudent -->
                                    <div id="sfitstudent" style="display:none">
                                    
                                	<form action="" name="sfitstudentform" role="form">
                                    <div class="form-group"><br>
                                        <label>Confirm Your Display Name</label>
                                        <input type="text" class="form-control" name="studentname" value="Ryan Augustine"/>
                                    </div>
                                    <div class="form-group">
                                    
                                    <label>Select Your Class</label>
                                    <select class="form-control">
                                          <option></option>
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
                                          <option>SE A</option>
                                          <option>SE B</option>
                                          <option>TE A</option>
                                          <option>TE B</option>
                                          <option>BE A</option>
                                          <option>BE B</option>
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
                                        <input type="text" class="form-control" placeholder="Example : 73"/>
                                    </div>
                                    <div class="form-group">
                                    <label>Select Batch</label>
                                    <select class="form-control">
                                        <optgroup label="">
                                          <option>Batch 1</option>
                                          <option>Batch 2</option>
                                          <option>Batch 3</option>
                                          <option>Batch 4</option>
                                        </optgroup>
                                      </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Pid Number</label>
                                        <input type="text" class="form-control" placeholder="Example : 122251"/>
                                    </div>
                                        <input type="text" value="sfit" name="institute" hidden/>
                                     	<input type="text" value="sfitstudent" name="usertype" hidden/>
                                        <button type="submit" class="btn btn-primary">Sign Up</button>
                                        </form>
                                    </div><!-- end of sfitstudent -->
                                    
                                    
                                    
                                    
                                    
                                    <!-- sfitstaff -->
                                    <div id="sfitstaff" style="display:none">
                                    
                                	<form action="" name="sfitstudentform" role="form">
                                    <div class="form-group"><br>
                                        <label>Confirm Your Display Name</label>
                                        <input type="text" class="form-control" name="staffname" value="Ryan Augustine"/>
                                    </div>
                                    <div class="form-group">
                                    
                                        <label>Teacher id (if any)</label>
                                        <input type="text" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                    <br>
                                    <label>Short description of your role in the institute</label>
                                    <textarea class="form-control" rows="7" placeholder="Example: 
I am a Lecturer. 
Subjects I Teach...
TE CMPN B : OS
TE CMPN A : OS
SE CMPN A : M4"></textarea>
                                    </div>
                                     <input type="text" value="sfit" name="institute" hidden/>
                                     <input type="text" value="sfitstaff" name="usertype" hidden/>
                                     <button type="submit" class="btn btn-primary">Sign Up</button>
                                    </form>
                                    </div><!-- end of sfitstaff -->
                                    </div><!-- end of sfit -->
                                    
                                    
                                    <div id="svpv" style="display:none">
                                    
                                    <p>Coming soon</p>
                                    
                                    </div><!-- end of svpv -->
                                    
                                    
                                    

                                </form>
                               
                                    
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                        </div >
                        
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script>
 
$(document).ready(function(){

	$("#sfittype").change(function(){
	switch ($("#sfittype option:selected").val()) { 
    case 'sfitstudent': 
		$("#sfitstudent").show();
		$("#sfitstaff").hide();
        break;
    case 'sfitstaff':
        $("#sfitstudent").hide();
		$("#sfitstaff").show();
		break;
    default:
        $("#sfitstudent").hide();
		$("#sfitstaff").hide();
		alert("Transfer Thai Gayo");
}
	  });
	
	$("#institute").change(function(){
	switch ($("#institute option:selected").val()) { 
    case 'sfit': 
		$("#sfit").show();
		$("#svpv").hide();
        break;
    case 'svpv': 
        $("#sfit").hide();
		$("#svpv").show();
		break;
    default:
        $("#sfit").hide();
		$("#svpv").hide();
		alert("Transfer Thai Gayo");
}
	  });
		 
});

</script>
        <!-- Bootstrap -->
        <script src="file:///C|/wamp/www/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="file:///C|/wamp/www/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="file:///C|/wamp/www/js/AdminLTE/demo.js" type="text/javascript"></script>
    </body>
</html>
