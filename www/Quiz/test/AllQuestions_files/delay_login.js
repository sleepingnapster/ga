$(document).ready(function()
{$("#username1").live('keypress',function(e)
{if(e.keyCode==13)
{$("#LOGIN_user").trigger('click');}});$('#password1').live('keypress',function(e)
{if(e.keyCode==13)
{$("#LOGIN_user").trigger('click');}});$('#LOGIN_user').live("click",function()
{var product=$('#product').val();var username=$('#username1').val();var password=$('#password1').val();var manage=$('.detail').val();var product_id=$('.current_product_id').val();var link_title_url=$('.current_link_url').val();$("#loader_button").hide();$("#show_error_area").hide();if(username==''&&password=='')
{$('#show_error_area').html('Please enter your username and password.');$('#show_error_area').show();$('#username1').css({'border':'1px solid #FF0000'});$('#password1').css({'border':'1px solid #FF0000'});$('#username1').focus();}
else if(username!=''&&password=='')
{$('#show_error_area').html('Please enter your password.');$('#show_error_area').show();$('#username1').css('style','1px solid #3B5998;');$('#password1').css({'border':'1px solid #FF0000;'});$('#password1').focus();}
else if(username==''&&password!='')
{$('#show_error_area').html('Please enter your username.');$('#show_error_area').show();$('#password1').css('style','1px solid #3B5998;');$('#username1').css({'border':'1px solid #FF0000;'});$('#username1').focus();}
else
{if(username!=''&&password!='')
{$.ajax({url:"/includes/login_check.php?username="+username+"&pass="+password+"&manage="+manage,type:'POST',cache:false,async:false,data:$('#login-form').serialize(),beforeSend:function()
{$('#delay_loader_login').show();$(".Login_user").css('background','url("../img/layout/ajax-loader.gif") no-repeat scroll  322px 9px #388BD1');},success:function(data)
{if(data=="##FALSE##")
{$("#loader_button").hide();$('#delay_loader_login').css({"display":"none"});$("#show_error_area").html('The username or password you entered is incorrect.');$("#show_error_area").show();$('#username1').css({'border':'1px solid #3B5998;'});$('#password1').css({'border':'1px solid #FF0000;'});$('#password1').focus();}
else
{$("#show_error_area").hide();$('#loader_submit_login').css({"display":"none"});if(data=="true")
{if(product=='Survey Maker')
{window.location.href='/survey/manage/delaymanage.php?surveyid='+product_id;}
else if(product=='Quiz Maker')
{if(detail=='manage')
{window.location.href='/quiz-school/manage/delaymanage.php?quiz_id='+product_id;}
else
{window.location.href='/quiz-school/personality/manage/delaymanage.php?quiz_id='+product_id;}}
else if(product=='Training Maker')
{window.location.href='/training/manage/delaymanage.php?course_id='+product_id;}
else if(product=='KnowledgeBase')
{window.location.href='/knowledgebase/myarticles/delaymanage.php?kb_id='+product_id;}
else if(product=='MLP_Delay_sigup')
{window.location.href='/training/mytrainings/temp_copy.php?c_id='+product_id;}}}}});}}});});