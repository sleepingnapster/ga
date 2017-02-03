$(document).ready(function(){$('#username').focus();$('#register_user').click(function(){var username=$('#username').val();var password=$('#password').val();var email=$('#email').val();error_str='';var val_username=validateUsername(username);var val_password=validatePassword(password);var val_email=validateEmail(email);if(val_username!=1)
{$('#username_err').html(val_username);$("#username").css("border","1px solid #FF0000");}
else
{var username_new=$("#username_new").val();if(username_new!=username)
{$('#submitform').val(1);$("#loader_username").show();$.ajax({url:'/api/signup/index.php',type:'POST',cache:false,async:false,data:$('#register-form').serialize(),beforeSend:function()
{$("#loader_username").attr('src','/api/signup/images/ajax-loader.gif?v=1');$("#loader_username").show();},success:function(data)
{$("#username_new").val(username);if(data!='')
{$("#username_err").html(data);$('#loader_username').hide();}
else
{$('#username_err').html(' ');$("#username").css("border","1px solid #D1CCD7");$("#loader_username").attr('src','/api/signup/images/icon_right.png');}}});}}
if(val_password!=1)
{$('#password_err').html(val_password);$("#password").css("border","1px solid #FF0000");$("#loader_password").hide();}
else
{$('#password_err').html("");$("#password").css("border","1px solid #D1CCD7");$("#loader_password").show();}
if(val_email!=1)
{$('#email_err').html(val_email);$("#email").css("border","1px solid #FF0000");}
else
{var email_new=$("#email_new").val();if(email_new!=email)
{$('#submitform').val(2);$.ajax({url:'/api/signup/index.php',type:'POST',cache:false,async:false,data:$('#register-form').serialize(),beforeSend:function()
{$("#loader_email").attr('src','/api/signup/images/ajax-loader.gif?v=1');$("#loader_email").show();},success:function(data)
{$("#email_new").val(email);if(data!='')
{$("#email_err").html(data);$("#loader_email").hide();$("#password").css("border","1px solid #FF0000");}
else
{$('#email_err').html('');$("#loader_email").attr('src','/api/signup/images/icon_right.png');$("#password").css("border","1px solid #D1CCD7");}}});}}
if(trim($("#username_err").text())!=''||trim($("#password_err").text())!=''||trim($("#email_err").text())!='')
{return false;}
else
{var check_for_bot=trim($("#namefield").val());$('#username_err').html('');$('#password_err').html('');$('#email_err').html('');$('#submitform').val(3);$("#loader_button").show();if(check_for_bot=="27f0e7f45a2485b8af858eddea14c928")
{$.ajax({url:'/api/signup/index.php',type:'POST',cache:false,async:true,data:$('#register-form').serialize(),beforeSend:function()
{$('#register_user').unbind();$("#loader_button").show();$(".register_user_delay").css('background','url("../img/layout/ajax-loader.gif") no-repeat scroll  322px 9px #388BD1');$('#loader_submit_register').show();$('#delay_loader').show();},success:function(data)
{var str=trim(data);var substr=str.split('_');var if_homepage=substr[0];var new_username=substr[1];if(if_homepage=='loginhome')
{$('#step_2').css({'display':'none'});$("#products_area_new").css({'display':'block'});$("#current_name_new").html(new_username);$("#if_user").val(1);}
else
{window.location.href=data;}}});}
else
{location.reload();}}});$("#username").blur(function(){var username=$(this).val();var val_username=validateUsername(username);if(val_username!=1)
{$('#username_err').html(val_username);$("#username").css("border","1px solid #FF0000");$("#loader_username").hide();}
else
{var username_new=$("#username_new").val();if(username_new!=username)
{$('#submitform').val(1);$("#loader_username").attr('src','/api/signup/images/ajax-loader.gif?v=1');$("#loader_username").show();$.ajax({url:'/api/signup/index.php',type:'POST',cache:false,async:true,data:$('#register-form').serialize(),beforeSend:function()
{},success:function(data)
{$("#username_new").val(username);if(trim(data)!='')
{$("#username_err").html(data);$('#loader_username').hide();$("#username").css("border","1px solid #FF0000");}
else
{$('#username_err').html(' ');$("#username").css("border","1px solid #D1CCD7");$("#loader_username").attr('src','/api/signup/images/icon_right.png');}}});}}});$("#password").blur(function(){var password=$(this).val();var val_password=validatePassword(password);if(val_password!=1)
{$('#password_err').html(val_password);$("#password").css("border","1px solid #FF0000");$("#loader_password").hide();}
else
{$('#password_err').html('');$("#password").css("border","1px solid #D1CCD7");$("#loader_password").show();}});$("#email").blur(function(){var email=$.trim($(this).val());var val_email=validateEmail(email);if($.trim(val_email)!=1)
{$('#email_err').html(val_email);$("#email").css("border","1px solid #FF0000");$("#loader_email").hide();}
else
{var email_new=$.trim($("#email_new").val());if(email_new!=email)
{$('#submitform').val(2);$("#loader_email").attr('src','/api/signup/images/ajax-loader.gif?v=1');$("#loader_email").show();$.ajax({url:'/api/signup/index.php',type:'POST',cache:false,async:true,data:$('#register-form').serialize(),beforeSend:function()
{},success:function(data)
{$("#email_new").val(email);if(trim(data)!='')
{$("#email_err").html(data);$("#loader_email").hide();$("#email").css("border","1px solid #FF0000");}
else
{$('#email_err').html('');$("#loader_email").attr('src','/api/signup/images/icon_right.png');$("#email").css("border","1px solid #D1CCD7");}}});}}});$(".input").keypress(function(e){if(e.keyCode==13)
{$('#register_user').click();}});$(".loginsignup").live('click',function(){$('#previewButton').css('display','none');var divclick=$(this).attr('id');if(divclick=='sighupform')
{$("#signform").show();$("#delaysign").hide();$(".fancybox-wrap").css('top','40px');}
else if(divclick=='show_forget_password_instructions')
{$('#basic-modal-content-forget-password').show();}
else
{$("#delaysign").show();$("#signform").hide();}});});function trim(str)
{return str.replace(/\s+/g,'');}
function validateUsername(username)
{var iChars="!@#$%^&*()+=-[]\\\';,./{}|\":<>?";var error_str='';var re=new RegExp('^[a-zA-Z 0-9]');var last_char=username.substr(-1,1);if(re.test(username)==false)
{error_str="First character of Username must be alphabet or number.";}
else if(re.test(last_char)==false)
{error_str="Last character of Username must be alphabet or number.";}
else if(trim(username)=='')
{error_str="Please provide a username.";}
if(trim(username)=='')
{error_str="Please provide a username.";$("#username_new").val("");}
else if(trim(username).length<4&&trim(username)!='')
{error_str="Username must have at least 4 characters.";}
else if(trim(username).length>20)
{error_str="Username should not exceed 20 characters.";}
else if(username.indexOf(' ')!=-1&&trim(username)!='')
{error_str="Space in username is not allowed.";}
if(trim(username)!='')
{for(var i=0;i<username.length;i++)
{if(iChars.indexOf(username.charAt(i))!=-1)
{error_str="Please use only alphabets, numbers or underscore in username.";break;}}}
if(error_str!='')
{return error_str;}
else
{return 1;}}
function validatePassword(password)
{var iChars="!#$%^&*()+=-[]\\\';,/{}|\":<>?";var error_str='';var matchcase="These passwords don't match. Try again?";var password=trim(password);if(password=='')
{error_str="Please provide password.";}
if(password.length<6&&password!='')
{error_str="Password must have at least 6 characters.";}
if(trim(password)!='')
{for(var i=0;i<password.length;i++)
{if(iChars.indexOf(password.charAt(i))!=-1)
{error_str="Please use only alphabets, numbers or underscore in password.";break;}}}
if(error_str!='')
{return error_str;}
else
{return 1;}}
function validateEmail(email)
{var emailRegEx=/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;var error_str="";var email=$.trim(email);if(email=='')
{error_str="Please provide your email address.";$("#email_new").val("");}
if(email.search(emailRegEx)==-1&&$.trim(email)!='')
{error_str="Email is not valid, please correct.";}
if(error_str!='')
{return error_str;}
else
{return 1;}}
function check_title(login,product)
{if(login=='')
{$.fancybox({'scrolling':'no','autoDimensions':false,'width':420,'height':205,'titlePosition':'inside',href:'#delaymanage',helpers:{title:null,overlay:{closeClick:false}},type:'inline',onClosed:function(dialog)
{$.fancybox.close();}});}
else
{$('#showloadder_submit').show();if(product=='SM')
{window.location='/survey/user.php?login='+login;}
else if(product=='TM')
{window.location='/training/mytrainings/?login='+login;}
else if(product=='QM')
{window.location="/quiz-school/user.php?login="+login;}}}