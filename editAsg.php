<?php

require_once("connection.php");
$id = $_GET['editing'];
$rid = $_GET['GetId'];

$query = "select Name,Instructions,DOS,marks from ptc55314.assignments where Asg_ID ='$id' and Course_Id='$rid'";
$result = mysqli_query($con,$query); 
$row = mysqli_fetch_assoc($result);
$name = $row['Name']; 
$Instructions = $row['Instructions']; 
$DOS = $row['DOS']; 
$marks = $row['marks']; 
$result = mysqli_query($con,$query);

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['name']) || empty($_POST['Instructions']))
    {
         echo 'Please Fill in the blanks';
    }
    else
    {
        $asgname = $_POST['name'];
        $instructions = $_POST['Instructions'];
		$rawdate = htmlentities($_POST['date']);
		$date = date('Y-m-d', strtotime($rawdate));
		$marks = $_POST['marks'];

        $query = " update ptc55314.assignments SET Name='$asgname',Instructions='$instructions',DOS='$date',marks='$marks' WHERE Asg_Id='$id'";
        $result = mysqli_query($con,$query);

        if ($result)
        {
            echo 'The assignment has been updated.';
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
    <title>Assignment Information</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Assignment Information </h3>
                        </div>
                        <div class="form-body">
                            <form action='editAsg.php?editing=<?php echo $id ?>&GetId=<?php echo $rid ?>' method="post" enctype="multipart/form-data">
                                <Label>Asg Name</Label>
                                <input type="text"  placeholder=" Asg Name " name="name" value=" <?php echo $name ?> ">
                                <br><br>
								<Label>Instructions</Label>
                                <textarea type="text"  name="Instructions" ><?php echo $Instructions ?>  </textarea>
                                <br><br>
                                 <label for="date">Date</label>
								<input type="date" size="60" name="date" id="date" />
                                <br><br>
								 <Label>Marks Obtained</Label>
                                <input type="text"  placeholder=" marks " name="marks" value=" <?php echo $marks ?> ">
                                <br><br>
                             <input type="submit" name="submit" value="Submit">    
                            </form>

                        </div>
                    </div>
					<br><br>
					<form action="MEmain.php?GetId=<?php echo $rid ?>" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
    
</body>
</html>