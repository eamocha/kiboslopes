 $(document).ready(function () 

  {
	   var html = "";
	   var mnth=0;
 var  yr=0;
  $.ajax({                                      
      url: 'archive_exec.php', 
	  type: 'POST',	                 //the script to call to get data          
     data:{	'mnth': mnth,'yr':yr},                       //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
		  
       for( i=0; i< data.length; i++)
	   {           
                if(i%2==0){ var row= $('tbody> tr').addClass('alt_row2'); }
				else { var row=$('tr').addClass('alt_row1'); }
				if(data.length==0){ html="No data";}else{
			html+="<tr class='"+row+"' ><td>"+(i+1)+"</td><td>"+data[i][1]+"</td><td>"+data[i][9]+"</td><td>"+data[i][3]+"</td><td> "+data[i][4]+"</td><td>"+data[i][5]+"</td><td>"+data[i][6]+"</td><td> "+data[i][2]+"</td><td><a href='view_trip.php?inc="+data[i][0] +"'>View details</a></td></tr> "}}   
	     $('#loaddata').html(html);    
		 }});
$(".filter").change(function (){ 

 var html = "";
 var mnth=$("#month").val();
 var yr=$('#sel_year').val();

    $.ajax({                                      
      url: 'archive_exec.php', 
	  type: 'POST',	                 //the script to call to get data          
     data:{	'mnth': mnth,'yr':yr},                       //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
       for( i=0; i< data.length; i++)
	   {              
                if(i%2==0){ var color='#fff';} if(data.length==0){ html="No data";}
				else
			html+="<tr bgcolor='"+color+"'><td>"+(i+1)+"</td><td>"+data[i][1]+"</td><td>"+data[i][9]+"</td><td>"+data[i][3]+"</td><td> "+data[i][4]+"</td><td>"+data[i][5]+"</td><td>"+data[i][6]+"</td><td> "+data[i][2]+"</td><td><a href='view_trip.php?inc="+data[i][0] +"'>View details</a></td></tr> ";
	   }
	   
	     $('#loaddata').html(html);     //Set output element html
      } 
    });
  
  });   }); 
  