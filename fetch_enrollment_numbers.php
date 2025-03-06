<?php
require_once('connect.php');
require_once('session.php');
$instituteID=$_POST['instituteID'];
$branchID=$_POST['branchID'];
$query = "SELECT enrollment.`Enrollment Number` 
          FROM enrollment
          inner join scheme on enrollment.SchemeID=scheme.SchemeID
          WHERE enrollment.Valid=1 and scheme.Valid=1
          order by `Enrollment Number` asc";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$subjects = [];
while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;
}
echo json_encode($subjects);

$stmt->close();
?>
