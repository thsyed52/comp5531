<?php

 session_start();
 echo "Welcome"." ".$_SESSION["username"];
 $id=$_GET['GetId'];

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
							<li><a href="viewGroups.php?GetId=<?php echo $id ?>">Groups</a></li>
							<li><a href="MEmain.php?GetId=<?php echo $id ?>">Marked Entities</a></li>
							<li><a href="viewNotices.php?GetId=<?php echo $id ?>">Notices</a></li>
						</ul>

                        </div>
                    </div>

<br><br>
					<form action="viewCourses.php" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
    
</body>
</html>