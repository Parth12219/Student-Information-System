<?php
require_once("session.php");
if(!(isset($_SESSION['managemarks'])&&$_SESSION['managemarks']==true)){
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
            <h1>Enter Marks</h1>

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
                    <option value="">--Select Year--</option>
                </select>
            </div>

            <div id="step4" style="display:none;">
                <label for="semester">Select Semester:</label>
                <select id="semester" name="semester">
                    <option value="">--Select Semester--</option>
                </select>
            </div>

            <div id="step5" style="display:none;">
                <label for="subject">Select Subject:</label>
                <select id="subject" name="subject">
                    <option value="">--Select Subject--</option>
                </select>
            </div>

            <div id="marksTableSection" style="display:none;">
                <h3>Marks Records</h3>
                <table class="table table-striped" id="marksTable">
                    <thead>
                        <tr>
                            <th>Enrollment Number</th>
                            <th>Internal Marks</th>
                            <th>External Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <p id="noRecords" style="display:none;">No records available</p>
                <div id="actionButtons" style="display:none;">
                    <button id="addButton" style="display:none;">Add</button>
                    <button id="updateButton" style="display:none;">Update</button>
                    <button id="deleteButton" style="display:none;">Delete</button>
                </div>
            </div>
            <div id="operationForm" style="display:none;">
                <h3 id="formTitle">Add/Update/Delete Marks</h3>
                <form id="marksOperationForm">
                    <label for="enrollment">Enter Student Enrollment Number:</label>
                    <input type="text" id="enrollment" name="enrollment" required placeholder="Enter Enrollment Number">

                    <div id="marksInputs" style="display:none;">
                        <label for="internal_marks">Internal Marks:</label>
                        <input type="number" id="internal_marks" name="internal_marks" min="0" max="100">

                        <label for="external_marks">External Marks:</label>
                        <input type="number" id="external_marks" name="external_marks" min="0" max="100">
                    </div>

                    <button type="submit" id="submitAction">Submit</button>
                    <button type="button" id="cancelButton">Cancel</button>
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
                            $('#institute').append('<option value="' + institute["InstituteID"] + '">' + institute["Name"] + '</option>');
                        }
                    }
                });
                $('#institute').change(function() {
                    const instituteID = $(this).val();
                    if (instituteID) {
                        $.ajax({
                            url: 'fetch_branches.php',
                            method: 'POST',
                            data: { instituteID: instituteID },
                            success: function(data) {
                                $('#branch').html('<option value="">--Select Branch--</option>');
                                const branches = JSON.parse(data);
                                for (let branch of branches) {
                                    $('#branch').append('<option value="' + branch["BranchID"] + '">' + branch["Name"] + '</option>');
                                }
                                $('#step2').show();
                                $('#step3').hide();
                                $('#step4').hide();
                                $('#step5').hide();
                                $('#marksTableSection').hide();
                            }
                        });
                    } else {
                        $('#step2').hide();
                        $('#step3').hide();
                        $('#step4').hide();
                        $('#step5').hide();
                        $('#marksTableSection').hide();
                    }
                });
                $('#branch').change(function() {
                    const branchID = $(this).val();
                    const instituteID=$('#institute').val();
                    if (branchID && instituteID) {
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
                                $('#step4').hide();
                                $('#step5').hide();
                                $('#marksTableSection').hide();
                            }
                        });
                    } else {
                        $('#step3').hide();
                        $('#step4').hide();
                        $('#step5').hide();
                        $('#marksTableSection').hide();
                    }
                });

                $('#admission_year').change(function() {
                    const SchemeYear = $(this).val();
                    if (SchemeYear) {
                        $.ajax({
                            url: 'fetch_semesters.php',
                            method: 'POST',
                            data: { SchemeYear : SchemeYear },
                            success: function(data) {
                                $('#semester').html('<option value="">--Select Semester--</option>');
                                const semesters = JSON.parse(data);
                                for (let semester of semesters) {
                                    $('#semester').append('<option value="' + semester.SemesterID + '">' + semester.Number + '</option>');
                                }
                                $('#step4').show();
                                $('#step5').hide();
                                $('#marksTableSection').hide();
                            }
                        });
                    } else {
                        $('#step4').hide();
                        $('#step5').hide();
                        $('#marksTableSection').hide();
                    }
                });

                $('#semester').change(function() {
                    const semesterID = $(this).val();
                    const instituteID = $('#institute').val();
                    const branchID = $('#branch').val();
                    if (semesterID && instituteID && branchID) {
                        $.ajax({
                            url: 'fetch_subjects.php',
                            method: 'POST',
                            data: {instituteID: instituteID, branchID: branchID, semesterID: semesterID },
                            success: function(data) {
                                $('#subject').html('<option value="">--Select Subject--</option>');
                                const subjects = JSON.parse(data);
                                for (let subject of subjects) {
                                    $('#subject').append('<option value="' + subject.ExaminationSchemeID + '">' + subject.Name + '</option>');
                                }
                                $('#step5').show();
                                $('#marksTableSection').hide();
                            }
                        });
                    } else {
                        $('#step5').hide();
                        $('#marksTableSection').hide();
                    }
                });

                $('#subject').change(function() {
                    const examinationSchemeID = $(this).val();
                    if (examinationSchemeID) {
                        $.ajax({
                            url: 'fetch_marks.php',
                            method: 'POST',
                            data: {
                                examinationSchemeID: examinationSchemeID
                            },
                            success: function(data) {
                                const records = JSON.parse(data);
                                if (records.length > 0) {
                                    let tableRows = '';
                                    records.forEach(function(record) {
                                        tableRows += `<tr>
                                            <td>${record["Enrollment Number"]}</td>
                                            <td>${record["Internal Marks"]}</td>
                                            <td>${record["External Marks"]}</td>
                                        </tr>`;
                                    });
                                    $('#marksTable tbody').html(tableRows);
                                    $('#marksTableSection').show();
                                    $('#actionButtons').show();
                                    $('#noRecords').hide();
                                    $('#addButton').show();
                                    $('#updateButton').show();
                                    $('#deleteButton').show();
                                } else {
                                    $('#marksTableSection').show();
                                    $('#marksTable tbody').html('');
                                    $('#noRecords').show();
                                    $('#actionButtons').show();
                                    $('#addButton').show();
                                    $('#updateButton').hide();
                                    $('#deleteButton').hide();
                                }
                            }
                        });
                    } else {
                        $('#marksTableSection').hide();
                    }
                });

                $('#addButton').click(function() {
                    $('#formTitle').text('Add Marks');
                    $('#submitAction').data('action', 'add');
                    $('#marksInputs').show();
                    $('#operationForm').show();
                    $('#marksTableSection').hide();
                });

                $('#updateButton').click(function() {
                    $('#formTitle').text('Update Marks');
                    $('#submitAction').data('action', 'update');
                    $('#marksInputs').show();
                    $('#operationForm').show();
                    $('#marksTableSection').hide();
                });

                $('#deleteButton').click(function() {
                    $('#formTitle').text('Delete Marks');
                    $('#submitAction').data('action', 'delete');
                    $('#marksInputs').hide();
                    $('#operationForm').show();
                    $('#marksTableSection').hide();
                });

                $('#cancelButton').click(function() {
                    $('#operationForm').hide();
                    $('#marksTableSection').show();
                });

                $('#marksOperationForm').submit(function(e) {
                    e.preventDefault();
                    const action = $('#submitAction').data('action');
                    const enrollmentNo = $('#enrollment').val();
                    let internalMarks = null;
                    let externalMarks = null;

                    if (action !== 'delete') {
                        internalMarks = $('#internal_marks').val();
                        externalMarks = $('#external_marks').val();
                    }

                    $.ajax({
                        url: 'marks_operations.php',
                        method: 'POST',
                        data: {
                            action: action,
                            enrollmentNo: enrollmentNo,
                            internalMarks: internalMarks,
                            externalMarks: externalMarks,
                            examinationSchemeID: $('#subject').val()
                        },
                        success: function(response) {
                            alert(response);
                            $('#operationForm').hide();
                            $('#marksTableSection').show();
                            $('#subject').trigger('change');
                        }
                    });
                });
            });
        </script>
    </section>
    <footer class="footer">
        <p>&copy; 2024 UniGateway. All rights reserved. | <a href="privacy_policy.php">Privacy Policy</a> | <a href="terms.php">Terms of Service</a></p>
    </footer>
</body>
</html>
