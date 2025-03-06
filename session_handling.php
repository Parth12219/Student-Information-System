<?php
require_once("session.php");
if(!(isset($_SESSION['managesessions'])&&$_SESSION['managesessions']==true)){
    echo "You don't have permission to access this page.";
    die();
}
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
    <h3 style="color:#ffc800; text-align:center;">Change</h3>
    <section class="page-section" id="contact">
        <div class="container custom-form">
            <h1>Session Handling</h1>

            <div id="step1">
                <label for="institute">Select Institute:</label>
                <select id="institute" name="institute">
                    <option value="">--Select Institute--</option>
                </select>
            </div>

            <div id="step2" style="display:none;">
                <label for="admission_year">Select Admission Year:</label>
                <select id="admission_year" name="admission_year">
                    <option value="">--Select Admission Year--</option>
                </select>
            </div>

            <div id="step3" style="display:none;">
                <label for="semester_number">Select Semester Number:</label>
                <select id="semester_number" name="semester_number">
                    <option value="">--Select Semester--</option>
                </select>
            </div>

            <div id="step4" style="display:none;">
                <label for="begin_date">Begin Date:</label>
                <input type="date" id="begin_date" name="begin_date" required>

                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>
                
                <button type="submit" id="submit_session">Submit</button>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: 'fetch_institutes.php',
                    method: 'GET',
                    success: function(data) {
                        const institutes = JSON.parse(data);
                        for (let institute of institutes) {
                            $('#institute').append('<option value="' + institute.InstituteID + '">' + institute.Name + '</option>');
                        }
                    }
                });

                $('#institute').change(function() {
                    const instituteID = $(this).val();
                    if (instituteID) {
                        $.ajax({
                            url: 'fetch_institute_admission_years.php',
                            method: 'POST',
                            data: { instituteID: instituteID },
                            success: function(data) {
                                $('#admission_year').html('<option value="">--Select Admission Year--</option>');
                                const years = JSON.parse(data);
                                for (let year of years) {
                                    $('#admission_year').append('<option value="' + year['Scheme Year'] + '">' + year['Scheme Year'] + '</option>');
                                }
                                $('#step2').show();
                                $('#step3').hide();
                                $('#step4').hide();
                            }
                        });
                    } else {
                        $('#step2').hide();
                        $('#step3').hide();
                        $('#step4').hide();
                    }
                });

                $('#admission_year').change(function() {
                    const admissionYear = $(this).val();
                    if (admissionYear) {
                        $.ajax({
                            url: 'fetch_semesters.php',
                            method: 'POST',
                            data: { SchemeYear: admissionYear },
                            success: function(data) {
                                $('#semester_number').html('<option value="">--Select Semester--</option>');
                                const semesters = JSON.parse(data);
                                for (let semester of semesters) {
                                    $('#semester_number').append('<option value="' + semester.SemesterID + '">' + semester.Number + '</option>');
                                }
                                $('#step3').show();
                                $('#step4').hide();
                            }
                        });
                    } else {
                        $('#step3').hide();
                        $('#step4').hide();
                    }
                });

                $('#semester_number').change(function() {
                    if ($(this).val()) {
                        $('#step4').show();
                    } else {
                        $('#step4').hide();
                    }
                });

                $('#submit_session').click(function() {
                    const instituteID = $('#institute').val();
                    const admissionYear = $('#admission_year').val();
                    const semesterNo = $('#semester_number').val();
                    const beginDate = $('#begin_date').val();
                    const endDate = $('#end_date').val();

                    if (instituteID && admissionYear && semesterNo && beginDate && endDate) {
                        $.ajax({
                            url: 'submit_session.php',
                            method: 'POST',
                            data: {
                                instituteID: instituteID,
                                admissionYear: admissionYear,
                                semesterNo: semesterNo,
                                beginDate: beginDate,
                                endDate: endDate
                            },
                            success: function(response) {
                                alert(response);
                            }
                        });
                    } else {
                        alert("Please fill out all fields.");
                    }
                });
            });
        </script>
    </section>
    <footer class="footer">
        <p>&copy; 2024 UniGateway. All rights reserved. | <a href="privacy_policy.php">Privacy Policy</a> | <a href="terms.php">Terms of Service</a></p>
    </footer>
</body>
</html>
