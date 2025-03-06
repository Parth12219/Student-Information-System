<?php
$conn=new mysqli("localhost:3306","Parth","123456","webdevproject");
if ($conn->connect_error){
    die("Connection failed : ".$conn->connect_error);
}
?>