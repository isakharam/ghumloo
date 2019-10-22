<html>
<head>
<style>
	body{
	
	
	height:600px;
	background-size:cover;
	background-position:center;
	background-color:rgba(0.5,3,10,0.8)

}
.form{
	position:relative;
height:460px;
width:350px;
background-color:rgba(139,28,64,0.8);
opacity:0.99;
margin-top:100px;

}
.form h1{
	color:#FAFAFA;
	padding:40px;
	
}
input[type=text]{
	
	display:block;
	border:1px white;
	background:none;	
	
	text-align:center;
	padding:14px;
	width:260px;
	outline:0;	
	border:1px solid white;
	border-radius:24px;
	}
input[type=password]
{
	background:none;
	display:block;
	border:1px white;	
	color:#FAFAFA;	
	font-style:bold;
	text-align:center;
	padding:14px;
	width:260px;
	outline:0;	
	border:1px solid white;
	border-radius:24px;
	}
input[type=submit]{
	background:none;
	width:150px;
	height:46px;
	font-size:20px;
	border: 1px solid black;
	margin:20px;
	color:grey;	
	font-style:bold;
	border-radius:24px;
	outline:0
	}
input[type=submit]:hover{
	background-color:#FAFAFA;
	opacity:0.8;
	
}
input[type=text]:hover{
	background-color:#FAFAFA;
	opacity:0.8;
	
	
}
input[type=password]:hover{
	background-color:#FAFAFA;
	opacity:0.8;
	
}
#gap{
	
	margin-top:10px;
}



</style>


</head>
<body background="image/ghoomlo.png">
<?php
require('db.php');
session_start();

if (isset($_POST['username'])){
 
 $username = stripslashes($_REQUEST['username']);

 $username = mysqli_real_escape_string($con,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);

        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
 $result = mysqli_query($con,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
      
     header("Location: road.html");
         }else{
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
 }
    }else{
?>
<center>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username"  required /><br>
<input type="password" name="password" placeholder="Password" id="gap"required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='signup.php'>Register Here</a></p>
</div>
</center>
<?php } ?>
</body>
</html>