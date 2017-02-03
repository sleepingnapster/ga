function openFacebookwindow()
{var fromwhere=$('.detail').val();var RirectURL=$('#redirectURL').val();var product_id=$('.current_product_id').val();var newwindow;var screenX=typeof window.screenX!='undefined'?window.screenX:window.screenLeft,screenY=typeof window.screenY!='undefined'?window.screenY:window.screenTop,outerWidth=typeof window.outerWidth!='undefined'?window.outerWidth:document.body.clientWidth,outerHeight=typeof window.outerHeight!='undefined'?window.outerHeight:(document.body.clientHeight- 22),width=600,height=370,left=parseInt(screenX+((outerWidth- width)/ 2), 10),top=parseInt(screenY+((outerHeight- height)/ 2.5), 10),features=('width='+ width+',height='+ height+',left='+ left+',top='+ top);if(fromwhere=='manage')
{artclasses=window.open("/api/social/Facebook/?id_provider=Facebook&redirect_url="+RirectURL+'manage/delaymanage.php?product_id='+product_id+'&identity='+fromwhere,'Login_by_facebook',features);}
else if(fromwhere=='personality_manage')
{artclasses=window.open("/api/social/Facebook/?id_provider=Facebook&redirect_url="+RirectURL+'manage/delaymanage.php?product_id='+product_id+'&identity='+fromwhere,'Login_by_facebook',features);}
else if(fromwhere=='myarticles')
{artclasses=window.open("/api/social/Facebook/?id_provider=Facebook&redirect_url="+RirectURL+'myarticles/delaymanage.php?product_id='+product_id+'&identity='+fromwhere,'Login_by_facebook',features);}
else
{artclasses=window.open('/api/social/Facebook/?id_provider=Facebook&request=login&redirect_url='+RirectURL,'Login_by_facebook',features);}
console.log('1='+RirectURL);}
function openGooglewindow()
{var fromwhere=$('.detail').val();var RirectURL=$('#redirectURL').val();var product_id=$('.current_product_id').val();var registerurl=$('#REQUEST_URI').val();var current_link_url=$('.current_link_url').val();if(fromwhere=='manage')
{artclasses=window.open("/api/social/Google/oauth2callback/index.php?id_provider=Google&redirect_url="+RirectURL+'manage/delaymanage.php?product_id='+product_id+'&current_link_url='+current_link_url+'&identity='+fromwhere+'&registerurl='+registerurl,"artclasses"," location = 1, resizable = yes, status = 1, scrollbars = 1, width = 950, height=500");artclasses.moveTo(300,100);}
else if(fromwhere=='personality_manage')
{artclasses=window.open("/api/social/Google/oauth2callback/index.php?id_provider=Google&redirect_url="+RirectURL+'manage/delaymanage.php?product_id='+product_id+'&current_link_url='+current_link_url+'&identity='+fromwhere+'&registerurl='+registerurl,"artclasses"," location = 1, resizable = yes, status = 1, scrollbars = 1, width = 950, height=500");artclasses.moveTo(300,100);}
else if(fromwhere=='myarticles')
{console.log("/api/social/Google/oauth2callback/index.php?id_provider=Google&redirect_url="+RirectURL+'myarticles/delaymanage.php?product_id='+product_id+'&current_link_url='+current_link_url+'&identity='+fromwhere+'&registerurl='+registerurl);artclasses=window.open("/api/social/Google/oauth2callback/index.php?id_provider=Google&redirect_url="+RirectURL+'myarticles/delaymanage.php?product_id='+product_id+'&current_link_url='+current_link_url+'&identity='+fromwhere+'&registerurl='+registerurl,"artclasses"," location = 1, resizable = yes, status = 1, scrollbars = 1, width = 950, height=500");artclasses.moveTo(300,100);}
else
{artclasses=window.open("/api/social/Google/oauth2callback/index.php?id_provider=Google&redirect_url="+RirectURL+'&registerurl='+registerurl,"artclasses"," location = 1, resizable = yes, status = 1, scrollbars = 1, width = 950, height=500");artclasses.moveTo(300,100);}}
function openTwitterwindow()
{var fromwhere=$('.detail').val();var RirectURL=$('#redirectURL').val();var product_id=$('.current_product_id').val();var current_link_url=$('.current_link_url').val();if(fromwhere=='manage')
{artclasses=window.open("/api/social/Twitter/?id_provider=Twitter&redirect_url="+RirectURL+'manage/delaymanage.php?product_id='+product_id+'&current_link_url='+current_link_url+'&identity='+fromwhere,"artclasses"," location = 1, resizable = yes, status = 1, scrollbars = 1, width = 950, height=500");artclasses.moveTo(300,100);}
else if(fromwhere=='personality_manage')
{artclasses=window.open("/api/social/Twitter/?id_provider=Twitter&redirect_url="+RirectURL+'manage/delaymanage.php?product_id='+product_id+'&current_link_url='+current_link_url+'&identity='+fromwhere,"artclasses"," location = 1, resizable = yes, status = 1, scrollbars = 1, width = 950, height=500");artclasses.moveTo(300,100);}
else if(fromwhere=='myarticles')
{artclasses=window.open("/api/social/Twitter/?id_provider=Twitter&redirect_url="+RirectURL+'myarticles/delaymanage.php?product_id='+product_id+'&current_link_url='+current_link_url+'&identity='+fromwhere,"artclasses"," location = 1, resizable = yes, status = 1, scrollbars = 1, width = 950, height=500");artclasses.moveTo(300,100);}
else
{artclasses=window.open("/api/social/Twitter/?id_provider=Twitter&redirect_url="+RirectURL,"artclasses"," location = 1, resizable = yes, status = 1, scrollbars = 1, width = 950, height=500");artclasses.moveTo(300,100);}}