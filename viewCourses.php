<?php

//echo 'Record Added Successfully'; 
require_once("connection.php");
session_start();
$query = "select Course_Id,Course_Code, Course_Name, description from ptc55314.courses";
$result = mysqli_query($con,$query);
$userid=$_SESSION['User_ID'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>View Courses</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > View Courses	</h3>
                        </div>
                        <div class="table-body">
                        <table>
                                <thead>
                                        <tr>
                                                <th>Course ID</th>
												<th>Course Code</th>
                                                <th>Name</th>
                                           		<th>Description</th>
												<?php
                               if( $_SESSION['ROLE_ID'] == '1'||   $_SESSION['ROLE_ID'] == '2' ||   $_SESSION['ROLE_ID'] == '3' ) {                                
                                ?>
                                                <th>Edit</th>
												<th>Delete</th>
												<?php
							   } 
                                ?>
                                        </tr>
                                </thead>
                                <tbody>

                                <?php
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                             $id = $row['Course_Id'];
                                             $code =$row['Course_Code'];											 
                                             $name = $row['Course_Name'];   
                                             $description = $row['description'];

		                                     $query1 = "SELECT * FROM ptc55314.course_user WHERE User_Id = '$userid' and Course_Id = '$id'";

                                             $result1 = mysqli_query($con,$query1);
		                                     $count = mysqli_num_rows($result1);
											 
											 
                                        
                                ?>
                                    <tr>
								<?php
                               if( $_SESSION['ROLE_ID'] == '1'||   $_SESSION['ROLE_ID'] == '2' ||   $_SESSION['ROLE_ID'] == '3' ) {                                
                                ?>
                                        <td><?php echo $id ?></td>
										 <td><?php echo $code ?></td>
                                        <td><a href="viewCoursesHomepage.php?GetId=<?php echo $id ?>"><?php echo $name ?></a></td>
                                        <td><?php echo $description?></td>
                                        <td><a href="editCourses.php?editing=<?php echo $id ?>"> Edit </a> </td>
                                        <td><a href="deleteCourses.php?del=<?php echo $id ?>"> Delete </a></td>
                                    </tr>
                                <?php
							   } 
                                ?>


<?php
                               if( $_SESSION['ROLE_ID'] == '4' && $count>=1 ) {                                
                                ?>
                                        <td><?php echo $id ?></td>
										 <td><?php echo $code ?></td>
                                        <td><a href="viewCoursesHomepage.php?GetId=<?php echo $id ?>"><?php echo $name ?></a></td>
                                        <td><?php echo $description?></td>
                                    </tr>
                                <?php
							   } }
                                ?>
								 
                               
               

                                        </tbody>
                        </table>
                
                        </div>
                    </div>
					<br><br>
					<?php
                               if( $_SESSION['ROLE_ID'] == '1'||   $_SESSION['ROLE_ID'] == '2' ||  $_SESSION['ROLE_ID'] == '3') {                                
                                ?>
					<form action="addCourse.php" method="post">
					 <input type="submit" name="submit" value="Add Courses"> 
					</form>
					<br><br>
					<?php
							   }                          
                                ?>
					
					<form action="homepage.php" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
    
</body>
</html>