<?php
require_once('connect.php');
$empid=$_POST['empid'];
$password=$_POST['password'];
$confirmPassword=$_POST['confirmPassword'];
$sql="insert into login(EmployeeID,Password) values('$empid','$password')";
if ($conn->query($sql)===TRUE) {
    return TRUE;
}
?>