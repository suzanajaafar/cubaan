<?php
function createSelect($data , $id, $desc, $selected_val, $input_name, $select_text, $additional_prop)
{
	$inputobj = "";
	$selected = "";
	$inputobj .= "<select name='$input_name' id='$input_name' class='form-control select2' $additional_prop>";
	$inputobj .= "<option value=''>$select_text</option>";
	foreach ($data as $key => $val)
	{
		$selected = "";
		if( $val[$id] == $selected_val)
		{
			$selected = "selected";
		}
		$inputobj .= "<option value='".$val[$id]."' $selected > ".$val[$desc]." </option>";
	}
	
	$inputobj .= "</select>";
	
	return $inputobj;
	
}

function createInputText($data, $input_name, $additional_prop)
{
	$inputobj = "";
	
	$inputobj = "<input type='text' name='$input_name' id='$input_name' value='$data' class='form-control' $additional_prop >";
	
	return $inputobj;
}
?>