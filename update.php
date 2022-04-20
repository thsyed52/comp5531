<?php

require_once("connection.php");

if(isset($_POST['update']))
{
    $id = $_GET['Id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $query = "update ptc55314.user set User_Name = '".$name."' ,User_Email = '".$email."'  
                where User_ID ='".$id."' ";
    $result = mysqli_query($con,$query);

    if ($result)
    {
        header("location:viewUsers.php");
    }
    else
    {
        echo 'Please check your query';
    }
}
else
{
    header("location:viewUsers.php");
}


?>