<?php
require_once("connect.php");
require_once("session.php");
$instituteID = $_POST['instituteID'];
$branchID = $_POST['branchID'];
$schemeYear = $_POST['schemeYear'];
$subjectID = $_POST['universitySubjects'];
$type = $_POST['type'];
$exam = $_POST['exam'];
$internalMarks = $_POST['internal'];
$externalMarks = $_POST['external'];
$passMarks = $_POST['passMarks'];
$mode = $_POST['mode'];
$kind = $_POST['kind'];
$group = $_POST['group'];
$credits = $_POST['credits'];
$syllabus = $_POST['syllabus'];

$query="SELECT SchemeID from scheme
        where InstituteID=? and BranchID=? and `Scheme Year`=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $instituteID, $branchID, $schemeYear);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    echo "Error finding number of semesters.";
    exit();
}
$row = $result->fetch_assoc();
$schemeID=$row['SchemeID'];

$query = "INSERT INTO subject_details (SubjectID, SchemeID, Type, Exam, Internal, External, `Pass Marks`, Mode, Kind, `Group`, Credits, Syllabus) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("iissiiisssis", $subjectID, $schemeID, $type, $exam, $internalMarks, $externalMarks, $passMarks, $mode, $kind, $group, $credits, $syllabus);

if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
}

$stmt->close();
echo "Subject Details added successfully";
return true;
?>
