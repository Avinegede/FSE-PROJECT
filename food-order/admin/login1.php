<?php include ('../config/constants.php');?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/loginstyle.css">
</head>
<body>
<div class="login1">
    <form class="signUp" action="login1.php" method="POST">
        <h3>Welcome</br>Back !</h3>
		<button class="fb" type="button">Log In With Facebook</button>
		<p>- or -</p>
		<input type="text" name ="username" placeholder="Enter Username">
		<input type="password" name="password" placeholder="Enter Password" reqired />

		<select name="usertype" id="">
			<option value="restaurant">Restaurant</option>
			<option value="admin">Admin</option>
		</select>
		<!-- <button class="form-btn sx log-in" type="button">Sign Up</button>
        <input class="form-btn dx" type="submit" value="Login" name = "submit"> -->
		<!-- <button class="form-btn dx" type="submit" name="submit">Log IN</button> -->
        <input type="submit" name="submit" value="Login" class="btn-secondary" style="cursor: pointer;">
	
	    </form>
    </div>
</body>
<?php


if(isset($_POST['submit']))
{
	session_start();
	$username=$_POST['username'];
 	$password=$_POST['password'];  
	 $_SESSION['username']=$username;
	
    $role = filter_input(INPUT_POST, 'usertype', FILTER_SANITIZE_STRING);
    $role = $_POST["usertype"];
	if($role  == 'admin')
	{
		$sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
		if($count==1)
		{
			$_SESSION['login']="<div class = 'sucess'>login sucessful.</div>";
			header('location:'.SITEURL.'admin/manage-admin.php');
		}
		else
		{
			$_SESSION['login']="<div class = 'error'>username and password doesn't match.</div>";
			header('location:'.SITEURL.'admin/login1.php');	
		}
    }
	if($role  == 'restaurant')
	{
		$sql="SELECT * FROM tbl_restaurant WHERE username='$username' AND password='$password'";
		$res=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($res);
		if($count==1)
		{
			$_SESSION['login']="<div class = 'sucess'>login sucessful.</div>";
			$_SESSION['restorant_username']= $username;
			header('location:'.SITEURL.'restaurant/manage-food.php');
		}
		else
		{
			$_SESSION['login']="<div class = 'error'>username and password doesn't match.</div>";
			header('location:'.SITEURL.'admin/login1.php');	
		}
    }

}
?> 