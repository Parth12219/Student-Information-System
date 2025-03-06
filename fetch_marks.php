<?php
require_once('connect.php');
require_once('session.php');
$examinationSchemeID=$_POST['examinationSchemeID'];

$query = "SELECT marks.`Enrollment Number`, marks.`Internal Marks`, marks.`External Marks`
          FROM marks
          INNER JOIN enrollment_subject_mapping ON marks.EnrollmentSubjectID = enrollment_subject_mapping.EnrollmentSubjectID
          WHERE enrollment_subject_mapping.ExaminationSchemeID=? and marks.Valid=1 and enrollment_subject_mapping.Valid=1";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $examinationSchemeID);
$stmt->execute();
$result = $stmt->get_result();

$records = [];
while ($row = $result->fetch_assoc()) {
    $records[] = $row;
}
echo json_encode($records);

$stmt->close();
?>
