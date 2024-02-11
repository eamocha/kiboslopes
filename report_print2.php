<?php

session_start();

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];





$tripID = $_REQUEST['inc'];



 $pri='prnt_trip.php';

 ?>

<script>

function iprint(ptarget)

{

ptarget.focus();

ptarget.print();

}

</script> 





</head>



<body>

<table width="1000px" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr><td height="1000px" width="1000px" valign="top">

<iframe name="theiframe" id="theiframe" width="100%" height="100%" src="../<?php echo $pri?>?inc=<?php echo $tripID?>"></iframe>

<input type="button" value="Print Report" onClick="iprint(theiframe);" /></td></tr></table>



