<?php
/*
= LuxCal event calendar theme =

© Copyright 2009-2012  LuxSoft - www.LuxSoft.eu

This file is part of the LuxCal Web Calendar.
*/

//=============================================================//
//THE TEXT AFTER THE COMMAS, BETWEEN THE QUOTES CAN BE TAILORED//
//=============================================================//


/* ---- USER-INTERFACE DEFINITIONS ---- */

//COLORS

define("BGND1","#F2F2F2"); //background top
define("BGND2","#E0E0E0"); //background body
define("BGND3","#7A8827"); //navbar / endbar / table headers
define("BGND4","#FFFFFF"); //sidebar
define("BGND5","#C0C0C0"); //overlays
define("BGND7","#A0D070"); //confirm msg
define("BGND8","#FFF0A0"); //warning msg
define("BGND9","#F0A070"); //error msg
define("BGNDA","#FFFFBB"); //grid - time / weeknr column
define("BGNDB","#FFFFEE"); //grid - weekday 1
define("BGNDC","#FFFFDD"); //grid - weekday 2
define("BGNDD","#FFFFCC"); //grid - weekend 1
define("BGNDE","#FFFFBB"); //grid - weekend 2
define("BGNDF","#FEFEFE"); //grid - outside month

define("TEXT1","#2B3856"); //normal text
define("TEXT2","#fff"); //text in day headers
define("TEXT3","#f00"); //text in cells
define("TEXT4","#FF0000"); //text red
define("TEXT5","#FF00FF"); //marked text
define("FORMT","#666666"); //form input text

define("LINE1","#808080"); //lines

define("BORD1","1px solid #808080"); //cal borders
define("BORD2","2px solid #AAAAFF"); //list borders

define("POPDT","border:1px solid #808080; background:#FFFFE0;"); //hover box normal event
define("POPPT","border:1px solid #808080; background:#CCFFCC;"); //hover box private event
define("POPRT","border:1px solid #E00060; background:#FFFFE0;"); //hover box repeating event
define("CELTD","border:1px solid #0000FF; background:#EEEEFF;"); //day cell today
define("CELSD","border:1px solid #FF0000; background:#FFEEEE;"); //day cell selected day

//FONT SIZES

define("HEAD3","14px"); //page title
define("HEAD4","13px"); //table header L
define("HEAD5","1.0em"); //table header M
define("HEAD6","1.0em"); //event title

define("FONT0","11px arial,sans-serif"); //base font
define("FONT1","0.9em arial,sans-serif"); //side bar
define("FONT2","1.0em arial,sans-serif"); //form fields
define("FONT3","0.9em arial,sans-serif"); //buttons
define("FONT4","1.1em arial,sans-serif"); //user guide (help)
define("FONTS","0.8em"); //small text

//TOP BAR & SHADOWS & BOX CORNERS (0:no 1:yes)

$topSw = 1; //top bar shadow
$topBd = 1; //top bar bold
$topIc = 0; //top bar italic
$boxSw = 1; //box shadow
$boxRc = 1; //box corners rounded
?>
