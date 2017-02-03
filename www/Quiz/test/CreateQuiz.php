<?php require_once('../../Connections/greenassign.php'); ?>
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

//all

//my

//subs
//yet to test <down>
$class=-1;
		if(isset($_SESSION['GA_usertype'])&&($_SESSION['GA_usertype']=="teacher")&&(isset($_SESSION['GA_ut_id']))){//teacher links
		
		
		
//temp fix..later will change to VIEW ONLY page and create an edit link-button there 

for($i=0;$i<$_SESSION['MM_Subcount'];$i++){ 
	//echo $i; 
 	$_SESSION['MM_Subids'][$i]['subabbv'];
 	$_SESSION['MM_Subids'][$i]['subclass']; 
 } 	
}

//yet to test ^^

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GreenAssign</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <!-- god make this work (TOP) -->
        
<script async src="AllQuestions_files/beacon.js"></script><script async src="AllQuestions_files/beacon.js"></script><script async src="file://www.googletagmanager.com/gtm.js?id=GTM-D2VF"></script><script type="text/javascript" async src="file://www.googleadservices.com/pagead/conversion_async.js"></script><script async src="AllQuestions_files/beacon.js"></script><script type="text/javascript" async src="AllQuestions_files/ga.js"></script><script async src="AllQuestions_files/beacon.js"></script><script async src="file://www.googletagmanager.com/gtm.js?id=GTM-D2VF"></script><script type="text/javascript" async src="file://www.googleadservices.com/pagead/conversion_async.js"></script><script async src="AllQuestions_files/beacon.js"></script><script type="text/javascript" async src="AllQuestions_files/ga(1).js"></script><script async defer src="AllQuestions_files/visits"></script><script type="text/javascript" async src="AllQuestions_files/conversion_async(1).js"></script><script async src="AllQuestions_files/beacon(1).js"></script><script type="text/javascript" async src="AllQuestions_files/ga(2).js"></script><script async src="AllQuestions_files/gtm(1).js"></script><script type="text/javascript">google_color_link="3b5998"; google_color_url ="000000";google_ad_region = "test"; google_color_border ="fffff0";</script>
<style type="text/css"></style><style>.cke{visibility:hidden;}</style><script src="AllQuestions_files/application2.js" async defer data-cfasync="false"></script><style type="text/css">.olark-key,#hbl_code,#olark-data{display: none !important;}</style><link id="habla_style_div" type="text/css" rel="stylesheet" href="AllQuestions_files/f05ffc48c6c2db2c188e1ab1cf4db117.css"><style type="text/css">@media print {#habla_beta_container_do_not_rely_on_div_classes_or_names {display: none !important}}</style><style>.cke{visibility:hidden;}</style><style>.cke{visibility:hidden;}</style></head><body style="cursor: auto;"><div id="olark" style="display: none;"><olark><iframe frameborder="0" id="olark-loader"></iframe></olark></div><input type="hidden" id="idquiz" value="1188913" name="idquiz">
<input type="hidden" id="changevalue" value="0" name="changevalue">
<input type="hidden" id="mathplug" value="" name="mathplug">
<link rel="stylesheet" type="text/css" href="AllQuestions_files/manage_css.php">
 
 
<script type="text/javascript" src="AllQuestions_files/jquery.min.js"></script>
<script src="AllQuestions_files/jquery.ie-select-width.js"></script>
<script src="AllQuestions_files/jquery-ui.min.js"></script>
<script type="text/javascript" src="AllQuestions_files/jquery_lock.js"></script>
<script type="text/javascript" src="AllQuestions_files/jquery.tipsy.js"></script>
<script type="text/javascript" src="AllQuestions_files/jquery.simplemodal.js"></script>
 
<script type="text/javascript" src="AllQuestions_files/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="AllQuestions_files/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" type="text/css" href="AllQuestions_files/jquery.fancybox1.css" media="screen">
 
<script type="text/javascript" src="AllQuestions_files/ckeditor.js"></script>
<link type="text/css" href="AllQuestions_files/sample.css" rel="stylesheet">
<script type="text/javascript" src="AllQuestions_files/jquery.qtip-1.0.0-rc3.min.js"></script>
<link type="text/css" href="AllQuestions_files/basic-create.css" rel="stylesheet" media="screen">
 
<script language="JavaScript" type="text/javascript" src="AllQuestions_files/jquery.labelify.js"></script>
<script type="text/javascript" src="AllQuestions_files/jquery.alerts_new_quiz.js"></script>
<script type="text/javascript" src="AllQuestions_files/btn_DragDrop.js"></script>
<script type="text/javascript" src="AllQuestions_files/slimScroll.js"></script>
 
<script type="text/javascript" src="AllQuestions_files/yahoo-min.js"></script>
<script type="text/javascript" src="AllQuestions_files/plupload.js"></script>
<script type="text/javascript" src="AllQuestions_files/plupload.flash.js"></script>
<script type="text/javascript" src="AllQuestions_files/plupload.html5.js"></script>
<script type="text/javascript" src="AllQuestions_files/import_quiz_edit_manage.js"></script>
<script language="JavaScript" type="text/javascript">var dvcounter = 0;  var totalQuestionDiv=0;</script>
<script type="text/javascript" src="AllQuestions_files/title-match_2.js"></script>
<script type="text/javascript" src="AllQuestions_files/titlevalidate.js"></script>
<script type="text/javascript" src="AllQuestions_files/MakeQuiz.js"></script>
<script type="text/javascript" src="AllQuestions_files/fancy.js"></script>
<script type="text/javascript" src="AllQuestions_files/suggestme_edit_manage.js"></script>
<script type="text/javascript" src="AllQuestions_files/signup.js"></script>
<script type="text/javascript" src="AllQuestions_files/jquery.alerts_animate.js"></script>
<link rel="stylesheet" type="text/css" href="AllQuestions_files/new_home_signup.css" media="screen">
<link rel="stylesheet" type="text/css" href="AllQuestions_files/image_upload_css.css" media="screen">
<link rel="stylesheet" type="text/css" href="AllQuestions_files/jquery.alerts_animate.css" media="screen">
<script type="text/javascript" src="AllQuestions_files/delay_login.js"></script>
<script type="text/javascript">
function createUploaderForVideos(divCounter, uniqueFileName, uploadType)
{}

function createUploaderForDocs(divCounter, uniqueFileName, uploadType)
{}
</script>  
<script type="text/javascript"> 
	  $('.cke_button__iframe_icon').live("click", function(){});
	  	   //Start Mukesh
		
		$('#myonoffswitch').live('click', function(){});
	//End code Mukesh
	
$(function ()
{
    
    // Set the width via CSS.
    $('select.sel_combo').ieSelectWidth
    ({
        containerClassName : 'select-container',
        overlayClassName : 'select-overlay'
    });
});

</script>
<script type="text/javascript">
	
	
	
	 function updateQuestion(ddl)
		{
			var index = ddl.selectedIndex;
			var topdiv = "topdiv-"+index;
			
			for(var i=0; i<=8;i++)
			 {
				 if(i==index && topdiv=="topdiv-"+i)
				 {
					 document.getElementById("topdiv-"+i).style.display="block";
					 document.getElementById(i).style.display="block";
				 }
				 else
				 {
					 document.getElementById("topdiv-"+i).style.display="none";
					 document.getElementById(i).style.display="none";
				 }
			 }
			
		 }
	
	function openPreview()
	{}

	/*for question examples*/
	 $("#question_examples").live("click", function(e){});
    </script>
<script type="text/javascript">
        function enableTitle()
   {
     $('.us_preview').tipsy({gravity:'s',html: true});       
   }
   
   function enableTitle_point()
    {
	
	
      $('.us_preview1').tipsy({gravity:'s',html: true});  
	 //$('.us_preview_1').tipsy({gravity:'s',html: true});  
	
    }
        /* durgesh */
		$("#import_question_popup_wizard").live("click", function(e){});
       // $("#import_question_popup_wizard").live("click", function(e){
//            e.preventDefault();
//                $('#basic-modal-content_import_question').modal({
//                    maxHeight: 500,
//                    maxWidth: 750                                
//            });
//         });
         /* ----- */
		 $("#show_instructions").live("click", function(e){});
		 
		 /*for question examples*/
	
					  
			$("#Assign_Points").live("click", function(e){});	
	 
  
	
        </script>
 
<link href="AllQuestions_files/QMcssdesign-60.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="AllQuestions_files/pp-icons.css" media="screen">
 
        <!-- god make this work (DOWN) -->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include '../../includes/header.php';?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                   
                    <?php include '../../includes/menu.php';?>
                    
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Create Quiz
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="../QuizList.php"> Quiz</a></li>
                        <li class="active">Create Quiz</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- START CUSTOM TABS -->
                    <h2 class="page-header"></h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block1" style="border-top:0;">
<div id="newbuttnarea" style="width: 322px; float: left; position: fixed; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(221, 221, 221); min-height: 817px;">
<div style="">
<div class="search_suggest_me">
<div class="clear"></div>
<div id="error" class="bgSection_warning" style="margin-left: 10px; width: 293px; display:none; margin-bottom:3px;">
<div id="error_message">Type keywords to search.<br></div>
</div>


</div>


<br>
<style>.buttndiv{float:left;width:131px;padding:2.4px 11px 3.4px 11px!important;border-radius:4px 4px 4px 4px;}#multiple_choice_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/radio_moon.png?v=1") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:48%!important;height:34px!important;font-size:12px!important;font-color:#3C8BCA!important;}#multiple_choice_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/hvr_radio_moon.png")!important;border-radius:4px;width:48%!important;height:34px!important;font-size:12px!important;color:#F1F1F2!important;}#checkbox_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/checkbox.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:46%!important;height:34px!important;font-size:12px!important;font-color:#3C8BCA!important;}#checkbox_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/hvr_checkbox.png")!important;border-radius:4px;46%!important;height:34px!important;font-size:12px!important;color:#F1F1F2!important;}#true_false_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/true_false.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:48%!important;height:34px!important;font-size:12px!important;font-color:#3C8BCA!important;}#true_false_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/hvr_true_false.png")!important;border-radius:4px;width:48%!important;height:34px!important;font-size:12px!important;color:#F1F1F2!important;}#fill_blanks_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/fill_plain.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;background-position:8px!important;width:46%!important;height:34px!important;font-size:12px!important;font-color:#3C8BCA!important;}#fill_blanks_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/fill_hover.png")!important;background-position:8px!important;border-radius:4px;width:46%!important;height:34px!important;font-size:12px!important;color:#F1F1F2!important;}#essay_ques_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/essay.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:48%!important;height:34px!important;font-size:12px!important;font-color:#3C8BCA!important;}#essay_ques_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/hvr_essay.png")!important;border-radius:4px;width:48%!important;height:34px!important;font-size:12px!important;color:#F1F1F2!important;}#matching_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/match.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:46%!important;height:34px!important;font-size:12px!important;font-color:#3C8BCA!important;}#matching_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/hvr_match.png")!important;border-radius:4px;width:46%!important;height:34px!important;font-size:12px!important;color:#F1F1F2!important;}#Text_Note_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/article.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:48%!important;height:34px!important;font-size:12px!important;font-color:#3C8BCA!important;}#Text_Note_btn_free{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/Article-grey.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:48%!important;height:34px!important;font-size:12px!important;color:#B2B2B2!important;}#Text_Note_btn_free:hover{background-color:#e8e8e8!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/Article-grey.png")!important;border-radius:4px;width:48%!important;height:34px!important;font-size:12px!important;color:#3C8BCA!important;}#Text_Note_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/hvr_article.png")!important;border-radius:4px;width:48%!important;height:34px!important;font-size:12px!important;color:#F1F1F2!important;}#Documnet_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/document.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:46%!important;height:34px!important;font-size:12px!important;font-color:#3C8BCA!important;}#Documnet_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/hvr_document.png")!important;border-radius:4px;width:46%!important;height:34px!important;font-size:12px!important;color:#F1F1F2!important;}#Documnet_btn_free{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/Document_grey.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:46%!important;height:34px!important;font-size:12px!important;color:#B2B2B2!important;}#Documnet_btn_free:hover{background-color:#e8e8e8!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/Document_grey.png")!important;border-radius:4px;width:46%!important;height:34px!important;font-size:12px!important;color:#3C8BCA!important;}#Video_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/video.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:48%!important;height:34px!important;font-size:12px!important;color:#3C8BCA!important;}#Video_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/hvr_video.png")!important;border-radius:4px;width:48%!important;height:34px!important;font-size:12px!important;color:#F1F1F2!important;}#Video_btn_free{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/Video-grey.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:48%!important;height:34px!important;font-size:12px!important;color:#B2B2B2!important;}#Video_btn_free:hover{background-color:#e8e8e8!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/Video-grey.png")!important;border-radius:4px;width:48%!important;height:34px!important;font-size:12px!important;color:#3C8BCA!important;}#Import_questions_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/import.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:48%!important;height:34px!important;font-size:12px!important;font-color:#3C8BCA!important;}#Import_questions_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/hvr_import.png")!important;border-radius:4px;width:48%!important;height:34px!important;font-size:12px!important;color:#F1F1F2!important;}#Import_questions_btn_free{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/Imprt-grey.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:48%!important;height:34px!important;font-size:12px!important;color:#B2B2B2!important;}#Import_questions_btn_free:hover{background-color:#e8e8e8!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/Imprt-grey.png")!important;border-radius:4px;width:48%!important;height:34px!important;font-size:12px!important;color:#3C8BCA!important;}#Manage_Points_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/manage.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;border-radius:4px;color:#3C8BCA!important;width:46%!important;height:35px!important;font-size:12px!important;font-color:#3C8BCA!important;}#Manage_Points_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 4px;background-image:url("manageimg/hvr_manage.png")!important;border-radius:4px;width:46%!important;height:35px!important;font-size:12px!important;color:#F1F1F2!important;}#reorder_btn{background-color:#F3F3F4!important;cursor:pointer;background:url("manageimg/reorder.png") no-repeat scroll left center rgba(0,0,0,0);margin:0px 0px 0px 9px;border-radius:4px;color:#3C8BCA!important;width:48%!important;height:34px!important;font-size:12px!important;font-color:#3C8BCA!important;}#reorder_btn:hover{background-color:#3C8BCA!important;no-repeatscroll left center rgba(0,0,0,0);margin:0px 0px 0px 9px;background-image:url("manageimg/hvr_reorder.png")!important;border-radius:4px;width:48%!important;height:34px!important;font-size:12px!important;color:#F1F1F2!important;}</style>
<div style="float: left; width: 50%; margin-left: 3%;  margin-bottom: 5%;" id="multiple_choice_btn">
<span class="newbtn1 show_tooltip_left buttndiv ui-draggable" href="javascript:void(0);" title="" ondragstart="setid(&#39;1&#39;)" onclick="edit_Ques_Multi_Choice();" style="text-decoration: none; cursor: pointer; position: relative;"><strong class="plusSign" id="multiple_choice">&nbsp;&nbsp;</strong>&nbsp;<span style="margin-left:10px; font-size:13px;" id="hover_multiple_choice">Multiple Choice</span></span>
</div>
<div style="float: left; width: 47%; " id="checkbox_btn">
<span class="newbtn1 show_tooltip1 buttndiv ui-draggable" href="javascript:void(0);" title="" ondragstart="setid(&#39;2&#39;)" onclick="edit_Ques_Multi();" style="margin: 0px; text-decoration: none; width: 122px; padding: 2.4px 12px !important; position: relative;"><strong class="plusSign" id="checkbox">&nbsp;&nbsp;</strong>&nbsp;<span style="margin-left:10px; font-size:13px;">Checkbox</span></span>
</div>
<br>
<div class="clear"></div>

<div style="float: left; width: 43%;  margin-left: 3%; margin-bottom: 5%;" id="fill_blanks_btn">
<span class="newbtn1 show_tooltip1 buttndiv ui-draggable" href="javascript:void(0);" title="" ondragstart="setid(&#39;4&#39;)" onclick="edit_Ques_fill();" style="margin: 0px; text-decoration: none; width: 122px; padding: 2.4px 12px !important; position: relative;"><strong class="plusSign" id="fill_blanks">&nbsp;&nbsp;</strong>&nbsp;<span style="margin-left:7px; font-size:13px;">Fill in the blank</span></span>
</div>
<br>
<div class="clear"></div>


<br>
<div class="clear"></div>


<br>
<div class="clear"></div>

<div class="clear"></div>
<hr style="width: 296px; margin-left:11px;">
<p align="center" style="float: left; margin-left: 3px; margin-bottom: -5px; font-weight: bold; width: 98px; color:#666666;">Other Options &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<br>
<div class="clear"></div>
 
<div style="float: left; width: 150px; margin-left: 9px;  margin-bottom: 17px;" id="Import_questions_btn_free">
<span id="show_instructions" onclick="$(&#39;#pmsg&#39;);" style="padding: 8px 6px 8px 10px; text-decoration: none; position: relative;" class="newbtn1 show_tooltip_left buttndiv special_import ui-draggable" href="javascript:void(0);" title=""><strong class="plusSign" id="Import_questions">&nbsp;&nbsp;</strong><span style="margin-left:11px; font-size:13px; ">Import Questions</span></span>
</div>
<div style="float: left;  width: 161px; margin-bottom: 17px;" id="Manage_Points_btn">
<span class="newbtn1 show_tooltip1 buttndiv ui-draggable" id="manage_points_manage" onclick="manage_points_manage();" title="" style="text-decoration: none; width: 122px; padding: 3.4px 12px !important; position: relative;"><strong class="plusSign" id="Manage_Points">&nbsp;&nbsp;</strong><span style="margin-left:11px; font-size:13px;">Manage Points</span></span>
</div>
<div style="float: left; width: 161px; margin-left: 9px;  margin-bottom: 17px;" id="reorder_btn">
<span class="newbtn1 show_tooltip_left buttndiv ui-draggable" id="reorder_link_new1" onclick="reorder_link_new();" title="" style="margin: 0px; text-decoration: none; width: 130px; padding: 6.4px 12px !important; position: relative;"><strong class="plusSign" id="reorder"></strong><span style="margin-left:11px; font-size:13px;">&nbsp;Reorder Questions</span></span>
</div>
</div>
<div class="clear"></div>
<br>
</div>
 
 
<div style="width: auto; margin-left: 310px; float: none; min-height: 817px;" class="main_block">
<div id="message_imported" class="message_imported"> Questions Imported To Your Quiz</div>
<div id="stylized" class="myform" style="z-index: -1; margin-top: 0px; width:633px;">
<div class="formright" style="width:630px; margin-left:0;">
<div class="main_slideDiv">
<span>
<input type="hidden" id="title_quiz" name="title_quiz" value="1">
<div id="title_h1" class="title_h1 fullhover fr_main_slideDiv" style="float: left; font-size: 17px; font-weight: bold; margin-top: 3px; width: 623px; cursor: pointer; background: rgb(255, 255, 255);">Untitled Quiz</div>&nbsp;&nbsp;
<div class="show_hide" style="font-weight: bold; text-decoration:none; text-align:justify; width:623px; cursor: pointer;">
<div id="sur_discription" class="fullhover" style="font-size: 12px; margin-top: 0px; padding: 3px 4px 3px 1px; margin-right: 7px; background: rgb(255, 255, 255);">
</div>
<hr style="width: 623px; margin:10px 0px 10px 0px;">

</div>
<input type="hidden" value="0" id="click_text">
<div id="box_area" align="center" style="display:none"></div>
<div class="middledv" name="middledv" id="middledv">
<ul style="width: 628px;" class="elist ui-sortable" id="elist">
 
<li id="reorder_question_31438995" name="T2" class="dragclass">
<div title="Click here to edit" class="questionchoice" id="radio_questype2" style="padding: 0 0 0px; width:623px;">
<input type="hidden" name="currentdropId" id="currentdropId" value="2">
<div class="quesdetailpopup point_assign" id="quesdetailpopup click_edit_multi_2" style=" height:auto;">
<form enctype="multipart/form-data" name="clickto_insert_quest2" id="clickto_insert_quest2" method="POST" action="">
<input type="hidden" value="multi" name="question_type_sur_2" id="question_type_sur_2">
<input type="hidden" value="1188913" id="current_QuizId" name="current_QuizId">
<div id="getresponse2" class="editrespdata11" onclick="get_question_details(2)">
<div class="editques_popup" id="edit_multi_ques2" style="height:auto; margin-left:4px; padding:8px 0 0 0;">
<div id="question_full_31438995" class="main" style=""><div style="font-size:12px; font-weight: normal;" id="question_part_full1" class="lefttopper"><div style="float:left; margin-left:0px; width: 14px;"><p style="font_size:12px"><strong class="reset_counter" style="margin-left:0px;">2.</strong></p></div><div style="width:505px; float:left; margin-left: 10px" class="question_bx"><p><strong style="" class="text">after r</strong></p></div><div class="clear"></div><div><div class="lefttopper" style="margin-left:0px; font-size:12px; margin-bottom:-5px;"><table cellspacing="10px" style="margin-left:15px"><tbody><tr><td style="width:16px;"><input type="checkbox" disabled="disabled"></td><td><span style="font-weight:normal;">e</span></td></tr><tr><td style="width:16px;"><input type="checkbox" disabled="disabled" checked="checked"></td><td><span style="font-weight:normal;">s</span></td></tr><tr><td style="width:16px;"><input type="checkbox" disabled="disabled"></td><td><span style="font-weight:normal;">t</span></td></tr><tr><td style="width:16px;"><input type="checkbox" disabled="disabled" checked="checked"></td><td><span style="font-weight:normal;">s</span></td></tr></tbody></table></div></div></div></div>
</div>
</div><input class="hid_reset_ques_order" type="hidden" value="31438995" name="hidden_question_ques_2" id="hidden_question_ques_2"><input type="hidden" value="1188913" name="hidden_quiz_id2" id="hidden_quiz_id2">
</form>
</div>
<input type="hidden" value="1" id="drugupdate2" class="drugupdate" name="drugupdate"><div class="clear"></div><div class="border_visible"><div class="icon"><div title="Click here to edit" class="edit_btn quesdetailpopup" onclick="get_question_details(2)" id="click_edit_multi_2">Edit</div><div class="plus_icon plus_icon2" id="multi_choice2"><input type="hidden" name="copy_ques2" id="copy_ques2" value="31438995"><img id="changcopyid2" src="AllQuestions_files/add.png" onclick="duplicate_ques(2);" title="Copy question" style="padding: 2px;"></div><div class="drag_icon"><img src="AllQuestions_files/drag.png" title="Use to drag" style="padding: 2px;"></div></div><div style="float:left;width: 345px; height:36px;" title="Click here to edit" class="quesdetailpopup" onclick="get_question_details(2)" id="click_edit_multi_2"></div><div style="float:right;"><div id="real_name_2" style="border-left: 1px solid rgb(221, 221, 221); float: left; height: 26px; border-right: 1px solid rgb(221, 221, 221); padding: 10px 16px 0px 12px; font-weight: bold;">Checkbox</div><div style="float:right; margin-right:7px;"><div class="delete_ico"><img src="file:///D:/ryan/Work/Rips/images/delete_1.png" onmouseover="test();" onmouseout="test_out();" onclick="delete_question(2)" title="Delete" style="padding: 2px; margin-top: 0px; margin-left: 0px;"></div></div></div></div><div class="clear"></div></div>
</li><li id="reorder_question_31438960" name="T1" class="dragclass">
<div title="Click here to edit" class="questionchoice" id="radio_questype1" style="padding: 0 0 0px; width:623px;">
<input type="hidden" name="currentdropId" id="currentdropId" value="1">
<div class="quesdetailpopup point_assign" id="quesdetailpopup click_edit_multi_1" style=" height:auto;">
<form enctype="multipart/form-data" name="clickto_insert_quest1" id="clickto_insert_quest1" method="POST" action="">
<input type="hidden" value="multichoice" name="question_type_sur_1" id="question_type_sur_1">
<input type="hidden" value="1188913" id="current_QuizId" name="current_QuizId">
<div id="getresponse1" class="editrespdata11" onclick="get_question_details(1)">
<div class="editques_popup" id="edit_multi_ques1" style="height:auto; margin-left:4px; padding:8px 0 0 0;">
<div id="question_full_31438960" class="main" style=""><div style="font-size:12px; font-weight: normal;" id="question_part_full1" class="lefttopper"><div style="float:left; margin-left:0px; width: 14px;"><p style="font_size:12px"><strong class="reset_counter" style="margin-left:0px;">1.</strong></p></div><div style="width:505px; float:left; margin-left: 10px" class="question_bx"><p><strong style="" class="text">after c</strong></p></div><div class="clear"></div><div><div class="lefttopper" style="margin-left:0px; font-size:12px; margin-bottom:-5px;"><table cellspacing="10px" style="margin-left:15px"><tbody><tr><td style="width:16px;"><input type="radio" disabled="disabled"></td><td><span style="font-weight:normal;">r</span></td></tr><tr><td style="width:16px;"><input type="radio" disabled="disabled"></td><td><span style="font-weight:normal;">d</span></td></tr><tr><td style="width:16px;"><input type="radio" disabled="disabled" checked="checked"></td><td><span style="font-weight:normal;">e</span></td></tr><tr><td style="width:16px;"><input type="radio" disabled="disabled"></td><td><span style="font-weight:normal;">s</span></td></tr></tbody></table></div></div></div></div>
</div>
</div><input class="hid_reset_ques_order" type="hidden" value="31438960" name="hidden_question_ques_1" id="hidden_question_ques_1"><input type="hidden" value="1188913" name="hidden_quiz_id1" id="hidden_quiz_id1">
</form>
</div>
<input type="hidden" value="1" id="drugupdate1" class="drugupdate" name="drugupdate"><div class="clear"></div><div class="border_visible"><div class="icon"><div title="Click here to edit" class="edit_btn quesdetailpopup" onclick="get_question_details(1)" id="click_edit_multi_1">Edit</div><div class="plus_icon plus_icon1" id="multi1"><input type="hidden" name="copy_ques1" id="copy_ques1" value="31438960"><img id="changcopyid1" src="AllQuestions_files/add.png" onclick="duplicate_ques(1);" title="Copy question" style="padding: 2px;"></div><div class="drag_icon"><img src="AllQuestions_files/drag.png" title="Use to drag" style="padding: 2px;"></div></div><div style="float:left;width: 345px; height:36px;" title="Click here to edit" class="quesdetailpopup" onclick="get_question_details(1)" id="click_edit_multi_1"></div><div style="float:right;"><div id="real_name_1" style="border-left: 1px solid rgb(221, 221, 221); float: left; height: 26px; border-right: 1px solid rgb(221, 221, 221); padding: 10px 16px 0px 12px; font-weight: bold;">Multiple Choice</div><div style="float:right; margin-right:7px;"><div class="delete_ico"><img src="file:///D:/ryan/Work/Rips/images/delete_1.png" onmouseover="test();" onmouseout="test_out();" onclick="delete_question(1)" title="Delete" style="padding: 2px; margin-top: 0px; margin-left: 0px;"></div></div></div></div><div class="clear"></div></div>
</li>
 

</ul>
</div>
<input type="hidden" value="2" id="totalquestion_edit" name="totalquestion_edit">
<input type="hidden" name="loggedinuserid" id="loggedinuserid" value="1329476">
<input type="hidden" name="loggedinusername" id="loggedinusername" value="">
<script language="javascript">
			var filterwords = [' quiz ',' Quiz ',' test ',' online ',' online quiz ',' quizzes ', ' testing ', ' exam ', ' 1 ', ' part ', ' certification ', ' practice ', ' set ', ' part ',' question ',' questions ',' answer ',' answers ',' correct ',' incorrect ',' trivia ',' assessment ',' course ',' questionnaire ',' training ',' final ',' knowledge ',' pre ',' post ',' mode ',' part ',' volume ',' board ',' form ',' chapter ',' untitled quiz ',' untitled ',' a ', ' able ', ' about ', ' above ', ' across ', ' after ', ' afterwards ', ' again ', ' against ', ' all ', ' almost ', ' alone ', ' along ', ' already ', ' also ', ' although ', ' always ', ' am ', ' among ', ' amongst ', ' amoungst ', ' amount ', ' an ', ' and ', ' another ', ' any ', ' anyhow ', ' anyone ', ' anything ', ' anyway ', ' anywhere ', ' are ', ' around ', ' as ', ' at ', ' back ', ' be ', ' became ', ' because ', ' become ', ' becomes ', ' becoming ', ' been ', ' before ', ' beforehand ', ' behind ', ' being ', ' below ', ' beside ', ' besides ', ' between ', ' beyond ', ' bill ', ' both ', ' bottom ', ' but ', ' by ', ' call ', ' can ', ' cannot ', ' cant ', ' co ', ' con ', ' could ', ' couldnt ', ' cry ', ' de ', ' dear ', ' describe ', ' detail ', ' did ', ' do ', ' does ', ' done ', ' down ', ' due ', ' during ', ' each ', ' eg ', ' eight ', ' either ', ' eleven ', ' else ', ' elsewhere ', ' empty ', ' enough ', ' etc ', ' even ', ' ever ', ' every ', ' everyone ', ' everything ', ' everywhere ', ' except ', ' few ', ' fifteen ', ' fify ', ' fill ', ' find ', ' fire ', ' first ', ' five ', ' for ', ' former ', ' formerly ', ' forty ', ' found ', ' four ', ' from ', ' front ', ' full ', ' further ', ' get ', ' give ', ' go ', ' got ', ' had ', ' has ', ' hasnt ', ' have ', ' he ', ' hence ', ' her ', ' here ', ' hereafter ', ' hereby ', ' herein ', ' hereupon ', ' hers ', ' him ', ' his ', ' how ', ' however ', ' hundred ', ' i ', ' ie ', ' if ', ' in ', ' inc ', ' indeed ', ' interest ', ' into ', ' is ', ' it ', ' its ', ' just ', ' keep ', ' last ', ' latter ', ' latterly ', ' least ', ' less ', ' let ', ' like ', ' likely ', ' ltd ', ' made ', ' many ', ' may ', ' me ', ' meanwhile ', ' might ', ' mill ', ' mine ', ' more ', ' moreover ', ' most ', ' mostly ', ' move ', ' much ', ' must ', ' my ', ' name ', ' namely ', ' neither ', ' never ', ' nevertheless ', ' next ', ' nine ', ' no ', ' nobody ', ' none ', ' noone ', ' nor ', ' not ', ' nothing ', ' now ', ' nowhere ', ' of ', ' off ', ' often ', ' on ', ' once ', ' one ', ' only ', ' onto ', '  or  ', ' other ', ' others ', ' otherwise ', ' our ', ' ours ', ' ourselves ', ' out ', ' over ', ' own ', ' part ', ' per ', ' perhaps ', ' please ', ' put ', ' rather ', ' re ', ' said ', ' same ', ' say ', ' says ', ' see ', ' seem ', ' seemed ', ' seeming ', ' seems ', ' serious ', ' several ', ' she ', ' should ', ' show ', ' side ', ' since ', ' sincere ', ' six ', ' sixty ', '  so  ', ' some ', ' somehow ', ' someone ', ' something ', ' sometime ', ' sometimes ', ' somewhere ', ' still ', ' such ', ' system ', ' take ', ' ten ', ' than ', ' that ', ' the ', ' their ', ' them ', ' themselves ', ' then ', ' thence ', ' there ', ' thereafter ', ' thereby ', ' therefore ', ' therein ', ' thereupon ', ' these ', ' they ', ' thick ', ' thin ', ' third ', ' this ', ' those ', ' though ', ' three ', ' through ', ' throughout ', ' thru ', ' thus ', ' tis ', ' to ', ' together ', ' too ', ' top ', ' toward ', ' towards ', ' twas ', ' twelve ', ' twenty ', ' two ', ' un ', ' under ', ' until ', ' up ', ' upon ', ' us ', ' very ', ' via ', ' wants ', ' was ', ' we ', ' well ', ' were ', ' what ', ' whatever ', ' when ', ' whence ', ' whenever ', ' where ', ' whereafter ', ' whereas ', ' whereby ', ' wherein ', ' whereupon ', ' wherever ', ' whether ', ' which ', ' while ', ' whither ', ' who ', ' whoever ', ' whole ', ' whom ', ' whose ', ' why ', ' will ', ' with ', ' within ', ' without ', ' would ', ' yet ', ' you ', ' your ', ' yours ', ' yourself ', ' yourselves ',' thanks ',' following ',' correct answer ',' correct answers ',' select ',' choice ',' Multiple Choice Question ',' Complete ',' Best Answer ',' Points ',' Points Total ',' Few questions ',' false questions ',' random questions ',' Bonus Question ',' Type ',' Exciting ',' Basics ',' With ',' From ',' Questions ',' Sentence ',' The Basic ',' Purpose ',' Stand Out ',' History this quiz ',' Hope ',' For ',' Kind ',' Who ',' Way ',' Real ',' Free ',' Single ',' Particular Subject ',' Fair Food ',' Title ',' Review test quizzes ',' Answer key quizzes ',' Review test ',' Answer key ',' Answer ',' Review ',' Lesson Plan ',' lesson ',' learning ',' understanding ',' Crap ',' ones ',' This quiz ',' Multiple Choice Questions ',' page ',' pages ',' chapter ',' chapters ',' chapter ',' multiple choice ',' question quiz ',' nbsp ',' exact questions ',' final examination ','Untitled Course','Untitled Quiz'];
		</script>
<link rel="stylesheet" type="text/css" href="AllQuestions_files/design.css">
<style type="text/css">.backimgs{color:color:#3B5998;}.fancybox-inner{overflow:hidden!important;}A.backimgs{text-decoration:none}A.cancel_btn,.del_img A{color:#3B5998;text-decoration:none;}A.cancel_btn:hover{color:#444!important;text-decoration:none;}.tabber_ab_act{padding:35px 36px 11px 32px;}.fr_box_area{width:355px;padding:10px 0px 10px 10px}#quiztitle{background:none;padding:5px 2px;font-size:18px;border:1px solid #dddddd;outline:none;width:100%;}#txtgooglese{background:none;padding:6px;font-size:18px;border:1px solid rgb(204,204,204);outline:none;font-family:segoe UI;}#quiztitle:focus{outline:none;border:1px solid #9ecaed;}#txtgooglese:focus{outline:none;border:1px solid #9ecaed!important;}.image_area{min-height:489px!important;margin-left:0px;text-align:center;font:0/0 a;}.image_area:before{content:"";display:inline-block;height:100%;vertical-align:middle;text-align:center;}.m_unlable{position:absolute;background:rgba(109,109,109,0.4);margin-left:0px;width:565px;height:41px;top:505px;}#del_selimg{color:#3B5998;!important;}.del_img{margin-top:12px!important;}#chg_img{background-color:#fff!important;border-radius:5px;font-weight:bold;}.chnge_img{margin-top:10px!important;}.image_area IMG{vertical-align:middle;display:inline-block;}.upload_btn{background-image:url(http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/Uplaod-button.png)!important;background-position:0px;background-repeat:no-repeat;border:1px solid #fff;box-shadow:0 1px 0 rgba(255,255,255,0.2),inset 0 1px 0 rgba(255,255,255,0.2);background-color:transparent;color:#fff!important;cursor:pointer;text-decoration:none!important;padding:8px 24px;font-weight:600px;text-align:center;display:inline-block;border-radius:4px;}.glgle_imgs label{font-weight:normal!important;font-size:12px;margin-bottom:3px;}.Survey_POPUP_style1 label.titleText-new{color:#444;font-size:17px;font-weight:normal;letter-spacing:0.01em;cursor:auto!important;display:block;padding:5px 0px;}ul.tabbernav li a{font-family:Arial;}.no_preview{color:#444;font-size:16px;font-family:Arial;float:left;margin-top:200px;margin-left:80px;}</style>
<script language="javascript" type="text/javascript" src="AllQuestions_files/tabdesign.js"></script>
<!--[if lt IE 11]>
<script language="javascript" type="text/javascript" src="http://www.proprofs.com/api/imageupload/html5.js"></script> 
<![endif]-->
<script language="javascript">

var active_btn_imgsel = '<input type="button" onclick="create_quiz_ontop_inmg();" id="submit_survey_desc" value="Done" class="btn_class btn-big primary" style="padding:7px 40px">';

var deactive_btn_imgsel = '<input type="button" id="submit_survey_desc" value="Done" class="btn_class btn-big primary" style="padding:7px 40px; opacity:0.4; cursor:default !important;">';
var config_common_desc = '';


        $(document).ready(function() {
        var i = 0;       
$('li').live('click',function(){
        if(i==0)
        {
        desc_uploads();
        }
        i++;
        });});


/***************************************ON CLICK POPUP OPEN************************************************/
$(".fr_main_slideDiv").live("click", function(e)
{
	
	$('.chnge_img').css('display','block');	
	$('.fr_box_area').css('display','block');
	$('.frm_img_area').css('display','none');
	$("#quiztitle").val($('#title_h1').html().replace( /\&amp;/g, '&' ));	
	 smallscreen();		
	 $('.txt_title').css('display','block');			
	  $.fancybox({
	   topRatio        : 0.1,
	   fitToView        : false,
	   width            : 970,
	   height           : 'auto',
	   autoSize         : false,
	   closeClick       : false,
	   openEffect       : 'none',
	   closeEffect      : 'none',
	   type				: 'inline',
	   helpers: {
	   title: null,
	   overlay : {closeClick: false}
	   },
	   href:  '#FRSurvey_POPUP',
		'afterClose': function()
		{
			if($('#mode_one').val()!='0')
			{
				var editor = CKEDITOR.instances['bodytext_sur_new_fr'];
				editor.destroy(true);
			}	
		}
		}); 
				
		$("#quiztitle").focus();
				var customer_vals = $("#customer_values").val();
		if(customer_vals==1)
		{					config_common_desc = 'config_common_desc.js?v=8'; 			
					}
		else
		{
			config_common_desc = 'config_common_desc_free.js?v=2';	
		}
	
		
		
		if(!CKEDITOR.instances['bodytext_sur_new_fr'])
		{
			if($('#mode_one').val()!='0')
			{
				var editor = CKEDITOR.replace('bodytext_sur_new_fr', 
				{
				width:'635',
				height:'390',
				startupFocus: false,
				customConfig : '/api/ckeditor_ver4.4.0/'+config_common_desc
				});
			}	 
		}

			 		editor.on('blur', function(evt){		
		editorBuffer = editor.getData();
		if(trim(editorBuffer) == "")
		{
			editor.setData('Type description here.')
		}
		
		});
		
		editor.on('focus', function(evt){
			if(trim(editor.getData()) == "Type description here." || trim(editor.getData()) == "<div style='clear:both;'>Type description here.</div>")
			{
				editor.setData('');                
			}
		});
					 	
});

	$( document ).ready(function() {
	
	$('#quiztitle').live("blur",function(){
		var title	=	$(this).val();	
		if(title=='')
		{
			//$(this).val('Untitled Course');
		}
	});
	
	$('#quiztitle').live("click",function(){	
		var title	=	$(this).val();	
		if(title=='Untitled Course')
		{
			$(this).val('');
		}	
	});
	
	
	
		
		/****************************************************************************************************************/
		smallscreen();
		
	});
	function del_imgs()
	{
	    
		
		$('.image_area').html('<img src="http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/1/no_image1.jpg">');
		$('.image_area').css('background-color','#fff')
		$('.image_area').css('box-shadow','0 0 10px #ddd');
		$('#hid_imgpath').val('');
		$('.del_img').html('<span style="background-color:transparent !important; opacity:0.4; cursor:default" id="del_selimg">Delete</span>');
		$('#selectd_img_btn').html('').html(deactive_btn_imgsel);
		var wid = $('.image_area').width()
	
		if(wid<400)
		{
			smallscreen();
		}
	}
		
	$(".img_selected").live("click", function(e)
	{
		$('.image_area').css('box-shadow','0px');
		var ifname = $(this).attr('name');
		if(ifname=='vid')
		{
			var selsrc = $(this).attr('rel');
			var url = 'https://www.youtube.com/embed/'+selsrc+'?html5=1&rel=0';
			var del_txt = '<iframe id="vid_'+selsrc+'" height="290" width="500" style=" margin-top:100px;" frameBorder="0" scrolling="no" id="topicDescrImg" class="topicDescrImg" src="'+url+'" ></iframe>';
		}
		else
		{
			var selsrc = ifname;
			var del_txt = '<img src="'+selsrc+'" style="max-width:565px; height:auto;" class="topicDescrImg">'
		}
		
		//alert(del_txt);
		$('.image_area').html('');
		
		$('.image_area').html(del_txt);
		var img_url = $(this).attr('name')
		$('#hid_def_ggl_img').val(img_url);
		$('#hid_imgpath').val(url);
		
		$(".img_selected").removeClass('box_shadow');
		$(this).addClass('box_shadow');
		
		$('#selectd_img_btn').html('').html(active_btn_imgsel);
		
		$('.del_img').html('<a href="javascript:void(0)" style="background-color:transparent !important;" onclick="del_imgs()" id="del_selimg">Delete</a>');
		
		if(ifname=='vid')
		{
			$(this).find('iframe').load(); //$('#vid_'+selsrc).load();
		}
	});
	
	
/*	$(".video_class").live("click", function(e)
	{
	
	var srcs = $(this).attr('src');
	
	$('.image_area').html('<iframe  height="290" width="500" style=" margin-top:100px; display:none;" frameBorder="0" scrolling="no" id="topicDescrImg" class="topicDescrImg" src="'+srcs+'" ></iframe>');
                                              
	$('iframe').load(function() {
						
	
});
	});*/
		
	function chenge_img()
	{ 
		var titletxt = $('#quiztitle').val();	
		$('.fr_box_area').css('display','none');
		$('.txt_title').css('display','none');
		$('.frm_img_area').css('display','block');
		$('.chnge_img').hide();
		var oldimgpath = $('.topicDescrImg').attr('src');
		//alert(oldimgpath);
		$('#hid_imgold').val(oldimgpath);
		
		/*******************************************************************************************************/
		$('.left_warpper_img').css('width','575px'); // 
		$('.image_area').css('width','565px'); // 
		$('.m_unlable').css('width','565px'); // 565
		$('.fr_box_area').css('width','355px'); // 355
		
		$('.no_preview').css('margin-left','230px'); //230 
		$('.del_img').css('display','block');
		$('.topicDescrImg').css('max-width','565px');
		
		
		/*******************************************************************************************************/		
		if(titletxt !='')
		{
			for ( var i = 0, l = filterwords.length; i < l; i++ )
			{
				if(titletxt =='')
				{
					break;	
				}
				var x = filterwords[i];
			   titletxt = titletxt.replace(new RegExp( x, 'g' ), ' ' );
			  // console.log(x+"------"+titletxt);
			}
			
			//$('#txtgooglese').val(titletxt);
			
			//search_ggl_img();
					}
		
	}
		
	function back_img()
	{
		$('.fr_box_area').css('display','block');
		$('.txt_title').css('display','block');
		$('.frm_img_area').css('display','none');
		$('.chnge_img').show();
		
		if($('#hid_imgold').val()!='')
		{
			var oldimageepath = $('#hid_imgold').val();
			$('.image_area').html('');
			if(oldimageepath.indexOf('https://www.youtube.com/embed/')!=-1){
				var del_txt = '<iframe width="500" height="290" frameborder="0" id="vid_WyFNSkaoUqo" style="margin-top: 100px; max-width: 300px;" scrolling="no" class="topicDescrImg" src="'+oldimageepath+'"></iframe>';
			}else{
				var del_txt = '<img src="'+oldimageepath+'" style="max-width:565px; height:auto;" class="topicDescrImg">'
			}
		$('.image_area').html(del_txt);
		}
		$('.del_img').html('<a href="javascript:void(0)" style="background-color:transparent !important;" onclick="del_imgs()" id="del_selimg">Delete</a>');
		smallscreen();		
	}
		
/**************************************Google search Menu********************************************/		
	$("#show_gooogle_menu").live("click", function(e)
	{
		e.stopPropagation();
		$('.glmenu_div').css('display','block');
	});	
	
	$('.frm_img_area, .image_area').live( "click", function() {
		$('.glmenu_div').css('display','none');
		
	});
	
	$('.glmenu_div').live("click", function(e)
	{
		e.stopPropagation();
		$('.glmenu_div').css('display','block');
	});
	
	
		
/*************************************Save selected iamge in hideen ***********************************/		
	function create_quiz_ontop_inmg()
	{
	
		$('.chnge_img').show();
		var elementlengh =$('IMG.topicDescrImg').length; 
		if(elementlengh !=0)
		{
			var srcs = $('IMG.topicDescrImg').attr('src');
			var amzonimg = srcs.search('proprofs-cdn.s3.amazonaws.com');
			var desc = $('.load_save_img_ld').css('display','block');
			if(amzonimg == -1) 
			{
				var imgurl = $('.topicDescrImg').attr('src');
				imgurl = imgurl.replace("http://","");
				imgurl = imgurl.replace("https://","");
				
		
				$.ajax({
					url:'/api/imageupload/write_ggl_image_s3.php?imagepath='+imgurl+"&product=quiz&ipbwi_id=0",
					type:'POST',
					cache:false,
					success:function(data)
					{
					$('.image_area').html('');
					$('.image_area').html("<img src='"+data+"' style='max-width:300px; height:auto;'>");	
					$('.fr_box_area').css('display','block');
					$('.txt_title').css('display','block');
					$('.frm_img_area').css('display','none');
					$('#hid_imgpath').val(data);
					$('.load_save_img_ld').css('display','none');
					
					//*************************************************************//
					smallscreen();
					/******************************************************************/
				}
				
			}); 			
			}
			else
			{
				$('.fr_box_area').css('display','block');
				$('.txt_title').css('display','block');
				$('.frm_img_area').css('display','none');
				
				var data = $('#hid_def_ggl_img').val();
				$('#hid_imgpath').val(data);
				$('.load_save_img_ld').css('display','none')
				//*************************************************************//
				smallscreen();
				/******************************************************************/
			}		
		}
		else
		{	
			//Imgage has been deleted
		$('.fr_box_area').css('display','block');
		$('.txt_title').css('display','block');
		$('.frm_img_area').css('display','none');
		$('.load_save_img_ld').css('display','none');
		
		//*************************************************************//
		smallscreen();
		/******************************************************************/
			
		}
		
		

		
	}	
		
	$("#txtgooglese").live("keydown", function(e){
		if(e.keyCode==13)
		{
			search_ggl_img();
		}
	});
	
	function smallscreen()
	{
		
		$('.left_warpper_img').css('width','310px'); // 575
		$('.image_area').css('width','300px'); // 565
		$('.m_unlable').css('width','300px'); // 565
		$('.fr_box_area').css('width','610px'); // 355
		//$('.del_img').css('display','none');
		$('.topicDescrImg').css('max-width','300px');
		$('.chnge_img').css('margin-right','5px'); //30px;
	}
		
	function search_ggl_img()
	{
		ggl_keyword = $('#txtgooglese').val()
		var ggl_keyword = encodeURIComponent(ggl_keyword);
		$('#img_taken_box').css('overflow-y','hidden');
		
		var licenced_img = $('.chk_gggless:checked').val();
		
		$('.glmenu_div').css('display','none');
		
		if(ggl_keyword=='')
		{
			alert('Please type a keyword related to your search');
			$('#txtgooglese').focus();
			return false;
		}
		

		$('#img_taken_box').html();
		//$('#img_taken_box').css('height','300px;');
		//http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/ajaxbg-loader.gif
		$('#img_taken_box').html('<img src="http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/loader.gif" style="margin-left:166px; margin-top:108px;">');
		
		$.ajax({
			
		url:'/api/imageupload/serch_google.php?keywod='+ggl_keyword+'&liced='+licenced_img,
		type:'POST',
		cache:false,
		success:function(data)
			{
				
				ggl_keyword = $('#txtgooglese').val().charAt(0).toUpperCase() + $('#txtgooglese').val().slice(1);
				
				$('#img_taken_box').css('height','auto');
				$('#img_taken_box').css('overflow-y','scroll');
				$('#img_taken_box').html(data);
			},
			error: function(XMLHttpRequest, exception) 
				{
				   if (XMLHttpRequest.status == 404)
				   {
					   alert('404: Requested page not found.\nPlease try to submit again.');
				   } 
				   else if (XMLHttpRequest.status == 500)
				   {
					   alert('500: Internal Server Error.\nPlease try to submit again.');
				   } 
				   else if (exception === 'parsererror')
				   {
					   alert('Parse error has been occurred.\nPlease try to submit again.');
				   } 
				   else if (exception === 'timeout')
				   {
					   alert("Server detected connection problem.\nPlease try to submit again.");

				   } 
				   else if (exception === 'abort')
				   {
					   alert('Asynchronous request aborted.\nPlease try to submit again.');
				   }
				   else  if (XMLHttpRequest.status === 0)
				   {
					   alert('Network connection failed.\nPlease try to submit again.');
				   } 
				   else
				   {
					   alert('Uncaught Exception.\nPlease try to submit again.');
				   }
				}
		});  
		
	}
		
	
	   
	
	   
</script>
<script type="text/javascript">
var uploader='';
function desc_uploads()
    {	  
			var uniquueuplodpath = "images/QM/user_images/misc/";
			var uploadpath = "images/QM/user_images/misc/";
			
 	 		uploader = new plupload.Uploader({
			runtimes : 'html5, flash',
			browse_button : 'computer_upload',
			max_file_size : '2mb',
			file_data_name: 'file',
			multipart : true,
			url : '/videos/qm_temp_images/upload.php',
			flash_swf_url : '/quiz-school/plupload.flash.swf',
			 multipart_params: {
			'acl': 'public-read',
			'Content-Type': 'image/jpeg',
			'success_action_status': '201',
			'AWSAccessKeyId' : 'AKIAIGZ3SDPOSV6VUUKQ',        
			'policy': 'eyJleHBpcmF0aW9uIjoiMjAxNS0wOC0wNFQxMDo0NDozNC4wMDBaIiwiY29uZGl0aW9ucyI6W3siYnVja2V0IjoicHJvcHJvZnMtY2RuIn0seyJhY2wiOiJwdWJsaWMtcmVhZCJ9LFsic3RhcnRzLXdpdGgiLCIka2V5IiwiIl0sWyJzdGFydHMtd2l0aCIsIiRDb250ZW50LVR5cGUiLCJpbWFnZVwvIl0seyJzdWNjZXNzX2FjdGlvbl9zdGF0dXMiOiIyMDEifSxbInN0YXJ0cy13aXRoIiwiJG5hbWUiLCIiXSxbInN0YXJ0cy13aXRoIiwiJEZpbGVuYW1lIiwiIl1dfQ==',
			'signature': '4WtAIB7Obr5M83EMf7uHLJzYvgQ=',
			'forumID': '0'
			},
 			filters:[{title : "Images", extensions : "jpg,gif,png"}]
 			
		});
	    
		uploader.bind('QueueChanged', function(up){
			if ( up.files.length > 0 && uploader.state != 2) 
			{
				uploader.start();
				$('#upld_loader').css('display','inline');
			}
		});
	
		uploader.bind('BeforeUpload', function(up, file){
			$("#computer_upload").hide();
			var file_extension = (file.name).split(".");
		    var extension = file_extension[(file_extension.length) - 1];
			up.settings.multipart_params.key = uploadpath;
		    up.settings.multipart_params.Filename = uploadpath;
		});
	
		uploader.bind('UploadProgress', function(up, file){
			
		});
	
	
		uploader.bind('FileUploaded', function(up, file, response){			
			var file_extension = (file.name).split(".");
		    var extension = file_extension[(file_extension.length) - 1];
			var obj = jQuery.parseJSON(response.response); 
		   	uploadpath = uploadpath+obj.result+'.'+extension;

			$("#computer_upload").show();
			$('.image_area').html('');
			$('.image_area').css('box-shadow','0px');
			var filepathofup = 'http://proprofs-cdn.s3.amazonaws.com/'+uploadpath;
			$('.image_area').html('<img class="topicDescrImg" style="width:565px; max-height:467px" src="'+filepathofup+'" >');
			$('#hid_def_ggl_img').val(filepathofup)
			$('#upld_loader').css('display','none'); 
			$('#hid_imgpath').val(filepathofup);
			$('#selectd_img_btn').html('').html(active_btn_imgsel);		
			$('.del_img').html('<a href="javascript:void(0)" style="background-color:transparent !important;" onclick="del_imgs()" id="del_selimg">Delete</a>');	  
			
			uploadpath =  uniquueuplodpath;
			   
		});
		
		
		
		uploader.bind('Error', function(up, errorText) {
			alert("Error while uploding file");
		});
		
		uploader.init();                          
       }
	   
$('#computer_upload').mouseenter(function(){
	uploader.refresh();
});
	   
</script>
<div id="FRSurvey_POPUP" class="Survey_POP" style="display: none;">
<div id="Survey_POPUP" name="Survey_POPUP" class="Survey_POPUP_style1">
<form action="" method="post" id="quizform" name="quizform" enctype="multipart/form-data">
<input type="hidden" name="ipbwi_id" id="ipbwi_id" value="0">
<input type="hidden" name="createquiz_top_new" id="createquiz_top_new" value="1188913">
<div class="txt_title" style="float:left;">
<input type="text" class="big text" id="quiztitle" name="quiztitle" value="Untitled Quiz" size="95" maxlength="120" placeholder="Enter a Title" style="font-weight:normal;">
</div>
<input type="hidden" name="hid_def_ggl_img" id="hid_def_ggl_img" value="">
<div class="left_warpper_img" style="width: 310px;">
<div class="image_area" style="width: 300px;">
<img src="AllQuestions_files/no_image1.jpg">
</div>
<div class="m_unlable" style="width: 300px;">
<div class="del_img"><a href="javascript:void(0)" style="background-color:transparent !important;" onclick="del_imgs()" id="del_selimg">Delete</a></div>
<div class="chnge_img" style="margin-right: 5px;"><a href="javascript:void(0)" onclick="chenge_img()" id="chg_img">Change Image</a></div>
</div>
</div>
<div class="fr_box_area" style="width: 610px;">
<div id="resultTextDiv" align="left" style="float:left;"></div>
<input type="hidden" id="quizTYPE" name="quizTYPE" value="create">
<input type="hidden" name="hiddentitle" id="hiddentitle" value="false">
<input type="hidden" name="mode_one" id="mode_one" value="1">
<div class="clear"></div>
<div style="height:450px; float:left;">
<textarea style="border:1px solid #ccc !important;" id="bodytext_sur_new_fr" name="bodytext_sur_new_fr" rows="3" cols="61">								
								Type description here.	
								</textarea>
<input type="hidden" name="hid_imgpath" value="" id="hid_imgpath">
<input type="hidden" name="hid_imgold" value="" id="hid_imgold">
</div>
<div class="clear"></div>
<div style="width: 230px; float: left; margin-top:5px;">
<div style="float:left"><input type="button" style="padding:7px 40px; margin-top:2px;" class="btn_class btn-big primary" value="Save" id="submit_survey_desc" onclick="create_quiz_ontop_free();">&nbsp;&nbsp;</div>
 
<div class="loderimg" style="margin-left: 6px; float: left; width: 37px; margin-top: 6px; margin-bottom: 10px; display:none;">
<span class="img_loader" id="imgloader" style=" font-size: 12px; margin-left: 10px; margin-top: 0;"><img src="AllQuestions_files/loader(1).gif" id="imgloader_1"></span>
</div>
</div>
</div>
<div class="frm_img_area" style="display:none;">
<div class="tabberlive" id="main"><ul class="tabbernav"><li class=""><a href="javascript:void(null);" title="Search" class="tabber_ac_act" style="padding: 39px 31.5px 7px;">Search</a></li><li class="tabberactive"><a href="javascript:void(null);" title="Image library" class="tabber_aa_dra" style="padding: 39px 9.5px 7px;">Image library</a></li><li class=""><a href="javascript:void(null);" title="Upload" class="tabber_ab_dra" style="padding: 39px 31.5px 7px;">Upload</a></li></ul>
<style>.clear{clear:both}.dacttab{color:#3b5998;cursor:pointer;margin-right:30px;padding-bottom:9px;font-size:15px;}.acttab{border-bottom:2px solid #3c8ac9;color:#000;cursor:pointer;margin-right:30px;padding-bottom:9px;font-size:15px;}#search_key{background:url("http://www.proprofs.com/survey/manage/YouTube.png") no-repeat scroll 225px center rgba(0,0,0,0);border:1px solid rgb(204,204,204);padding:6px;width:280px;font-family:segoe UI;font-size:18px;}A.bg_ggl_srch{height:37px!important;width:35px!important;}.glmenu_div{height:70px!important;right:92px!important;top:195px!important;}</style>
<div class="tabbertab tabbertabhide" title="">
<h2>Search</h2>
<p>
</p><div style="margin-top: 75px;"></div>
<span id="Images_1" style="padding-left:4px;" class="acttab">Images</span>
<span id="Videos_1" class="dacttab">Videos</span>
<hr style="margin-top:6px;">
<div class="Images_1">
<div style="">Search for Google Images:</div>
<div style="margin-top:7px;">
<input type="text" name="txtgooglese" id="txtgooglese" style="width:278px">
<img src="AllQuestions_files/google_image_icon.png" id="show_gooogle_menu" style="margin:1px 0px 0px -39px ; height:34px; float:left; cursor:pointer;">
<a href="Javascript:void(0)" class="bg_ggl_srch" onclick="search_ggl_img()"></a>
</div>
<div class="clear"></div>
<div class="glmenu_div">
<div class="glgle_imgs" style="padding:5px 0px 0px 9px; font-size:13px;">
<label><input type="radio" name="chk_gggle" class="chk_gggless" checked="checked" value="0"><span style="font-size:13px !important;margin-left:5px">All Google images</span></label>
</div>
<div class="cmrcluse" style="padding:1px 0px 0px 0px; font-size:13px;">
<label><input type="radio" class="chk_gggless" value="1" name="chk_gggle"><span style="font-size:13px !important;margin-left:5px">Commercial use license images</span></label>
</div>
</div>
<div class="clear"></div>
<div class="clear"></div>
<div style="min-height:294px; max-height:294px; max-width:327px;min-width:327px; overflow-y: auto; float:left; overflow-x:hidden" id="img_taken_box">
</div>
<div class="clear"></div>
</div>
<div class="clear" style="clear:both"></div>
<div class="Videos_1" style="display:none;">
<div style="float: left; width: 100%;" id="">
<div style="padding:0 0 10px;">Search for YouTube videos:</div>
<div style="float: left;">
<input type="text" name="Search" value="" id="search_key">
<input type="hidden" name="Search_video" value="0" id="Search_video">
</div>
<div id="search_vid_btn" style="float: left; text-align: center; cursor: pointer; padding: 1px; height: 37px; width: 32px; background: url(&#39;http://www.proprofs.com/survey/manage/search-icon.png&#39;) no-repeat scroll center 7px ; background-color:#626262; margin-left: -1px;"></div>
<div class="clear"></div>
<div style="min-height:291px; text-align:center; max-height:291px; max-width:327px; overflow-y: auto; float:left; overflow-x:hidden" id="img_taken_box_video">
</div>
<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
<p></p>
</div>
<div class="tabbertab tabbertabdefault " title="">
<h2>Image library</h2>
<p>
</p><div style="float:left; width:100%; background-color:#fff; min-height:300px;">
<div style="float:left; margin-bottom:5px; text-align:left; width:100%; margin-top:10px;">
<span style="color:#000; font-size:16px;">
<span id="recond_imagesgs_fixed">Select a recommended image</span>
</span>
</div>
<div style="float:left; height:377px; margin-bottom:5px; width:100%;overflow:auto;" id="img_taken_box_fixed">
<div class="img_f_box">
<img class="img_selected box_shadow" name="http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/rr_n_1.jpg" src="AllQuestions_files/rr_1.jpg">
</div>
<div class="img_f_box">
<img class="img_selected" name="http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/rr_n_2.jpg" src="AllQuestions_files/rr_2.jpg">
</div>
<div class="img_f_box">
<img class="img_selected" name="http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/rr_n_3.jpg" src="AllQuestions_files/rr_3.jpg">
</div>
<div class="img_f_box">
<img class="img_selected" name="http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/rr_n_4.jpg" src="AllQuestions_files/rr_4.jpg">
</div>
<div class="img_f_box">
<img class="img_selected" name="http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/rr_n_5.jpg" src="AllQuestions_files/rr_5.jpg">
</div>
<div class="img_f_box">
<img class="img_selected" name="http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/rr_n_6.jpg" src="AllQuestions_files/rr_6.jpg">
</div>
<div class="img_f_box">
<img class="img_selected" name="http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/rr_n_7.jpg" src="AllQuestions_files/rr_7.jpg">
</div>
<div class="img_f_box">
<img class="img_selected" name="http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/rr_n_8.jpg" src="AllQuestions_files/rr_8.jpg">
</div>
</div>
</div>
<div class="clear"></div>
<p></p>
</div>
<div class="tabbertab tabbertabhide" title="">
<h2>Upload</h2>
<p>
</p><div style="float:left; margin-bottom:317px; width:100%; margin-top:10px; text-align:left; height:83px;">
<span style="font-size:16px; color:#444; width:100%; margin-bottom:10px; float:left;">Upload from your computer</span>
<div id="computer_upload" style="width: 110px; float: left; padding: 4px; cursor:pointer !important; font-size: 16px; margin-left: 0px; height: 29px; margin-top: 0px; background: rgb(246, 246, 246); border-bottom:1px solid rgba(0,0,0,0.25); box-shadow:0 1px 3px rgba(0,0,0,0.5);" class="large_sur awesome_sur_preview">
<div style="float:left;clear:right;width:16px;padding-left:5px;padding-top:7px"><img src="AllQuestions_files/upload-icon_s.png" id="imgpre" style="margin-top:3px; margin-left:11px;"></div>
<div style="float:left; width:47px; padding-left:13px; padding-top:5px; ">
<a id="close-preview" style="position: relative; top: 1px; color:#3B5998; text-decoration: none;font-weight:bold">Upload</a>
</div>
</div>
<span class="uplod_loader" id="upld_loader" style=" font-size: 12px; margin-left: 10px; margin-top: 0; display:none;"><img src="AllQuestions_files/loader(1).gif" id="imgloader_1"></span> </div>
<div style="height:475px;"></div>
<div class="clear"></div>
<p></p>
</div>
<div style="width: 200px; float: left; margin-top:3px;">
<div id="selectd_img_btn" style="float:left;">
<input type="button" id="submit_survey_desc" value="Done" class="btn_class btn-big primary" style="padding:7px 40px; opacity:0.4; cursor:default !important;">
</div>
&nbsp;&nbsp;<a href="http://www.proprofs.com/quiz-school/manage/?id=1189181#" onclick="back_img()" class="backimgs" style="margin:8px 0px 0px 18px; font-weight:bold; float:left">Cancel</a></div>
<div class="load_save_img_ld" style="float: left; width: 37px; margin-top: 16px; display: none;">
<span class="img_loader" id="imgloader" style=" font-size: 12px; margin-left: 10px; margin-top: 0;"><img src="AllQuestions_files/loader(1).gif" id="imgloader_1"></span>
</div>
</div>

</div></form>
</div>
<div class="clear"></div>
</div>
<style>.fr_main_slideDiv{float:left;}</style>
<script>
$('#Images_1').click(function(e) {
	$(this).removeClass('dacttab');
	$(this).addClass('acttab');
	$('.Images_1').show();
	$('.Videos_1').hide();
	$('#Videos_1').addClass('dacttab');
	$('#Videos_1').removeClass('acttab');
	$('#Search_video').val(0);
	
});
$('#Videos_1').click(function(e) {
	$(this).removeClass('dacttab');
	$(this).addClass('acttab');
	$('#Images_1').removeClass();

	$('#Images_1').addClass('dacttab');
	$('.Images_1').hide();
	$('.Videos_1').show();
	$('#Search_video').val(1);
});

$("#search_vid_btn").click(function() {
		$("#vid_btn").attr('class','btn_class btn-big prim_disable primary');
		if($.trim($("#search_key").val()) != '')
		{
			$.ajax({
			url:'/api/change_image/search_youtube_videos.php?q='+$("#search_key").val(),
			type:'POST',
			cache:false,
			beforeSend:function()
				 {
				$("#img_taken_box_video").html('<img src="http://proprofs-cdn.s3.amazonaws.com/images/QM/user_images/misc/loader.gif" style="margin-left:166px; margin-top:108px;">');

				 },
				success:function(data)
				{
					$("#img_taken_box_video").html('');
					$("#img_taken_box_video").html(data);
						

					
				}
			});
		}
		else
		{
			alert('Please type a keyword related to your search');
		}
	});
	$(document).keypress(function(e) {
    if(e.which == 13) {
		if($('.acttab').attr('id') == 'Images_1')
		$('#bg_ggl_srch').click();
		else
		$('#search_vid_btn').click();
    }
});
</script>
<script language="javascript">
	function create_quiz_ontop_free()
	{
		$("#savemsg").hide();
		$("#Previewsur").hide();
		var title_url_update_hidden = $("#title_url_update_hidden").val();

	
		if ( CKEDITOR.instances["bodytext_sur_new_fr"] )
		{
			CKEDITOR.instances['bodytext_sur_new_fr'].updateElement();
		}

		var quizcreator_id = $("#quizcreator_id").val();
	if(quizcreator_id=='')
	{
		quizcreator_id=0;
	}
	$.ajax
	({
		type: "POST",
		url:"_ajax_create_save_img.php?quizcreator_id="+quizcreator_id+"&title_url_update_hidden="+title_url_update_hidden,
		data:$('#quizform').serialize(),
		  
		beforesend:$(".loderimg").show(),
		
		success:function(data)
		{   
			var str = data;
			var substr = str.split('##');
			var sur_idn = substr[0];
			var qid = $.trim(sur_idn);
			var sur_titl = substr[1];
			var sur_desc = substr[2];
			var cat_reply = substr[3];
			var title = $.trim(substr[4]);
			var link_id = $.trim(substr[5]);
			$.fancybox.close();
		
			$('.current_product_id').val(qid);
			$('.current_link_url').val(link_id);
			
			$("#title_quiz").val(1);
			$(".cur_quiz_id").val('');
			$(".cur_quiz_id").val(qid);
			$('.special_import').attr('id', 'import_question_popup_wizard');
			$("#createquiz_top_new").val('');
			$("#createquiz_top_new").val(qid);
			
			$("#miscellaneous").html();
			//$("#miscellaneous").html(cat_reply);
			
			$("#title_h1").html(sur_titl);
			$(".show_hide").html();
			if($("#title_url_update_hidden").val()==0)
			{
				$("#title_url_update_hidden").val(1);
			}
			
			//$("#sur_discription").html(sur_desc);
			if(sur_desc.match(/<iframe[^>]+src\s*=\s*["\']?([^"\' ]+)[^>]*>/)){
				sur_desc = sur_desc.replace('</iframe>', '</iframe><br/>');
			}
			if(sur_desc.match(/<img[^>]+src\s*=\s*["\']?([^"\' ]+)[^>]*>/)){
				sur_desc = sur_desc.replace('>', '><br/>');
			}
			 var full_desc = sur_desc;
			
              var lessdesc = 0;
		   if(sur_desc.length > 400)
		   {
				   sur_desc = sur_desc.substring(0,400);
				   sur_desc1 = full_desc.substring(400);
				   
				   lessdesc = 1;
		   }
														   
		   if(lessdesc == 1)
		   {
				   $("#showmorelessBtn").show();
				   $("#read_more").show();
				   $("#Cancel_text").hide();
				   $("#description_first").html(sur_desc);
				   $("#description_new").html(sur_desc1);
		   }
		   else
		   {
				   $("#description_new").html('');
				   $("#description_new").hide();
				   $("#Cancel_text").hide();
				   $("#read_more").hide();
				   $("#showmorelessBtn").hide();
				   $("#description_first").html(full_desc);
		   }
			
			//$("#savemsg").show();
			$('#settingButton').css({'cursor':'pointer','opacity':''});
			$('#previewButton1').css('opacity','');
			$('#settingButton').css('pointer-events','');
			$('#previewButton1').css('pointer-events','');
			$('.awesome_sur_preview').css('cursor','pointer');
			//$("#previewButton1").show();
			$("#hidPreviewLink").val(title);
			$(".cur_link_id").val('');
			$(".cur_link_id").val(link_id);
			//$("#Previewsur").show();
			$(".loderimg").hide();
		},  
		error: function(XMLHttpRequest, exception) 
                    {
                       if (XMLHttpRequest.status == 404)
                       {
                           alert('404: Requested page not found.\nPlease try to submit again.');
                       } 
                       else if (XMLHttpRequest.status == 500)
                       {
                           alert('500: Internal Server Error.\nPlease try to submit again.');
                       } 
                       else if (exception === 'parsererror')
                       {
                           alert('Parse error has been occurred.\nPlease try to submit again.');
                       } 
                       else if (exception === 'timeout')
                       {
                           alert("Server detected connection problem.\nPlease try to submit again.");

                       } 
                       else if (exception === 'abort')
                       {
                           alert('Asynchronous request aborted.\nPlease try to submit again.');
                       }
                       else  if (XMLHttpRequest.status === 0)
                       {
                           alert('Network connection failed.\nPlease try to submit again.');
                       } 
                       else
                       {
                           alert('Uncaught Exception.\nPlease try to submit again.');
                       }
                    }
	}) 
}
			</script>
<div class="clear"></div>
</span></div>
<div class="clear"></div>
<div class="formright" style="margin-top:0px; width:630px;">
<div id="questionBOX">
<div id="infoBlankQuiz" style="display:none;"></div>
<div id="middledv" name="middledv" class="middledv"><ul id="elist" class="elist ui-sortable" style="width:700px"></ul></div>
<div class="clear"></div>
<div class="clear"></div>
</div>
</div>
<div class="clear" style="font-size:9px; font-weight:bold; color:#000000;"></div>
<br>
<div class="clear"></div>
</div>
</div>
 
<input type="hidden" name="selectiddrag" id="selectiddrag" value="0"> 
<input type="hidden" id="no_of_ques" name="no_of_ques" value="2"> 
<script type="text/javascript">



    

</script>
 
<div style="display:none;">
<div id="ppquizmaker_question_examples">
<div style="border: 1px solid; width: 15px; float: right;"><a onclick="javascript:cancel_ques();"><img src="AllQuestions_files/icon_delete.gif" title="Close" alt="Close"></a></div>
<div style="margin-top:10px;">
<h1 style="font-size:22px;margin-left:7px;margin-right:7px">Question Examples</h1>
</div>
<div class="topdiv" style="display:block" id="topdiv-0">These questions only allow a respondent to choose one answer from the answer choices</div>
<div class="topdiv" style="display:none" id="topdiv-1">These questions allow respondents to choose as many answers as they want from the answer choices. Perfect for those "Choose all that apply" questions.</div>
<div class="topdiv" style="display:none" id="topdiv-2">This question allows the respondent to select true or false.</div>
<div class="topdiv" style="display:none" id="topdiv-3">This question allows the respondent to fill in the blank.</div>
<div class="topdiv" style="display:none" id="topdiv-4">This question allows the respondent to type in a large amount of text for their response.</div>
<div class="topdiv" style="display:none" id="topdiv-5">This question allows the respondent to choose the answer from the list of matching type answers.</div>
<div style="border: 0px solid red; margin-left: 25px;width:570px; margin-top: 15px;">
<div style="float:left;">
<select size="7" name="QuestionTypeList" id="QuestionTypeList" onchange="updateQuestion(this);" style="font-size:16px;font-family:Arial;width:260px;">
	<option selected="selected" value="0" class="QuestionTypeListSelect">Multiple Choice (Sigle selection)</option>
	<option value="1" class="QuestionTypeListOpltion">Checkbox( Multiple selections)</option>
	<option value="2" class="QuestionTypeListOpltion">True/False</option>
	<option value="3" class="QuestionTypeListOpltion">Fill in the blank</option>
	<option value="4" class="QuestionTypeListOpltion">Essay Type</option>
	<option value="5" class="QuestionTypeListOpltion">Matching Type</option>
</select>
</div>

  
  <div style="display:block;" class="questiondiv" id="0">
  <span class="questionspan">What shape is the moon?</span>
  <div style="margin-left:15px;font-size:12px;">
  <label style="width:70px;" class="divlabel"><input type="radio" name="radio1" id="Round">&nbsp;Round</label>
  <label style="width:72px;" class="divlabel"><input type="radio" name="radio1" id="Square">&nbsp;Square</label>
  <label style="width:78px;" class="divlabel"><input type="radio" name="radio1" id="Triangle">&nbsp;Triangle</label>
   <label style="width:90px;" class="divlabel"><input type="radio" name="radio1" id="Triangle">&nbsp;Rectangle</label>
  </div>
  </div>
  <div style="display:none;" class="questiondiv" id="1">
  <span class="questionspan">The moon is</span>
  <div style="margin-left:17px;font-size:12px;">
   <label style="width:60px;" class="divlabel"><input type="checkbox" name="btn1" value="White">&nbsp;White</label>
   <label style="width:69px;" class="divlabel"><input type="checkbox" name="btn1" value="Round">&nbsp;Round</label>
   <label style="width:43px;" class="divlabel"><input type="checkbox" name="btn1" value="Big">&nbsp;Big</label>
   <label style="width:59px;" class="divlabel"><input type="checkbox" name="btn1" value="Small">&nbsp;Small</label>
  </div>
  </div>
  <div style="display:none;" class="questiondiv" id="2">
  <span class="questionspan">The moon is round</span>
  <div style="margin-left:17px;font-size:12px;">
  <label style="width:70px;" class="divlabel"><input type="radio" name="radio1" id="True">&nbsp;True</label>
  <label style="width:72px;" class="divlabel"><input type="radio" name="radio1" id="False">&nbsp;False</label>
  </div>
  </div>
  <div style="display:none;" class="questiondiv" id="3">
				<span class="questionspan">The moon is ____ in color	</span><br>
			</div>
  <div style="display:none;" class="questiondiv" id="4">
   <span class="questionspan">Please describe the moon</span><br>
   <textarea rows="3" cols="22" style="margin:5px 0 0 0;"></textarea>
  </div>
    <div style="display:none;" class="questiondiv" id="3">
  <span class="questionspan">Rate your satisfaction</span>
  <div style="margin-left:17px;font-size:12px;">
   <label style="width:40px;float:left;" class="divlabel"><input type="radio" name="btn1" value="White">&nbsp;1</label>
   <label style="width:40px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Round">&nbsp;2</label>
   <label style="width:40px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Big">&nbsp;3</label>
   <label style="width:40px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Small">&nbsp;4</label>
   <label style="width:40px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Small">&nbsp;5</label>
  </div>
  </div>
      
        
  <div style="display:none;" class="questiondiv" id="5">
			<span class="questionspan">Match the colors with the objects</span>
				<div style="font-size:12px;"><br>
					<lable><b>A.</b>&nbsp;&nbsp;Moon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					A.&nbsp;&nbsp;<select name="choice1" id="choice1" style="width:118px;">
							<option>Select a Match</option>
							<option>White</option>
							<option>Blue</option>
							</select><br><br>
							<lable><b>B.</b>&nbsp;&nbsp;Sky&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							B.&nbsp;&nbsp;<select name="choice1" id="choice1" style="width:118px">
							<option>Select a Match</option>
							<option>White</option>
							<option>Blue</option>
					</select>
				</lable></lable></div>
			</div>
   <div style="display:none;" class="questiondiv" id="6">
   <span class="questionspan">Please enter your weight</span><br>
   &nbsp;<input type="text" style="margin:5px 0 0 0;">
  </div>
	<div style="display:none;" class="questiondiv" id="7">
		<span class="questionspan">Please read these instructions before you take this Survey</span><br>
	&nbsp; 
		<ul>
		<li>1. Instruction manual (gaming), a booklet that instructs the player on how to play the game
		Instruction (band), </li>
		<li>2. A rock band from New York City that formed in 2002</li>
		</ul>
	</div>
	
	<div style="display:none;" class="questiondiv" id="8">
	<span class="questionspan">Please Enter your birth date and time</span><br>
	&nbsp; 
	<div style="width: 60px; float: left;">Date/Time</div> 
	<div style="border: 1px solid; float: left; height: 23px; margin-left: 5px; width: 80px;">Dec, 25 2012</div> 
	<div style="border: 1px solid; float: left; height: 23px; margin-left: 5px; width: 25px;">MM</div>
	<div style="border: 1px solid; float: left; height: 23px; margin-left: 5px; width: 25px;">DD</div>
	<div style="border: 1px solid; float: left; height: 23px; margin-left: 5px; width: 25px;">YY</div>
	</div>
  
  
  </div>
</div>
</div>

<!-- for question examples -->
  <!-- for rating type question examples -->
 
 <div style="display:none;">
 <div id="rating_question_examples">
 
 <div style="margin-top:10px;">
 <h1 style="font-size:22px;margin-left:7px;margin-right:7px">Rating Scale Question Examples</h1>
 </div>
 <div style="font-size:15px;margin-left:17px;">Rating scales are used to rate one item on a scale.</div>
 
 <div style="border: 0px solid red; margin-left: 25px;width:750px; margin-top: 15px;">		
 
 
 
  <span class="questionspan">Example 1 : Rate your satisfaction</span>

  <div style="margin-left:17px;font-size:12px;">
   <label style="width:120px;float:left;" class="divlabel"><input type="radio" name="btn1" value="White">&nbsp;1</label>
   <label style="width:100px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Round">&nbsp;2</label>
   <label style="width:100px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Big">&nbsp;3</label>
   <label style="width:100px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Small">&nbsp;4</label>
   <label style="width:100px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Small">&nbsp;5</label>
  </div>
  
  <br>
  <br>

  <span class="questionspan">Example 2 : Rate your satisfaction</span>
  <div style="margin-left:17px;font-size:12px;">
   <label style="width:120px;float:left;" class="divlabel"><input type="radio" name="btn1" value="White">&nbsp; Very satisfied</label>
   <label style="width:160px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Round">&nbsp;Somewhat satisfied</label>
   <label style="width:100px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Big">&nbsp;Neutral</label>
   <label style="width:170px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Small">&nbsp;Somewhat dissatisfied</label>
   <label style="width:170px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Small">&nbsp;Very dissatisfied</label>
  </div>

   <br><br>
 
  <span class="questionspan">Example 3 : Rate your satisfaction</span>
  <div style="margin-left:17px;font-size:12px;">
   <label style="width:120px;float:left;" class="divlabel"><input type="radio" name="btn1" value="White">&nbsp; Excellent</label>
   <label style="width:100px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Round">&nbsp;Good</label>
   <label style="width:100px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Big">&nbsp;Fair</label>
   <label style="width:100px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Small">&nbsp;Poor</label>
   <label style="width:100px;float:left;" class="divlabel"><input type="radio" name="btn1" value="Small">&nbsp;N/A</label>
  </div>





  </div>
</div>
</div>
        <input type="hidden" name="quizAuthor" id="quizAuthor" value="">     </div>
     </div>
                        </div><!-- /.col -->
                    </div> <!-- /.row -->
                    <!-- END CUSTOM TABS -->
                    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
    </body>
</html>
