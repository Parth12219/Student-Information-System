<?php
require_once('connect.php');
require_once('session.php');
$query = "SELECT institute.InstituteID, institute.Name FROM employee
    inner join employee_institute_mapping on employee.EmployeeID=employee_institute_mapping.EmployeeID
    inner join institute on employee_institute_mapping.InstituteID=institute.InstituteID
    where employee.EmployeeID=? and employee.Valid=1 and employee_institute_mapping.Valid=1 and institute.Valid=1";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['empid']);
$stmt->execute();
$result = $stmt->get_result();


$institutes = [];
while ($row = $result->fetch_assoc()) {
    $institutes[] = $row;
}
echo json_encode($institutes);
?>