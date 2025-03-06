<?php
require_once('connect.php');
require_once('session.php');
$instituteID=$_POST['instituteID'];
$branchID=$_POST['branchID'];
$query = "SELECT examination_scheme.ExaminationSchemeID, semester.Number, semester.AdmissionYear, subject.Name,
          scheme.`Scheme Year`, examination_scheme.`Examination Date`
          FROM examination_scheme
          inner join semester on examination_scheme.SemesterID=semester.SemesterID
          inner join subject_details on subject_details.SubjectDetailsID=examination_scheme.SubjectDetailsID
          INNER JOIN subject ON subject.SubjectID = subject_details.SubjectID
          inner join scheme on subject_details.SchemeID=scheme.SchemeID
          WHERE scheme.InstituteID = ? AND scheme.BranchID = ?
          and scheme.Valid=1 and subject.Valid=1 and subject_details.Valid=1 and examination_scheme.Valid=1
          and semester.Valid=1";

$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $instituteID, $branchID);
$stmt->execute();
$result = $stmt->get_result();

$records = [];
while ($row = $result->fetch_assoc()) {
    $records[] = $row;
}
echo json_encode($records);

$stmt->close();
?>
