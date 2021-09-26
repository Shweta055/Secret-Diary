<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	require 'dbconnect.php';
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$pass=md5($pass);
	$sql="SELECT id FROM diary WHERE email='$email' AND '$pass'";
	
	$result=$conn->query($sql);
	
	$count=mysqli_num_rows($result);
	
	if($count==1)
	{
		$_SESSION['email']=$email;
		$_SESSION['password']=$pass;
		
		header('Location: home.php');
	}
	else
	{
		echo "<script type= 'text/javascript'>alert('error');</script>";
		
	}
	$conn->close();
}
?>