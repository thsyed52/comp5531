<?php

//echo 'Record Added Successfully'; 
require_once("connection.php");
$query = "select User_ID,User_Name,User_Email,Role_Id from ptc55314.user";
$result = mysqli_query($con,$query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>View Users</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > View Inserted Users </h3>
                        </div>
                        <div class="table-body">
                        <table>
                                <thead>
                                        <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                           		<th>Email</th>
                                           		<th>Role</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
												<th>Add Courses</th>
                                        </tr>
                                </thead>
                                <tbody>

                                <?php
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                             $id = $row['User_ID'];   
                                             $name = $row['User_Name'];   
                                             $email = $row['User_Email'];
                                             $role = $row['Role_Id'];
                                        
                                ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $role ?></td>
                                        <td><a href="edit.php?GetId=<?php echo $id ?>"> Edit </a></td>
                                        <td><a href="delete.php?del=<?php echo $id ?>"> Delete </a></td>
										<td><a href="courseToUser.php?GetId=<?php echo $id ?>"> Add/Edit </a></td>
                                    </tr>
                                <?php
                                        }
                                ?>
								 
                               
               

                                        </tbody>
                        </table>
                
                        </div>
                    </div>
					<br><br>
					<form action="Registration.php" method="post">
					 <input type="submit" name="submit" value="Add New Users"> 
					</form>
					<br><br>
					<form action="homepage.php" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
    
</body>
</html>