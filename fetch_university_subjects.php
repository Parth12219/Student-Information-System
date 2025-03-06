<?php
require_once('connect.php');
require_once('session.php');
$query = "SELECT SubjectID, Name 
          FROM subject
          WHERE Valid=1 
          order by Name asc";

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$subjects = [];
while ($row = $result->fetch_assoc()) {
    $subjects[] = $row;
}
echo json_encode($subjects);

$stmt->close();
?>
