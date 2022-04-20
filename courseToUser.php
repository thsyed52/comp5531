<?php

require_once("connection.php");

$id = $_GET['GetId'];

$query = "select Course_Id,Course_Code from ptc55314.courses";
$result = mysqli_query($con,$query);



if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{


    $query3="delete from  ptc55314.course_user where User_Id = '$id'";  
	$result3 = mysqli_query($con,$query3); 
if(isset($_POST['courses'])){
    $checkbox1 = $_POST['courses'] ;
	for ($i=0; $i<sizeof ($checkbox1);$i++) {  
	$query1="INSERT INTO course_user (Course_Id, User_Id) VALUES ('$checkbox1[$i]', '$id')";  
	$result1 = mysqli_query($con,$query1);
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
    <title>Add Course To User</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Add Course To User</h3>
                        </div>
                        <div class="form-body">
                            <form action="courseToUser.php?GetId=<?php echo $id ?>" method="post" enctype="multipart/form-data">
							
								<Label><b>Please check the Courses you would like to add to the user.</b></Label>
								<br><br>
								<?php
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                             $cid = $row['Course_Id'];
                                             $code =$row['Course_Code'];											  
                                ?>
                                <Label><?php echo $code ?></Label>
                                <input type="checkbox" name="courses[]" value="<?php echo $cid ?>">
								<br><br>
								
								 <?php
							   } 
                                ?>
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