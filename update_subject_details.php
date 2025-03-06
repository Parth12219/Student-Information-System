<?php
require_once("connect.php");
require_once("session.php");
$instituteID = $_POST['instituteID'];
$branchID = $_POST['branchID'];
$schemeYear = $_POST['schemeYear'];
$subjectID = $_POST['subjects'];
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

$query = "UPDATE subject_details SET Type=?, Exam=?, Internal = ?, External = ?,
          `Pass Marks`=?, Mode=?, Kind=?, `Group`=?, Credits=?, Syllabus=?, `Updated on`=CURRENT_TIMESTAMP
          WHERE SubjectID=? and SchemeID=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssiiisssisii", $type, $exam, $internalMarks, $externalMarks, $passMarks, $mode, $kind, $group, $credits, $syllabus, $subjectID, $schemeID);

if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
}

$stmt->close();
echo "Subject Details updated successfully";
return true;
?>
