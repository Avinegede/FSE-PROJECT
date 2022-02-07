<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/logstyle.css">
</head>
<body>
  
<div class="container">
	<form class="signUp">
		<h3>Create Your Account</h3>
         <p>click here to get <a href="index.html">back to home page</a></p>
		<input type="text" placeholder="user name">
		<input class="w100" type="email" placeholder="Insert eMail" reqired autocomplete='off' />
		<input type="password" placeholder="Insert Password" reqired />
		<input type="password" placeholder="Verify Password" reqired />
		<button class="form-btn sx log-in" type="button">Log In</button>
		<button class="form-btn dx" type="submit">Sign Up</button>
	
	</form>
	<form class="signIn">
		<h3>Welcome</br>Back !</h3>
		<button class="fb" type="button">Log In With Facebook</button>
		<p>- or -</p>
		<input type="email" placeholder="Insert eMail" autocomplete='off' reqired />
		<input type="password" placeholder="Insert Password" reqired />
		<button class="form-btn sx back" type="button">Back</button>
		<button class="form-btn dx" type="submit">Log In</button>
	</form>
</div>
<!-- jquery file link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- custom js file link  -->

<script src="../js/script.js"></script>

</body>
</html>