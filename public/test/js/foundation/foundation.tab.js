!function(t,a,e,n){"use strict";Foundation.libs.tab={name:"tab",version:"5.5.0",settings:{active_class:"active",callback:function(){},deep_linking:!1,scroll_to_content:!0,is_hover:!1},default_tab_hashes:[],init:function(t,a,e){var n=this,i=this.S;this.bindings(a,e),this.handle_location_hash_change(),i("["+this.attr_name()+"] > .active > a",this.scope).each(function(){n.default_tab_hashes.push(this.hash)})},events:function(){var t=this,e=this.S,n=function(a){var n=e(this).closest("["+t.attr_name()+"]").data(t.attr_name(!0)+"-init");(!n.is_hover||Modernizr.touch)&&(a.preventDefault(),a.stopPropagation(),t.toggle_active_tab(e(this).parent()))};e(this.scope).off(".tab").on("focus.fndtn.tab","["+this.attr_name()+"] > * > a",n).on("click.fndtn.tab","["+this.attr_name()+"] > * > a",n).on("mouseenter.fndtn.tab","["+this.attr_name()+"] > * > a",function(){var a=e(this).closest("["+t.attr_name()+"]").data(t.attr_name(!0)+"-init");a.is_hover&&t.toggle_active_tab(e(this).parent())}),e(a).on("hashchange.fndtn.tab",function(a){a.preventDefault(),t.handle_location_hash_change()})},handle_location_hash_change:function(){var a=this,e=this.S;e("["+this.attr_name()+"]",this.scope).each(function(){var i=e(this).data(a.attr_name(!0)+"-init");if(i.deep_linking){var s;if(s=i.scroll_to_content?a.scope.location.hash:a.scope.location.hash.replace("fndtn-",""),""!=s){var r=e(s);if(r.hasClass("content")&&r.parent().hasClass("tabs-content"))a.toggle_active_tab(t("["+a.attr_name()+"] > * > a[href="+s+"]").parent());else{var o=r.closest(".content").attr("id");o!=n&&a.toggle_active_tab(t("["+a.attr_name()+"] > * > a[href=#"+o+"]").parent(),s)}}else for(var c=0;c<a.default_tab_hashes.length;c++)a.toggle_active_tab(t("["+a.attr_name()+"] > * > a[href="+a.default_tab_hashes[c]+"]").parent())}})},toggle_active_tab:function(i,s){var r=this.S,o=i.closest("["+this.attr_name()+"]"),c=i.find("a"),l=i.children("a").first(),h="#"+l.attr("href").split("#")[1],d=r(h),_=i.siblings(),f=o.data(this.attr_name(!0)+"-init"),b=function(a){var n,i=t(this),s=t(this).parents("li").prev().children('[role="tab"]'),r=t(this).parents("li").next().children('[role="tab"]');switch(a.keyCode){case 37:n=s;break;case 39:n=r;break;default:n=!1}n.length&&(i.attr({tabindex:"-1","aria-selected":null}),n.attr({tabindex:"0","aria-selected":!0}).focus()),t('[role="tabpanel"]').attr("aria-hidden","true"),t("#"+t(e.activeElement).attr("href").substring(1)).attr("aria-hidden",null)};r(this).data(this.data_attr("tab-content"))&&(h="#"+r(this).data(this.data_attr("tab-content")).split("#")[1],d=r(h)),f.deep_linking&&(f.scroll_to_content?(a.location.hash=s||h,s==n||s==h?i.parent()[0].scrollIntoView():r(h)[0].scrollIntoView()):a.location.hash=s!=n?"fndtn-"+s.replace("#",""):"fndtn-"+h.replace("#","")),i.addClass(f.active_class).triggerHandler("opened"),c.attr({"aria-selected":"true",tabindex:0}),_.removeClass(f.active_class),_.find("a").attr({"aria-selected":"false",tabindex:-1}),d.siblings().removeClass(f.active_class).attr({"aria-hidden":"true",tabindex:-1}),d.addClass(f.active_class).attr("aria-hidden","false").removeAttr("tabindex"),f.callback(i),d.triggerHandler("toggled",[i]),o.triggerHandler("toggled",[d]),c.off("keydown").on("keydown",b)},data_attr:function(t){return this.namespace.length>0?this.namespace+"-"+t:t},off:function(){},reflow:function(){}}}(jQuery,window,window.document);