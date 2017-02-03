'use strict';jQuery.fn.ieSelectWidth=function(options)
{var defaults,selectFix,elements;elements=$(this);defaults={width:null,containerClassName:'ie-select-width-container',overlayClassName:'ie-select-width-overlay',overlayCSS:null,containerCSS:null};options=$.extend(defaults,options);selectFix={init:function()
{var self=this;if(!document.all)
{return false;}
$.each
(elements,function()
{var element=$(this);if(element.prop('multiple')||element.prop('size')>0)
{return false;}
if(!element.prop('id').length)
{element.prop('id',String((new Date()).getTime()).replace(/\D/gi,'').substr(8));}
if(options.width!==null)
{element.css('width',options.width+'px');}
element.data('origWidth',element.outerWidth());self.addContainer(element);self.addOverlay(element);$(element).css
({position:'relative',top:'auto',left:'auto',bottom:'auto',right:'auto',margin:'0'});});$(elements).bind
('dblclick mousedown change blur',function(event)
{self.openSelect(event);});$(elements).bind
('mousedown mouseup mouseover mouseout blur change',function(event)
{self.setClass(event);});},addContainer:function(element)
{var browserClass;if(!window.XMLHttpRequest)
{browserClass='ie6';}
else if(window.XMLHttpRequest&&!document.documentMode)
{browserClass='ie7';}
else if(document.documentMode)
{browserClass='ie8';}
element.after('<span id="'+ element.prop('id')+'-container" class="'+ options.containerClassName+' '+ browserClass+'"></span>');element.next().append(element);element.parent().css
({position:element.css('position')==='static'?'relative':element.css('position'),display:'block',top:element.css('top'),right:element.css('right'),bottom:element.css('bottom'),left:element.css('left'),overflow:'hidden',float:'right',width:element.outerWidth()+'px',margin:(element.css('margin-top')!=='auto'?element.css('margin-top'):'0')+' '+
(element.css('margin-right')!=='auto'?element.css('margin-right'):'0')+' '+
(element.css('margin-bottom')!=='auto'?element.css('margin-bottom'):'0')+' '+
(element.css('margin-left')!=='auto'?element.css('margin-left'):'0')});if(options.containerCSS!==null)
{element.parent().css(options.containerCSS);}},addOverlay:function(element)
{var borderBottom,borderRight,borderTop,childWidth,elementId,height,left,margin,overlay,overlayId,paddingRight,paddingTop,width;elementId=element.prop('id');overlayId=elementId+'-'+ options.overlayClassName;element.after('<a id="'+ overlayId+'" class="'+ options.overlayClassName+'"><span></span></a>');overlay=$('a#'+ overlayId);if(!window.XMLHttpRequest&&($.fn.bgIframe||$.fn.bgiframe))
{overlay.bgiframe();}
overlay.bind
('mousedown',function()
{setTimeout
(function()
{element.focus();},1);});childWidth=overlay.children('span').width();borderTop=element.css('border-top-style')!=='none'?+element.css('border-top-width').replace('px',''):0;borderRight=element.css('border-right-style')!=='none'?+element.css('border-right-width').replace('px',''):0;borderBottom=element.css('border-bottom-style')!=='none'?+element.css('border-bottom-width').replace('px',''):0;paddingTop=+element.css('padding-top').replace('px','');paddingRight=+element.css('padding-right').replace('px','');left=element.outerWidth()- childWidth;width=childWidth;height=element.outerHeight();if(document.documentMode)
{if(borderRight>0)
{left=left-(borderRight+ paddingRight);borderRight=borderRight+'px '+ element.css('border-right-style')+' '+ element.css('border-right-color');}
if(borderTop>0||borderBottom>0)
{height=height-(borderTop+ borderBottom);}
if(paddingRight>0)
{width=(childWidth+ paddingRight);}
margin=borderTop+'px 0';overlay.children('span').css
({margin:paddingTop+'px 0'});}
overlay.css
({position:'absolute',display:'none',top:element.position().top+'px',left:left+'px',width:width+'px',height:height+'px',margin:margin,borderRight:borderRight});if(options.overlayCSS!==null)
{overlay.css(options.overlayCSS);}},openSelect:function(event)
{var element,elementId,offset,overlay,pageX,pageY,type;element=$(event.target);elementId=element.prop('id');offset=element.offset();overlay=$('a#'+ elementId+'-'+ options.overlayClassName);pageX=event.pageX;pageY=event.pageY;type=event.type;if(type==='dblclick')
{element.css
({width:element.data('origWidth')+'px'});}
if(type==='change'||type==='blur'||(type==='mousedown'&&overlay.css('display')==='block'&&offset.left<pageX&&(offset.left+ element.data('origWidth'))>pageX&&offset.top<pageY&&(offset.top+ element.outerHeight())>pageY))
{return this.closeSelect(event);}
if(overlay.css('display')==='none')
{overlay.css('display','block');}
if(!element.data('ignore'))
{element.css('width','auto');if(element.outerWidth()<element.parent().innerWidth())
{element.css('width',element.data('origWidth')+'px');element.data('ignore',true);}}},closeSelect:function(event)
{var element=$(event.target);element.siblings('a.'+ options.overlayClassName+'').css('display','none');if(!element.data('ignore'))
{setTimeout
(function()
{element.css
({width:element.data('origWidth')+'px'});},1);}},setClass:function(event)
{var element,offset,overlay,pageX,pageY,type;element=$(event.target);offset=element.offset();overlay=$('a#'+ element.prop('id')+'-'+ options.overlayClassName);pageX=event.pageX;pageY=event.pageY;type=event.type;if(!overlay.length)
{return false;}
if(type==='mousedown'&&offset.left<pageX&&(offset.left+ element.data('origWidth'))>pageX&&offset.top<pageY&&(offset.top+ element.outerHeight())>pageY)
{overlay.removeClass().addClass(options.overlayClassName+' '+ options.overlayClassName+'-active');}
else if(type==='mouseover')
{overlay.removeClass().addClass(options.overlayClassName+' '+ options.overlayClassName+'-hover');}
else if(type==='mouseup'||type==='mouseout'||type==='blur'||type==='change')
{overlay.removeClass().addClass(options.overlayClassName);}}};selectFix.init();};