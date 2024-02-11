<?php
/*
= Footer for  event calendar pages - Normal =

© Copyright 2009-201
*/
?>
</div>
<footer class="noPrint">
<?php
echo '<span class="floatR"><a href="http://www.bluerange-ke.com" target="_blank"><span title="V'.LCV.'">p</span>owered by <span class="footLB">Bluerange </span><span class="footLR">Kenya Ltd</span></a></span>'."\n";
if ($privs > 0 and $set['rssFeed']) {
	echo '<span  class="floatL"><a href="'.$set['calendarUrl'].'rssfeed.php" title="RSS feeds" target="_blank">RSS</a></span>'."\n";
}
?>
</footer>
</body>
</html>
