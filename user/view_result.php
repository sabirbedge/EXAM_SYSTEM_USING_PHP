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
    <title> View Result </title>
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
 
 <li><a href="user_dashboard.php">Home</a></li>
 <li><a href="my_profile.php">My Profile</a></li>
 <li><a href="edit_profile.php">Edit Profile</a></li>
 <li><a href="start_exam.php">Start Exam</a></li>
 <li class="active"><a href="view_result.php">View Result</a></li>
 <li><a href="logout.php">Log-Out</a></li>
 </ul>
  </div>
  
  </div>
        <br></br>
  
  <div class="container">
  <div class="row">
  <div class="col-sm-2"> </div>
  <div class="col-sm-8"> 
      <table class="table table-bordered" id="tbl">
            <tr class="bg-primary">
           <th>SR No</th>
           <th>Subject Name</th>
           <th>Exam Date</th>
           <th>Result</th>
           </tr>
		    <?php
			$sr=0;
	 require "../makeconnection.php";
	  if(!isset($_SESSION["user"]))
	{
		header("Location:http://localhost/project/login.php");  
	}
	else
	{
		//for displaying user profile in table format
	$result=$con->query("select * from tbl_result where username='".$_SESSION['user']."'");
	while($row=$result->fetch_assoc())
	{
		$sr++;
	?>
	<tr>
	<td><?php echo $sr; ?></td>
	<td><?php echo $row['sub']; ?></td>
	<td><?php echo $row['date']; ?></td>
	<td><?php echo $row['result']; ?></td>
	</tr>
	<?php
  }
	}
	?>
      </table>
  </div>
   <div class="col-sm-2"> </div>
  </div>
   </div>
 
  </div>
</body>
</html>