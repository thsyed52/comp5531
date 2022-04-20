<?php

require_once("connection.php");

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['password']) || empty($_POST['confirm_password']) )
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $confirm_password = $_POST['confirm_password'];
        $password = $_POST['password'];
		
		if ($password!=$confirm_password){
			
			echo "The two passwords don't match. Please recheck.";
			
		}
		
		else if ($password=="Admin"){
			
			echo "You cannot have the same password as before. Please choose a different value.";
		}
		
		else{
			$query = "UPDATE ptc55314.user SET Password = '$password' WHERE User_Name = 'Admin' and Password = 'Admin'";
			$result = mysqli_query($con,$query);
			if ($result){
				echo "The password was successfully changed.";
				header("location:homepage.php");
        }
        else{
            echo 'Please check your query';
        }
			
		
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
    <title>Reset Password Form</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Please Reset Your Password </h3>
                        </div>
                        <div class="form-body">
                            <form action="resetPasswordPage.php" method="post">
                                <Label>Password</Label>
                                <input type="text"  placeholder=" Password " name="password">
                                <br><br>
								<Label>Confirm Password</Label>
                                <input type="text"  placeholder=" Confirm Password " name="confirm_password">
                                <br><br>
                             <input type="submit" name="submit" value="Submit">    
                            </form>

                        </div>
                    </div>
    
</body>
</html>