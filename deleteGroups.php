<?php

require_once("connection.php");

if( isset($_GET['del']))
{
    $id = $_GET['del'];
	
    $query = "update ptc55314.user set GROUP_ID='0' where Group_Id='$id'";
	
    $result = mysqli_query($con,$query);
	
	$query = "delete from ptc55314.group where GROUP_ID='$id'";
	
    $result = mysqli_query($con,$query);
	
	

    if ($result){
        header("location:viewGroups.php");
    }
    else
    {
        echo 'Please check your Query';
    }
}
else
{
    header("location:viewGroups.php");
}

?>