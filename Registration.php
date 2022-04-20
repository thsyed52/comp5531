<?php

require_once("connection.php");

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['role']))
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $username = $_POST['name'];
        $useremail = $_POST['email'];
        $password = $_POST['password'];
		$role = $_POST['role'];
		$roleId=0;
		
		if ($role=="Admin")
        {
            $roleId=1;
        }
		if ($role=="Instructor")
        {
            $roleId=2;
        }
		if ($role=="TA")
        {
            $roleId=3;
        }
		if ($role=="Student")
        {
            $roleId=4;
        }
		
		//echo $roleId;

        $query = " insert into ptc55314.user(User_Name,User_Email,Password,Role_ID) VALUES('$username','$useremail','$password', $roleId) ";
        $result = mysqli_query($con,$query);

        if ($result)
        {
            echo 'Congratualations you have successfully registered';
        }
        else{
            echo 'Please check your query';
        }
    }
}
else
{
    echo 'Please check your connection';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>Registration Form</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Registration Form </h3>
                        </div>
                        <div class="form-body">
                            <form action="Registration.php" method="post">
                                <Label>UserName</Label>
                                <input type="text"  placeholder=" Username " name="name">
                                <br><br>
								<Label>Password</Label>
                                <input type="text"  placeholder=" Password " name="password">
                                <br><br>
                                <Label>Email</Label>
                                <input type="email"  placeholder=" User Email " name="email">
                                <br><br>
                                <Label>Role</Label>
                                <select name="role" id="role">
									<option value="">--- Choose an option ---</option>
									 <?php
									 session_start();
                               if( $_SESSION['ROLE_ID'] == '1' ) {                                
                                ?>
									<option value="Admin">Admin</option>
									<option value="Instructor">Instructor</option>
								<?php
                               }                               
                                ?>
									<option value="Student">Student</option>
									<option value="TA">TA</option>
									
								</select>
                                <br><br>
                             <input type="submit" name="submit" value="Submit">    
                            </form>

                        </div>
                    </div>
					<br><br>
					<form action="viewUsers.php" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
    
</body>
</html>