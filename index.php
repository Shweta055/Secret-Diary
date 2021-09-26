<?php
	session_start();
    if(isset($_SESSION['email']) && isset($_SESSION['passward'])){
    header('Location: home.php');
    }
?>

<?php
$email=$emailErr=$pass=$passErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		If (empty($_POST["password"])) 
		{
		$passErr = "Password is required";
		}else 
		{
		$pass= test_input($_POST["password"]);
		}
		
		
		If (empty($_POST["email"])) 
		{	
			$emailErr = "Email is required";
		}else 
		{
			$email = test_input($_POST["email"]);
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$emailErr ="Email is not valid email";
			}
		}
		
		if(empty($passErr)&&empty($emailErr))
		{
			require 'dbconnect.php';
			$pass=md5($pass);
			$sql1="SELECT id FROM diary WHERE email='$email' AND '$pass'";
			$result=$conn->query($sql1);
			$count=mysqli_num_rows($result);	
			
			if($count!==1)
			{
			$pass=md5($pass);
			$sql = "INSERT INTO diary (id, email, password)
			VALUES ('','".$email."','".$pass."')";
	
			if ($conn->query($sql) === TRUE) {
			echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
			header('Location: login.php');
			} else {
			echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
			}}
			else {
				echo "<script type= 'text/javascript'>alert('Sorry Record Already Exists');</script>";
			//header('Location: index.php');
			}
		$conn->close();
		}
		
		}
		
		
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="./css/style6.css">
</head>
<body style="background-image:url('img/bg.jpg'); background-size:cover;">
	
	<div class="loginbox">
	<h1>Secret Diary</h1>
	<p>Store your thoughts permanently and securely.</p>
	<span class="error"> <?php echo $emailErr;?>
	<span class="error"> <?php echo $passErr;?>
	<p>Interested? Sign up now.</p>
		<form method="post" action="">
			
			<input type="text" placeholder="Your email" name="email" class="input" required autocomplete="off">
			
			<input type="password" placeholder="Password" name="password" class="input" required autocomplete="off">
			
			<input style="margin-left:300px;" type="checkbox" ><span class="span">Stay logged in</span>
			<input type="submit" value="Sign up!" name="submit" class="btn"><br>
			<a href="login.php">Login</a>
		</form>
	</div>
</body>
</html>