<?php

//echo 'Record Added Successfully'; 
require_once("connection.php");
session_start();
$asg_id = $_GET['GetId'];
$query = "select MId, Name, UploadTime, User, ModifiedTime, ModifiedUser, Group_Id from ptc55314.markedentities where Asg_Id='$asg_id'";
$result = mysqli_query($con,$query);

$username = $_SESSION['username'];
$query2 = "Select Group_Id from ptc55314.user where User_name='$username'";
$result2 = mysqli_query($con, $query2);
$row = mysqli_fetch_assoc($result2);
$gid=$row['Group_Id'];

$query3 = "select MId from ptc55314.markedentities where Group_Id='$gid' and Asg_Id='$asg_id'";
$result3 = mysqli_query($con, $query3);
$count = mysqli_num_rows($result3);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>View Marked Entities</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > View Marked Entities </h3>
                        </div>
                        <div class="table-body">
                        <table>
                                <thead>
                                        <tr>
                                                <th>File ID</th>
                                                <th>File Name</th>
                                           		<th>Uploaded On</th>
												<th>Uploaded By</th>
												<th>Latest Modified On</th>
												<th>Latest Modified By</th>
                                                <th>Replace</th>
                                                <th>Download</th>
												<th>Delete</th>
                                        </tr>
                                </thead>
                                <tbody>

                                <?php
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                             $id = $row['MId'];   
                                             $name = $row['Name'];   
                                             $uploadTime = $row['UploadTime'];
											 $user = $row['User'];
											 $modifiedtime=$row['ModifiedTime'];
											 $modifieduser=$row['ModifiedUser'];
											 $groupid=$row['Group_Id'];
											 
                                        
                                ?>
                                    <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $uploadTime?></td>
										<td><?php echo $user ?></td>
										<td><?php echo $modifiedtime ?></td>
										<td><?php echo $modifieduser ?></td>
										
										<?php
                               if( $_SESSION['ROLE_ID'] == '4' && $groupid==$gid) {                                
                                ?>
										
                                        <td><a href="replaceME.php?replace=<?php echo $id ?>"> Replace </a> </td>
										<td><a href="downloads.php?file_id=<?php echo $id ?>">Download</a>
										</td>
                                        <td><a href="deleteME.php?del=<?php echo $id ?>"> Delete </a></td>
										
									<?php
                               }                                
                                ?>
								
								<?php
                               if( $_SESSION['ROLE_ID'] == '4' && $groupid!=$gid) {                                
                                ?>
										
                                        <td> Replace  </td>
										<td> Download </td>
                                        <td> Delete </td>
										
									<?php
                               }                                
                                ?>
								
								<?php
                               if( $_SESSION['ROLE_ID'] == '1' || $_SESSION['ROLE_ID'] == '2' || $_SESSION['ROLE_ID'] == '3') {                                
                                ?>
										
                                        <td> Replace  </td>
										<td><a href="downloads.php?file_id=<?php echo $id ?>">Download</a>
										</td>
                                        <td> Delete </td>
										
									<?php
                               }                                
                                ?>
								
								
	
                                    </tr>
                                <?php
                                        }
                                ?>
								 
                               
               

                                        </tbody>
                        </table>
                
                        </div>
                    </div>
					<br><br>
<?php
                               if( $_SESSION['ROLE_ID'] == '4' && $count<1) {                                
                                ?>
					<form action="MEUpload.php?upload=<?php echo $asg_id ?>" method="post">
					 <input type="submit" name="submit" value="Upload Assignment For Evaluation"> 
					</form>
					<br><br>
					<?php
							   }                                
                                ?>
					
					<form action="MEmain.php" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
    
</body>
</html>