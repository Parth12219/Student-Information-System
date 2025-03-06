<?php
require_once('connect.php');
require_once('session.php');
$branchID = $_POST['branchID'];
$instituteID = $_POST['instituteID'];
$query = "SELECT `Scheme Year` from scheme where InstituteID=? and BranchID=? 
    and scheme.Valid=1
    order by `Scheme Year` asc";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii",$instituteID, $branchID);
$stmt->execute();
$result = $stmt->get_result();

$years = [];
while ($row = $result->fetch_assoc()) {
    $years[] = $row;
}
echo json_encode($years);

$stmt->close();
?>