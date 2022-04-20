<?php 

session_start();
require_once("connection.php");
$role = $_SESSION['ROLE_ID'];
$rid = $_GET['GetId'];
$username = $_SESSION['username'];


$query = "SELECT id,title, details, postTime FROM ptc55314.announcement where Course_Id='$rid'";
$result = mysqli_query($con,$query); 


while($row = mysqli_fetch_assoc($result)){
	$id=$row['id'];
	$name = $row['title'];   
	$details = $row['details'];
	$date = $row['postTime'];

	?> 
	<head>
  	<link rel="stylesheet" a href="CSS/styles.css" />
  	<title>Announcements</title>
	</head>

	<body>

		<table border =1>
  		<tr>
    		<th>Title</th>
    		<th>Details</th> 
    		<th>Date</th>
			
			<?php
                               if( $_SESSION['ROLE_ID'] == '1' || $_SESSION['ROLE_ID'] == '2' || $_SESSION['ROLE_ID'] == '3') {                                
                                ?>
			<th>Edit</th>
			
			<?php
							   }                                
                                ?>
  		</tr>
  		<tr>
    		<td> <?php echo $name ?> </td>
    		<td><?php echo $details ?> </td> 
    		<td><?php echo $date ?> </td>
			
				<?php
                               if( $_SESSION['ROLE_ID'] == '1' || $_SESSION['ROLE_ID'] == '2' || $_SESSION['ROLE_ID'] == '3') {                                
                                ?>
			<td><a href="editNotices.php?GetId=<?php echo $id ?>&gId=<?php echo $rid ?>"> Edit </a> </td>
			
			<?php
							   }                                
                                ?>
  		</tr>
  
		</table>
		
		<br><br>
		
	</body>
	<?php
		}
	?>
	
	<?php
                               if( $_SESSION['ROLE_ID'] == '1' || $_SESSION['ROLE_ID'] == '2' || $_SESSION['ROLE_ID'] == '3') {                                
                                ?>
	
	<br><br>
					<form action="uploadNotices.php?GetId=<?php echo $rid ?>" method="post">
					<input type="submit" name="submit" value="Add New Notices"> 
		</form>
	<?php
							   }                                
                                ?>


<?php
                               if( $rid==0) {                                
                                ?>
								<br><br>
								<form action="homepage.php" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
<?php
                               }                               
                                ?>




<?php
                               if( $rid>0) {                                
                                ?>
	<br><br>
								<form action="viewCoursesHomepage.php?GetId=<?php echo $rid ?>" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>

<?php
                               }                               
                                ?>
	
	