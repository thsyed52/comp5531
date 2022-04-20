<?php

//echo 'Record Added Successfully'; 
require_once("connection.php");
 session_start();
$query = "select Group_Id, Group_Name, Group_Leader from ptc55314.group";
$result = mysqli_query($con,$query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>View Groups</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > View Existing Groups </h3>
                        </div>
                        <div class="table-body">
                        <table>
                                <thead>
                                        <tr>
                                                <th>Group ID</th>
                                                <th>Group Name</th>
                                           		<th>Group Leader</th>
												<th>Group Members</th>
												<?php
									
                               if( $_SESSION['ROLE_ID'] == '1'|| $_SESSION['ROLE_ID'] == '2' || $_SESSION['ROLE_ID'] == '3') {                                
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
                                             $id = $row['Group_Id'];   
                                             $name = $row['Group_Name'];   
                                             $email = $row['Group_Leader'];
											 $q1 = "select User_Name FROM ptc55314.user WHERE Group_Id='$id'";
											 $r1 = mysqli_query($con,$q1);
											 $groupMembers="";
											 while ($row = mysqli_fetch_array($r1))
											{
												$groupMembers=$groupMembers." ".$row[0];
											}
											 
                                        
                                ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $email ?></td>
										<td><?php echo $groupMembers ?></td>
										 <?php
									
                               if( $_SESSION['ROLE_ID'] == '1'|| $_SESSION['ROLE_ID'] == '2' || $_SESSION['ROLE_ID'] == '3') {                                
                                ?>
                                        <td><a href="editGroups.php?GetId=<?php echo $id ?>"> Edit </a></td>
                                        <td><a href="deleteGroups.php?del=<?php echo $id ?>"> Delete </a></td>
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
									
                               if( $_SESSION['ROLE_ID'] == '1'|| $_SESSION['ROLE_ID'] == '2' || $_SESSION['ROLE_ID'] == '3') {                                
                                ?>
					<form action="groupRegistration.php" method="post">
					 <input type="submit" name="submit" value="Add New Groups"> 
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