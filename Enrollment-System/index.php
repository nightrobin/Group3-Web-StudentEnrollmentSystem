<?php
	session_start();
		if(isset($_SESSION['login']))
		{
			header('Location:'.$_SESSION['login'].".php");
		}
		elseif(isset($_SESSION['message']))
		{	
			echo '<script type="text/javascript">alert("'.$_SESSION['message'].'");</script>';
			header('Refresh:0');
			session_destroy();
		}
		elseif(isset($_SESSION['error']))
		{
			echo '<script type="text/javascript">alert("'.$_SESSION['error'].'");</script>';
			header('Refresh:0');
			session_destroy();
		}
		elseif (isset($_SESSION['n_user'])) {
			echo '<script type="text/javascript">alert("'.$_SESSION['n_user'].'");</script>';
			header('Refresh:0');
			session_destroy();
		}
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Pamantasan Ng Lungsod ng Maynila</title>
    <link rel="shortcut icon" type="image/jpg" href="https://plm.edu.ph/images/Seal/PLM_Seal_BOR-approved_2014.png">
    <style>
    .container-fluid {
    background-image: url("https://lh3.googleusercontent.com/HfpPTdzk1EJ2jbnsghSe0CVYe3bANVSIA9yclu1hcHT-rHHb5kf8172u8i7lLrYd5b6ewWqpTHm2qkQpoJTlVA3vBfL1__gNa5X_m4Fw01BUnI0dTCfg-yH8tswJMBtrsezahbL6Uw=w2400");
    background-size:     cover;                
    background-repeat:   no-repeat;
    background-position: center center;
    position: absolute;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    }
    .row {
    width: 1200px;
    height: 500px;
    margin-top: 100px;
    background-color: rgba(255,228,181,.7);
    border-radius: 15px;
    fill-opacity: 50%;
    }
    h1 {
    text-align: center;
    margin-top: 10px;
    font-size: 25px;
    }
    h2 {
    text-align: justify;
    margin-top: 10px;
    font-size: 15px;
    }
    .logo {
    width: 100%;
    }
    @media screen and (max-width: 1060px) {
    #primary { width:67%; }
    #secondary { width:30%; margin-left:3%;}  
    h1 {text-align: center; font-size: 20px;}
    h2 {display: none;}
    .logo {display: none;}
    .row {width: 250px; height: 300px; margin-top: 200px; margin-bottom: 250px; margin-left: 100px; margin-right: 100px;}
    #basic-addon1 {display: none;}
    .form-control {width: 25px; height: 20px;}
    }
    @media screen and (max-width: 768px) {
    #primary { width:100%; }
    #secondary { width:100%; margin:0; border:none; }
    h1 {text-align: center; font-size: 20px;}
    h2 {display: none;}
    .logo {display: none;}
    .row {width: 250px; height: 300px; margin-top: 200px; margin-bottom: 250px; margin-left: 100px; margin-right: 100px;}
    #basic-addon1 {display: none;}
    .form-control {width: 25px; height: 20px;}
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1> Are you already a student of PLM? </h1>
                    <form action="login_check.php" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Username</span>
                        <input type="text" class="form-control" placeholder="username/email" aria-label="Username" aria-describedby="basic-addon1" name="username" id="email" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Password</span>
                        <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="password" id="psw" required>
                    </div>  
                    <select style="margin: 5px;" name="login_type">
				    <option value="admin">Admin</option>
				    <option value="student">Student</option>
			        </select>         
                    <input style="margin: 5px;" class="btn btn-primary" type="submit" name="login" value="Login">
                    </form>      
                    <h2>PLM offers a variety of courses that can fit the skills that you possess! We aim to help you hone those skills and successfully utilize those in a working environment once you graduate.</h2>
                </div>
                <div class="col-md-4">
                    <h1>Do you want to become a student of PLM?</h1>
                    <form action="insert_db.php" method="POST">
                        <label for="name"><b>Full Name</b></label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="FirstName MiddleName LastName" name="name" required>
                        <label for="email"><b>Email</b></label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" required>
                        <label for="password"><b>Password</b></label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
                        <label for="password"><b>Confirm Password</b></label>
                        <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" required>
                        <label for="DateOfBirth"><b>Date of Birth</b></label><br>
                        <input class="form-control" type="Date" name="Date_of_birth" placeholder="DD/MM/YY" required>
                        <label for="Gender"><b>Gender</b></label><br>
                        <input style="margin-left:5px;" class="form-check-input" type="radio" name="Sex" id="exampleRadios1" value="Male">
                        <label style="margin-left:25px;" class="form-check-label" for="exampleRadios1">Male</label>
                        <input style="margin-left:5px;" class="form-check-input" type="radio" name="Sex" id="exampleRadios1" value="Female">
                        <label style="margin-left:25px;" class="form-check-label" for="exampleRadios1">Female</label>
                </div>
                <div class="col-md-4">
                    <label style="margin-top:25px" for="address"><b>Address</b></label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address Here" name="address" required>
                    <label for="photo"><b>Valid ID Picture</b></label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo"><br>
                    <label for="student"><b>Student Type</b></label>
                    <select required class="form-control" name="c_type">
						<option type="button" value="">None</option>
						<option type="button" onclick="teacher()" value="teacher">Irregular Student</option>
						<option type="button" onclick="student()" value="student">Regular Student</option>
					</select><br>
                    <div id="student" hidden style="margin-left: 430px; padding: 25px; margin-top: -40px; margin-bottom: -15px;">
                    <input class="input" type="text" name="course" placeholder="Course name">
                    </div><br>
                    <input class="btn btn-primary" type="submit" value="Register">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>