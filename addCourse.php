<?php

require_once("connection.php");

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['code']))
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $cname = $_POST['name'];
        $description = $_POST['description'];
		$code=$_POST['code'];
        $query = " insert into ptc55314.courses(Course_Name, Course_Code, Description) VALUES('$cname', '$code','$description') ";
        $result = mysqli_query($con,$query);

        if ($result)
        {
            echo 'The course has been added.';
        }
        else{
            echo 'Please check your query';
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
    <title>Add Course</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Add Course </h3>
                        </div>
                        <div class="form-body">
                            <form action="addCourse.php" method="post" enctype="multipart/form-data">
                                <Label>Course Name</Label>
                                <input type="text"  placeholder=" Course Name " name="name">
                                <br><br>
								<Label>Course Code</Label>
                                <input type="text"  placeholder=" Course Code " name="code">
                                <br><br>
								<Label>Description</Label>
                                <textarea type="text"  name="description"> </textarea>
                                <br><br>
                             <input type="submit" name="submit" value="Submit">    
                            </form>

                        </div>
                    </div>
					<br><br>
					<form action="viewCourses.php" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
    
</body>
</html>