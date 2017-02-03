$(document).ready(function(){$("#search-btn").click(function(e){var cur_quiz_id_manage=document.getElementById("cur_quiz_id").value;if(cur_quiz_id_manage==0)
{create_linkid();}
e.preventDefault();var searchTitle=$("input#textSearch").val();if(searchTitle=="Search 100000+ questions"){errorMessage="Type keywords to search.<br />";$("#error_message").html(errorMessage);$("#error").hide();$("#error").fadeIn("slow");$("#find_loader").hide();$("#textSearch").focus();error='true';return false;}
$(".blockEdit_copy_load").show();$.ajax({type:"POST",url:"/quiz-school/_ajax_search_suggest_me_manage.php?title="+searchTitle+"&submitform=true",beforeSend:function(){$('#find_loader').show();},success:function(data){$("#find_loader").hide();$(".blockEdit_copy_load").hide();$("#ajax_search_code").html('');$("#ajax_search_code").html(data);$.fancybox({fitToView:false,width:960,height:600,autoSize:false,closeClick:false,openEffect:'none',closeEffect:'none',href:'#ajax_search_code',helpers:{title:null,overlay:{closeClick:false}},type:'inline',onClosed:function(dialog){$.fancybox.close();}});},error:function(XMLHttpRequest,exception)
{if(XMLHttpRequest.status==404)
{alert('404: Requested page not found.\nPlease try to submit again.');}
else if(XMLHttpRequest.status==500)
{alert('500: Internal Server Error.\nPlease try to submit again.');}
else if(exception==='parsererror')
{alert('Parse error has been occurred.\nPlease try to submit again.');}
else if(exception==='timeout')
{alert("Server detected connection problem.\nPlease try to submit again.");}
else if(exception==='abort')
{alert('Asynchronous request aborted.\nPlease try to submit again.');}
else if(XMLHttpRequest.status===0)
{alert('Network connection failed.\nPlease try to submit again.');}
else
{alert('Uncaught Exception.\nPlease try to submit again.');}}});});$("#search").click(function(e){e.preventDefault();var searchTitle=$("#textSearch1").val();if(searchTitle=="Search 100000+ questions"){errorMessage="Type keywords to search.<br />";$("#error_message").html(errorMessage);$("#error").hide();$("#error").fadeIn("slow");$("#find_loader").hide();$("#textSearch1").focus();error='true';return false;}
$.ajax({type:"POST",url:"/quiz-school/_ajax_search_suggest_me_manage.php?title="+searchTitle+"&submitform=true",beforeSend:function(){$('#find_loader1').show();},success:function(data){$("#find_loader1").hide();$("#ajax_search_code").html('');$("#ajax_search_code").html(data);$.fancybox(data,{'scrolling':'no','autoDimensions':false,'width':941,'height':600,'autoScale':false,'transitionIn':'none','transitionOut':'none','href':'#ajax_search_code','onStart':function(){$(window).scrollTop(650);}});}});});$("#addQuestion").click(function(){$('#loader_addQuestion').show();var searchTitle=$.trim($("input#textSearch").val());var allVals=[];$("input[name='addChk']:checked").each(function(){allVals.push($(this).val());});var total=allVals.length;function copy_question()
{if((total)>=1)
{for(var i=0;i<total;i++)
{pp(allVals[i]);}}}
copy_question();if(allVals=="")
{alert("Please select at least one question");$('#loader_addQuestion').hide();return false;}
$.ajax({type:"POST",url:"/quiz-school/_ajax_search_suggest_me_manage.php?title="+searchTitle+"&allVals="+allVals+"&submitform='true'",beforeSend:function(){$('#loader_addQuestion').show();},data:$('#addQfrm').serialize(),success:function(data){$("#ajax_search_code").html('');$("#ajax_search_code").html(data);$("#loader_addQuestion").hide();$.fancybox(data,{'scrolling':'no','autoDimensions':false,'width':941,'height':600,'autoScale':false,'transitionIn':'none','transitionOut':'none','href':'#ajax_search_code','onStart':function(){$(window).scrollTop(630);}});}});});$("a.paggingLink").click(function(){var searchTitle=$.trim($("input#textSearch1").val());var pageNum=$('input[type="hidden"]',this).val();$.ajax({type:"POST",url:"/quiz-school/_ajax_search_suggest_me_manage.php?title="+searchTitle+"&page="+pageNum+"&submitform=true",beforeSend:function(){$('#loader_pagging').show();},success:function(data){$("#loader_pagging").hide();$("#ajax_search_code").html('');$("#ajax_search_code").html(data);$.fancybox({'scrolling':'no','autoDimensions':false,'width':941,'height':600,'autoScale':false,'transitionIn':'none','transitionOut':'none','href':'#ajax_search_code','onStart':function(){$(window).scrollTop(630);}});}});});for(var i=1;i<=10;i++){if(i==1)
{$('div.rd'+i).show();$('#addQuestion').show();$('div#d1').css("background-color","#eee");}
else
{$('div.rd'+i).hide();}}
$('div#d1').click(function(){$('.rd1').show();$('#addQuestion').show();$(this).css("background-color","#eee");$('div.rd2').hide();$('div#response').hide();$('div.rd3').hide();$('div.rd4').hide();$('div.rd5').hide();$('div.rd6').hide();$('div.rd7').hide();$('div.rd8').hide();$('div.rd9').hide();$('div.rd10').hide();});$('div#d2').click(function(){$('.rd2').show();$('#addQuestion').show();$(this).css("background-color","#eee");$('div.rd1').hide();$('div#response').hide();$('div.rd3').hide();$('div.rd4').hide();$('div.rd5').hide();$('div.rd6').hide();$('div.rd7').hide();$('div.rd8').hide();$('div.rd9').hide();$('div.rd10').hide();});$('div#d3').click(function(){$('.rd3').show();$('#addQuestion').show();$(this).css("background-color","#eee");$('div.rd1').hide();$('div#response').hide();$('div.rd2').hide();$('div.rd4').hide();$('div.rd5').hide();$('div.rd6').hide();$('div.rd7').hide();$('div.rd8').hide();$('div.rd9').hide();$('div.rd10').hide();});$('div#d4').click(function(){$('.rd4').show();$('#addQuestion').show();$(this).css("background-color","#eee");$('div.rd1').hide();$('div#response').hide();$('div.rd2').hide();$('div.rd3').hide();$('div.rd5').hide();$('div.rd6').hide();$('div.rd7').hide();$('div.rd8').hide();$('div.rd9').hide();$('div.rd10').hide();});$('div#d5').click(function(){$('.rd5').show();$('#addQuestion').show();$(this).css("background-color","#eee");$('div.rd1').hide();$('div#response').hide();$('div.rd2').hide();$('div.rd3').hide();$('div.rd4').hide();$('div.rd6').hide();$('div.rd7').hide();$('div.rd8').hide();$('div.rd9').hide();$('div.rd10').hide();});$('div#d6').click(function(){$('.rd6').show();$('#addQuestion').show();$(this).css("background-color","#eee");$('div.rd1').hide();$('div#response').hide();$('div.rd2').hide();$('div.rd3').hide();$('div.rd4').hide();$('div.rd5').hide();$('div.rd7').hide();$('div.rd8').hide();$('div.rd9').hide();$('div.rd10').hide();});$('div#d7').click(function(){$('.rd7').show();$('#addQuestion').show();$(this).css("background-color","#eee");$('div.rd1').hide();$('div#response').hide();$('div.rd2').hide();$('div.rd3').hide();$('div.rd4').hide();$('div.rd5').hide();$('div.rd6').hide();$('div.rd8').hide();$('div.rd9').hide();$('div.rd10').hide();});$('div#d8').click(function(){$('.rd8').show();$('#addQuestion').show();$(this).css("background-color","#eee");$('div.rd1').hide();$('div#response').hide();$('div.rd2').hide();$('div.rd3').hide();$('div.rd4').hide();$('div.rd5').hide();$('div.rd6').hide();$('div.rd7').hide();$('div.rd9').hide();$('div.rd10').hide();});$('div#d9').click(function(){$('.rd9').show();$('#addQuestion').show();$(this).css("background-color","#eee");$('div.rd1').hide();$('div#response').hide();$('div.rd2').hide();$('div.rd3').hide();$('div.rd4').hide();$('div.rd5').hide();$('div.rd6').hide();$('div.rd7').hide();$('div.rd8').hide();$('div.rd10').hide();});$('div#d10').click(function(){$('.rd10').show();$('#addQuestion').show();$(this).css("background-color","#eee");$('div.rd1').hide();$('div#response').hide();$('div.rd2').hide();$('div.rd3').hide();$('div.rd4').hide();$('div.rd5').hide();$('div.rd6').hide();$('div.rd7').hide();$('div.rd8').hide();$('div.rd9').hide();});});$('.all').click(function(){var checked=$(this).prop('checked');if(checked){$("#addQuestion").addClass("btn_class btn-big primary")
$("#addQuestion").removeClass("gray")
return true;}
else{$("#addQuestion").addClass("gray")
$("#addQuestion").removeClass("btn_class btn-big primary")
return true;}});function checkonClickLeft(quid)
{if($(".checkbox"+quid).is(":checked"))
{$("#addQuestion").addClass("btn_class btn-big primary")
$("#addQuestion").removeClass("gray")}
else
{$("#addQuestion").addClass("gray")
$("#addQuestion").removeClass("btn_class btn-big primary")}}
function eachCheckbox(quid)
{if($('#addChk:not(:checked)').prop('checked',false))
{$(".all").prop("checked",false);}
if($(".checkbox"+quid).is(":checked"))
{$("#addQuestion").addClass("btn_class btn-big primary")
$("#addQuestion").removeClass("gray")}
else
{$("#addQuestion").addClass("gray")
$("#addQuestion").removeClass("btn_class btn-big primary")}}
function CheckedUnchecked(status,quid)
{$(".checkbox"+quid).each(function(){$(this).prop("checked",status);})}
function pp(para)
{var quizid=document.getElementById("cur_quiz_id").value;if(window.XMLHttpRequest)
{xmlhttp=new XMLHttpRequest();}
else
{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
xmlhttp.open("POST","/quiz-school/return_options_edit_search.php",false);xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");var fields="action=return_question_parameter&para="+para+"&quizid="+quizid;xmlhttp.send(fields);var linkid=document.getElementById("cur_link_id").value;window.location='/quiz-school/manage/?id='+linkid;$.blockUI({message:'<h1 style="border-bottom:none;text-align:center;color:white">Loading, please wait...</h1>',css:{border:'none',padding:'15px',backgroundColor:'#000','-webkit-border-radius':'10px','-moz-border-radius':'10px','-border-radius':'10px',opacity:.5}});}