<?php
require_once('connect.php');
$f=0;
$enr=$_POST['enr'];
$sql='select student.Name, student.DOB, student.Gender, student.`Phone Number`, student.Email from student inner join enrollment on student.StudentID=enrollment.StudentID where enrollment.`Enrollment Number`='.$enr.' and student.Valid=1 and enrollment.Valid=1';
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==0){
    echo '<div class="container custom-form">';
    echo '<div style="background-color:Tomato;">Invalid Enrollment Number.</div>';
    echo '<hr>';
    echo '<div class="text-center"><button id="backButton" type="submit">Back</button></div>';
    echo '</div>';
    return false;
}
$row=$result->fetch_assoc()
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <link rel="stylesheet" href="styles_login.css">
    <script src="js/scripts_studentinfo.js"></script>
    <style>
        body {
            padding-top: 140px;
        }
        .student-photo {
            width: 100%;
            border-radius: var(--bs-border-radius-lg);
            margin-bottom: 15px;
        }
        .student-info {
            list-style: none;
            padding: 0;
        }
        .student-info li {
            margin-bottom: 10px;
        }
        .student-info li span {
            font-weight: bold;
        }
        .center {
            margin: auto;
            width: 50%;
            border: 3px solid yellow;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container custom-form">
        <h3 style="color:#ffc800; text-align:center;">Student Info</h3>
        <div class="row">
            <div class="col">
                <div>
                    <img src="student1.jpg" alt="Student Photo" class="student-photo">
                    <ul class="student-info">
                        <li><span>Name:</span> <?php echo $row['Name']; ?></li>
                        <li><span>DOB:</span> <?php echo $row['DOB']; ?> </li>
                        <li><span>Gender:</span> <?php echo $row['Gender']; ?> </li>
                        <li><span>Phone Number:</span> <?php echo $row['Phone Number']; ?> </li>
                        <li><span>Email:</span> <?php echo $row['Email']; ?> </li>
                    </ul>
                </div>
                <hr>
                <div class="text-center"><button id="AcademicButton" type="submit">Academic Records</button></div>
                <hr>
                <div class="text-center"><button id="backButton" type="submit">Back</button></div>
            </div>
        </div>
    </div>
</body>
</html>