<?php
require_once('connect.php');
require_once('session.php');
$instituteID = $_POST['instituteID'];
$query = "SELECT distinct `Scheme Year` from scheme where InstituteID=? 
    and scheme.Valid=1
    order by `Scheme Year` asc";
$stmt = $conn->prepare($query);
$stmt->bind_param("i",$instituteID);
$stmt->execute();
$result = $stmt->get_result();

$years = [];
while ($row = $result->fetch_assoc()) {
    $years[] = $row;
}
echo json_encode($years);

$stmt->close();
?>