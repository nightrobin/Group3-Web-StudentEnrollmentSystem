<?php
	session_start();
	
	require('connection_db.php');

	$name=$_POST["username"];
	$pass=$_POST["password"];
	$loginType=$_POST["login_type"];

	
	if ($loginType == 'student') {	

			$data = "SELECT * FROM student WHERE email = '$name' and password = '$pass'";
			$result = mysqli_query($connectivity, $data);

			if (mysqli_num_rows($result)<=0) {
			    $_SESSION['n_user']= "User not found";
				header('Location:index.php');
				exit();
			}
			else{
			    while($row = mysqli_fetch_assoc($result)) { 
			    	$student_id=$row["student_id"];
			        $Nam=$row["name"];
			        $Email=$row["email"];
			        $password=$row["password"];

				}
					$_SESSION['login']=$loginType;
					$_SESSION['name']=$Nam;
					$_SESSION['email']=$Email;
					$_SESSION['pass']=$password;
					$_SESSION['student_id']=$student_id;
				
					header('Location:student.php');
					exit();
			}
	}

?>