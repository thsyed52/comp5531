<?php

require_once("connection.php");

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['age']) )
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $username = $_POST['name'];
        $useremail = $_POST['email'];
        $userage = $_POST['age'];

        $query = " insert into testdb.user(User_Name,User_Email,User_Age) VALUES('$username','$useremail','$userage') ";
        $result = mysqli_query($con,$query);
		echo $result;
	   //$result=8;

        if ($result)
        {
            header("location:view.php");
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
                            <h1 > Registration Form in PHP</h3>
                        </div>
                        <div class="form-body">
                            <form action="registrationForm.php" method="post">
                                <Label>Enter UserName</Label>
                                <input type="text"  placeholder=" User Name " name="name">
                                <br><br>
                                <Label>Enter Email</Label>
                                <input type="email"  placeholder=" User Email " name="email">
                                <br><br>
                                <Label>Enter Age</Label>
                                <input type="number"  placeholder=" User Age " name="age">
                                <br><br>
                                <label>Gender</label>
				                    <select name="gender">
					                        <option value="male">Male</option>
					                        <option value="female">Female</option>
					                        <option value="other">Other</option>
				                    </select>
                                <br><br>
                                <label>Birthday:</label>
                                <input type="date" name="birthday">
                               <!--<input type="submit" name="submit" value="Submit">--> 
                               <br><br>
                               <input type="submit" name="submit" value="submit">
                            </form>

                        </div>
                    </div>
    
</body>
</html>