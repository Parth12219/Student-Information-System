<?php
include_once('connect.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST['username'];
    $email=$_POST['email'];
    if(empty($email)){
        echo '<script type="text/javascript">alert("E-Mail cannot be empty."); window.location.href="updateemail.php"; </script>';
        return false;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo '<script type="text/javascript">alert("Invalid E-Mail format."); window.location.href="updateemail.php"; </script>';
        return false;
    }
    $sql="update login set Email='$email' where Username='$username'";
    if($conn->query($sql)===TRUE){
        echo '<script type="text/javascript">alert("E-Mail updated successfully."); window.location.href="updateemail.php"; </script>';
        return true;
    }
    else{
        echo '<script type="text/javascript">alert("Error deleting record: " '. $conn->error.'"); window.location.href="updateemail.php"; </script>';
        return false;
    }
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title> Admin's Page </title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div class="login-box">
            <h1 style="text-align:center">Update E-Mail</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="textbox">
                    <input type="text" name="username" placeholder="Username" value="<?php echo isset($_POST['username'])?$_POST['username']:''; ?>"><br>
                </div>
                <div class="textbox">
                    <input type="text" name="email" placeholder="New E-Mail" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>"><br>
                </div>
                <input class="button" type="submit" name="btn" value="Submit">
            </form>
            <form action="operations.php">
                <input class="button" type="submit" name="btn" value="Previous Page">
            </form>
        </div>
    </body>
</html>