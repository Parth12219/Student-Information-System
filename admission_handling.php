<?php
require_once("session.php");
if(!(isset($_SESSION['manageadmissions'])&&$_SESSION['manageadmissions']==true)){
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
            <h1>Admission Handling</h1>

            <div id="step1">
                <label for="institute">Select Institute:</label>
                <select id="institute" name="institute">
                    <option value="">--Select Institute--</option>
                </select>
            </div>

            <div id="step2" style="display:none;">
                <label for="branch">Select Branch:</label>
                <select id="branch" name="branch">
                    <option value="">--Select Branch--</option>
                </select>
            </div>

            <div id="step3" style="display:none;">
                <label for="admission_year">Select Admission Year:</label>
                <select id="admission_year" name="admission_year">
                    <option value="">--Select Admission Year--</option>
                </select>
            </div>

            <div id="admissionForm" style="display:none;">
                <h2>Admission Form</h2>
                <form id="admissionFormSubmit" method="POST" action="submit_admission.php">
                    <input type="hidden" id="institute_hidden" name="institute_hidden">
                    <input type="hidden" id="branch_hidden" name="branch_hidden">
                    <input type="hidden" id="admission_year_hidden" name="admission_year_hidden">

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required placeholder="Enter Name">

                    <label for="dob">Date of Birth (DOB):</label>
                    <input type="date" id="dob" name="dob" required>

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="">--Select Gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>

                    <label for="email">Phone Number:</label>
                    <input type="email" id="email" name="email" required placeholder="Enter E-Mail ID">

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required placeholder="Enter Phone Number" pattern="[0-9]{10}">

                    <label for="batch">Batch:</label>
                    <select id="batch" name="batch" required>
                        <option value="">--Select Batch--</option>
                    </select>
                    <button type="submit">Submit Admission</button>
                </form>
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
                        $('#institute_hidden').val(instituteID);
                        $.ajax({
                            url: 'fetch_branches.php',
                            method: 'POST',
                            data: { instituteID: instituteID },
                            success: function(data) {
                                $('#branch').html('<option value="">--Select Branch--</option>');
                                const branches = JSON.parse(data);
                                for (let branch of branches) {
                                    $('#branch').append('<option value="' + branch.BranchID + '">' + branch.Name + '</option>');
                                }
                                $('#step2').show();
                                $('#step3').hide();
                                $('#admissionForm').hide();
                            }
                        });
                    } else {
                        $('#institute_hidden').val('');
                        $('#step2').hide();
                        $('#step3').hide();
                        $('#admissionForm').hide();
                    }
                });

                $('#branch').change(function() {
                    const branchID = $(this).val();
                    const instituteID=$('#institute').val();
                    if (branchID && instituteID) {
                        $('#branch_hidden').val(branchID);
                        $.ajax({
                            url: 'fetch_admission_years.php',
                            method: 'POST',
                            data: { instituteID: instituteID, branchID: branchID },
                            success: function(data) {
                                $('#admission_year').html('<option value="">--Select Year--</option>');
                                const years = JSON.parse(data);
                                for (let year of years) {
                                    $('#admission_year').append('<option value="' + year["Scheme Year"] + '">' + year["Scheme Year"] + '</option>');
                                }
                                $('#step3').show();
                                $('#admissionForm').hide();
                            }
                        });
                    } else {
                        $('#branch_hidden').val('');
                        $('#step3').hide();
                        $('#admissionForm').hide();
                    }
                });

                $('#admission_year').change(function() {
                    const admissionYear = $(this).val();
                    const instituteID = $('#institute').val();
                    const branchID = $('#branch').val();
                    if (instituteID && branchID) {
                        $('#admission_year_hidden').val(admissionYear);
                        $.ajax({
                            url: 'fetch_batches.php',
                            method: 'POST',
                            data: { instituteID: instituteID, branchID: branchID },
                            success: function(data) {
                                $('#batch').html('<option value="">--Select Batch--</option>');
                                const batches = JSON.parse(data);
                                for (let batch of batches) {
                                    $('#batch').append('<option value="' + batch.BatchID + '">' + batch.Name + '</option>');
                                }
                                $('#admissionForm').show();
                            }
                        });
                    } else {
                        $('#admission_year_hidden').val('');
                        $('#admissionForm').hide();
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
