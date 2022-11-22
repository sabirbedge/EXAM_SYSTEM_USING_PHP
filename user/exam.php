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
    <title> Start Exam </title>
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
        .bg{background-color:#e6ffe6;opacity:0.8;border:2px solid black;padding-left: 20px;}
	</style>
        <script>
		var totalmin=1;
		var time=totalmin*60;
		var min=0;
		var sec=0;
		window.setInterval(function(){
		min=Math.floor(time/60);
		sec=time%60;
		sec=sec<10?"0"+sec:sec;
		document.getElementById("dis").innerHTML=min+":"+sec;
		time--;
		if(min==0 && sec==0)
		{
		document.getElementById("btn_submit").click();
		}
		},1000);
		</script>
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
 <li><a href="view_result.php">View Result</a></li>
 <li><a href="logout.php">Log-Out</a></li>
 </ul>
  </div>
  
  </div>
        <br></br>
  
  <div class="container">
  <div class="row">
      <div class="col-sm-2"> 
          <b>  <p> Subject - <?php echo $_SESSION['sub']; ?> </p> 
              <p>Time-</p>
          <p id="dis">  </p></b>
      </div>
  <div class="col-sm-8"> 
  <div class="card bg">
      <form method="post" action="exam.php">
  <br>
  <?php
	 require "../makeconnection.php";
	$result=$con->query("select * from tbl_question where sub='".$_SESSION['sub']."'");
	while($row=$result->fetch_assoc())
	{
		$cnt++;
	?>
  <label><?php echo "Q.".$cnt; echo $row["q"]; ?></label><br>
           <input type="radio" name="<?php echo $cnt; ?>" value="<?php echo $row['op1']; ?>"> <label><?php echo $row["op1"]; ?></label>  <br/>
           <input type="radio" name="<?php echo $cnt; ?>" value="<?php echo $row['op2']; ?>"> <label><?php echo $row["op2"]; ?></label>  <br/>
           <input type="radio" name="<?php echo $cnt; ?>" value="<?php echo $row['op3']; ?>"> <label><?php echo $row["op3"]; ?></label>  <br/>
           <input type="radio" name="<?php echo $cnt; ?>" value="<?php echo $row['op4']; ?>"> <label><?php echo $row["op4"]; ?></label>  <br/>
           <br><br>
	<?php
  }
	?>
  <br/>
   <input type="submit" class="btn btn-success" name="btn_submit" value="Submit" id="btn_submit">
  </form>
  <br></div>
  </div>
   </div>
    </div>
  <div class="col-sm-2"> </div>
  </div>
   </div>
         
</body>
</html>     
<?php
if(isset($_POST["btn_submit"]))
{
	
	$res=0;
	$i=1;
	$chk=0;
	require "../makeconnection.php";
	//for checking link is active or not
	$result=$con->query("select * from tbl_add_exam where sub='".$_SESSION['sub']."'");
	while($row=$result->fetch_assoc())
	{
		if($row["status"]==0)
		{
			$chk++;
		}
	}
	if($chk>0)
	{
		echo "<script>  alert('Link is deactivated by the Admin'); window.location.replace('start_exam.php'); </script>";
	}
	else
	{
	//for checking result
		$result=$con->query("select * from tbl_question where sub='".$_SESSION['sub']."'");
	
		while($row=$result->fetch_assoc())
		{
			
				if(!empty($_POST["$i"]))
				{
					if(strcmp($_POST["$i"],$row["ans"])==0)
					{
						$res++;
					}
				}
				
			$i++;
		}
	//for inserting result
		$d=date("d-m-Y h:i:sa");
		$finalres=strval($res)."/".$cnt;
		$result=$con->query("insert into tbl_result values('".$_SESSION['user']."','".$_SESSION['sub']."','$d','$finalres')");
		if($result)
		{
			echo "<script>  alert('Exam Ended successfully.....'); window.location.replace('view_result.php'); </script>";
		}
	}
	
	
	
}

?>             