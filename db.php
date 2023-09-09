<?php

$con=mysqli_connect("localhost","root","","kanban",3307);
if(!$con)
{
    die("Failed to connect".mysqli_connect_error());
}
?>