<?php
require_once('session.php');
if (isset($_POST['page']) && !empty($_POST['page'])) {
    $pageURL = $_POST['page'];

    header("Location: " . $pageURL);
    exit();
} else {
    header("Location: direct.php");
    exit();
}
?>
