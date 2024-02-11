<?php
include('../lib/config.php');include('../lib/functions.php');

?>

<?php
if(isset($_POST['kw']) && $_POST['kw'] != '')
{
  $kws = clean($_POST['kw']);
  $kws = mysqli_real_escape_string($conn,$kws);
  $query = "select * from tbl_hotels where hotel_name like '%".$kws."%' or hotel_location like '%".$kws."%' or hotel_description like '%".$kws."%'" ;
  $res = mysqli_query($conn,$query);
  $count = mysqli_num_rows($res);
  $i = 0;
  if($count > 0)
  {
    echo "<ul>";
    while($row = mysqli_fetch_array($res))
	{
	  echo "<a href='../hotel_list.php?a=".$row['hotel_id']."'><li>";
	  echo "<div id='contact'>".$row['phone']."</div>";
	  echo "<div id='rest'>";
	  echo "<h3>".$row['hotel_name'];
	  echo "</h3>";
	  echo "<div id='hot_desc'>".$row['hotel_description']."<br/><b>Place:</b> ".$row['hotel_location']."<br><b>Email:</b> ".$row['fax']."</div>";
	  echo "<span id='edt'>Edit|delete<span></div>";
	  
	  echo "<div style='clear:both;'></div></li></a>";
	  $i++;
	  if($i == 25) break;
	}
	echo "</ul>";
	if($count >25)
	{
		$t=$count-25;
	  echo "<div id='view_more'><a href='#'>View $t more results</a></div>";
	}
  }
  else
  {
    echo "<div id='no_result'>No result found !</div>";
  }
}
?>