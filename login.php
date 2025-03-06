<?php
require_once('session.php');
require_once('connect.php');
require_once('hashing.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION = array();
    $empid = $_POST["empid"];
    $password = $_POST["password"];
    $salt=$_POST["hidden"];
    $sql="select login.Password, roles_mapping.RoleID from login inner join roles_mapping on login.EmployeeID=roles_mapping.EmployeeID inner join roles on roles_mapping.RoleID=roles.RoleID where roles_mapping.EmployeeID='.$empid.' and login.Valid=1 and roles.Valid=1 and roles_mapping.Valid=1";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==0){
		echo '<script type="text/javascript">alert("Incorrect Credentials."); window.location.href="login.php"; </script>';
		return false;
	}
    while($row=$result->fetch_assoc()) {
		if(verifypassword($password,$row["Password"],$salt)){
            $_SESSION['empid']=$empid;
			$_SESSION['loggedin']=true;
		}
		else{
			echo '<script type="text/javascript">alert("Incorrect Credentials."); window.location.href="login.php"; </script>';
			return false;
		}
	}
	if($_SESSION['loggedin']==true){
		echo '<script type="text/javascript">alert("Welcome"); window.location.href="direct.php"; </script>';
		return true;
	}
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Student's Portal Site</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="css/styles_login.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripts_login.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #1a1a1a;
            font-family: "Montserrat", sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .custom-form {
            background: linear-gradient(135deg, #444, #333);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            border: 2px solid #ffc800;
            max-width: 450px;
            margin: auto;
            color: #fff;
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group input {
            background-color: #444;
            border: 1px solid #555;
            color: #fff;
            padding: 15px 15px 15px 40px;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
        }

        .input-group .icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 18px;
        }

        .input-group input::placeholder {
            color: #aaa;
            font-size: 16px;
            transition: font-size 0.3s ease;
        }

        .input-group input:focus::placeholder {
            font-size: 12px;
        }

        .custom-form button {
            background-color: #ffc800;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .custom-form button:hover {
            background-color: #d9aa00;
        }

        .custom-form a {
            color: #ffc800;
            font-weight: 700;
            text-decoration: none;
        }

        .custom-form a:hover {
            text-decoration: underline;
        }

        #mainNav {
            background-color: black;
        }

        .page-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .footer {
            background-color: #333;
            padding: 20px 0;
            color: #fff;
            text-align: center;
            width: 100%;
        }

        .footer a {
            color: #ffc800;
            text-decoration: none;
            font-weight: 700;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">UniGateway</a>
        </div>
    </nav>
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center" id="form-header">
                <h2 class="section-heading text-uppercase">Login</h2>
                <h3 class="section-subheading text-muted">Welcome Again!</h3>
            </div>
            <div id="form-container">
                <form id="contactForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="custom-form">
                    <div class="input-group">
                        <i class="fa-solid fa-envelope icon"></i>
                        <input id="empid" type="number" placeholder="Enter Employee ID*" name="empid" required />
                    </div>
                    <div class="input-group">
                        <i class="fa-solid fa-lock icon"></i>
                        <input id="password" type="password" placeholder="Enter Your Password*" name="password" required />
                        <input type="hidden" name="hidden" id="hidden">
                    </div>
                    <div class="text-right mb-3">
                        <a href="#" id="forgotPasswordLink">Forgot Password?</a>
                    </div>
                    <div class="text-center"><button id="submitButton" type="submit">LOGIN</button></div>
                    <div class="text-center mt-3">
                        <p>New User? <a href="#" id="signUpButton">Sign-Up Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer class="footer">
        <p>&copy; 2024 UniGateway. All rights reserved. | <a href="privacy_policy.php">Privacy Policy</a> | <a href="terms.php">Terms of Service</a></p>
    </footer>
</body>

<script>

</script>

</html>


</html>
