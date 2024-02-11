<?php



/**

 * @link: http://www.Awcore.com/dev

 */

 

   function pagination($query, $per_page = 20,$page = 1, $url = '?',$intTotalRecords=0){        
	//include_once("../lib/config.php");
	$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD)or die('Could not create a connection to the database : '.mysqli_error($conn)());

mysqli_select_db($conn,DB_NAME) or die('Could not select the database : '.mysqli_error($conn)());
    	//get the navigation querystrings
		
		//'--- Show page navigation
		$strQueryString="";
		/*
			foreach($_GET as $varname => $varvalue)
				{
					if(strtolower($varname."")!=strtolower("page"))
					{
					 
					 if(strlen($strQueryString)>1)
					 {
					  $strQueryString.="&".urlencode($varname."")."=".urlencode($varvalue."");
					 }
					 else
					 {
					  $strQueryString.= urlencode($varname."")."=".urlencode($varvalue."");
					 }
					  
					}
					
				}
		*/	
		// POST CONTENT		
			foreach($_REQUEST as $varname => $varvalue)
				{
					if(strtolower($varname."")!=strtolower("page"))
					{
					 


					 if(strlen($strQueryString)>1)
					 {
					  //$strQueryString.="&".urlencode($varname."")."=".urlencode($varvalue."");
					  $strQueryString.="&";

					 }
					 
					  if(is_array($varvalue))
					  {
						
						//loop through the array, create the string
						foreach ($varvalue as $singlevalue)
						{
								if($strQueryString!="")
								{

									$strQueryString.="&";

								} 

								$strQueryString.= urlencode($varname."[]")."=".urlencode($singlevalue."");
						}

					  }
					  else
					  {
					  	$strQueryString.= urlencode($varname."")."=".urlencode($varvalue."");
					  }
					  

					}
					
				}
				
			if(strlen($strQueryString)>1)
			{
					$strQueryString = "?".$strQueryString."&";
			}
			else
			{
					$strQueryString = "?";
			}
		
		$url = $_SERVER['PHP_SELF'].$strQueryString;
		
		
		if($query=='')
		{
				$total = $intTotalRecords;
		}
		else
		{
				$query = "SELECT COUNT(*) as `num` FROM {$query}";
	
				$row = mysqli_fetch_array(mysqli_query($conn,$query));
		

				echo $query;

				$total = $row['num'];
		}
		
		
		

        $adjacents = "2"; 



    	$page = ($page == 0 ? 1 : $page);  

    	$start = ($page - 1) * $per_page;								

		

    	$prev = $page - 1;							

    	$next = $page + 1;

        $lastpage = ceil($total/$per_page);

    	$lpm1 = $lastpage - 1;

    	

    	$pagination = "";

    	if($lastpage > 1)

    	{	

    		$pagination .= "<ul class='pagination'>";

                    $pagination .= "<li class='details'>Page $page of $lastpage</li>";

    		if ($lastpage < 7 + ($adjacents * 2))

    		{	

    			for ($counter = 1; $counter <= $lastpage; $counter++)

    			{

    				if ($counter == $page)

    					$pagination.= "<li><a class='current'>$counter</a></li>";

    				else

    					$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

    			}

    		}

    		elseif($lastpage > 5 + ($adjacents * 2))

    		{

    			if($page < 1 + ($adjacents * 2))		

    			{

    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)

    				{

    					if ($counter == $page)

    						$pagination.= "<li><a class='current'>$counter</a></li>";

    					else

    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

    				}

    				$pagination.= "<li class='dot'>...</li>";

    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";

    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		

    			}

    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

    			{

    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";

    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";

    				$pagination.= "<li class='dot'>...</li>";

    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

    				{

    					if ($counter == $page)

    						$pagination.= "<li><a class='current'>$counter</a></li>";

    					else

    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

    				}

    				$pagination.= "<li class='dot'>..</li>";

    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";

    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		

    			}

    			else

    			{

    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";

    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";

    				$pagination.= "<li class='dot'>..</li>";

    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

    				{

    					if ($counter == $page)

    						$pagination.= "<li><a class='current'>$counter</a></li>";

    					else

    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					

    				}

    			}

    		}

    		

    		if ($page < $counter - 1){ 

    			$pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";

                $pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";

    		}else{

    			$pagination.= "<li><a class='current'>Next</a></li>";

                $pagination.= "<li><a class='current'>Last</a></li>";

            }

    		$pagination.= "</ul>\n";		

    	}

    

    

        return $pagination;

    } 

?>