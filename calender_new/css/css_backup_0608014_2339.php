<?php
/*
= LuxCal event calendar style sheet =

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

header('content-type:text/css');
header("Expires: ".gmdate("D, d M Y H:i:s", (time()+900)) . " GMT");

/* ---- LOAD USER-INTERFACE THEME DEFINITIONS ---- */
require 'lctheme.php';

echo
// ---- make HTML 5 elements block-level for consistent styling (see also toolbox.js) ----
"
header, footer, aside {display:block;}
"
.// ---- general: site -----
"
* {padding:0; margin:0;}
body, select, td, th {font:".FONT0.";}
input[type='text'], input[type='password'], textarea, select {padding:1px 0 0 4px; font:".FONT2.";}
input[type='submit'], input[type='button'], input[type='file'], button {font:".FONT3."; cursor:pointer; height:20px; padding:0 2px;}
body {background:".BGND2."; color:".TEXT1."; overflow:hidden;}
th {background:".BGND3.";}
td {vertical-align:top;}
a {color:".TEXT1."; text-decoration:none; cursor:pointer;}
a.urlembed {font-weight:bold; text-decoration:underline;}
hr {margin:10px 0px; height:2px; border-width:0; color:".BGND3."; background:".BGND3.";}
p {text-align:justify;}
img {border-style:none;}
select option {padding: 0 0 0 4px;}
mark {color:".TEXT5."; font-weight:bold; text-decoration:underline;}
label {position:relative; top:-3px;}

h3 {font-size:".HEAD3.";}
h4 {font-size:".HEAD4.";}
h5 {font-size:".HEAD5.";}
h6 {font-size:".HEAD6.";}

ul, ol {margin:0 25px;}

.fontS {font-size:".FONTS .";}

.floatR {float:right;}
.floatL {float:left;}
.floatC {text-align:center;}
.center {display:block; margin:auto;}
.inline {display:inline;}

.point {cursor:pointer;}
.arrow {cursor:default;}
.hyper:hover {cursor:pointer; background:".BGND2.";}
.link {cursor:pointer; text-decoration:underline;}
.pageTitle {margin:0 0 20px 20%;}
.noButton {border:none; background:none; cursor:pointer; text-decoration:underline;}
.confirm {margin:auto; width:70%; text-align:center; background:".BGND7.";}
.warning {margin:auto; width:70%; text-align:center; background:".BGND8.";}
.error {margin:auto; width:70%; text-align:center; background:".BGND9.";}
.inputError {background:".BGND9.";}
.hilight {margin:10px 0; background:".BGND9.";}
.flush {position: absolute; right: 100%;}
"
.// ---- canvas ----
"
header {padding:0px 20px; font:".($topBd ? ' bold' : '').($topIc ? ' italic' : '')." 13px/25px arial,sans-serif;".($topSw ? ' text-shadow: 0.2em 0.3em 0.2em #888;' : '')." text-align:center; background:".BGND1.";}
div.topText {margin:auto; width:95%; line-height:30px;}
div.navBar {clear:both; padding:0px 10px; line-height:20px; background:".BGND3."; border:".BORD1.";}
div.content {clear:both; padding:3px 26px 0 10px;}
div.contentS {clear:both; padding:3px 10px; font:".FONT4.";}
footer {position:absolute; left:0; bottom:10px; width: 98%; padding:0 1%; font-size:0.8em; background:".BGND3."; border:".BORD1.";}
.footLB {font:italic bold 1.1em arial,sans-serif; color:#0033FF;}
.footLR {font:italic bold 1.1em arial,sans-serif; color:#AA0066;}

div#taskBar {position: absolute; top:66px; right:40px; height:60%; width:170px; padding:4px; border:".BORD2.";".($boxRc ? ' border-radius:5px;' : '').($boxSw ? ' box-shadow:5px 5px 5px #888;' : '')." font:".FONT1."; background:".BGND1."; z-index:20; overflow:hidden; display:none;}
div#upcoBar {position: absolute; top:46px; right:20px; height:60%; width:170px; padding:4px; border:".BORD2.";".($boxRc ? ' border-radius:5px;' : '').($boxSw ? ' box-shadow:5px 5px 5px #888;' : '')." font:".FONT1."; background:".BGND1."; z-index:20; overflow:hidden; display:none;}
div.sideList {position: absolute; top:30px; bottom:0px; width:100%; overflow:auto;}
div#optPanel {position: absolute; top:45px; left:10px; padding:4px; border:".BORD2.";".($boxRc ? ' border-radius:5px;' : '').($boxSw ? ' box-shadow:5px 5px 5px #888;' : '')."
 font:".FONT1."; background:".BGND1."; z-index:20; overflow:hidden; display:none;}
table.options th {min-width:110px; cursor:default;}
table.options input,label {cursor:pointer;}
.optList {max-height:250px; overflow:auto;}

.dragme {background:".BGND3."; margin-top:2px; cursor:move;}
"
.// ---- all pages -----
"
.scroll {overflow:auto;}
.scrollBoxYe {position:absolute; left:0; top:70px; right:0; bottom:35px; padding:0 10px; overflow:auto;}
.scrollBoxMo, .scrollBoxWe, .scrollBoxDa {position:absolute; left:0; top:85px; right:0; bottom:35px; padding:0 10px; overflow-y:scroll;}
.scrollBoxUp, .scrollBoxCh {position:absolute; left:0; top:125px; right:0; bottom:35px; padding:0 10px; overflow:auto;}
.scrollBoxSh {position:absolute; left:0; top:180px; right:0; bottom:35px; padding:0 10px; overflow:auto;}
.scrollBoxSe {position:absolute; left:0; top:140px; right:0; bottom:70px; padding:0 10px; overflow:auto;}
.scrollBoxAd {position:absolute; left:0; top:140px; right:0; bottom:35px; padding:0 10px; overflow:auto;}
.scrollBoxHead {position:absolute; left:0; top:67px; right:0; padding:0 10px; overflow-y:scroll;}

.centerBox {display:table; margin:0 auto;}

table.mgrid {width:100%;}
table.mgrid td.holder{vertical-align:top; width:16%; padding:2px;}

table.grid {width:100%; border-collapse:collapse; table-layout:fixed;}
/* table.grid {width:100%; border-collapse:collapse;} */
table.grid .wkCol {border:".BORD1."; width:25px;}
table.grid .tCol {border:".BORD1."; width:50px;}
table.grid .dCol {border:".BORD1.";}
table.grid .dCol7 {border:".BORD1."; width:14%;}
table.grid .tColBg {background:".BGNDA.";}
table.grid .dColBg {background:".BGNDB.";}
table.grid tr.monthWeek {height:120px;}
table.grid tr.yearWeek {height:40px;}
table.grid th {color:".TEXT2."; overflow:hidden;}
table.grid td {border:".BORD1."; overflow:hidden;}
table.grid td.wnr {border:none; vertical-align:middle; background:".BGNDA."; text-align:center;}
table.grid td.we0 {background:".BGNDD.";}
table.grid td.we1 {background:".BGNDE.";}
table.grid td.wd0 {background:".BGNDB.";}
table.grid td.wd1 {background:".BGNDC.";}
table.grid td.out {background:".BGNDF.";}
table.grid td.blank {border:none; background:".BGND2.";}
table.grid td.today {".CELTD."}
table.grid td.slday {".CELSD."}

table.evtForm {width:100%; padding:5px; margin:0 0 10px 0; border-spacing:4px; background:".BGNDB.";}
.viewHdr {display:inline-block; min-width:350px;}
div.help {clear:both;}

"
.// -- view: all --
"
.chkBoxes {color:".TEXT4."; background:#FFFFFF; padding-right:2px;}
.chkBoxes:hover {background:".BGND2.";}

"
.// -- view: year/month --
"
.square {float:left; width:8px; height:8px; border:".BORD1.";}
.event {margin-top:2px;}
.evtTitle {display:block;}
.url {padding:0 2px; cursor:pointer; display:block;}
.firstDom {background:".BGND3.";}
.dom {text-align:right; padding-right:2px;}
.firstDom, .dom, .wnr {color:".TEXT3.";}
"
.// -- view: week/day/dw_functions --
"
var {display:block; border-bottom:".BORD1.";}
.day ul {margin:5px; padding:0px 15px;}
.timeFrame {position:relative;}
.times {border-bottom:".BORD1."; text-align:center; color:".TEXT3.";}
.dates {position:absolute; left:0px; top:0px; width:100%;}
.evtBox {position:absolute; border:".BORD1."; z-index:1; overflow:hidden;}
"
.// -- view: upcoming / changes / search --
"
.eventBg {width:80%; background:".BGND1."; margin:0 40px; padding:10px;}
.headCh, .headUp {width:80%; margin:20px 40px 0 40px;}
.headSh {width:80%; margin:20px 40px 20px 40px;}
.lMarginUp {width:180px;}
.lMarginCh {width:120px;}
"
.// -- add/edit event --
"
div.repBox {position:absolute; left:40px; bottom:120px; width:360px; padding:10px; border:".BORD1."; background:".BGND5."; z-index:20; display:none;}
"
.// ---- admin pages -----
"
table.cList {width:100%; border-spacing:10px;}
table.uList {width:100%; border-spacing:2px;}
.aside {width:35%; border:".BORD1."; background:".BGND4."; margin:0 10px 10px 0; padding:5px; float:right;}
.labelFix {width:300px; cursor:default; text-align: right; padding:0 6px 0 0;}
.fieldBoxFix {width:100%; margin:10px 0; padding:15px; border:1px solid #888888; background:".BGND1.";}
.label {cursor:default; text-align: right; padding:0 6px 0 0;}
.fieldBox {margin:10px 0; padding:15px; border:1px solid #888888; background:".BGND1.";}
.legend {float:left; margin:-26px 0 0 0; font-weight:bold; background:".BGND1.";}
.saveSettings {position:absolute; left:15%; bottom:35px;}
"
.// ---- Onmouseover popup Styles (toolbox.js poptext) ----
"
#htmlPop {position:absolute; width:150px; padding:4px; ".($boxRc ? 'border-radius:5px; ' : '').($boxSw ? 'box-shadow:5px 5px 5px #888; ' : '')."visibility:hidden; z-index:10;}
.normal {".POPDT."}
.private {".POPPT."}
.repeat {".POPRT."}
"
.// ---- Date Picker Styles -----
"
.dpTable {width:150px; font:12px arial,sans-serif; text-align:center; color:#505050; background:".BGND1."; border:2px outset white;}
.dpTable th {	background:".BGND3."; color:".TEXT1.";}
.dpTD {border:1px solid ".BGND1.";}
.dpTDHover {border:1px solid #888888; cursor:pointer; color:red;}
.dpHilight {border:1px solid #888888; color:red; font-weight:bold;}
.dpTitle {font:bold 12px arial,sans-serif; color:".TEXT1.";}
.dpButton {font:bold 10px arial,sans-serif; color:".TEXT1."; background:".BGND2."; cursor:pointer;}
"
.// ---- Time Picker Styles -----
"
.tpFrame {width:155px; overflow:hidden; font:11px/12px arial,sans-serif; text-align:center; color:#505050; background:#F2F2F2; border:1px solid #AAAAAA;}
.tpAM {background:#EEFFFF;}
.tpPM {background:#FFCCEE;}
.tpEM {background:#DDFFDD;}
.tpPick:hover {background:#A0A0A0; color:red;}
"
.// ---- Color Picker Styles -----
"
.cpDiv {width:156px; height:128px; overflow:auto; background:#DDDDDD; border:1px solid #666666;}
.cpCell {cursor:pointer; width:12px; height:12px;}
"
?>
