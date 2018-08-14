<?php
function create_target_dir($mainpath, $part, $id ,$item)
{
	$target_dir = $mainpath."/".$part."/".$id."/".$item."/";
	makedirs($target_dir, $mode=0777);
	return $target_dir;
}

function makedirs($dirpath, $mode=0777) {
	return is_dir($dirpath) || mkdir($dirpath, $mode, true);
}


function uploadFile($file , $target_dir)
{
	ini_set('upload_max_filesize', '64M');
	
	//echo ini_get("upload_max_filesize");
	
	$uploadOk = 1;
	$errcode = 10;
	
	$full_dir = $target_dir;
	$full_target_file = $target_dir . basename($file["name"]);
	$target_file = $target_dir . basename($file["name"]);
	
	//echo "target file : ".$target_file." |";
	
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	//echo "imageFileType : ".$imageFileType." |";
	
	//check if path exist. create if not exist
	$pathexist = makedirs($full_dir);
	
	//echo "pathexist=".$pathexist;
	
	if($pathexist)
	{
		//check if filename duplicate
		/*if (file_exists($target_file)) {
			//echo "Sorry, file already exists.";
			$uploadOk = 0;
			$errcode = $errcode."1";
		}*/
		
		// Check file size
		//if ($file["size"] > 500000) {
			//echo "Sorry, your file is too large.";
			//compress
			
		//	$uploadOk = 0;
		//	$errcode = $errcode."2";
		//}
		
		// Allow certain file formats
		/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		 $uploadOk = 0;
		 }*/
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
			return $errcode;
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($file["tmp_name"],$full_target_file )) {
				//echo "The file ". basename( $file["name"]). " has been uploaded.";
				//
				return $target_file;
			} else {
				//echo "Sorry, there was an error uploading your file.";
				$errcode = $errcode."-4";
				return 104;
				
				//return $errcode;
			}
		}
		
		
	}
	
	
	
}

function copyFile($from_dir , $to_dir)
{
	$new_path = "";
	
	
	
	$full_dir_1 = $from_dir;
	$full_dir_2 = $to_dir;
	//$second_dir	= substr($to_dir,0,strripos($to_dir , "/") );
	$filename = substr($from_dir,strripos($from_dir , "/")+1 );
	
	//echo $second_dir;exit;
	
	//make sure target directory exist
	makedirs($to_dir);
	
	copy($full_dir_1, $full_dir_2."".$filename);
	
	//check if success
	if(file_exists($full_dir_2))
	{
		return $to_dir."".$filename;
	}
	else
	{
		return 0;
	}
	
	
}

function getFileName($fullpath)
{
	$filename = substr($fullpath,strripos($fullpath , "/")+1 );
	
	return $filename;
}


?>