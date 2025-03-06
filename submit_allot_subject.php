<?php
require_once('session.php');
require_once('connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $instituteID = $_POST['institute_hidden_allot'];
    $branchID = $_POST['branch_hidden_allot'];
    $enrollmentNumber = $_POST['enrollment_number'];
    $semesterNumber = $_POST['semester_number_allot'];
    $subjectID = $_POST['subject_allot'];
    $schemeYear = $_POST['scheme_year_allot'];


    $query="SELECT subject_details.SubjectDetailsID from subject_details
            inner join scheme on scheme.SchemeID=subject_details.SchemeID
            where subject_details.SubjectID=? and scheme.InstituteID=? and scheme.BranchID=? and scheme.`Scheme Year`=?
            and subject_details.Valid=1 and scheme.Valid=1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iiii", $subjectID, $instituteID, $branchID, $schemeYear);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        echo "Subject details not yet alloted.";
        exit();
    }
    $row = $result->fetch_assoc();
    $subjectdetailsID=$row['SubjectDetailsID'];

    $query="SELECT ExaminationSchemeID from examination_scheme
            where SemesterID=? and SubjectDetailsID=?
            and Valid=1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $semesterNumber, $subjectdetailsID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        echo "Examination scheme not yet set.";
        exit();
    }
    $row = $result->fetch_assoc();
    $examinationschemeID=$row['ExaminationSchemeID'];

    $query = "INSERT INTO enrollment_subject_mapping (`Enrollment Number`, ExaminationSchemeID) 
              VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $enrollmentNumber, $examinationschemeID);

    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    echo '<script type="text/javascript">alert("Subject allotment successful."); window.location.href="AcademicDetails_handling.php"; </script>';
	return true;
}
?>
