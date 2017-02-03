(function($){jQuery.fn.extend({slimScroll:function(options){var defaults={wheelStep:20,width:'auto',height:'250px',size:'7px',color:'#000',position:'right',distance:'1px',start:'top',opacity:.4,alwaysVisible:false,disableFadeOut:false,railVisible:false,railColor:'#333',railOpacity:'0.2',railClass:'slimScrollRail',barClass:'slimScrollBar',wrapperClass:'slimScrollDiv',allowPageScroll:false,scroll:0,touchScrollStep:200};var o=$.extend(defaults,options);this.each(function(){var isOverPanel,isOverBar,isDragg,queueHide,touchDif,barHeight,percentScroll,lastScroll,divS='<div></div>',minBarHeight=30,releaseScroll=false;var me=$(this);if(me.parent().hasClass('slimScrollDiv'))
{if(scroll)
{bar=me.parent().find('.slimScrollBar');rail=me.parent().find('.slimScrollRail');scrollContent(me.scrollTop()+ parseInt(scroll),false,true);}
return;}
var wrapper=$(divS).addClass(o.wrapperClass).css({position:'relative',overflow:'hidden',width:o.width,height:o.height});me.css({overflow:'hidden',width:o.width,height:o.height});var rail=$(divS).addClass(o.railClass).css({width:o.size,height:'100%',position:'absolute',top:0,display:(o.alwaysVisible&&o.railVisible)?'block':'none','border-radius':o.size,background:o.railColor,opacity:o.railOpacity,zIndex:90});var bar=$(divS).addClass(o.barClass).css({background:o.color,width:o.size,position:'absolute',top:0,opacity:o.opacity,display:o.alwaysVisible?'block':'none','border-radius':o.size,BorderRadius:o.size,MozBorderRadius:o.size,WebkitBorderRadius:o.size,zIndex:99});var posCss=(o.position=='right')?{right:o.distance}:{left:o.distance};rail.css(posCss);bar.css(posCss);me.wrap(wrapper);me.parent().append(bar);me.parent().append(rail);bar.draggable({axis:'y',containment:'parent',start:function(){isDragg=true;},stop:function(){isDragg=false;hideBar();},drag:function(e)
{scrollContent(0,$(this).position().top,false);}});rail.hover(function(){showBar();},function(){hideBar();});bar.hover(function(){isOverBar=true;},function(){isOverBar=false;});me.hover(function(){isOverPanel=true;showBar();hideBar();},function(){isOverPanel=false;hideBar();});me.bind('touchstart',function(e,b){if(e.originalEvent.touches.length)
{touchDif=e.originalEvent.touches[0].pageY;}});me.bind('touchmove',function(e){e.originalEvent.preventDefault();if(e.originalEvent.touches.length)
{var diff=(touchDif- e.originalEvent.touches[0].pageY)/ o.touchScrollStep;scrollContent(diff,true);}});var _onWheel=function(e)
{if(!isOverPanel){return;}
var e=e||window.event;var delta=0;if(e.wheelDelta){delta=-e.wheelDelta/120;}
if(e.detail){delta=e.detail/3;}
scrollContent(delta,true);if(e.preventDefault&&!releaseScroll){e.preventDefault();}
if(!releaseScroll){e.returnValue=false;}}
function scrollContent(y,isWheel,isJump)
{var delta=y;if(isWheel)
{delta=parseInt(bar.css('top'))+ y*parseInt(o.wheelStep)/ 100 * bar.outerHeight();var maxTop=me.outerHeight()- bar.outerHeight();delta=Math.min(Math.max(delta,0),maxTop);bar.css({top:delta+'px'});}
percentScroll=parseInt(bar.css('top'))/ (me.outerHeight() - bar.outerHeight());delta=percentScroll*(me[0].scrollHeight- me.outerHeight());if(isJump)
{delta=y;var offsetTop=delta/me[0].scrollHeight*me.outerHeight();bar.css({top:offsetTop+'px'});}
me.scrollTop(delta);showBar();hideBar();}
var attachWheel=function()
{if(window.addEventListener)
{this.addEventListener('DOMMouseScroll',_onWheel,false);this.addEventListener('mousewheel',_onWheel,false);}
else
{document.attachEvent("onmousewheel",_onWheel)}}
attachWheel();function getBarHeight()
{barHeight=Math.max((me.outerHeight()/ me[0].scrollHeight) * me.outerHeight(), minBarHeight);bar.css({height:barHeight+'px'});}
getBarHeight();function showBar()
{getBarHeight();clearTimeout(queueHide);if(percentScroll==~~percentScroll)
{releaseScroll=o.allowPageScroll;if(lastScroll!=percentScroll)
{var msg=(~~percentScroll==0)?'top':'bottom';me.trigger('slimscroll',msg);}}
lastScroll=percentScroll;if(barHeight>=me.outerHeight()){releaseScroll=true;return;}
bar.stop(true,true).fadeIn('fast');if(o.railVisible){rail.stop(true,true).fadeIn('fast');}}
function hideBar()
{if(!o.alwaysVisible)
{queueHide=setTimeout(function(){if(!(o.disableFadeOut&&isOverPanel)&&!isOverBar&&!isDragg)
{bar.fadeOut('slow');rail.fadeOut('slow');}},1000);}}
if(o.start=='bottom')
{bar.css({top:me.outerHeight()- bar.outerHeight()});scrollContent(0,true);}
else if(typeof o.start=='object')
{scrollContent($(o.start).position().top,null,true);if(!o.alwaysVisible){bar.hide();}}});return this;}});jQuery.fn.extend({slimscroll:jQuery.fn.slimScroll});})(jQuery);