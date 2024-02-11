<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hotel</title>
<script type="text/javascript"  src="js/jquery-1.8.2.min.js"></script>
</head>

<body>
<script type="text/javascript">
$(document).ready(function(){
	$.getJSON("populatehotels.php", function(data){
		var selected=$("#hot_list");
		for(i=0; i<data.length; i++){
			var option=$("<option value="+data[i].hotel_id+">"+data[i].hotel_name+"</option>");			//NB if you used mysqli_fetch_row/array then use above, but is you used object/assoc then you use .hotel_id etc

			option.appendTo(selected);
			
			};
		});
	});

</script>
<select id="hot_list"><option value="">select hotel</option></select>
</body>
</html>