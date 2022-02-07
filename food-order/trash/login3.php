<?php include ('../config/constants.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/loginstyle.css">
</head>
<body>
  

	<form class="signUp">
		<h3>Create Your Account</h3>
         <p>click here to get <a href="index.html">back to home page</a></p>
		 <select name="" id="">
			<option value="">Restaurant</option>
			<option value="">Customer</option>


		</select>
		<input type="text" placeholder="user name">
		<input class="w100" type="email" placeholder="Insert eMail" reqired autocomplete='off' />
		<input type="password" placeholder="Insert Password" reqired />
		<input type="password" placeholder="Verify Password" reqired />
		
		<button class="form-btn sx log-in" type="button">Log In</button>
		<button class="form-btn dx" type="submit">Sign Up</button>
	
	</form>
	<form class="signIn" action="" method="POST">
		<h3>Welcome</br>Back !</h3>
		<button class="fb" type="button">Log In With Facebook</button>
		<p>- or -</p>
		<input type="text" name ="username" placeholder="Enter Username">
		<input type="password" name="password" placeholder="Enter Password" reqired />

		<select name="" id="">
			<option value="">Restaurant</option>
			<option value="">Customer</option>
			<option value="">Admin</option>


		</select>
		<button class="form-btn sx back" type="button">Back</button>
		<button class="form-btn dx" type="submit_login">Log In</button>
	</form>

<!-- jquery file link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- custom js file link  -->

<script src="../js/script.js"></script>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
	echo $username=$_POST['username'];
	echo $password=$_POST['password'];
	$sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
	$res=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($res);
	if($count==1)
	{
		$_SESSION['login']="<div class = 'sucess'>login sucessful.</div>";
		header('location:'.SITEURL.'admin');
	}
	else
	{
		$_SESSION['login']="<div class = 'error'>username and password doesn't match.</div>";
		header('location:'.SITEURL.'admin');	
	}
}
?> 