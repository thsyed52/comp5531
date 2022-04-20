<?php

require_once("connection.php");

$rid = $_GET['GetId'];

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
		

        $query = " insert into ptc55314.announcement(title,details,postTime,Course_Id) VALUES('$title','$details',now(),'$rid') ";
        $result = mysqli_query($con,$query);

        if ($result)
        {
            echo 'The notice has been added.';
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
                            <form action="uploadNotices.php?GetId=<?php echo $rid ?>" method="post" enctype="multipart/form-data">
                                <Label>Title  </Label>
                                <input type="text"  placeholder="title " name="title">
                                <br><br>
								<Label>Details</Label>
                                <textarea type="text"  name="details"> </textarea>
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