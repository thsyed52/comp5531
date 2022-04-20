<?php
// session_start();
 // to store session values
 //$_SESSION['namapengguna']= $idpengguna;  // Initializing Session with value of PHP Variable
 session_start();
// echo "<td align=centre>".$_SESSION['username']."</td>";
 echo "Welcome"." ".$_SESSION["username"];
  //echo "Welcome"." ".$_SESSION["ROLE_ID"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>CRS Homepage</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 >Welcome To Course Student Home Page </h3>
                        </div>
						
                       <ul>
					    <?php
                               if( $_SESSION['ROLE_ID'] == '1'||   $_SESSION['ROLE_ID'] == '2'  ) {                                
                                ?>
							<li><a href="viewUsers.php">Users</a></li>
							   <?php } ?>
							<li><a href="viewGroups.php">Groups</a></li>
							<li><a href="MEmain.php">Marked Entities</a></li>
							<li><a href="viewCourses.php">Courses</a></li>
							<li><a href="viewNotices.php?GetId=0">Notices</a></li>
						</ul>

                        </div>
                    </div>
    
</body>
</html>