<?php
require_once('connect.php');
require_once('session.php');
$instituteID=$_POST['instituteID'];
$branchID=$_POST['branchID'];
$query = "SELECT subject_details.SubjectDetailsID, subject_details.SubjectID, subject.Name, scheme.`Scheme Year`,
          subject_details.Type, subject_details.Exam, subject_details.Internal, subject_details.External,
          subject_details.`Pass Marks`, subject_details.Mode, subject_details.Kind, subject_details.`Group`,
          subject_details.Credits, subject_details.Syllabus
          FROM subject
          INNER JOIN subject_details ON subject.SubjectID = subject_details.SubjectID
          inner join scheme on subject_details.SchemeID=scheme.SchemeID
          WHERE scheme.InstituteID = ? AND scheme.BranchID = ?
          and scheme.Valid=1 and subject.Valid=1 and subject_details.Valid=1";

$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $instituteID, $branchID);
$stmt->execute();
$result = $stmt->get_result();

$subjects = [];
while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;
}
echo json_encode($subjects);

$stmt->close();
?>
