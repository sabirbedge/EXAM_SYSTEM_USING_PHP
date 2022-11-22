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
    <title> Add Question </title>
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
   <body onload="f()" style="background-image:url('bg.jpeg');background-repeat:no-repeat;background-size:cover;" oncontextmenu="return false" >
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
 <li class="active"><a href="add_question.php">Add Question</a></li>
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
     <form method="post" action="add_question.php">
  <br>
  <select class="form-control" required="" name="sub" autofocus="on">
      <option value="Select Subject">Select Subject</option>
	  <?php
	 require "../makeconnection.php";
	 if(!isset($_SESSION["user"]))
	  {
		header("Location:http://localhost/project/login.php");  
	  }
	  else
	  {
		  //for displaying subject to admin
	$result=$con->query("select * from tbl_add_exam");
	while($row=$result->fetch_assoc())
	{
	?>
	<option value="<?php echo $row['sub']; ?>"><?php echo $row['sub']; echo"("; echo $row["status"]==0?"Deactivate":"Activate"; echo")";?></option>
	<?php
  }
	  } ?>
  </select><br/>
  <input type="text" class="form-control" name="q" required="" autocomplete="off" placeholder="Enter Question">
  <br/>  
  <input type="text" class="form-control" name="a" required="" autocomplete="off" placeholder="Enter Option A">
  <br/>  
  <input type="text" class="form-control" name="b" required="" autocomplete="off" placeholder="Enter Option B">
  <br/>  
  <input type="text" class="form-control" name="c" required="" autocomplete="off" placeholder="Enter Option C">
  <br/>  
  <input type="text" class="form-control" name="d" required="" autocomplete="off" placeholder="Enter Option D">
  <br/>  
  <input type="text" class="form-control" name="ans" required="" autocomplete="off" placeholder="Enter Correct Option"><br>
  <center>
   <input type="submit" class="btn btn-success" name="btn_add" value="Add"> 
   <input type="reset" class="btn btn-success" value="Reset"> 
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
if(isset($_POST["btn_add"]))
{
	require "../makeconnection.php";
	if(strcmp($_POST["sub"],"Select Subject")==0)
	{
		echo "<script> alert('Please select subject!'); </script>";
	}
	else
	{
		//for adding question,options,answer to the selected subject
		require "../makeconnection.php";
		$result=$con->query("insert into tbl_question values('".$_POST["q"]."','".$_POST["a"]."','".$_POST["b"]."','".$_POST["c"]."','".$_POST["d"]."','".$_POST["ans"]."','".$_POST["sub"]."')");
		if($result)
		{
			echo "<script>  alert('Question added successfully.....');  location.replace(location.href);</script>";
		}
	}
	
}
?>