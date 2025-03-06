<?php
require_once('connect.php');
require_once('session.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email=$_POST['email'];
    $phone = $_POST['phone'];
    $batchID = $_POST['batch'];
    $branchID = $_POST['branch_hidden'];
    $admissionYear = $_POST['admission_year_hidden'];
    $instituteID = $_POST['institute_hidden'];

    $query="SELECT SchemeID from scheme where InstituteID=? and BranchID=? and `Scheme Year`=? and Valid=1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $instituteID, $branchID, $admissionYear);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        echo "Scheme not yet introduced.";
        exit();
    }
    $row = $result->fetch_assoc();
    $schemeID = $row['SchemeID'];

    $query="SELECT semester_type.`Number of Semesters` from semester_type 
            inner join course on semester_type.SemesterTypeID = course.SemesterTypeID
            inner join  branch on course.CourseID=branch.CourseID
            where branch.BranchID=? and branch.Valid=1 and course.Valid=1 and semester_type.Valid=1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $branchID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        echo "Error finding number of semesters.";
        exit();
    }
    $row = $result->fetch_assoc();
    $numberofSemesters=$row['Number of Semesters'];
    $graduationYear = $numberofSemesters/2+$admissionYear;

    $query = "INSERT INTO student (Name, DOB, Gender, Email, `Phone Number`) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $name, $dob, $gender, $email, $phone);

    if ($stmt->execute()) {
        $studentID = $conn->insert_id;
    }
    else{
        echo "Error: " . $stmt->error;
        exit();
    }
    $query = "INSERT INTO enrollment (SchemeID, StudentID, `Graduation Year`) 
              VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iii", $schemeID, $studentID, $graduationYear);
    if ($stmt->execute()) {
        $enrollmentNo = $conn->insert_id;
    }
    else{
        echo "Error: " . $stmt->error;
        exit();
    }
    $query = "INSERT INTO enrollment_batch_mapping (`Enrollment Number`, BatchID) 
              VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $enrollmentNo, $batchID);
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
        exit();
    }

    $semesters=[];
    for ($i = 1; $i <= $numberofSemesters; $i++) {
        $query="SELECT SemesterID from semester
                where Number=? and AdmissionYear=? and Valid=1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $i, $admissionYear);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            $query = "INSERT INTO semester (Number, AdmissionYear) 
              VALUES (?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $i, $admissionYear);

            if ($stmt->execute()) {
                $SID = $conn->insert_id;
            }
            else{
                echo "Error: " . $stmt->error;
            }
            $semesters[]=$SID;
        }
        else{
            $row = $result->fetch_assoc();
            $semesters[]=$row["SemesterID"];
        }
    }
    foreach ($semesters as $semester) {
        $query = "INSERT INTO register (SemesterID,`Enrollment Number`) 
              VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $semester,$enrollmentNo);

        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
            exit();
        }
    }
    echo '<script type="text/javascript">alert("Admission Successful"); window.location.href="admission_handling.php"; </script>';
	return true;
}
?>
