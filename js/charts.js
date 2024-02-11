// Run the script on DOM ready:
$(function(){
//$('table#wacha').visualize({type: 'bar', width: '150px'});
$('table#wacha').visualize({type: 'pie', height: '200px', width: '250px'}).prev().addClass('accessHide'); 
$('table#tasksdata').visualize({type: 'bar', width: '550px'}).prev().addClass('accessHide'); 

	//$('table').visualize({type: 'area', width: '420px'});
	//$('table').visualize({type: 'line', width: '420px'});
   
});