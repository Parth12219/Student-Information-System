<?php
require_once('session.php');
require_once('connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        echo "Error finding number of semesters.";
        exit();
    }
    $row = $result->fetch_assoc();
    $subjectdetailsID=$row['SubjectDetailsID'];

    $query = "INSERT INTO examination_scheme (SemesterID, SubjectDetailsID, `Examination Date`) 
              VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iis", $semesterNumber, $subjectdetailsID, $examDate);

    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    echo 'Examination Scheme added successfully';
	return true;
}
?>
