<?php
require_once('connect.php');
require_once('session.php');
$enrollment=$_POST['enrollment'];
$query = "SELECT register.SemesterID, semester.Number
          FROM register
          inner join semester on register.SemesterID=semester.SemesterID
          WHERE register.Valid=1 and semester.Valid=1 and register.`Enrollment Number`=?
          order by semester.Number asc";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $enrollment);
$stmt->execute();
$result = $stmt->get_result();

$semesters = [];
while ($row = $result->fetch_assoc()) {
    $semesters[] = $row;
}
echo json_encode($semesters);

$stmt->close();
?>
