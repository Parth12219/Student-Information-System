<?php
require_once('connect.php');
require_once('session.php');
$schemeYear = $_POST['schemeYear'];
$instituteID=$_POST['instituteID'];
$branchID=$_POST['branchID'];
$query = "SELECT subject.SubjectID, subject.Name 
          FROM subject
          INNER JOIN subject_details ON subject.SubjectID = subject_details.SubjectID
          inner join scheme on subject_details.SchemeID=scheme.SchemeID
          WHERE scheme.InstituteID = ? AND scheme.BranchID = ? and scheme.`Scheme Year`=?
          and scheme.Valid=1 and subject.Valid=1 and subject_details.Valid=1";

$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $instituteID, $branchID, $schemeYear);
$stmt->execute();
$result = $stmt->get_result();

$subjects = [];
while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;
}
echo json_encode($subjects);

$stmt->close();
?>
