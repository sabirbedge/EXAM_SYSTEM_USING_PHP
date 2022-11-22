<?php
if(isset($_POST["btn_acc"]))
{
	require "makeconnection.php";
		if(chkUsername($_POST["username"]))//for checking username is available or not
		{
			echo "<script> alert('username is not available'); </script>";
		}
		else
		{
			
			if(isset($_FILES["image"])){
				$file_name=$_POST["username"].".png";
				$tmp_name=$_FILES["image"]["tmp_name"];
				move_uploaded_file($tmp_name,"upload-image/".$file_name);
			}
			//To register new user
			$result=$con->query("insert into tbl_signup(role,block,name,gender,username,password,mobile,email) values(0,1,'".$_POST['name']."','".$_POST['gender']."','".$_POST['username']."','".$_POST['password']."','".$_POST['mobile']."','".$_POST['email']."')");
			if($result)
			{
				echo "<script> alert('Your account has been created successfully...'); </script>";
			}
		}
}
function chkUsername($unm){
	$cnt=0;
	require "makeconnection.php";
	$result=$con->query("select * from tbl_signup");
	while($row=$result->fetch_assoc())
	{
		if($unm==$row["username"])
		{
			$cnt++;
		}
	}
	if($cnt>0)
	{
		return true;
	}
	else
	{
		return false;
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
    <title>Sign-Up </title>
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
 <li class="active"><a href="signup.php">Sign-Up</a></li>
 <li><a href="login.php">Login</a></li>
 </ul>
  </div>
  
  </div>
  <br>
  <center><p id="txt"></p>  </center>
  
  <div class="container">
  <div class="row">
  <div class="col-sm-4"> </div>
  <div class="col-sm-4"> 
  <div class="card bg">
 <div class="row">
 <div class="col-sm-2"> </div>
 <div class="col-sm-8"> 
  <br>
  <form method="post" action="signup.php" enctype="multipart/form-data">
      <center> <label id="labelmsg"> </label> </center>
      <br>
      <input type="text" class="form-control" placeholder="Name" autofocus name="name" autocomplete="off" required="">
  <br/>
  <input type="radio" required="" name="gender" checked value="male">Male   <input type="radio" required="" name="gender" value="female">Female
   <br/> <br/>
   <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required="" >
  <br/>
  <input type="password" class="form-control" placeholder="Password" name="password" required="">
  <br/>
  <input type="number" class="form-control" placeholder="Mobile" name="mobile" required="">
  <br/>
  <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" required=""> 
  <br/>
 Profile Image <input type="file" placeholder="Image" name="image" autocomplete="off" required=""> 
  <br/>
  <center>
   <input type="submit" class="btn btn-success" value="Create Account" name="btn_acc">
   <input type="reset" class="btn btn-success" value="Cancel">
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
