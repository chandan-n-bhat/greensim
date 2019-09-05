<?php

function upload($file,$ts){
	$fname = $file['name'];
	$ftmp = $file['tmp_name'];
	$ferr = $file['error'];
	$dest = 'uploads/'.$ts.$fname;
	if(!move_uploaded_file($ftmp, $dest)){
		echo "I did not work for";
		var_dump($file);
		echo"<br/>";
	}
	return $dest;
}

function execCommand($option,$name,$out,$conf='',$workload=''){

	if($option === 1){
		$command = 'java -jar '.$name.' > uploads/'.$out;
	}
	if($option === 2){
		$command = 'java -jar '.$name.' '.$conf. ' > uploads/'.$out;
	}
	if($option === 3){
		$command = 'java -jar '.$name.' '.$conf. $work.' '.' > uploads/'.$out;
	}
	exec($command);
}

if(isset($_POST['submit']))
{
	//echo "I was here <br/>";
	$date = date_create();
	$ts = date_timestamp_get($date);
	if(isset($_FILES['file1']))
	{
    //var_dump($_FILES['file1']);
		$filename = $_FILES['file1']['name'];

		$fileext = explode(".", $filename);
		$fileext = strtolower(end($fileext));

		if($fileext === 'jar')
		{
			$name= upload($_FILES['file1'],$ts);
			$out = $ts.'out.txt';
			if($_POST['foldername'] == "")
			{
				if(!empty(array_filter($_FILES['files']['name'])))
				{
					$conf = "[start,";
					foreach ($_FILES['files']['tmp_name'] as $key => $value) {

			            $file_tmpname = $_FILES['files']['tmp_name'][$key];
			            $file_name = $_FILES['files']['name'][$key];
			            $file_size = $_FILES['files']['size'][$key];

			            // Set upload file path
			            $filepath = 'uploads/'.$ts.$file_name;
						move_uploaded_file($file_tmpname, $filepath);
						$conf = $conf . $filepath . ',';
					}
					$conf = $conf . "end]";
					execCommand(2,$name,$out,$conf);
				}
				else
				{
					//echo "only one file was given<br/>";
					execCommand(1,$name,$out);
				}
			}
			else
			{
				$foldername = $_POST["foldername"];
				if(!is_dir($foldername))
				{
					mkdir($foldername);
				}
				foreach ($_FILES['file3']['name'] as $key => $value) {
					if(strlen($_FILES['file3']['name'][$key]) > 1)
					{
						move_uploaded_file($_FILES['file3']['tmp_name'][$key], 'uploads/'.$foldername.'/'.$name);
					}
				}
				if(!empty(array_filter($_FILES['files']['name'])))
				{
					$conf = "[start,";
					foreach ($_FILES['files']['tmp_name'] as $key => $value) {

		            	$file_tmpname = $_FILES['files']['tmp_name'][$key];
		            	$file_name = $_FILES['files']['name'][$key];
		            	$file_size = $_FILES['files']['size'][$key];

		            	// Set upload file path
		            	$filepath = 'uploads/'.$ts.$file_name;
						move_uploaded_file($file_tmpname, $filepath);
						$conf = $conf + $filepath + ',';
					}
					$conf = $conf + "end]";
					$workload = 'uploads/'.$ts.$foldername;
					execCommand(3,$name,$out,$conf,$workload);
				}
			}
			//echo $out;
			$file1 = file_get_contents('uploads/'.$out);
			//echo $file1;
		}
	}
}

?>
