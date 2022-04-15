/**
 *
 * Color picker
 * Author: Stefan Petre www.eyecon.ro
 *
 * Dual licensed under the MIT and GPL licenses
 *
 */
 (function(c){var e=function(){var e=65,H={eventName:"click",onShow:function(){},onBeforeShow:function(){},onHide:function(){},onChange:function(){},onSubmit:function(){},color:"ff0000",livePreview:!0,flat:!1},l=function(a,b){var d=h(a);c(b).data("colorpicker").fields.eq(1).val(d.r).end().eq(2).val(d.g).end().eq(3).val(d.b).end()},r=function(a,b){c(b).data("colorpicker").fields.eq(4).val(a.h).end().eq(5).val(a.s).end().eq(6).val(a.b).end()},n=function(a,b){c(b).data("colorpicker").fields.eq(0).val(m(h(a))).end()},
 t=function(a,b){c(b).data("colorpicker").selector.css("backgroundColor","#"+m(h({h:a.h,s:100,b:100})));c(b).data("colorpicker").selectorIndic.css({left:parseInt(150*a.s/100,10),top:parseInt(150*(100-a.b)/100,10)})},u=function(a,b){c(b).data("colorpicker").hue.css("top",parseInt(150-150*a.h/360,10))},w=function(a,b){c(b).data("colorpicker").currentColor.css("backgroundColor","#"+m(h(a)))},v=function(a,b){c(b).data("colorpicker").newColor.css("backgroundColor","#"+m(h(a)))},I=function(a){a=a.charCode||
 a.keyCode||-1;if(a>e&&90>=a||32==a)return!1;!0===c(this).parent().parent().data("colorpicker").livePreview&&p.apply(this)},p=function(a){var b=c(this).parent().parent();if(0<this.parentNode.className.indexOf("_hex")){var d=b.data("colorpicker");var g=this.value,f=6-g.length;if(0<f){for(var k=[],e=0;e<f;e++)k.push("0");k.push(g);g=k.join("")}d.color=d=q(x(g))}else 0<this.parentNode.className.indexOf("_hsb")?b.data("colorpicker").color=d=y({h:parseInt(b.data("colorpicker").fields.eq(4).val(),10),s:parseInt(b.data("colorpicker").fields.eq(5).val(),
 10),b:parseInt(b.data("colorpicker").fields.eq(6).val(),10)}):(d=b.data("colorpicker"),g=parseInt(b.data("colorpicker").fields.eq(1).val(),10),f=parseInt(b.data("colorpicker").fields.eq(2).val(),10),k=parseInt(b.data("colorpicker").fields.eq(3).val(),10),d.color=d=q({r:Math.min(255,Math.max(0,g)),g:Math.min(255,Math.max(0,f)),b:Math.min(255,Math.max(0,k))}));a&&(l(d,b.get(0)),n(d,b.get(0)),r(d,b.get(0)));t(d,b.get(0));u(d,b.get(0));v(d,b.get(0));b.data("colorpicker").onChange.apply(b,[d,m(h(d)),h(d)])},
 J=function(a){c(this).parent().parent().data("colorpicker").fields.parent().removeClass("colorpicker_focus")},K=function(){e=0<this.parentNode.className.indexOf("_hex")?70:65;c(this).parent().parent().data("colorpicker").fields.parent().removeClass("colorpicker_focus");c(this).parent().addClass("colorpicker_focus")},L=function(a){var b=c(this).parent().find("input").focus();a={el:c(this).parent().addClass("colorpicker_slider"),max:0<this.parentNode.className.indexOf("_hsb_h")?360:0<this.parentNode.className.indexOf("_hsb")?
 100:255,y:a.pageY,field:b,val:parseInt(b.val(),10),preview:c(this).parent().parent().data("colorpicker").livePreview};c(document).bind("mouseup",a,z);c(document).bind("mousemove",a,A)},A=function(a){a.data.field.val(Math.max(0,Math.min(a.data.max,parseInt(a.data.val+a.pageY-a.data.y,10))));a.data.preview&&p.apply(a.data.field.get(0),[!0]);return!1},z=function(a){p.apply(a.data.field.get(0),[!0]);a.data.el.removeClass("colorpicker_slider").find("input").focus();c(document).unbind("mouseup",z);c(document).unbind("mousemove",
 A);return!1},M=function(a){a={cal:c(this).parent(),y:c(this).offset().top};a.preview=a.cal.data("colorpicker").livePreview;c(document).bind("mouseup",a,B);c(document).bind("mousemove",a,C)},C=function(a){p.apply(a.data.cal.data("colorpicker").fields.eq(4).val(parseInt(360*(150-Math.max(0,Math.min(150,a.pageY-a.data.y)))/150,10)).get(0),[a.data.preview]);return!1},B=function(a){l(a.data.cal.data("colorpicker").color,a.data.cal.get(0));n(a.data.cal.data("colorpicker").color,a.data.cal.get(0));c(document).unbind("mouseup",
 B);c(document).unbind("mousemove",C);return!1},N=function(a){a={cal:c(this).parent(),pos:c(this).offset()};a.preview=a.cal.data("colorpicker").livePreview;c(document).bind("mouseup",a,D);c(document).bind("mousemove",a,E)},E=function(a){p.apply(a.data.cal.data("colorpicker").fields.eq(6).val(parseInt(100*(150-Math.max(0,Math.min(150,a.pageY-a.data.pos.top)))/150,10)).end().eq(5).val(parseInt(100*Math.max(0,Math.min(150,a.pageX-a.data.pos.left))/150,10)).get(0),[a.data.preview]);return!1},D=function(a){l(a.data.cal.data("colorpicker").color,
 a.data.cal.get(0));n(a.data.cal.data("colorpicker").color,a.data.cal.get(0));c(document).unbind("mouseup",D);c(document).unbind("mousemove",E);return!1},O=function(a){c(this).addClass("colorpicker_focus")},P=function(a){c(this).removeClass("colorpicker_focus")},Q=function(a){a=c(this).parent();var b=a.data("colorpicker").color;a.data("colorpicker").origColor=b;w(b,a.get(0));a.data("colorpicker").onSubmit(b,m(h(b)),h(b),a.data("colorpicker").el)},G=function(a){var b=c("#"+c(this).data("colorpickerId"));
 b.data("colorpicker").onBeforeShow.apply(this,[b.get(0)]);var d=c(this).offset(),g="CSS1Compat"==document.compatMode;a=window.pageXOffset||(g?document.documentElement.scrollLeft:document.body.scrollLeft);var f=window.pageYOffset||(g?document.documentElement.scrollTop:document.body.scrollTop);var k=window.innerWidth||(g?document.documentElement.clientWidth:document.body.clientWidth);var e=d.top+this.offsetHeight;d=d.left;e+176>f+(window.innerHeight||(g?document.documentElement.clientHeight:document.body.clientHeight))&&
 (e-=this.offsetHeight+176);d+356>a+k&&(d-=356);b.css({left:d+"px",top:e+"px"});0!=b.data("colorpicker").onShow.apply(this,[b.get(0)])&&b.show();c(document).bind("mousedown",{cal:b},F);return!1},F=function(a){R(a.data.cal.get(0),a.target,a.data.cal.get(0))||(0!=a.data.cal.data("colorpicker").onHide.apply(this,[a.data.cal.get(0)])&&a.data.cal.hide(),c(document).unbind("mousedown",F))},R=function(a,b,d){if(a==b)return!0;if(a.contains)return a.contains(b);if(a.compareDocumentPosition)return!!(a.compareDocumentPosition(b)&
 16);for(b=b.parentNode;b&&b!=d;){if(b==a)return!0;b=b.parentNode}return!1},y=function(a){return{h:Math.min(360,Math.max(0,a.h)),s:Math.min(100,Math.max(0,a.s)),b:Math.min(100,Math.max(0,a.b))}},x=function(a){a=parseInt(-1<a.indexOf("#")?a.substring(1):a,16);return{r:a>>16,g:(a&65280)>>8,b:a&255}},q=function(a){var b={h:0,s:0,b:0},d=Math.max(a.r,a.g,a.b),c=d-Math.min(a.r,a.g,a.b);b.b=d;b.s=0!=d?255*c/d:0;b.h=0!=b.s?a.r==d?(a.g-a.b)/c:a.g==d?2+(a.b-a.r)/c:4+(a.r-a.g)/c:-1;b.h*=60;0>b.h&&(b.h+=360);
 b.s*=100/255;b.b*=100/255;return b},h=function(a){var b,d;var c=Math.round(a.h);var f=Math.round(255*a.s/100);a=Math.round(255*a.b/100);if(0==f)c=b=d=a;else{f=(255-f)*a/255;var e=c%60*(a-f)/60;360==c&&(c=0);60>c?(c=a,d=f,b=f+e):120>c?(b=a,d=f,c=a-e):180>c?(b=a,c=f,d=f+e):240>c?(d=a,c=f,b=a-e):300>c?(d=a,b=f,c=f+e):360>c?(c=a,b=f,d=a-e):d=b=c=0}return{r:Math.round(c),g:Math.round(b),b:Math.round(d)}},m=function(a){var b=[a.r.toString(16),a.g.toString(16),a.b.toString(16)];c.each(b,function(a,c){1==
 c.length&&(b[a]="0"+c)});return b.join("")},S=function(){var a=c(this).parent(),b=a.data("colorpicker").origColor;a.data("colorpicker").color=b;l(b,a.get(0));n(b,a.get(0));r(b,a.get(0));t(b,a.get(0));u(b,a.get(0));v(b,a.get(0))};return{init:function(a){a=c.extend({},H,a||{});if("string"==typeof a.color)a.color=q(x(a.color));else if(void 0!=a.color.r&&void 0!=a.color.g&&void 0!=a.color.b)a.color=q(a.color);else if(void 0!=a.color.h&&void 0!=a.color.s&&void 0!=a.color.b)a.color=y(a.color);else return this;
 return this.each(function(){if(!c(this).data("colorpickerId")){var b=c.extend({},a);b.origColor=a.color;var d="collorpicker_"+parseInt(1E3*Math.random());c(this).data("colorpickerId",d);d=c('<div class="colorpicker"><div class="colorpicker_color"><div><div></div></div></div><div class="colorpicker_hue"><div></div></div><div class="colorpicker_new_color"></div><div class="colorpicker_current_color"></div><div class="colorpicker_hex"><input type="text" maxlength="6" size="6" /></div><div class="colorpicker_rgb_r colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_rgb_g colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_rgb_b colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_hsb_h colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_hsb_s colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_hsb_b colorpicker_field"><input type="text" maxlength="3" size="3" /><span></span></div><div class="colorpicker_submit"></div></div>').attr("id",
 d);b.flat?d.appendTo(this).show():d.appendTo(document.body);b.fields=d.find("input").bind("keyup",I).bind("change",p).bind("blur",J).bind("focus",K);d.find("span").bind("mousedown",L).end().find(">div.colorpicker_current_color").bind("click",S);b.selector=d.find("div.colorpicker_color").bind("mousedown",N);b.selectorIndic=b.selector.find("div div");b.el=this;b.hue=d.find("div.colorpicker_hue div");d.find("div.colorpicker_hue").bind("mousedown",M);b.newColor=d.find("div.colorpicker_new_color");b.currentColor=
 d.find("div.colorpicker_current_color");d.data("colorpicker",b);d.find("div.colorpicker_submit").bind("mouseenter",O).bind("mouseleave",P).bind("click",Q);l(b.color,d.get(0));r(b.color,d.get(0));n(b.color,d.get(0));u(b.color,d.get(0));t(b.color,d.get(0));w(b.color,d.get(0));v(b.color,d.get(0));b.flat?d.css({position:"relative",display:"block"}):c(this).bind(b.eventName,G)}})},showPicker:function(){return this.each(function(){c(this).data("colorpickerId")&&G.apply(this)})},hidePicker:function(){return this.each(function(){c(this).data("colorpickerId")&&
 c("#"+c(this).data("colorpickerId")).hide()})},setColor:function(a){if("string"==typeof a)a=q(x(a));else if(void 0!=a.r&&void 0!=a.g&&void 0!=a.b)a=q(a);else if(void 0!=a.h&&void 0!=a.s&&void 0!=a.b)a=y(a);else return this;return this.each(function(){if(c(this).data("colorpickerId")){var b=c("#"+c(this).data("colorpickerId"));b.data("colorpicker").color=a;b.data("colorpicker").origColor=a;l(a,b.get(0));r(a,b.get(0));n(a,b.get(0));u(a,b.get(0));t(a,b.get(0));w(a,b.get(0));v(a,b.get(0))}})}}}();c.fn.extend({ColorPicker:e.init,
 ColorPickerHide:e.hidePicker,ColorPickerShow:e.showPicker,ColorPickerSetColor:e.setColor})})(jQuery);