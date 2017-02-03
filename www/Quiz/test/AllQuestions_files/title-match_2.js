function titleStatus(title){if(document.quizform.quizTYPE.value=='edit'){var oq_title=document.quizform.oldq_title.value;var url='/quiz-school/title_request/?title='+title+'&oqtitle='+oq_title;}else{var url='/quiz-school/title_request/?title='+title;}
var xmlHttp;try{xmlHttp=new XMLHttpRequest();}
catch(e){try{xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){try{xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}catch(e){alert("Please enable your browser Java Script !!!");return false;}}}
xmlHttp.onreadystatechange=function()
{if(xmlHttp.readyState==4){if(xmlHttp.responseText.indexOf('2')=='0')
{window.location.replace('/quiz-school/login.php');}
else
{document.getElementById('resultTextDiv').innerHTML=xmlHttp.responseText;}}}
xmlHttp.open("GET",url,true);xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");xmlHttp.send(null);}