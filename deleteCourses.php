<?php

require_once("connection.php");

if( isset($_GET['del']))
{
    $id = $_GET['del'];
    $query = "delete from  ptc55314.courses where Course_ID = '".$id."' ";
    $result = mysqli_query($con,$query);

    if ($result){
        header("location:viewCourses.php");
    }
    else
    {
        echo 'Please check your Query';
    }
}
else
{
    header("location:viewCourses.php");
}

?>