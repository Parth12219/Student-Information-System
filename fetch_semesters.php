<?php
require_once('session.php');
require_once('connect.php');
$SchemeYear = $_POST['SchemeYear'];
$query = "SELECT SemesterID, Number FROM semester
    WHERE `AdmissionYear` = ? and Valid=1
    order by Number asc";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $SchemeYear);
$stmt->execute();
$result = $stmt->get_result();

$semesters = [];
while ($row = $result->fetch_assoc()) {
    $semesters[] = $row;
}
echo json_encode($semesters);

$stmt->close();
?>
