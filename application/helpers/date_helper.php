<?php
function formatDate($input,$inputformat)
{
	try {
			if($input=="")
			{
				return null;
			}
			else
			{
				date_default_timezone_set("Asia/Kuala_Lumpur");
				$valuedata = "";				
				if($input != ''){
				$date_input = new DateTime($input);
				$valuedata = $date_input->format($inputformat);
				}
				return  $valuedata;
			}
            
        } catch(SoapFault $e) {
            return ("Exception : " . $e);
        }
    	
}
?>