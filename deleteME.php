<?php

require_once("connection.php");

if( isset($_GET['del']))
{
    $id = $_GET['del'];
	
    $query = "select Asg_Id from ptc55314.markedentities where MId='$id'";	
    $result = mysqli_query($con,$query);	
	$row = mysqli_fetch_assoc($result);
	$asg_id = $row['Asg_Id']; 
	
	$query = "delete from ptc55314.markedentities where MId='$id'";
	
    $result = mysqli_query($con,$query);
	
	

    if ($result){
        header("location:viewME.php?GetId=$asg_id");
    }
    else
    {
        echo 'Please check your Query';
    }
}
else
{
    header("location:viewME.php?GetId=$asg_id");
}

?>