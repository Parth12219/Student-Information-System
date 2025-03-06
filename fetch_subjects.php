<?php
require_once('connect.php');
require_once('session.php');
$semesterID = $_POST['semesterID'];
$instituteID=$_POST['instituteID'];
$branchID=$_POST['branchID'];
$query = "SELECT examination_scheme.ExaminationSchemeID, subject.Name 
          FROM subject
          INNER JOIN subject_details ON subject.SubjectID = subject_details.SubjectID
          inner join scheme on subject_details.SchemeID=scheme.SchemeID
          inner join examination_scheme on subject_details.SubjectDetailsID=examination_scheme.SubjectDetailsID
          WHERE scheme.InstituteID = ? AND scheme.BranchID = ? and examination_scheme.SemesterID=?
          and scheme.Valid=1 and subject.Valid=1 and subject_details.Valid=1 and examination_scheme.Valid=1";

$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $instituteID, $branchID, $semesterID);
$stmt->execute();
$result = $stmt->get_result();

$subjects = [];
while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;
}
echo json_encode($subjects);

$stmt->close();
?>
