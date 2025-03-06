<?php
function verifypassword($password,$storedpassword,$salt) {
    $storedpassword=$storedpassword.$salt;
    $hashedstoredpassword=hash('sha256',$storedpassword);
    return hash_equals($hashedstoredpassword,$password);
}
?>