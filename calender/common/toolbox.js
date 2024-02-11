//Create HTML5 elements for IE < 9 (see also css.php)
document.createElement("header");
document.createElement("footer");
document.createElement("aside");
document.createElement("mark");

//global variables

var hlpWinH = 400; //help window height
var hlpWinW = 800; //width
var hlpWinT = 100; //top

var evtWinH = 200; //event window height
var evtWinW = 490; //width
var evtWinT = 100; //top

var logWinH = 200; //login window height
var logWinW = 490; //width
var logWinT = 180; //top

//shortcut functions

function $I(el) { return document.getElementById(el); }
function $N(el) { return document.getElementsByName(el); }
function $T(el) { return document.getElementsByTagName(el); }

// functions used in headers

function login(){ //open login dialogue
	var calWinL = (!window.screenLeft) ? window.screenX : window.screenLeft; //cal left edge
	var calWinT = (!window.screenTop) ? window.screenY : window.screenTop; //cal top edge
	var calWinW = (!window.innerWidth) ? document.documentElement.clientWidth : window.innerWidth; //cal width
	logWinX = calWinL+(calWinW-logWinW)/2;
	logWinY = calWinT+logWinT;
	window.open('index.php?xP=20','','height=' + logWinH +',width=' + logWinW + ',left=' + logWinX + ',top=' + logWinY + ', scrollbars=0');
}

function logout(){ //user logout
	location.href='index.php?cP=0&logout=y';
}

function help(){ //show user guide
	var hlpWinL = (screen.width-hlpWinW)/2;
	window.open('index.php?xP=22','','height=' + hlpWinH +',width=' + hlpWinW + ',top=' + hlpWinT + ',left=' + hlpWinL + ', scrollbars');
}

// functions used on view pages

function goMonth(dt){ //go to month view
	location.href='index.php?cP=2&cD='+dt;
	return false;
}

function goWeek(dt){ //go to week view
	location.href='index.php?cP='+((mode.substr(0,1) == 'w') ? 5 : 4)+'&cD='+dt;
	return false;
}

function goDay(dt){ //go to day view
	location.href='index.php?cP=6&cD='+dt;
	return false;
}

function newE(dt,st,et){ //new event - date / times optional
	var date = (arguments[0]) ? '&evD='+arguments[0] : '';
	var time = (arguments[1]) ? '&evTs='+arguments[1]+'&evTe='+arguments[2] : '';
	var evtWinL = (screen.width-evtWinW)/2;
	window.open('index.php?xP=10&mode=add'+date+time,'','height=' + evtWinH +',width=' + evtWinW + ',top=' + evtWinT + ',left=' + evtWinL + ', scrollbars=0');
	return false;
}

function editE(id,date){ //edit event
	var evtWinL = (screen.width-evtWinW)/2;
	window.open('index.php?xP=10&mode=edit&eid='+id+'&evD='+date,'','height=' + evtWinH + ',width=' + evtWinW + ',top=' + evtWinT + ',left=' + evtWinL + ', scrollbars=0');
	return false;
}

function checkE(id,date){ //edit event
	var evtWinL = (screen.width-evtWinW)/2;
	window.open('index.php?xP=11&eid='+id+'&evD='+date,'','height=' + evtWinH +',width=' + evtWinW + ',top=' + evtWinT + ',left=' + evtWinL + ', scrollbars=0');
	return false;
}

function winFit(maxH) { //fit window to its content size
  neededH = Math.min(maxH,document.body.offsetHeight + 6);
  currentH = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight;
	window.resizeBy(0,neededH-currentH);
}

//general functions

function done(close,refresh,url) { //close window and refresh calendar (1: true; 0: false)
	if (refresh) {
		if (url) {
			window.opener.location.href=url;
		} else {
			window.opener.location = window.opener.location.href;
		}
	}
	if (close) window.close();
}

function jumpMenu(myList) {
	var gotoUrl = myList.options[myList.selectedIndex].value;
	if (gotoUrl != '#') { window.location.href = gotoUrl; }
	return false;
}

function check1(boxName,checked) { //check 1 of N checkboxes
	var chBoxes = $N(boxName);
	for (var i=(chBoxes.length-1);i >= 0;i--) {
		chBoxes[i].checked = false;
	}
	checked.checked = true;
}

function checkA(boxName,checked) { //check "all" of N checkboxes
	var chBoxes = $N(boxName+'[]');
	for (var i=(chBoxes.length-1);i >= 0;i--) {
		chBoxes[i].checked = false;
	}
	$I(boxName+'0').checked = true;
}

function checkN(boxName,checked) { //check any of N checkboxes
	var chBoxes = $N(boxName+'[]');
	var check = false;
	for (var i=(chBoxes.length-1);i >= 0;i--) {
		if (chBoxes[i].checked) { check = true; }
	}
	$I(boxName+'0').checked = (check == true) ? false : true;
}

function show(elem,formName) { //display/hide element; if form & hide: submit
	var overlay = $I(elem);
	overlay.style.display = (overlay.style.display == "block") ? "none" : "block";
	if (formName && overlay.style.display == "none") { document.forms[formName].submit(); }
	return false;
}

function printNice() {
	var regex = /noPrint/;
	var els = $T("*");
	for (var i=(els.length-1);i >= 0;i--) {
		if (regex.test(els[i].className)) { els[i].style.display = "none"; }
	}
	document.body.style.backgroundColor = "white";
	regex = /scrollBox/;
	for (var i=(els.length-1);i >= 0;i--) {
		if (regex.test(els[i].className)) {
			els[i].style.position = "static";
			els[i].style.overflow = "visible";
		}
	}
	window.print();
	window.location = window.location.href; //reload the page
	return false;
}

//======================== function groups =======================

//==== text box popup functions ====

var offsetx=-60; //x offset of box
var offsety=16; //y offset of box
var maxLineLen=80; //default max line length in box
var popobj;

function popon(puContent, puClass, puMaxChar){
	var i, lines, details, maxBoxWidth = "auto";
	if (typeof puMaxChar == 'number') maxLineLen = puMaxChar;
	lines = puContent.split("<br>") //split on <br>
	for (i in lines) {
		if (lines[i].replace(/(<([^>]+)>)/ig,"").length > maxLineLen) maxBoxWidth = (5 * maxLineLen) + "px";
	}
	if (!$I("htmlPop")) { //box object not yet existing
		details = document.createElement("more");
		details.setAttribute("id", "htmlPop");
		document.body.appendChild(details);
	}
	popobj = $I("htmlPop");
	popobj.style.width = maxBoxWidth;
	popobj.className = puClass;
	popobj.innerHTML = puContent;
	popobj.style.visibility = "visible";
	document.onmousemove = positionpop;
	return false;
}

function popoff(){
	popobj.style.visibility = "hidden";
	document.onmousemove = null;
}

function positionpop(e){
	var mouseX = (!e) ? event.clientX : e.clientX; //mouse pos relative to window
	var mouseY = (!e) ? event.clientY : e.clientY;
	var curX = (!e) ? mouseX+document.documentElement.scrollLeft : e.pageX; //mouse pos relative to document
	var curY = (!e) ? mouseY+document.documentElement.scrollTop : e.pageY;
	var rightedge = (!window.innerWidth) ? document.documentElement.clientWidth : window.innerWidth-20; //window edge
	var bottomedge = (!window.innerHeight) ? document.documentElement.clientHeight : window.innerHeight-10;

	if (rightedge-mouseX-offsetx < popobj.offsetWidth) { //if the box hits the right edge
		popobj.style.left = rightedge-popobj.offsetWidth-5+"px"; //don't move it
	} else {
		popobj.style.left = (curX<(-offsetx)) ? "5px" : curX+offsetx+"px"; //don't move it : move it with mouse
	}
	if (bottomedge-mouseY-offsety < popobj.offsetHeight) { //if the box hits the bottom edge
		popobj.style.top = curY-popobj.offsetHeight-(offsety/2)+"px"; //move it up
	} else {
		popobj.style.top = curY+offsety+"px"; //move it with mouse
	}
}

//==== dragme functions ====

var xdif, ydif, obj=null, objParent;

function mouseMove(e) {
	if (!e) var e = window.event; //if ie
	if (obj) { //object is not null
		objParent.style.left = e.clientX - xdif + "px";
		objParent.style.top = e.clientY - ydif + "px";
		return false;
	}
}

function mouseSelect(e) {
	if (!e) e = window.event; //if ie
	obj = (!e.target) ? e.srcElement : e.target; //ie || nn6
	if (obj.className == "dragme") {
		objParent = obj.parentNode;
		xdif = e.clientX - objParent.offsetLeft; //mouse-X - parent-L
		ydif = e.clientY - objParent.offsetTop;
		document.onmousemove=mouseMove;
		return false;
	}
}
document.onmousedown=mouseSelect;
document.onmouseup=new Function("obj=null");