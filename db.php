<?php
global $connection;
$connection = mysqli_connect("localhost","root","","my_blog");

if($connection)
{
    // echo "success";
}
else
{
    echo "Error";
}

?>