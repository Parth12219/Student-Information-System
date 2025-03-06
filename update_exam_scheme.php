<?php
require_once('session.php');
require_once('connect.php');
$instituteID = $_POST['instituteID'];
$branchID = $_POST['branchID'];
$admissionYear = $_POST['admissionYear'];
$semesterNumber = $_POST['semesterNumber'];
$backlog = $_POST['backlog'];
$subjectID = $_POST['subject'];
$schemeYear = $_POST['schemeYear'];
$examDate = $_POST['examDate'];

$query="SELECT subject_details.SubjectDetailsID from subject_details
        inner join scheme on scheme.SchemeID=subject_details.SchemeID
        where subject_details.SubjectID=? and scheme.InstituteID=? and scheme.BranchID=? and scheme.`Scheme Year`=?
        and subject_details.Valid=1 and scheme.Valid=1";
$stmt = $conn->prepare($query);
$stmt->bind_param("iiii", $subjectID, $instituteID, $branchID, $schemeYear);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    echo "Error finding Subject Details.";
    exit();
}
$row = $result->fetch_assoc();
$subjectdetailsID=$row['SubjectDetailsID'];

$query = "UPDATE examination_scheme set `Examination Date`=?, `Updated on`=CURRENT_TIMESTAMP
            where SubjectDetailsID=? and SemesterID=? and Valid=1";
$stmt = $conn->prepare($query);
$stmt->bind_param("sii", $examDate, $subjectdetailsID, $semesterNumber);

if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
}

$stmt->close();
echo 'Examination Scheme updated successfully';
return true;
?>
