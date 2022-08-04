<?php

$target="uploads/".basename($_FILES['files']['name']);
//$target2="uploads/".basename($_FILES['files2']['name']);
//$target3="uploads/".basename($_FILES['files3']['name']);

if(isset($_REQUEST['submit'])){
	if (move_uploaded_file($_FILES['files']['tmp_name'],$target)){
		echo "uploaded";
	}
	else{
		echo "failed";
	}

	/*if (move_uploaded_file($_FILES['files2']['tmp_name'],$target2)){
		echo "uploaded";
	}
	else{
		echo "failed";
	}
	if (move_uploaded_file($_FILES['files3']['tmp_name'],$target3)){
		echo "uploaded";
	}
	else{
		echo "failed";
	}*/
}