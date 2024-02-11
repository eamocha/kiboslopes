<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KIBO SLOPES</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
 <!-- Validation Engine-->
  <script src="js/jquery.js" type="text/javascript" language="javascript"></script>
<script language="javascript">


$(document).ready(function()
{
	$("#login_form").submit(function()
	{
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Validating....').fadeIn(1000);
		//check the username exists or not from ajax
		$.post("lib/ajax_login.php",{ user_name:$('#username').val(),password:$('#password').val(),rand:Math.random() } ,function(data)
        {
		  if(data=='yes') //if correct login detail
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Logging in.....').addClass('messageboxok').fadeTo(900,1,
              function()
			  { 
			  	 //redirect to secure page
				 document.location='dashboard.php';
			  });
			  
			});
		  }
		  else 
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Your login detail is wrong...').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
				
        });
 		return false; //not to post the  form physically
	});
	//now call the ajax also focus move from 
	$("#password").blur(function()
	{
		$("#login_form").trigger('submit');
	});
});
</script>
 	<script src="js/jquery.min.js"></script>

    <script src="js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
		<script src="js/validation/jquery.validationEngine.js" type="text/javascript"></script>
         <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
        <!--Validation End-->
     <script>   $(document).ready(function(){

		
			$("#login_form").validationEngine();
			
		});</script>
        
</head>

<body>
<div id="container">
  <div id="bilaz"></div>
<div id="mid_content">
 <div id="logo"><img src="images/logo.png" width="242" height="70" /></div>
</div>
<div id="bilaz"></div>
<form id="login_form"  name="login_form" class="formular" method="post" action="step2.php"><div id="loginform">
<div id="reg_box1">Your Email:<br />
  <input name="username" type="text"  class="validate[required,custom[email],length[0,100]] text-input"  id="username" size="55" />
</div>
<div id="reg_box">Password:<br />
  <input name="password" type="password"  class="validate[required,length[0,100]] text-input"  id="password" size="55" />
</div>
<div id="reg_box_left"><input type="checkbox" name="rememberme" value="rememberme" />Remember me
<span id="log_bt"><input type="image" src="images/btn_login.png"name="image2" /></span></div>
<div id="bilaz"></div>
<span id="msgbox" style="display:none; margin:15px"></span>

</div></form>
<div id="the_rest"></div>

</div>
</body>
</html>