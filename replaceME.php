<?php
	
//}

	require_once("connection.php");
	
	 
	

//if (isset($_GET['replace'])) {
	$id = $_GET['replace'];

	$query = "select Name,MId from ptc55314.markedentities where MId ='".$id."' ";
	$result = mysqli_query($con,$query); 

	$row = mysqli_fetch_assoc($result);
	$name = $row['Name'];   


	// File upload path
	$targetDir = "uploads/";
	
	$query = "select Asg_Id from ptc55314.markedentities where MId='$id'";	
    $result = mysqli_query($con,$query);	
	$row = mysqli_fetch_assoc($result);
	$asg_id = $row['Asg_Id'];
	
	session_start();
	$current_username=$_SESSION['username'];

?>

<?php
if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL


{
	

     if (empty($_POST['filename']) )
    {
         echo 'Please Fill in the required files.';
    }
	
	else{
		
		$filename = $_FILES['fileToUpload']['name'];
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		$filename=$_POST['filename'];
		$filename=$filename.".".$extension;
		$destination = 'uploads/' . $filename;
		
		$file = $_FILES['fileToUpload']['tmp_name'];
		$size = $_FILES['fileToUpload']['size'];
		
		 if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['fileToUpload']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $query = "UPDATE ptc55314.markedentities SET ModifiedTime=now(), ModifiedUser='$current_username', Name='$filename' where MId='$id'";
            if (mysqli_query($con, $query)) {
                echo "File replaced successfully";
            }
        } else {
            echo "Failed to replace file.";
        }
		
	}
}

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>Edit Marked Entities </title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Edit Marked Entities </h3>
                        </div>
                        <div class="form-body">
                            <form action="replaceME.php?replace=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                <Label>File Name</Label>
                                <input type="text"  placeholder=" File Name " name="filename" value=<?php echo $name ?>>
                                <br><br>
								<Label>Select file to upload:</Label>
                                 <input type="file" name="fileToUpload" id="fileToUpload">
                                <br><br>
                                
                             <input type="submit" name="submit" value="submit">    
                            </form>

                        </div>
                    </div>
					<br><br>
					<form action="viewME.php?GetId=<?php echo $asg_id?>" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
    
</body>
</html>