<?php

require_once("connection.php");

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['name']) || empty($_POST['password']) )
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $username = $_POST['name'];
        $password = $_POST['password'];
		
		$query = "SELECT User_ID, Role_ID FROM ptc55314.user WHERE User_Name = '$username' and Password = '$password'";

        $result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);
		$row=mysqli_fetch_assoc($result);
		$sessionId=$row['Role_ID'];
        $userid=$row['User_ID'];
		
	   //$result=8;
		
        if ($count==1 && ($username=="Admin") && ($password=="Admin"))
        {
			session_start();
			$_SESSION['username']= $username;
			$_SESSION['ROLE_ID']=$sessionId;
			$_SESSION['User_ID']=$userid;
             header("location:resetPasswordPage.php");
        }
		else if ($count==1){
		  	 session_start();
			$_SESSION['username']= $username;
			$_SESSION['ROLE_ID']=$sessionId;
            $_SESSION['User_ID']=$userid;
			 header("location:homepage.php");
		}
        else{
            echo 'Please check your credentials. Incorrect username or password.';
        }
    }
}
else
{
    echo '';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>Login Form</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Welcome to CRS Manager </h3>
                        </div>
                        <div class="form-body">
                            <form action="login.php" method="post">
                                <Label>Username</Label>
                                <input type="text"  placeholder=" Username " name="name">
                                <br><br>
								<Label>Password</Label>
                                <input type="text"  placeholder=" Password " name="password">
                                <br><br>
                             <input type="submit" name="submit" value="Submit">    
                            </form>

                        </div>
                    </div>
    
</body>
</html>