<?php
session_start();
if(!isset($_SESSION['email']) 
	|| !isset($_SESSION['password'])){
 header('Location: index.php');
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="./css/style3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
</head>
<body>
	<header>
	<div class="con">
		<div class="branding">
			<h1>Secret Dairy</h1>
		</div>
		<nav>
			<ul>
				<li><a><i>
					<?php
						echo "Welcome  " . $_SESSION['email'];
					?></a></i>
				</li>
				<li><a href="logout.php">LOGOUT</a></li>
			</ul>
		</nav>
	</div>
	
<?php

include 'dbconnect.php';
$email=$_SESSION['email'];
$selectqry="SELECT * FROM diary WHERE email='$email'";
$selectres=mysqli_query($conn,$selectqry);
$selectdata=mysqli_fetch_assoc($selectres);
?>
			<form>
				<div class="form-group">
					<input type="hidden" name="notes_id" value="<?php echo $selectdata['id'];?>" id="notes_id">
					<textarea class="form-control" name="notes" style="height: 400px;width:95%;margin-left:38px;margin-top:30px;" placeholder="Please write Your today notes here." id="notes_desc"><?php echo $selectdata['diary'];?></textarea>
				</div>
			</form>
			<div id="autoSaveText"></div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	function autoSave()
	{
		var notes_desc = document.getElementById('notes_desc').value;
		var notes_id = document.getElementById('notes_id').value;
		if(notes_desc!='')
		{
			$.ajax({
				url:'notes_save.php',
				method:"post",
				data:{notes_desc : notes_desc,notes_id:notes_id},
				success:function(response)
				{
					if(response!='')
					{
					document.getElementById('notes_id').value=response;	
					}
					document.getElementById('autoSaveText').innerHTML="Notes  Saved.";
				
				}
			});
		}
	}
	setInterval(function(){
		autoSave();
	},10000);

		setInterval(function(){
						document.getElementById('autoSaveText').innerHTML="";
					},8000);
</script>
</body>
</html>