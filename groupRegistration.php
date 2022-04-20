<?php

//echo 'Record Added Successfully'; 
require_once("connection.php");
$query = "SELECT User_Name FROM `user` WHERE Group_ID=0 AND Role_ID=4";
$result2 = mysqli_query($con,$query);

require_once("connection.php");

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
    if (empty($_POST['tm1']) && empty($_POST['tm2']) && empty($_POST['tm3']) && empty($_POST['tm4']))
    {
         echo 'At least one team member needs to be selected in the team.';
    }
	else if (empty($_POST['gname']))
    {
         echo 'Group Name needs to be selected.';
    }
	else if (empty($_POST['groupleader']))
    {
         echo 'Group Leader needs to be selected.';
    }
	

	else if (strcmp( $_POST['groupleader'],$_POST['tm1'] )!==0&&strcmp($_POST['groupleader'],$_POST['tm2'] )!==0&&strcmp($_POST['groupleader'],$_POST['tm3'] )!==0&&strcmp($_POST['groupleader'],$_POST['tm4'] )!==0)
    {
         echo 'Group leader needs to be a group member';
    }
    else
    {
        $gname = $_POST['gname'];
		$groupleader = $_POST['groupleader'];
		
	

        $query = " insert into ptc55314.group(Group_Name, Group_Leader) VALUES('$gname','$groupleader') ";
        $result = mysqli_query($con,$query);
		
		$id=mysqli_insert_id($con);
		

		
		
		if (!empty($_POST['tm1'])){
			$user=$_POST['tm1'];
			$query = "update ptc55314.user set user.GROUP_ID='$id' where user.USER_NAME='$user'";
			$result = mysqli_query($con,$query);
			
		
		}
		if (!empty($_POST['tm2'])){
			$user=$_POST['tm2'];
			$query = "update ptc55314.user set GROUP_ID='$id' where USER_NAME='$user'";
			$result = mysqli_query($con,$query);
			
		}
		if (!empty($_POST['tm3'])){
			$user=$_POST['tm3'];
			$query = "update ptc55314.user set GROUP_ID='$id' where USER_NAME='$user'";
			$result = mysqli_query($con,$query);
			
		}
		if (!empty($_POST['tm4'])){
			$user=$_POST['tm4'];
			$query = "update ptc55314.user set GROUP_ID='$id' where USER_NAME='$user'";
			$result = mysqli_query($con,$query);
		
		}
		
		

        if ($result)
        {
            header("location:viewGroups.php");
        }
        else{
            echo 'Please check your query';
        }
    }
}
else
{
    echo 'Please check your connection';
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>Group Registration Form</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Group Registration Form </h3>
                        </div>
                        <div class="form-body">
                            <form action="groupRegistration.php" method="post">
							<?php
								$options = "<option value=''>--- Choose an option ---</option>";
								while($row2 = mysqli_fetch_array($result2))
								{
									$options = $options."<option value='$row2[0]'>$row2[0]</option>";
								}
									
								?>
								<br><br>
                                <Label>Group Name</Label>
                                <input type="text"  placeholder=" Group Name " name="gname">
                                <br><br>
								
								<div class="form-group">
									<label>Team Member 1</label>
									<select name="tm1" id="tm1" class="form-control">
									<?php echo $options;?>
									</select>
      
								</div>
								<br><br>
								
								<div class="form-group">
									<label>Team Member 2</label>
									<select name="tm2" id="tm2" class="form-control">
									<?php echo $options;?>
									</select>
      
								</div>
								<br><br>
								
								<div class="form-group">
									<label>Team Member 3</label>
									<select name="tm3" id="tm3" class="form-control">
									<?php echo $options;?>
									</select>
      
								</div>
								<br><br>
								
								<div class="form-group">
									<label>Team Member 4</label>
									<select name="tm4" id="tm4" class="form-control">
									<?php echo $options;?>
									</select>
      
								</div>
								<br><br>
								
								<div class="form-group">
									<label>Group Leader</label>
									<select name="groupleader" id="groupleader" class="form-control">
									<?php echo $options;?>
									</select>
      
								</div>
								<br><br>
								
								
								
                             <input type="submit" name="submit" value="Submit">    
                            </form>

                        </div>
                    </div>
					<br><br>
					<form action="viewGroups.php" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
    
</body>
</html>

