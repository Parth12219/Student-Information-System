<?php
require_once('connect.php');

$enr=$_POST['enr'];
$semester=$_POST['semester'];
if ($semester == 'all') {
    $query = "SELECT subject.Name AS subject, marks.`Internal Marks` AS internal_marks, marks.`External Marks` AS external_marks, 
              (marks.`Internal Marks` + marks.`External Marks`) AS total_marks
              FROM marks
              INNER JOIN enrollment_subject_mapping ON marks.EnrollmentSubjectID = enrollment_subject_mapping.EnrollmentSubjectID
              INNER JOIN examination_scheme ON examination_scheme.ExaminationSchemeID=enrollment_subject_mapping.ExaminationSchemeID
              INNER JOIN subject_details ON examination_scheme.SubjectDetailsID = subject_details.SubjectDetailsID
              inner join subject on subject.SubjectID=subject_details.SubjectID
              WHERE marks.`Enrollment Number`= '$enr' and subject.Valid=1 and marks.Valid=1 and enrollment_subject_mapping.Valid=1
              and examination_scheme.Valid=1 and subject_details.Valid=1";
} else {
    $query = "SELECT subject.Name AS subject, marks.`Internal Marks` AS internal_marks, marks.`External Marks` AS external_marks, 
              (marks.`Internal Marks` + marks.`External Marks`) AS total_marks
              FROM marks
              INNER JOIN enrollment_subject_mapping ON marks.EnrollmentSubjectID = enrollment_subject_mapping.EnrollmentSubjectID
              INNER JOIN examination_scheme ON examination_scheme.ExaminationSchemeID=enrollment_subject_mapping.ExaminationSchemeID
              INNER JOIN subject_details ON examination_scheme.SubjectDetailsID = subject_details.SubjectDetailsID
              inner join subject on subject.SubjectID=subject_details.SubjectID
              WHERE marks.`Enrollment Number`= '$enr' and examination_scheme.SemesterID = '$semester' and subject.Valid=1 and marks.Valid=1 and enrollment_subject_mapping.Valid=1
              and examination_scheme.Valid=1 and subject_details.Valid=1";
}

$result = $conn->query($query);

$records = [];
while ($row = $result->fetch_assoc()) {
    $records[] = $row;
}
echo json_encode($records);

?>