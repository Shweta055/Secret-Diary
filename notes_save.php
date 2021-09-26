<?php
include 'dbconnect.php';

$notes_desc=$_POST['notes_desc'];
$notes_id=$_POST['notes_id'];
if($notes_desc!=''){
	if($notes_id!='')
	{
		//when notes id not blank
		$updateqry="UPDATE diary SET diary='$notes_desc' WHERE id='$notes_id'";
		$updateres=mysqli_query($conn,$updateqry);
	}
	else
	{
	
	$insertqry="INSERT INTO diary('diary') VALUES ('$diary')";
	$insertres=mysqli_query($conn,$insertqry);
	echo mysqli_insert_id($conn);
	}
}
?>