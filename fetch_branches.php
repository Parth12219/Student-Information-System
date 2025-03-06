<?php
require_once('connect.php');
require_once('session.php');
$instituteID = $_POST['instituteID'];

$query = "SELECT branch.BranchID, branch.Name 
          FROM branch
          INNER JOIN branch_institute_mapping ON branch.BranchID = branch_institute_mapping.BranchID
          WHERE branch_institute_mapping.InstituteID = ? and branch.Valid=1 and branch_institute_mapping.Valid=1";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $instituteID);
$stmt->execute();
$result = $stmt->get_result();

$branches = [];
while ($row = $result->fetch_assoc()) {
    $branches[] = $row;
}
echo json_encode($branches);

$stmt->close();
?>
