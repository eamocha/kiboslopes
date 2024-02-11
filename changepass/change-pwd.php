<?php  require("../lib/config.php");

require("../lib/functions.php");
$id=clean($_REQUEST["id"]);

if(empty($id)){

header('Location:../index.php');

} ?>

 <html>

 

<head>

<title>Change Pass</title>

<style>

#changepas{

	margin:auto;

	margin-top:200px;

	padding:10px;

	border-bottom:2px solid #0C3;

	border-top:2px solid #0C3;

	border-right:2px solid #0C3;

	border-left:2px solid #0C3;

	width:400px;

	box-shadow: 5px 5px 2px #888888;

	border-radius:10px;

	

	}</style>

</head>
<body>
<form name="myform" action="change-pwd-exec.php?id=<?php echo $id?>" method="post">
    <div id="changepas" align="center"><p style="color:#F00">You need to change your password</p>
    <fieldset>
        <legend> Change pass Details</legend>
        <table>
            <tr><td>Enter New Password :</td><td> <input type="password"  name="password" id="password" size="25"></td></tr>
            <tr><td>Confirm Password :</td><td><input type="password" name="confirm" id="confirm" size="25"></td></tr>
            <tr><td>&nbsp;</td><td align="right"> <input name="submit" id="submit" value="Save Chages" type="submit"></td></tr>
            <tr><td><a href="../login.php">Back to the Login Page</a></td><td>&nbsp;</td></tr>
        </table>
    </fieldset>
    </div>
</form>
</body>
</html>