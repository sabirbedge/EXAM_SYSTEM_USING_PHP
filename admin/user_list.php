<?php
session_start();
$cnt=0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title> User List</title>
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
        	.table{background-color:black;color:white;opacity:0.5;}
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
 <li class="active"><a href="user_list.php">User List</a></li>
 <li><a href="block_user.php">Block User</a></li>
 <li><a href="unblock_user.php">Unblock User</a></li>
 <li><a href="logout.php">Log-Out</a></li>
 </ul>
  </div>
  </div>
    <br>
	
	<!-- search start -->
	 <div class="row">
	 <form method="get" action="user_list.php">
		 <div class="col-sm-2"></div>
		 <div class="col-sm-6">
		 <input type="text" Placeholder="Search User By Name" class="form-control" name="searchName" autofocus="on" autocomplete="off">
		 </div>
		 <div class="col-sm-4">
		  <input type="submit" value="Search User" class="btn btn-primary" name="btnSearch">
		 </div>
	</form>
	 </div>
	<!-- search end -->
	
   <div class="container">
  <div class="row">
  <form method="get" action="user_list.php">
  <div class="table-responsive">
  <br>
  <table class="table table-bordered" id="tbl">
      <tr class="bg-primary">
  <th>ID</th>
  <th>Name</th>
  <th>Username</th>
  <th>Password</th>
  <th>Gender</th>
  <th>Mobile</th>
  <th>Email</th>
  <th>Profile Image</th>
  <th>Status</th>
  </tr>
  <?php
	 require "../makeconnection.php";
	 if(!isset($_SESSION["user"]))
	  {
		header("Location:http://localhost/project/login.php");  
	  }
	  else
	  {
		  if(isset($_GET["btnSearch"]))
		  {
			  $val=$_GET["searchName"];
			  $result=$con->query("select * from tbl_signup where role=0 and name like '%$val%' ");
				while($row=$result->fetch_assoc())
				{
					$cnt++;
				?>
				<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $row['password']; ?></td>
				<td><?php echo $row['gender']; ?></td>
				<td><?php echo $row['mobile']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><img src="../upload-image/<?php echo $row['username']; ?>.png" class="img-responsive" width="50%" height="50%"/></td>
				<td><?php echo $row['block']==1?'Unblock':'Block'; ?></td>
				<td> <input type="submit" value="Block User" class="btn btn-danger" name="btn<?php echo $cnt; ?>"></td>
				<td> <input type="submit" value="Unblock User" class="btn btn-success" name="btn_<?php echo $cnt; ?>"></td>
				</tr>
				<?php
			  }
		  }
		  else
		  {
		  //for displaying user list to admin
			$result=$con->query("select * from tbl_signup where role=0");
			while($row=$result->fetch_assoc())
			{
				$cnt++;
			?>
			<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td><?php echo $row['mobile']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><img src="../upload-image/<?php echo $row['username']; ?>.png" class="img-responsive" width="50%" height="50%"/></td>
			<td><?php echo $row['block']==1?'Unblock':'Block'; ?></td>
			<td> <input type="submit" value="Block User" class="btn btn-danger" name="btn<?php echo $cnt; ?>"></td>
			<td> <input type="submit" value="Unblock User" class="btn btn-success" name="btn_<?php echo $cnt; ?>"></td>
			</tr>
		<?php
			}
		  }
		} ?>
      </table>
	  </form>
  <br></div>
  </div>
   </div>
</body>
</html>
<?php
require "../makeconnection.php";
for($i=0;$i<=$cnt;$i++){
	if(isset($_GET["btn".$i])){
		$result=$con->query("update tbl_signup set block=0 where id=$i+1");
		if($result)
		{
			echo "<script>alert('User blocked.....');  location.replace('http://localhost/project/admin/user_list.php');</script>";
		}
	}
	if(isset($_GET["btn_".$i])){
		$result=$con->query("update tbl_signup set block=1 where id=$i+1");
		if($result)
		{
			echo "<script> alert('User unblocked.....'); location.replace('http://localhost/project/admin/user_list.php');</script>";
		}
	}
}
?>