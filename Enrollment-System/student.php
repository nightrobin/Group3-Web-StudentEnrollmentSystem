<?php
require('connection_db.php');
	session_start();
	if (isset($_POST['logout'])) {
		session_destroy();
		header('Location:index.php');
	}
	elseif($_SESSION['login']=="student")
	{
		$user =$_SESSION['name'];
	}

	else
		header('Location:index.php');		

?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Profile | Pamanatasan ng Lungsod ng Maynila</title>
	<link rel="shortcut icon" type="image/jpg" href="https://plm.edu.ph/images/Seal/PLM_Seal_BOR-approved_2014.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		body{
			background-color: #ffcba4;
		}
		.input{
			width: 373px;
			margin-top: 10px;
			height: 35px; 
			padding-left: 15px;
			font-size: 18px;
		}
		.flex{
			display: inline-flex;
		}
		table {
		    border-collapse: collapse;
		    width: auto;
		}
		th{
			text-align: center;
			background-color: #808080;
		    color: white;
			font-family: monospace;
			font-size: 20px;
		}

		td {
		    text-align: left;
		    padding: 8px;
			font-family: monospace;
			font-size: 20px;
		}

		tr:nth-child(even){
			background-color: #f2f2f2
		}
		tr:nth-child(odd){
			background-color: #f9f9f9
		}
		#course1 {
			width:700px;
			height:400px;
		}
	</style>
</head>

<body>
	<div style="background-color: rgba(162, 72, 87,.7); height: 80px; padding-top: 10px;">
		<div style="padding: 10px; display: inline-flex;">
			<b style="font-family: monospace; font-size: 35px; color: white; width: 800px; padding-left: 170px;"><?php 
			echo "Welcome, ". $user ?></b>
		</div>
		<form style="display: inline-flex;" action="#" method="POST">
		<input class="btn btn-light" type="submit" name="logout" value="Logout">
	</form>
	</div>

	<div style="background-color: #ffcba4; height: 465px; padding-top: 1px;">

		<?php

			$student_id=$_SESSION['student_id'];

			$sql = "SELECT * FROM student WHERE student_id='$student_id'";
				$result = mysqli_query($connectivity, $sql);

				if (mysqli_num_rows($result)<0) {
				   echo "No data found";
				}
				else{
					while ($row=mysqli_fetch_assoc($result)) {
					$student_id=$row['student_id'];
					$name=$row['name'];
					$email=$row['email'];
					$pass=$row['password'];
					$dob=$row['date_of_birth'];
					$gender=$row['Gender'];
					$photo=$row['photo'];
					$address=$row['address'];
					$course=$row['course_type'];	
				}	
		?>
			<script>
				function password() {
				    var x = document.getElementById('show');
				    if (x.style.display == 'block') {
				        x.style.display = 'none';
				    } 
				    else{
				        x.style.display = 'block';
				    }
				}
			</script>
			<br>
					<table style="margin-left: 10px; margin-right: 10px;" border="1px">
						<tr>
							<th>Student ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Date of Birth</th>
							<th>Gender</th>
							<th>Photo</th>
							<th>Address</th>
							<th>Course</th>
							<th>Year Level</th>
							<th>Student Type</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>
						<tr>
							<td><?=$student_id;?></td>
							<td><?=$name;?></td>
							<td><?=$email;?></td>
							<td><?=$dob;?></td>
							<td><?=$gender;?></td>
							<td><?=$photo;?></td>
							<td><?=$address;?></td>
							<td><?=$course;?></td>
							<td>1</td>
							<td>Regular</td>
							<td><a href="update.php?s_id=<?=$student_id;?>">Update</a></td>
							<td><a href="insert_db.php?st_id=<?=$student_id;?>">Delete your Account</a></td>
						</tr>
					</table>
				<?php
			}
		?> 
		<br><br><br>
		<a href="courses.html" target="_blank" style="margin-left:15px"><button type="button" class="btn btn-dark">Browse Available Courses</button></a>
	</div>
	
</body>
</html>