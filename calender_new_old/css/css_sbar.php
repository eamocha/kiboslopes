<?php
/*
= LuxCal sidebar style sheet =

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

header('content-type:text/css');
header("Expires: ".gmdate("D, d M Y H:i:s", (time()+900)) . " GMT");

//=============================================================//
//DEFINITIONS AFTER THE COMMAS BETWEEN THE QUOTES CAN BE EDITED//
//=============================================================//

//COLORS
define("BGND1","#8D003C"); //background list header
define("BGND2","#FFFCF9"); //background content
define("TEXT1","#F7DA76"); //text color list header
define("TEXT2","#203050"); //text color content
define("BORD1","2px solid #8D003C"); //list borders
define("POPDT","border:1px solid #808080; background:#FFFFE0;"); //hover box normal event
define("POPRT","border:1px solid #E00060; background:#FFFFE0;"); //hover box repeating event

//FONT SIZES
define("FONT1","bold 12px arial,sans-serif"); //font list header
define("FONT2","11px arial,sans-serif"); //font list content
define("FONT3","bold 11px arial,sans-serif"); //font date header
define("FONT4","11px arial,sans-serif"); //font pop-up box

//SHADOWS & BOX CORNERS (0:no 1:yes)
$boxSw = 1; //box shadow
$boxRd = 1; //box corners rounded

//=============================================================//

echo
// ---- Sidebar styles -----

//============================================================================//
//The default sidebar container style is 'sidebar'. If you have specified your//
//own sidebar classes (see installation_guide.html - $sbClass), add them here //
//(e.g. 'sidebar1, sidebar2, ...) and edit these style(s) to meet your needs. //
//============================================================================//
"
div.sideBar {
position: relative; top:10px; right:0px;
float:right;
height:150px; width:200px;
margin:10px 30px 30px 30px;
padding:4px;
background:".BGND2.";
border:".BORD1.";".($boxRd ? ' border-radius:5px;' : '').($boxSw ? ' box-shadow:5px 5px 5px #888;' : '')."
z-index:10;
overflow:hidden;}

div.ssb_header {font:".FONT1."; color:".TEXT1."; background:".BGND1."; padding:0 4px; margin-top:2px; ;}
"
.// ---- Sidebar content styles ----
"
div.upc_scrollList {width:100%; height:95%; font:".FONT2."; color:".TEXT2."; overflow:auto;}

div.ssb_date {margin-top:10px; font:".FONT3.";}
div.ssb_event {margin:10px 0 0 4px;}
div.ssb_evtDate {margin-top:-8px; font-weight:bold;}
div.ssb_evtTitle {margin-top:-8px;}
div.ssb_evtUrl {margin-top:-8px; margin-left:4px;}
div.ssb_evtUrl a {text-decoration:underline; cursor:pointer;}
div.ssb_popUp {z-index:100;}
div.ssb_arrow {cursor:default;}
"
.// ---- Hover popup styles (toolbox.js poptext) ----
"
#htmlPop {position:absolute; width:200px; padding:4px; ".($boxRd ? 'border-radius:5px; ' : '').($boxSw ? 'box-shadow:5px 5px 5px #888; ' : '')."visibility:hidden; z-index:10;}
.ssb_normal {font:".FONT4.";".POPDT."}
.ssb_repeat {font:".FONT4.";".POPRT."}
"
?>
