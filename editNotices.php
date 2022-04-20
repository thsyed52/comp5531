<?php

require_once("connection.php");

$id = $_GET['GetId'];
$rid = $_GET['gId'];

$query = "select title,details from ptc55314.announcement where id ='$id' AND Course_Id= '$rid'";
$result = mysqli_query($con,$query); 
$row = mysqli_fetch_assoc($result);
$title = $row['title']; 
$details = $row['details']; 

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['title']) || empty($_POST['details']) )
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $title = $_POST['title'];
        $details = $_POST['details'];
		

        $query = " update ptc55314.announcement SET title='$title',details='$details',postTime=now() WHERE id ='$id' AND Course_Id= '$rid'";
        $result = mysqli_query($con,$query);

        if ($result)
        {
            echo 'The notice has been updated.';
        }
        else{
            echo 'Please check your query';
        }
    }
}
else
{
    echo '';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>Upload Notices</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Upload Notices </h3>
                        </div>
                        <div class="form-body">
                            <form action="editNotices.php?GetId=<?php echo $id ?>&gId=<?php echo $rid ?>" method="post" enctype="multipart/form-data">
                                <Label>Title  </Label>
                                <input type="text"  placeholder="title " name="title" value=" <?php echo $title ?> ">
                                <br><br>
								<Label>Details</Label>
                                <textarea type="text"  name="details"> <?php echo $details ?>  </textarea>
                                <br><br>
                             <input type="submit" name="submit" value="Submit">    
                            </form>

                        </div>
                    </div>
					<br><br>
					<form action="viewNotices.php?GetId=<?php echo $rid ?>" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
    
</body>
</html>