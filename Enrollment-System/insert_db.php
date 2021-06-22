<?php
	session_start();
	require('connection_db.php');

	$Account_C = $_POST['c_type'];

	if ($Account_C == 'student') {

		$Name=mysqli_real_escape_string($connectivity,$_POST['name']);
		$Email=mysqli_real_escape_string($connectivity,$_POST['email']);
		$Pass=mysqli_real_escape_string($connectivity,$_POST['password']);
		$Dob=mysqli_real_escape_string($connectivity,$_POST['Date_of_birth']);
		$Account=mysqli_real_escape_string($connectivity,$_POST['c_type']);
		$Sex=mysqli_real_escape_string($connectivity,$_POST['Sex']);
		$Address=mysqli_real_escape_string($connectivity,$_POST['address']);
		$Photo=mysqli_real_escape_string($connectivity,$_POST['photo']);

		$Course=mysqli_real_escape_string($connectivity,$_POST['course']);

		$username= $_POST['email'];
		$Pass=$_POST['password'];
		$C_Pass=$_POST['confirm_password'];

		$Checking = "SELECT * FROM student WHERE email ='$username'";
		$result= mysqli_query($connectivity,$Checking);
		$row_count= mysqli_num_rows($result);
			if($row_count > 0)
			{
				$_SESSION['message']=" Dear, ". $Name." You are already registered.";
				header("Location:index.php");
			}
			elseif ($Pass != $C_Pass) {
				$_SESSION['error']="Password do not match";
				header('Location:index.php');
			}
			else{
				$Database="INSERT INTO student(name,email,password,date_of_birth,Gender,photo,address,course_type)VALUES('$Name','$Email','$Pass','$Dob','$Sex','$Photo','$Address','$Course')";
			
				if(mysqli_query($connectivity,$Database))
				{
					$_SESSION['message']=" Dear, ". $Name." you are registered.";
					header("Location:student.php");
				}
				else
				{
					echo mysqli_error($connectivity);
				}
			}
	}
	elseif (isset($_POST['s_id'])) {

		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$dob=mysqli_real_escape_string($connectivity,$_POST['dob']);
		$gender=$_POST['gender'];
		$photo=$_POST['photo'];
		$address=$_POST['address'];
		$course=$_POST['course'];
		$student_id=$_POST['s_id'];

			$sql="UPDATE student SET name='$name',email='$email',password='$password',date_of_birth='$dob',Gender='$gender',photo='$photo',address='$address',course_type='$course' WHERE student_id=$student_id";
				if(mysqli_query($connectivity,$sql)){
					header('location:admin.php');
				}
				else{
					mysqli_error($connectivity);
				}
			
	}
	elseif (isset($_GET['s_id'])) {
		$student_id=$_GET['s_id'];

		$sql="DELETE FROM student WHERE student_id=$student_id";
			if(mysqli_query($connectivity,$sql)){
				header('location:admin.php');
			}
			else{
				mysqli_error($connectivity);
			}
	}
	elseif (isset($_GET['st_id'])) {
		$student_id=$_GET['st_id'];

		$sql="DELETE FROM student WHERE student_id=$student_id";
			if(mysqli_query($connectivity,$sql)){
				header('location:index.php');
				session_destroy();
			}
			else{
				mysqli_error($connectivity);
			}
	}

			else{
				mysqli_error($connectivity);
			}
	//echo $Account_C;
?>