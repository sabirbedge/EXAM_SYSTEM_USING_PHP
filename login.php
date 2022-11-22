<?php
if(isset($_POST["btn_login"]))
{
	require "makeconnection.php";
	$cnt=0;
	//for admin
	$result=$con->query("select * from tbl_signup where username='".$_POST['username']."' and password='".$_POST['password']."' and role=1");
	while($row=$result->fetch_assoc())
	{
			$cnt=1;
	}
	if($cnt==1)
	{
		session_start();
		$_SESSION["user"]=$_POST['username'];
		header("Location:/project/admin/admin_dashboard.php");
	}
	else
	{
		//for user
		$result=$con->query("select * from tbl_signup where username='".$_POST['username']."' and password='".$_POST['password']."' and role=0 and block=1");
		while($row=$result->fetch_assoc())
		{
				$cnt=2;
		}
		if($cnt==2)
		{
			session_start();
			$_SESSION["user"]=$_POST['username'];
			header("Location:/project/user/user_dashboard.php");
		}
		else
		{
			echo "<script> alert('Login Failed...'); </script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Login </title>
    <style>
	.header{font-size:3rem;color:gray}
	html{font-size:62.5%;}
	@media(max-width:900px)
	{
	html{
	font-size:60%;
	}
	}
	@media(max-width:600px)
	{
	html{
	font-size:40%;
	}
	}
	.bg{background-color:#e5f5ff;opacity:0.8;border:2px solid black;}
	</style>
        <script>
        function f()
        {
            var c=document.getElementById("chkbox");
            var p=document.getElementById("password");
            var l=document.getElementById("chklabel");
            if(c.checked==true)
            {
                p.type="text";
                l.innerHTML="Hide Password";
            }
            else
            {
                p.type="password";
                l.innerHTML="Show Password";
            }
        }
        </script>
    </head>
    <body style="background-image:url('bg.jpeg');background-repeat:no-repeat;background-size:cover;" oncontextmenu="return false" oncopy="return false" onpaste="return false">
  <div class="navbar-inverse">
  <div class="navbar-header">
  <button class="navbar-toggle" data-toggle="collapse" data-target="#menu"> 
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
  </button>
  </div>
  
  <div class="collapse navbar-collapse" id="menu">
 <ul class="nav navbar-nav navbar-right">
 
 <li><a href="index.php">Home</a></li>
 <li ><a href="signup.php">Sign-Up</a></li>
 <li class="active"><a href="login.php">Login</a></li>
 </ul>
  </div>
  
  </div>
  <br>
  <center><p class="header">Login</p>  </center>
  
  <div class="container">
  <div class="row">
  <div class="col-sm-4"> </div>
  <div class="col-sm-4"> 
  <div class="card bg">
 <div class="row">
 <div class="col-sm-2"> </div>
 <div class="col-sm-8"> 
  <br>
  <form action="login.php" method="post">
            <center> <label id="labelmsg"> </label> </center>
            <br/>
      <input type="text" class="form-control" placeholder="Username" autocomplete="off" name="username" required="" autofocus>
  <br/>
  <input type="password" class="form-control" placeholder="Password" name="password" required="" id="password">
  <br/>
  <input type="checkbox" id="chkbox" onclick="f()"><label id="chklabel">Show Password</label>
  <br/>  <br/>
  <center>
      <input type="submit" class="btn btn-success" value="Login" name="btn_login">
  </center>
  </form>
  <br></div>
  </div>
   </div>
    </div>
  <div class="col-sm-4"> </div>
  </div>
   </div>
   
    </body>
</html>
