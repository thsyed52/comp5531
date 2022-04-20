<?php

require_once("connection.php");

$rid=$_GET['GetId'];

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['name']) || empty($_POST['Instructions']) || empty($_POST['marks']))
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

        $query = " insert into ptc55314.assignments(Name,Instructions,DOS,marks,Course_Id) VALUES('$asgname','$instructions','$date', $marks, '$rid') ";
        $result = mysqli_query($con,$query);

        if ($result)
        {
            echo 'The assignment has been added.';
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
                            <form action="MEAsgUpload.php?GetId=<?php echo $rid ?>" method="post" enctype="multipart/form-data">
                                <Label>Asg Name</Label>
                                <input type="text"  placeholder=" Asg Name " name="name">
                                <br><br>
								<Label>Instructions</Label>
                                <textarea type="text"  name="Instructions"> </textarea>
                                <br><br>
                                 <label for="date">Date</label>
								<input type="date" size="60" name="date" id="date"/>
                                <br><br>
								 <Label>Marks Obtained</Label>
                                <input type="text"  placeholder=" marks " name="marks">
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