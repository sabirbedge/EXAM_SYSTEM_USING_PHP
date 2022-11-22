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
    <title> Edit Exam </title>
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
 <li class="active"><a href="edit_exam.php">Edit Exam</a></li>
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
     <form method="post" action="edit_exam.php">
  <br>
  <select id="sub" class="form-control" required="" name="sub">
      <option value="Select Subject">Select Subject</option>
	  <?php
	  //for displaying subject in dropdown to admin
	 require "../makeconnection.php";
	 if(!isset($_SESSION["user"]))
	  {
		header("Location:http://localhost/project/login.php");  
	  }
	  else
	  {
	$result=$con->query("select * from tbl_add_exam");
	while($row=$result->fetch_assoc())
	{
	?>
	<option value="<?php echo $row['sub']; ?>"><?php echo $row['sub']; echo"("; echo $row["status"]==0?"Deactivate":"Activate"; echo")";?></option>
	<?php
  }
	} ?>
  </select>
  <br/>  <br/>
   <input type="submit" class="btn btn-success" name="btn_activate" value="Activate Exam">  <br/> <br/>
   <input type="submit" class="btn btn-success" name="btn_deactivate" value="Deactivate Exam"> <br/> <br/>
   <input type="submit" class="btn btn-success" name="btn_delete" value="Delete Exam">
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
if(isset($_POST["btn_activate"]))
{
	require "../makeconnection.php";
	if(strcmp($_POST["sub"],"Select Subject")==0)
	{
		echo "<script> alert('Please select subject!'); </script>";
	}
	else
	{
		//for activating subject
		$result=$con->query("update tbl_add_exam set status=1 where sub='".$_POST['sub']."'");
		if($result)
		{
			echo "<script> alert('Exam Activated!');  location.replace(location.href);</script>";
		}
	}
	
}
if(isset($_POST["btn_deactivate"]))
{
	require "../makeconnection.php";
	if(strcmp($_POST["sub"],"Select Subject")==0)
	{
		echo "<script> alert('Please select subject!'); </script>";
	}
	else
	{
		//for deactivating subject
		$result=$con->query("update tbl_add_exam set status=0 where sub='".$_POST['sub']."'");
		if($result)
		{
			echo "<script> alert('Exam Deactivated!');  location.replace(location.href);</script>";
		}
	}
	
}
if(isset($_POST["btn_delete"]))
{
	require "../makeconnection.php";
	if(strcmp($_POST["sub"],"Select Subject")==0)
	{
		echo "<script> alert('Please select subject!'); </script>";
	}
	else
	{
		//for deleting subject
		$result=$con->query("delete from tbl_add_exam where sub='".$_POST['sub']."'");
		if($result)
		{
			$result=$con->query("delete from tbl_question where sub='".$_POST['sub']."'");
			echo "<script> alert('Exam Deleted!');  location.replace(location.href);</script>";
		}
	}
	
}
?>  