<!DOCTYPE html>
<html>
<head>
<title>Log In</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="application/x-javascript"> addEventListener("load", function() { 03setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/logstyle.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

<?php 
 
  
include ('db.php');

$errors='';
if(isset($_REQUEST['login']))
{
$username=$_POST['u'];	
$password=$_POST['p'];	
$query1=mysqli_query($conn,"SELECT * FROM login WHERE username='$username' AND password='$password'");
if($r = mysqli_fetch_assoc($query1))
{

echo "<script>window.location = 'dashboard.php';</script>";
}

else
{
	echo "<script>alert('You have entered wrong credentials.!')</script>";
}
}
?>


	<!-- main -->
		<div class="main">
			<h1 style="color:white;font-family:segoe ui;">Best Ooty Hotels</h1>
			<div class="main-info">
				<div class="main-pos">
					<span></span>
				</div>
				<div class="main-info1">
					<h3 style="color:black;font-family:segoe ui;">Sign In</h3>
					
					<form method="post">
						<input type="text" name="u" id ="u"  placeholder="Username" required=" " autocomplete="off">
						<input type="password" name="p" id="p"  placeholder="Password" required=" " autocomplete="off">
						<input type="submit" name="login" value="Login">
					</form>
				
				</div>
			</div>
	
			<div class="copy-right">
			<!--	<p  style="color:black;font-family:segoe ui;">NadinSys Software Development | 2017</p>-->
			</div>
		</div>
	<!-- //main -->
</body>
</html>