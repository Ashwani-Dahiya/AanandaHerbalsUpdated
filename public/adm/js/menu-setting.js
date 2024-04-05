"use strict";document.addEventListener("DOMContentLoaded",function(){document.querySelector('body').insertAdjacentHTML("beforeend",''+
'<div id="styleSelector" class="menu-styler">'+
'<div class="style-toggler">'+
'<a href="#"></a>'+
'</div>'+
'<div class="style-block">'+
'<h5 class="mb-2">Gradient able Live Customizer</h4>'+
'<hr class="">'+
'<div class="m-style-scroller">'+
'<h6 class="mt-2">Layouts</h6>'+
'<div class="theme-color layout-type">'+
'<a href="#" class="" data-value="menu-dark" title="Default Layout"><span></span><span></span></a>'+
'<a href="#" class="active" data-value="menu-light" title="Light"><span></span><span></span></a>'+
'<a href="#" class="" data-value="dark" title="Dark"><span></span><span></span></a>'+
'<a href="#" class="" data-value="reset" title="Reset">Reset</a>'+
'</div>'+
'<h6>Header background color</h6>'+
'<div class="theme-color header-color">'+
'<a href="#" class="active" data-value="header-blue"><span></span><span></span></a>'+
'<a href="#" class="" data-value="header-red"><span></span><span></span></a>'+
'<a href="#" class="" data-value="header-purple"><span></span><span></span></a>'+
'<a href="#" class="" data-value="header-info"><span></span><span></span></a>'+
'<a href="#" class="" data-value="header-dark"><span></span><span></span></a>'+
'<a href="#" class="" data-value="header-orenge"><span></span><span></span></a>'+
'<div class="theme-color header-color">'+
'</div>'+
'<a href="#" class="" data-value="header-green"><span></span><span></span></a>'+
'<a href="#" class="" data-value="header-yellow"><span></span><span></span></a>'+
'<a href="#" class="" data-value="header-orchidgreen"><span></span><span></span></a>'+
'<a href="#" class="" data-value="header-indigogreen"><span></span><span></span></a>'+
'<a href="#" class="" data-value="header-darkgreen"><span></span><span></span></a>'+
'<a href="#" class="" data-value="header-darkblue"><span></span><span></span></a>'+
'</div>'+
'<div class="form-group mb-2">'+
'<div class="switch switch-primary d-inline m-r-10">'+
'<input type="checkbox" id="theme-rtl">'+
'<label for="theme-rtl" class="cr"></label>'+
'</div>'+
'<label>RTL</label>'+
'</div>'+
'<div class="form-group mb-2">'+
'<div class="switch switch-primary d-inline m-r-10">'+
'<input type="checkbox" id="menu-fixed" checked>'+
'<label for="menu-fixed" class="cr"></label>'+
'</div>'+
'<label>Sidebar Fixed</label>'+
'</div>'+
'<div class="form-group mb-2">'+
'<div class="switch switch-primary d-inline m-r-10">'+
'<input type="checkbox" id="header-fixed" checked>'+
'<label for="header-fixed" class="cr"></label>'+
'</div>'+
'<label>Header Fixed</label>'+
'</div>'+
'<div class="form-group mb-2">'+
'<div class="switch switch-primary d-inline m-r-10">'+
'<input type="checkbox" id="box-layouts">'+
'<label for="box-layouts" class="cr"></label>'+
'</div>'+
'<label>Box Layouts</label>'+
'</div>'+
'<div class="form-group mb-2">'+
'<div class="switch switch-primary d-inline m-r-10">'+
'<input type="checkbox" id="breadcumb-layouts">'+
'<label for="breadcumb-layouts" class="cr"></label>'+
'</div>'+
'<label>Breadcumb sticky</label>'+
'</div>'+
'</div>'+
'</div>'+
'</div>');var pctoggle=document.querySelector("#styleSelector > .style-toggler");if(pctoggle){pctoggle.addEventListener('click',function(){if(!document.querySelector("#styleSelector").classList.contains('open')){document.querySelector("#styleSelector").classList.add("open");}else{document.querySelector("#styleSelector").classList.remove("open");}});}
var layouttype=document.querySelectorAll(".layout-type > a");for(var h=0;h<layouttype.length;h++){var c=layouttype[h];c.addEventListener('click',function(event){document.querySelector(".layout-type > a.active").classList.remove("active");var targetElement=event.target;if(targetElement.tagName=="SPAN"){targetElement=targetElement.parentNode;}
targetElement.classList.add("active");var temp=targetElement.getAttribute('data-value');document.querySelector('head').insertAdjacentHTML("beforeend",'<link rel="stylesheet" class="layout-css" href="assets/js/menu-setting.js">');if(temp=="menu-dark"){removeClassByPrefix(document.querySelector(".pcoded-navbar"),'menu-');document.querySelector(".pcoded-navbar").classList.remove("navbar-dark");}
if(temp=="menu-light"){removeClassByPrefix(document.querySelector(".pcoded-navbar"),'menu-');document.querySelector(".pcoded-navbar").classList.remove("navbar-dark");document.querySelector(".pcoded-navbar").classList.add(temp);}
if(temp=="reset"){location.reload();}
if(temp=="dark"){removeClassByPrefix(document.querySelector(".pcoded-navbar"),'menu-');document.querySelector(".pcoded-navbar").classList.remove("navbar-dark");document.querySelector(".layout-css").setAttribute('href','../assets/css/layout-dark.css');}else{document.querySelector(".layout-css").setAttribute('href','');}});}
var headercolor=document.querySelectorAll(".header-color > a");for(var h=0;h<headercolor.length;h++){var c=headercolor[h];c.addEventListener('click',function(event){document.querySelector(".header-color > a.active").classList.remove("active");var targetElement=event.target;if(targetElement.tagName=="SPAN"){targetElement=targetElement.parentNode;}
targetElement.classList.add("active");var temp=targetElement.getAttribute('data-value');if(temp=="header-default"){removeClassByPrefix(document.querySelector(".pcoded-header"),'header-');}else{removeClassByPrefix(document.querySelector(".pcoded-header"),'header-');document.querySelector(".pcoded-header").classList.add(temp);}});}
var rtllayout=document.querySelector("#theme-rtl");rtllayout.addEventListener('click',function(){document.querySelector('head').insertAdjacentHTML("beforeend",'<link rel="stylesheet" class="rtl-css" href="assets/js/menu-setting.js">');if(rtllayout.checked){document.querySelector(".rtl-css").setAttribute('href','../assets/css/layout-rtl.css');}else{document.querySelector(".rtl-css").setAttribute('href','');}});var menufix=document.querySelector("#menu-fixed");menufix.addEventListener('click',function(){if(menufix.checked){document.querySelector(".pcoded-navbar").classList.add("menupos-fixed");}else{document.querySelector(".pcoded-navbar").classList.remove("menupos-fixed");}});var headerfix=document.querySelector("#header-fixed");headerfix.addEventListener('click',function(){if(headerfix.checked){document.querySelector(".pcoded-header").classList.add("headerpos-fixed");}else{document.querySelector(".pcoded-header").classList.remove("headerpos-fixed");}});var brdlayout=document.querySelector("#breadcumb-layouts");brdlayout.addEventListener('click',function(){if(brdlayout.checked){document.querySelector(".page-header").classList.add("breadcumb-sticky");}else{document.querySelector(".page-header").classList.remove("breadcumb-sticky");}});var boxlayout=document.querySelector("#box-layouts");boxlayout.addEventListener('click',function(){if(boxlayout.checked){document.querySelector("body").classList.add("container");document.querySelector("body").classList.add("box-layout");}else{document.querySelector("body").classList.remove("container");document.querySelector("body").classList.remove("box-layout");}});function removeClassByPrefix(node,prefix){for(let i=0;i<node.classList.length;i++){let value=node.classList[i];if(value.startsWith(prefix)){node.classList.remove(value);}}}});