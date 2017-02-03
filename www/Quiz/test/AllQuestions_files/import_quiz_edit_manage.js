$(function()
{var hideDelay=100;var currentID;var hideTimer=null;var container=$('<div id="personPopupContainer">'
+'<table width="" border="0" cellspacing="0" cellpadding="0" align="center" class="personPopupPopup" style="margin-top:25px;">'
+'<tr>'
+'   <td class="corner topLeft"></td>'
+'   <td class="top1"></td>'
+'   <td class="corner topRight"></td>'
+'</tr>'
+'<tr>'
+'   <td class="left1">&nbsp;</td>'
+'   <td><div id="personPopupContent"></div></td>'
+'   <td class="right1">&nbsp;</td>'
+'</tr>'
+'<tr>'
+'   <td class="corner bottomLeft">&nbsp;</td>'
+'   <td class="bottom1">&nbsp;</td>'
+'   <td class="corner bottomRight"></td>'
+'</tr>'
+'</table>'
+'</div>');$('body').append(container);$('.personPopupTrigger').live('mouseover',function()
{var settings=$(this).attr('rel').split(',');var quesID=settings[0];if(hideTimer)
clearTimeout(hideTimer);var pos=$(this).offset();var width=$(this).width();container.css({left:(380)+'px',top:pos.top- 5+'px'});$('#personPopupContent').html('&nbsp;');$('#personPopupContent').html(document.getElementById(quesID+'dv').innerHTML);container.css('display','block');});$('.personPopupTrigger').live('mouseout',function()
{if(hideTimer)
clearTimeout(hideTimer);hideTimer=setTimeout(function()
{container.css('display','none');},hideDelay);});$('#personPopupContainer').mouseover(function()
{if(hideTimer)
clearTimeout(hideTimer);});$('#personPopupContainer').mouseout(function()
{if(hideTimer)
clearTimeout(hideTimer);hideTimer=setTimeout(function()
{container.css('display','none');},hideDelay);});});function fill_list_box(arg,quiz_type)
{if(window.XMLHttpRequest)
{xmlhttp=new XMLHttpRequest();}
else
{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
xmlhttp.onreadystatechange=function()
{if(xmlhttp.readyState==4&&xmlhttp.status==200)
{var split_text=xmlhttp.responseText.split("*##*");for(var i=0;i<split_text.length;i++)
{var split_text_2=(split_text[i]).split("*|*");var optn=document.createElement("OPTION");optn.text=split_text_2[0];optn.value=split_text_2[1]+"-*##*-"+split_text_2[2];document.getElementById("quiz_made_by_me").options.add(optn);}}}
xmlhttp.open("POST","/quiz-school/return_options_edit.php",true);xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");$fields="action=populate_list_box&arg="+arg+"&quiz_type="+quiz_type;xmlhttp.send($fields);}
function select_one(str,arg)
{if(str=="public_quiz")
{document.getElementById("quiz_took").innerHTML="&nbsp;<input type='hidden' name='public_quiz_subsection' value='quiz_i_took' id='public_quiz_subsection' checked='checked' onclick='select_between_two(1,"+arg+");' />";document.getElementById("quiz_i_took_subsection").innerHTML="&nbsp;&nbsp;&nbsp;<select name='quiz_made_by_me' id='quiz_made_by_me' style='width:550px;padding:5px;'><option value='select'>Select Quiz</option></select><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style='font-style:italic; color:#919191'>* Select from permitted public quizzes.</font><br />";document.getElementById("from_url_subsection").innerHTML="";document.getElementById("quiz_i_made").innerHTML="";fill_list_box(arg,'quiz_i_took');}
else if(str=="excel_quiz")
{document.getElementById("quiz_from_excel").innerHTML="&nbsp;<input type='hidden' name='import_from_excel' style='padding:5px; width:550px;' id='import_from_excel' value='excel_import'/>";}
else
{document.getElementById("quiz_i_made").innerHTML="&nbsp;<select name='quiz_made_by_me' style='padding:5px; width:550px;' id='quiz_made_by_me'><option value='select'>Select Quiz</option></select>";fill_list_box(arg,'quiz_i_made');document.getElementById("quiz_took").innerHTML="";document.getElementById("from_url").innerHTML="";document.getElementById("quiz_i_took_subsection").innerHTML="";document.getElementById("from_url_subsection").innerHTML="";}}
function select_between_two(str,arg)
{if(str==1)
{document.getElementById("quiz_i_took_subsection").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name='quiz_made_by_me' id='quiz_made_by_me' style='width:550px; padding:5px;'><option value='select'>Select Quiz</option></select><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style='font-style:italic; color:#919191'>* Select from permitted public quizzes.</font><br />";document.getElementById("from_url_subsection").innerHTML="";fill_list_box(arg,'quiz_i_took');}
else
{document.getElementById("from_url_subsection").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style='font-style:italic; color:#919191'>Enter a url of the quiz from ProProfs Quiz Maker.</font><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='quiz_by_url' id='quiz_by_url' size='70' /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style='font-style:italic; color:#919191'>* Enter the URL of the quiz starting with 'http://www.proprofs.com/quiz-<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;school/story.php?title='. This is the URL of the page with the 'start<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;quiz' button.</font>";document.getElementById("quiz_i_took_subsection").innerHTML="";}}
function load_first_time(arg)
{if(document.getElementById("cur_quiz_id").value==0)
{create_linkid();}
document.getElementById("quiz_i_made").innerHTML="&nbsp;<select name='quiz_made_by_me' style='width:550px;padding:5px;' id='quiz_made_by_me'><option value='select'>Select Quiz</option></select>";document.getElementById("from_url_subsection").innerHTML="";fill_list_box(arg,'quiz_i_made');}
function next_button(arg)
{var cur_link_id=document.getElementById("cur_link_id").value;var quiz_id="select";var flag="";var quiz_title="";var quiz_label;if(document.getElementById("import_from_excel"))
{document.getElementById('next_loader').style.display="block";$("#copy_id_import").hide();$.ajax({url:'/quiz-school/xlspage.php?cur_link_id='+cur_link_id,type:'POST',success:function(data)
{document.getElementById("from_excel").innerHTML=data;document.getElementById("next_id").style.display="none";document.getElementById('next_loader').style.display="none";document.getElementById('last_done').style.display="inline";var uniqueFileName=Math.floor(Math.random()*100000);bulkUploader(uniqueFileName);$('html, body').animate({scrollTop:0},400);},error:function(XMLHttpRequest,exception)
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
{alert('Uncaught Exception.\nPlease try to submit again.');}}});return false;}
document.getElementById('next_loader').style.display="none";if(document.getElementById("quiz_made_by_me"))
{var quiz_part=(document.getElementById("quiz_made_by_me").value).split("-*##*-");quiz_id=quiz_part[0];quiz_label=quiz_part[1];var quiz_type="quiz_i_made";}
else
{var textbox_val=document.getElementById("quiz_by_url").value;var url_part=textbox_val.split("?");if(url_part[0]=="http://www.proprofs.com/quiz-school/story.php")
{var sub_url_part=url_part[1].split("=");var quiz_type="quiz_by_url";quiz_title=sub_url_part[1];quiz_label=sub_url_part[1];}
else
{flag="error";alert("Invalid Url...");}}
if(quiz_id!="select"||quiz_title!="")
{if(window.XMLHttpRequest)
{xmlhttp=new XMLHttpRequest();}
else
{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
xmlhttp.onreadystatechange=function()
{if(xmlhttp.readyState==4&&xmlhttp.status==200)
{document.getElementById('top_title').style.display="none";document.getElementById('next_loader').style.display="none"
document.getElementById("rest_contents_second_step").style.display="none";document.getElementById("rest_contents_third_step").style.display="block";document.getElementById("sub_title").innerHTML="<table cellspacing='0'><tr><td><span style='font-size:18px;color:#878787;'>Select questions from quiz \""+quiz_label+"\"</span></td></tr></table>";document.getElementById("rest_contents_third_step").innerHTML=xmlhttp.responseText;document.getElementById("hover_description").style.visibility='visible';document.getElementById("back_button").style.visibility='visible';document.getElementById("next_id").style.display="none";document.getElementById("copy_id_import").style.display="inline";}}
xmlhttp.open("POST","/quiz-school/return_options_edit.php",true);xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");if(quiz_type=="quiz_i_made")
{$fields="action=quiz_i_made_questions&arg="+arg+"&quiz_id="+quiz_id+"&quiz_type="+quiz_type;}
else
{$fields="action=quiz_i_made_questions&arg="+arg+"&quiz_title="+quiz_title+"&quiz_type="+quiz_type;}
xmlhttp.send($fields);}
else
{if(flag!="error")
{alert("Select a quiz from list.");document.getElementById('next_loader').style.display="none"}}}
function get_ques_paramerer(para)
{var str;if(window.XMLHttpRequest)
{xmlhttp=new XMLHttpRequest();}
else
{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
xmlhttp.onreadystatechange=function()
{if(xmlhttp.readyState==4&&xmlhttp.status==200)
{str=xmlhttp.responseText;}}
xmlhttp.open("POST","/quiz-school/return_options_edit.php",true);xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");$fields="action=return_question_parameter&para="+para;xmlhttp.send($fields);}
function pp_manage(para)
{var quizid=document.getElementById("cur_quiz_id").value;if(window.XMLHttpRequest)
{xmlhttp=new XMLHttpRequest();}
else
{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
xmlhttp.open("POST","/quiz-school/return_options_edit.php",false);xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");var fields="action=return_question_parameter&para="+para+"&quizid="+quizid;xmlhttp.send(fields);}
function copy_button_import(arg)
{$('#copy_id_import').prop('disabled',true);var total_selected=0;document.getElementById('copy_loader').style.display="block";if((document.chk_form.chk.length)>1)
{for(var i=0;i<document.chk_form.chk.length;i++)
{if(document.chk_form.chk[i].checked)
{pp_manage(document.chk_form.chk[i].value);total_selected++;}}}
else
{if(document.chk_form.chk.checked)
{pp_manage(document.chk_form.chk.value);total_selected++;}}
$.modal.close();var linkid=document.getElementById("cur_link_id").value;window.location='/quiz-school/manage/?id='+linkid+'&mode=imported&total='+total_selected;}
function back_button(arg)
{document.getElementById("rest_contents_third_step").style.display="none";document.getElementById("rest_contents_second_step").style.display="block";document.getElementById('top_title').style.display="block";document.getElementById("back_button").style.visibility='hidden';document.getElementById("hover_description").style.visibility='hidden';document.getElementById("copy_id_import").style.display='none';document.getElementById("next_id").style.display='inline';document.getElementById("sub_title").innerHTML="<strong style='font-size: 16px;'></strong>";}
function select_all()
{if(document.getElementById('chk_unchk').checked)
{if((document.chk_form.chk.length)>1)
{for(var min=0;min<(document.chk_form.chk.length);min++)
{document.chk_form.chk[min].checked=true;}}
else
{document.chk_form.chk.checked=true;}}
else
{if((document.chk_form.chk.length)>1)
{for(var min=0;min<(document.chk_form.chk.length);min++)
{document.chk_form.chk[min].checked=false;}}
else
{document.chk_form.chk.checked=false;}}}
function sort_question(arg)
{var my_val=new Array();var my_clean_val=new Array();var my_id=new Array();var chk_status=new Array();var chk_status_hidden=new Array();var temp=new Array();var my_hidden=new Array();var myBody=document.getElementsByTagName("body")[0];var mytable=document.getElementById("question_table");var mytablebody=mytable.getElementsByTagName("tbody")[0];for(var min=0;min<(mytablebody.getElementsByTagName("tr").length);min++)
{var myrow=mytablebody.getElementsByTagName("tr")[min];var mycel=myrow.getElementsByTagName("td")[1];var mycel2=myrow.getElementsByTagName("td")[0];var mycel3=myrow.getElementsByTagName("td")[2];var mycel4=myrow.getElementsByTagName("td")[3];my_val[min]=mycel.innerHTML;my_id[min]=mycel2.innerHTML;my_hidden[min]=mycel3.innerHTML;my_clean_val[min]=(mycel4.innerHTML).toLowerCase();if(document.chk_form.chk[min].checked)
{chk_status[min]="checked";}
else
{chk_status[min]="unchecked";}
if(document.chk_form.chk[min].checked)
{chk_status_hidden[min]=mycel3.innerHTML;}
else
{chk_status_hidden[min]="unchecked";}}
if(arg=="selected")
{var min_val=0,min_val2=0;for(var min2=0;min2<(chk_status.length);min2++)
{if(chk_status[min2]=="checked")
{var myrow=mytablebody.getElementsByTagName("tr")[min_val];var mycel=myrow.getElementsByTagName("td")[1];var mycel2=myrow.getElementsByTagName("td")[0];var mycel3=myrow.getElementsByTagName("td")[2];mycel.innerHTML=my_val[min2];mycel2.innerHTML=my_id[min2];mycel3.innerHTML=my_hidden[min2];document.chk_form.chk[min_val].checked=true;min_val++;}
else
{temp[min_val2]=min2;min_val2++;}}
for(var min3=0;min3<temp.length;min3++)
{var myrow=mytablebody.getElementsByTagName("tr")[min_val];var mycel=myrow.getElementsByTagName("td")[1];var mycel2=myrow.getElementsByTagName("td")[0];var mycel3=myrow.getElementsByTagName("td")[2];mycel.innerHTML=my_val[temp[min3]];mycel2.innerHTML=my_id[temp[min3]];mycel3.innerHTML=my_hidden[temp[min3]];min_val++;}
document.getElementById('sel').style.color='#919191';document.getElementById('ori').style.color='#3196ad';document.getElementById('alpha').style.color='#3196ad';}
else if(arg=="original")
{var min_val=0;for(var min=0;min<my_hidden.length;min++)
{if(my_hidden[min]==min_val)
{var myrow=mytablebody.getElementsByTagName("tr")[min_val];var mycel=myrow.getElementsByTagName("td")[1];var mycel2=myrow.getElementsByTagName("td")[0];var mycel3=myrow.getElementsByTagName("td")[2];mycel.innerHTML=my_val[min];mycel2.innerHTML=my_id[min];mycel3.innerHTML=my_hidden[min];min_val++;min=-1;}}
for(var min2=0;min2<chk_status_hidden.length;min2++)
{if(chk_status_hidden[min2]!="unchecked")
{document.chk_form.chk[chk_status_hidden[min2]].checked=true;}}
document.getElementById('ori').style.color='#919191';document.getElementById('alpha').style.color='#3196ad';document.getElementById('sel').style.color='#3196ad';}
if(arg=="alphabetically")
{my_clean_val.sort();for(var min3=0;min3<my_clean_val.length;min3++)
{var split_val=my_clean_val[min3].split('**#**');var final_index=split_val[(split_val.length)-1];for(var min=0;min<my_hidden.length;min++)
{if(final_index==my_hidden[min])
{var myrow=mytablebody.getElementsByTagName("tr")[min3];var mycel=myrow.getElementsByTagName("td")[1];var mycel2=myrow.getElementsByTagName("td")[0];var mycel3=myrow.getElementsByTagName("td")[2];mycel.innerHTML=my_val[min];mycel2.innerHTML=my_id[min];mycel3.innerHTML=my_hidden[min];}}}
for(var min2=0;min2<chk_status_hidden.length;min2++)
{if(chk_status_hidden[min2]!="unchecked")
{document.chk_form.chk[chk_status_hidden[min2]].checked=true;}}
document.getElementById('alpha').style.color='#919191';document.getElementById('ori').style.color='#3196ad';document.getElementById('sel').style.color='#3196ad';}}