<?php

require_once("connection.php");
$id = $_GET['upload'];
session_start();
$username=$_SESSION['username'];

$query = "Select Group_Id from ptc55314.user where User_name='$username'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$gid=$row['Group_Id'];



// File upload path
$targetDir = "uploads/";




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
            $query = "INSERT INTO ptc55314.markedentities (Name, UploadTime, User, ModifiedTime, ModifiedUser, Asg_Id, Group_Id) VALUES ('$filename', now(), '$username', now(), '$username', '$id', '$gid')";
            if (mysqli_query($con, $query)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
		
	}
}

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>Upload Marked Entities </title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Upload Marked Entities </h3>
                        </div>
                        <div class="form-body">
                            <form action="MEUpload.php?upload=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                <Label>File Name</Label>
                                <input type="text"  placeholder=" File Name " name="filename">
                                <br><br>
								<Label>Select file to upload:</Label>
                                 <input type="file" name="fileToUpload" id="fileToUpload">
                                <br><br>
                                
                             <input type="submit" name="submit" value="submit">    
                            </form>

                        </div>
                    </div>
					<br><br>
					<form action="viewME.php?GetId=<?php echo $id ?>" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
    
</body>
</html>