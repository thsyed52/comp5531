<?php

//echo 'Record Added Successfully'; 
require_once("connection.php");
session_start();
$rid = $_GET['GetId'];
$query = "select Asg_Id, Name, Instructions, DOS, marks from ptc55314.assignments where Course_Id='$rid'";
$result = mysqli_query($con,$query);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>View Assignments</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > View Assignments	</h3>
                        </div>
                        <div class="table-body">
                        <table>
                                <thead>
                                        <tr>
                                                <th>Assignment ID</th>
                                                <th>Name</th>
                                           		<th>Instructions</th>
												<th>Date of Submission</th>
												<th>Maximum Marks</th>
												<?php
                               if( $_SESSION['ROLE_ID'] == '1'||   $_SESSION['ROLE_ID'] == '2' ||   $_SESSION['ROLE_ID'] == '3' ) {                                
                                ?>
                                                <th>Edit</th>
					
												<?php
							   } 
                                ?>
                                        </tr>
                                </thead>
                                <tbody>

                                <?php
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                             $id = $row['Asg_Id'];   
                                             $name = $row['Name'];   
                                             $instructions = $row['Instructions'];
											 $dos = $row['DOS'];
											 $marks=$row['marks'];
											 
											 
                                        
                                ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><a href="viewME.php?GetId=<?php echo $id ?>"><?php echo $name ?></a></td>
                                        <td><?php echo $instructions?></td>
										<td><?php echo $dos ?></td>
										<td><?php echo $marks ?></td>
										<?php
                               if( $_SESSION['ROLE_ID'] == '1'||   $_SESSION['ROLE_ID'] == '2' ||   $_SESSION['ROLE_ID'] == '3' ) {                                
                                ?>
                                        <td><a href="editAsg.php?editing=<?php echo $id ?>&GetId=<?php echo $rid ?>"> Edit </a> </td>
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
					<form action="MEAsgUpload.php?GetId=<?php echo $rid ?>" method="post">
					 <input type="submit" name="submit" value="Upload Assignments"> 
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