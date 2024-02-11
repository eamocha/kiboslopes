<html>
	<head>
	<title>Hotel insert</title>
	<!-- include jquery library file-->
	<script type="text/javascript" src="../js/jquery-1.8.2.js"></script>
	<!-- The ajax/jquery stuff -->
	<script type="text/javascript">
	 
	$(document).ready(function(){
	//Get the input data using the post method when Push into mysql is clicked .. we pull it using the id fields of ID, Name and Email respectively...
	$("#insert").click(function(){
	//Get values of the input fields and store it into the variables.
	var desc=$("#desc").val();
	var Name=$("#Name").val();
	var location=$("#location").val();
	 
	//use the $.post() method to call insert.php file.. this is the ajax request
	$.post('insert.php', {desc: desc, Name: Name, location: location},
	function(data){
	$("#message").html(data);
	$("#message").hide();
	$("#message").fadeIn(1500); //Fade in the data given by the insert.php file
	});
	return false;
	});
	});
	</script>
	</head>
	<body>
	<label>Name</label>
	<input  type="text"  class="validate[required]"  name="Name" id="Name" value="" size="30" />
	<label>desc: </label> <input id="desc" type="text" />
	
	<label>location </label>
	<input type="text"  id="location"  name="location" value="" size="30" />
	<a id="insert" title="Insert Data" style="text-decoration:none" href="#">Add Hotel</a>
	 <!-- For displaying a message -->
	 
	<div id="message"></div>
	</body>
	</html>