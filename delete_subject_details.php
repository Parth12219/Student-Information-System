<?php
require_once("connect.php");
require_once("session.php");
$instituteID = $_POST['instituteID'];
$branchID = $_POST['branchID'];
$schemeYear = $_POST['schemeYear'];
$subjectID = $_POST['subjects'];

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

$query = "UPDATE subject_details SET Valid=0
          WHERE SubjectID=? and SchemeID=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $subjectID, $schemeID);

if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
}

$stmt->close();
echo "Subject Details deleted successfully";
return true;
?>
