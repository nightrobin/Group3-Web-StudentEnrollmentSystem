<?php
	require('connection_db.php');

	if (isset($_GET['s_id'])) {
		$student_id=$_GET['s_id'];
		$sql="SELECT * FROM student WHERE student_id=$student_id";
		$result=mysqli_query($connectivity,$sql);
		$row=mysqli_fetch_assoc($result);
		?>
		<style type="text/css">
			form input {
			    width: 528px;
			    height: 40px;
			    font-size: 21px;
			    padding-left: 15px;
			}
		</style>
		<b style="margin-left: 400px; font-size: 30px;">Student data update Form</b> 
		<form style="margin-left: 400px; width: 250px;" action="insert_db.php" method="POST">
			<input type="hidden" name="s_id" value=<?=$student_id?>><br/>
			Name:<input required type="text" name="name" value=<?=$row['name'];?>><br/>
			Email:<input required type="email" name="email" value=<?=$row['email'];?>><br/>
			Password:<input required type="text" name="password" value=<?=$row['password'];?>><br/>
			Date of Birth:<input required type="date" name="dob" value=<?=$row['date_of_birth'];?>><br/>
			Gender:<input required type="text" name="gender" value=<?=$row['Gender'];?>><br/>
			Photo:<input style="padding-left: 0px;" type="file" name="photo" value=<?=$row['photo'];?>><br/>
			Address:<input required type="text" name="address" value=<?=$row['address'];?>><br/>
			Course:<input required type="text" name="course" value=<?=$row['course_type'];?>><br/>
			<input style="width: auto; margin-top: 10px;" type="submit" name="submit" value="Update">
		</form>
	
	<?php
	}


	elseif (isset($_GET['user'])) {
		?>
		<style type="text/css">
			form input {
			    width: 528px;
			    height: 40px;
			    font-size: 21px;
			    padding-left: 15px;
			}
		</style>

		<b style="margin-left: 400px; font-size: 30px;">Student Registration Form</b>
		<form style="margin-left: 400px; width: 250px;" action="update_by_admin.php" method="POST">
			<input type="hidden" name="c_type" value="student"><br/>
			Full Name<input required type="text" name="name" placeholder="Full Name"><br/>
			Email<input required type="text" name="email" placeholder="email address"><br/>
			Password<input required type="password" name="password" placeholder="Password"><br/>
			Confirm Password<input required type="password" name="confirm_password" placeholder="Confirm Password"><br/>
			Date of Birth<input required type="date" name="Date_of_birth"><br/>
			Gender<input required type="text" name="Sex" placeholder="sex"><br/>
			Photo<input style="padding-left: 0px;" type="file" name="photo" ><br/>
			Address<input required type="text" name="address" placeholder="address"><br/>
			Course<input required type="text" name="course" placeholder="course"><br/>
			<input style="width: auto; margin-top: 10px;" type="submit" name="submit" value="Register">
		</form>
	
	<?php
	}
?>