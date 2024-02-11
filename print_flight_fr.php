<?php

session_start();

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];





$tripID = $_GET['tripID'];

$fid = $_GET['fid']; ?>













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

  <tr><td height="800px" valign="top">

<iframe name="theiframe" id="theiframe" width="100%" height="100%" src="print_flight.php?tripID=<?php echo $tripID?>&fid=<?php echo $fid?>"></iframe>

<input type="button" value="Print Report" onClick="iprint(theiframe);" /></td></tr></table>



