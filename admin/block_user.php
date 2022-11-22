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
    <title>Block User</title>
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
 <li><a href="admin_account.php">My Account</a></li>
 <li><a href="add_exam.php">Add Exam</a></li>
 <li><a href="edit_exam.php">Edit Exam</a></li>
 <li><a href="add_question.php">Add Question</a></li>
 <li><a href="user_list.php">User List</a></li>
 <li class="active"><a href="block_user.php">Block User</a></li>
 <li><a href="unblock_user.php">Unblock User</a></li>
 <li><a href="logout.php">Log-Out</a></li>
 </ul>
  </div>
  </div>
    <br>
   <div class="container">
  <div class="row">
  <div class="col-sm-4"> </div>
  <div class="col-sm-4"> 
  <div class="card bg">
 <div class="row">
 <div class="col-sm-2"> </div>
 <div class="col-sm-8"> 
  <br>
  <form method="post" action="block_user.php"> 
  <select class="form-control" name="user">
   <option value="Select User">Select User </option>
    <?php
	if(!isset($_SESSION["user"]))
	{
		header("Location:http://localhost/project/login.php");  
	}
	else
	{
		//for displaying unblock_user to admin
	 require "../makeconnection.php";
	$result=$con->query("select * from tbl_signup where role=0 and block=1");
	while($row=$result->fetch_assoc())
	{
	?>
   <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
	<?php
  }
  }
	?>
  </select>
  <br/>
  <br/>
  <center>
   <input type="submit" class="btn btn-success" value="Block" name="block_btn"> 
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
<?php
if(isset($_POST["block_btn"]))
{
	require "../makeconnection.php";
	if(strcmp($_POST["user"],"Select User")==0)
	{
		echo "<script> alert('Please select user!'); </script>";
	}
	else
	{
		//for blocking the selected user
		$result=$con->query("update tbl_signup set block=0 where name='".$_POST['user']."'");
		if($result)
		{
			echo "<script> alert('User blocked.....'); location.replace(location.href);</script>";
		}
	}
	
}
?>