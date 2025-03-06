<?php
require_once('connect.php');
require_once('session.php');
$instituteID = $_POST['instituteID'];
$branchID = $_POST['branchID'];

$query = "SELECT BatchID, Name FROM batches WHERE InstituteID = ? AND BranchID = ? and Valid=1";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $instituteID, $branchID);
$stmt->execute();
$result = $stmt->get_result();

$batches = [];
while ($row = $result->fetch_assoc()) {
    $batches[] = $row;
}
echo json_encode($batches);

$stmt->close();
?>
