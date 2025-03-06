<?php
require_once('connect.php');
require_once('session.php');

$instituteID = $_POST['instituteID'];
$admissionYear = $_POST['admissionYear'];
$semesterNo = $_POST['semesterNo'];
$beginDate = $_POST['beginDate'];
$endDate = $_POST['endDate'];

$query="SELECT SemesterID from semester
            where AdmissionYear=? and Number=?
            and Valid=1";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $admissionYear, $semesterNo);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    echo "Semester not yet introduced.";
    exit();
}
$row = $result->fetch_assoc();
$semesterID=$row['SemesterID'];

$query = "INSERT INTO semester_dates (SemesterID, InstituteID, `Begin Date`, `End Date`) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("iiss", $semesterID, $instituteID, $beginDate, $endDate);

if (!$stmt->execute()) {
    echo "Error: " . $stmt->error;
}

echo 'Session added successfully.';
return true;

$stmt->close();
?>
