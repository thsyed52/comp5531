<?php

require_once("connection.php");

$id=$_GET['editing'];

$query = "select Course_Code, Course_Name, description from ptc55314.courses where Course_Id='$id'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
$cname = $row['Course_Name']; 
$description = $row['description']; 
$code= $row['Course_Code']; 

if(isset($_POST['submit']))
{
    $cname = $_POST['name'];
    $description = $_POST['description'];
    $code=$_POST['code'];

    $query = "update ptc55314.courses set Course_Name = '$cname' ,Course_Code = '$code' , Description ='$description' 
                where Course_ID ='$id' ";
    $result = mysqli_query($con,$query);

    if ($result)
    {
     echo 'The Course has been updated.';
    }
    else
    {
        echo 'Please check your query';
    }
}
else
{
   // header("location:viewCourses.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>Edit Course</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Edit Course </h3>
                        </div>
                        <div class="form-body">
                            <form action="editCourses.php?editing=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                <Label>Course Name</Label>
                                <input type="text"  placeholder=" Course Name " name="name" value=" <?php echo $cname ?>">
                                <br><br>
								<Label>Course Code</Label>
                                <input type="text"  placeholder=" Course Code " name="code" value=" <?php echo $code ?>">
                                <br><br>
								<Label>Description</Label>
                                <textarea type="text"  name="description"><?php echo $description ?> </textarea>
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