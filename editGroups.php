<?php

require_once("connection.php");
$id = $_GET['GetId'];
$query = "select Group_Name,Group_Leader from userdetails.group where Group_ID ='".$id."' ";
$result = mysqli_query($con,$query); 

$row = mysqli_fetch_assoc($result);
$name = $row['Group_Name'];   
$leader = $row['Group_Leader'];
echo $leader;
echo $name;


$query = "(SELECT User_Name FROM `user` WHERE Group_ID=0 AND Role_ID=4) UNION (SELECT User_Name FROM `user` WHERE Group_ID='$id')";
$result2 = mysqli_query($con,$query);

$query="SELECT User_Name, User_ID FROM `user` WHERE Group_ID='$id'";
$result3 = mysqli_query($con,$query);
$count=mysqli_num_rows($result3);
echo "the count is as follows"."  ".$count;
//$row=mysqli_fetch_array($result3);


$default = array("<option value=''>--- Choose an option ---</option>", "<option value=''>--- Choose an option ---</option>", "<option value=''>--- Choose an option ---</option>", "<option value=''>--- Choose an option ---</option>");

$i=0;
while ($row = mysqli_fetch_assoc($result3)) {
	/*echo "echoing something";
	echo $row['User_Name'];
	echo "default";
	echo $default[0];
	echo $default[$i];*/
	$default[$i++]=$row['User_Name'];
	/*echo "default 0 value";
	echo $default[0];*/
}

if (isset($_POST['submit'])) // isset() function - checks whether a variable is set, which means that it has to be declared and is not NULL
{
	
	
	echo "doing something";
    if (empty($_POST['tm1']) && empty($_POST['tm2']) && empty($_POST['tm3']) && empty($_POST['tm4']))
    {
         echo 'At least one team member needs to be selected in the team.';
    }
	if (empty($_POST['gname']))
    {
         echo 'Group Name needs to be selected.';
    }
		if (empty($_POST['groupleader']))
    {
         echo 'Group Leader needs to be selected.';
    }
    else
    {
        $gname = $_POST['gname'];
		$groupleader = $_POST['groupleader'];
		
		echo "echoing quelque chose";
		echo $gname;
		echo $groupleader;
		
		$query = "update userdetails.user SET Group_Id='0' WHERE Group_ID='$id'";
        $result = mysqli_query($con,$query);

        $query = " update userdetails.group SET Group_Name='$gname', Group_Leader='$groupleader' WHERE Group_ID='$id'";
        $result = mysqli_query($con,$query);

		
	
		
		
		if (!empty($_POST['tm1'])){
			echo "ONE";
			$user=$_POST['tm1'];
			echo "user";
			echo $user;
			$query = "update userdetails.user set user.GROUP_ID='$id' where user.USER_NAME='$user'";
			echo $query;
			$result = mysqli_query($con,$query);
			
		
		}
		if (!empty($_POST['tm2'])){
			echo "TWO";
			$user=$_POST['tm2'];
			$query = "update userdetails.user set GROUP_ID='$id' where USER_NAME='$user'";
			$result = mysqli_query($con,$query);
			
		}
		if (!empty($_POST['tm3'])){
			echo "THREE";
			$user=$_POST['tm3'];
			$query = "update userdetails.user set GROUP_ID='$id' where USER_NAME='$user'";
			$result = mysqli_query($con,$query);
			
		}
		if (!empty($_POST['tm4'])){
			echo "FOUR";
			$user=$_POST['tm4'];
			$query = "update userdetails.user set GROUP_ID='$id' where USER_NAME='$user'";
			$result = mysqli_query($con,$query);
		
		}
		
		

        if ($result)
        {
           // header("location:viewGroups.php");
        }
        else{
            echo 'Please check your query';
        }
    }
	
}

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" a href="CSS/styles.css"/> 
    <title>Group Edit Form</title>
</head>
<body >

                    <div >
                        <div class="title">
                            <h1 > Group Edit Form </h3>
                        </div>
                        <div class="form-body">
                            <form action="editGroups.php?GetId=<?php echo $id ?>" method="post">
							<br><br>
                                <Label>Group Name</Label>
                                <input type="text"  placeholder=" Group Name " name="gname" value=" <?php echo $name ?> ">
                            <br><br>
							<?php
							/*	if($count>=1){
									$default="<option value='$row[0]'>$row[0]</option>";
								}
								else{
									$default="<option value=''>--- Choose an option ---</option>";
								}
								$options ="";
								//$options = $default;*/
							//	echo "defaulting";
							//	echo $default[0];
								$options ="";
								while($row2 = mysqli_fetch_array($result2))
								{
									$options = $options."<option value='$row2[0]'>$row2[0]</option>";
								}
									
								
									
								?>
								
								<div class="form-group">
									<label>Team Member 1</label>
									<select name="tm1" id="tm1" class="form-control">
									<?php echo "<option value='$default[0]'>$default[0]</option>";?>
									<?php echo $options;?>
									</select>
      
								</div>
								<br><br>
								
							<?php
							/*	if($count>=2){
									$default="<option value='$row[1]'>$row[1]</option>";
								}
								else{
									$default="<option value=''>--- Choose an option ---</option>";
								}*/
								
									
								
									
								?>
								
								<div class="form-group">
									<label>Team Member 2</label>
									<select name="tm2" id="tm2" class="form-control">
									<?php echo "<option value='$default[1]'>$default[1]</option>";?>
									<?php echo $options;?>
									</select>
      
								</div>
								<br><br>
								
							<?php
								/*if($count>=3){
									$default="<option value='$row[1]'>$row[1]</option>";
								}
								else{
									$default="<option value=''>--- Choose an option ---</option>";
								}*/
								
									
								
									
								?>
								
								<div class="form-group">
									<label>Team Member 3</label>
									<select name="tm3" id="tm3" class="form-control">
									<?php echo "<option value='$default[2]'>$default[2]</option>";?>
									<?php echo $options;?>
									</select>
      
								</div>
								<br><br>
								
								<?php
							/*	if($count>=4){
									$default="<option value='$row[3]'>$row[3]</option>";
								}
								else{
									$default="<option value=''>--- Choose an option ---</option>";
								}*/
								
									
								
									
								?>
								
								<div class="form-group">
									<label>Team Member 4</label>
									<select name="tm4" id="tm4" class="form-control">
									<?php echo "<option value='$default[3]'>$default[3]</option>";?>
									<?php echo $options;?>
									</select>
      
								</div>
								<br><br>
								
								<div class="form-group">
									<label>Group Leader</label>
									<select name="groupleader" id="groupleader" class="form-control">
									<option selected><?php echo $leader ?></option>
									<?php echo $options;?>
									</select>
      
								</div>
								<br><br>
								
								
								
                             <input type="submit" name="submit" value="Submit">    
                            </form>

                        </div>
                    </div>
					<form action="viewGroups.php" method="post">
					 <input type="submit" name="submit" value="Back"> 
					</form>
					
    
</body>
</html>