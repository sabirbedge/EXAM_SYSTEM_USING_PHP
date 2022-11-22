<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title> Admin Account </title>
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
   <body onload="f()" style="background-image:url('bg.jpeg');background-repeat:no-repeat;background-size:cover;" oncontextmenu="return false" oncopy="return false" onpaste="return false">
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
 
 <li><a href="admin_dashboard.php">Home</a></li>
 <li class="active"><a href="admin_account.php">My Account</a></li>
 <li><a href="add_exam.php">Add Exam</a></li>
 <li><a href="edit_exam.php">Edit Exam</a></li>
 <li><a href="add_question.php">Add Question</a></li>
 <li><a href="user_list.php">User List</a></li>
 <li><a href="block_user.php">Block User</a></li>
 <li><a href="unblock_user.php">Unblock User</a></li>
 <li><a href="logout.php">Log-Out</a></li>
 </ul>
  </div>
  </div>
        <br></br>
  
  <div class="container">
  <div class="row">
  <div class="col-sm-4"> </div>
  <div class="col-sm-4"> 
  <div class="card bg">
 <div class="row">
 <div class="col-sm-2"> </div>
 <div class="col-sm-8"> 
 <?php
	 require "../makeconnection.php";
	  if(!isset($_SESSION["user"]))
	  {
		header("Location:http://localhost/project/login.php");;   
	  }
	  else
	  {
		  //for displaying admin profile
	$result=$con->query("select * from tbl_signup where username='".$_SESSION['user']."'");
	while($row=$result->fetch_assoc())
	{
	?>
     <form method="post" action="admin_account.php">
  <br>Name
  <input type="text" class="form-control" id="name" name="name" required="" value="<?php echo $row['name']; ?>">
  <br/>Username
  <input type="text" class="form-control" id="username" name="username" readonly="" value="<?php echo $row['username']; ?>">
  <br/>Password
  <input type="text" class="form-control" id="password" name="password" required="" value="<?php echo $row['password']; ?>">
  <br/>Mobile
  <input type="number" class="form-control" id="mobile" name="mobile" required="" value="<?php echo $row['mobile']; ?>">
  <br/>Email
  <input type="email" class="form-control" id="email" name="email" required="" value="<?php echo $row['email']; ?>">
  <br/>
   <input type="submit" class="btn btn-success" name="btn_edit" value="Edit Profile">
  </form>
  <?php
  }
	  }
	?>
  <br></div>
  </div>
   </div>
    </div>
  <div class="col-sm-4"> </div>
  </div>
   </div>
</body>
</html>
<?php
if(isset($_POST["btn_edit"]))
{
	//for updation of admin profile
	require "../makeconnection.php";
	$result=$con->query("update tbl_signup set name='".$_POST['name']."',password='".$_POST['password']."',mobile='".$_POST['mobile']."',email='".$_POST['email']."' where username='".$_SESSION['user']."'");
	if($result)
	{
		echo "<script> alert('Your profile edited successfully.....'); location.replace(location.href);</script>";
	}
}
?>