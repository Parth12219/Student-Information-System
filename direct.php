<?php
require_once('session.php');
require_once('connect.php');
if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
    echo "Please log in first to see this page.";
    die();
};
$sql="select roles.ManageAdmissions, roles.ManageSessions, roles.ManageAcademicDetails, roles.ManageMarks 
    from employee 
    inner join roles_mapping on employee.EmployeeID=roles_mapping.EmployeeID
    inner join roles on roles.RoleID=roles_mapping.RoleID
    where employee.EmployeeID='".$_SESSION['empid']."'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    if($row["ManageAdmissions"]==1) $_SESSION['manageadmissions']=true;
    if($row["ManageSessions"]==1) $_SESSION['managesessions']=true;
    if($row["ManageAcademicDetails"]==1) $_SESSION['manageacademicdetails']=true;
    if($row["ManageMarks"]==1) $_SESSION['managemarks']=true;
}
$pages = [];
if(isset($_SESSION['manageadmissions']) && $_SESSION['manageadmissions'] == true){
    $pages[]=["PageURL"=>'admission_handling.php','PageName'=>'Manage Admissions'];
}
if(isset($_SESSION['managesessions']) && $_SESSION['managesessions'] == true){
    $pages[]=["PageURL"=>'session_handling.php','PageName'=>'Manage Sessions'];
}
if(isset($_SESSION['manageacademicdetails']) && $_SESSION['manageacademicdetails'] == true){
    $pages[]=["PageURL"=>'AcademicDetails_handling.php','PageName'=>'Manage Academic Details'];
}
if(isset($_SESSION['managemarks']) && $_SESSION['managemarks'] == true){
    $pages[]=["PageURL"=>'Marks_handling.php','PageName'=>'Manage Marks'];
}
$pages[]=["PageURL"=>'studentinfo.php','PageName'=>'View Student Information'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Direct</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="css/styles_login.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/scripts_studentinfo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            padding-top: 140px;
            background-color: #1a1a1a;
            font-family: "Montserrat", sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .custom-form {
            background: linear-gradient(135deg, #444, #333);
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); 
            border: 2px solid #ffc800;
            max-width: 450px;
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
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">UniGateway</a>
        </div>
    </nav>
    <h3 style="color:#ffc800; text-align:center;">Direct to a Page</h3>
    <section class="page-section" id="contact">
        <div class="container custom-form">

            <form id="redirectForm" method="POST" action="redirect.php">
                <label for="page">Choose a Page:</label>
                <select id="page" name="page">
                    <option value="">--Select Page--</option>
                    <?php
                    foreach ($pages as $page) {
                        echo '<option value="' . $page['PageURL'] . '">' . $page['PageName'] . '</option>';
                    }
                    ?>
                </select>
                <br><br>
                <div class="text-center"><button type="submit">Go</button></div>
            </form>
        </div>
    </section>
    <footer class="footer">
        <p>&copy; 2024 UniGateway. All rights reserved. | <a href="privacy_policy.php">Privacy Policy</a> | <a href="terms.php">Terms of Service</a></p>
    </footer>
</body>
</html>
