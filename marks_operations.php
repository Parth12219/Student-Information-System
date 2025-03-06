<?php
require_once("connect.php");
require_once("session.php");
$action = $_POST['action'];
$enrollmentNo = $_POST['enrollmentNo'];
$examinationSchemeID = $_POST['examinationSchemeID'];
$internalMarks = isset($_POST['internalMarks']) ? $_POST['internalMarks'] : null;
$externalMarks = isset($_POST['externalMarks']) ? $_POST['externalMarks'] : null;

$query = "SELECT EnrollmentSubjectID FROM enrollment_subject_mapping
         WHERE `Enrollment Number` = ? and ExaminationSchemeID=?
         and enrollment_subject_mapping.Valid=1";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $enrollmentNo, $examinationSchemeID);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    echo "Student is not enrolled in the subject.";
    exit();
}
$row = $result->fetch_assoc();
$enrollmentSubjectID = $row['EnrollmentSubjectID'];

if ($action === 'add') {
    $query = "INSERT INTO marks (`Enrollment Number`, EnrollmentSubjectID, `Internal Marks`, `External Marks`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiii", $enrollmentNo, $enrollmentSubjectID, $internalMarks, $externalMarks);
    if ($stmt->execute()) {
        echo "Marks added successfully!";
    } else {
        echo "Error adding marks.";
    }
} elseif ($action === 'update') {
    $query = "UPDATE marks SET `Internal Marks` = ?, `External Marks` = ?, `Updated on`=CURRENT_TIMESTAMP WHERE `Enrollment Number` = ? AND EnrollmentSubjectID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiii", $internalMarks, $externalMarks, $enrollmentNo, $enrollmentSubjectID);
    if ($stmt->execute()) {
        echo "Marks updated successfully!";
    } else {
        echo "Error updating marks.";
    }
} elseif ($action === 'delete') {
    $query = "UPDATE marks SET Valid=0, `Updated on`=CURRENT_TIMESTAMP WHERE `Enrollment Number` = ? AND EnrollmentSubjectID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $enrollmentNo, $enrollmentSubjectID);
    if ($stmt->execute()) {
        echo "Marks deleted successfully!";
    } else {
        echo "Error deleting marks.";
    }
}

$stmt->close();
?>
