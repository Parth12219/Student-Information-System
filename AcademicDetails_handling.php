<?php
require_once("session.php");
if(!(isset($_SESSION['manageacademicdetails'])&&$_SESSION['manageacademicdetails']==true)){
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
            color: white;
            margin: 0;
            padding: 0;
            padding-top: 140px;
            background-color: #1a1a1a;
            font-family: "Montserrat", sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        table, th, td {
            border: 1px solid;
        }
        tr:nth-child(odd) {background-color: #f2f2f2;}
        thead{color: black;}
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
        <div class="container">
            <h1>Academic Details Handling</h1>

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
                <label for="operation">Select an Operation:</label>
                <select id="operation" name="operation">
                    <option value="">--Select Operation--</option>
                    <option value="add_subject">Subject Details</option>
                    <option value="add_exam_scheme">Examination Scheme</option>
                    <option value="allot_subject">Allot Subject to Enrollment</option>
                </select>
            </div>

            <div id="subject_form" style="display:none; color:white;">
                <div id="subjectsTableSection" style="display:none; color:white;">
                    <h3>Subject Details Records</h3>
                    <table class="table table-striped" id="subjectsTable" style="color:white;">
                        <thead style="color:black;">
                            <tr>
                                <th>SubjectDetailsID</th>
                                <th>SubjectID</th>
                                <th>Subject Name</th>
                                <th>Scheme Year</th>
                                <th>Type</th>
                                <th>Exam</th>
                                <th>Internal</th>
                                <th>External</th>
                                <th>Pass Marks</th>
                                <th>Mode</th>
                                <th>Kind</th>
                                <th>Group</th>
                                <th>Credits</th>
                                <th>Syllabus</th>
                            </tr>
                        </thead>
                        <tbody style="color:white;">
                        </tbody>
                    </table>
                    <p id="noRecords_subject" style="display:none;">No records available</p>
                    <div id="actionButtons_subject" style="display:none;">
                        <button id="addButton_subject" style="display:none;">Add</button>
                        <button id="updateButton_subject" style="display:none;">Update</button>
                        <button id="deleteButton_subject" style="display:none;">Delete</button>
                    </div>
                </div>
                <form id="subjectForm">
                    <h2>Add/Update/Delete Subject Details</h2>
                    
                    <label for="scheme_year">Subject Scheme Year:</label>
                    <select id="scheme_year" name="scheme_year" required>
                        <option value="">--Select Subject Scheme Year--</option>
                    </select>

                    <div id="subjectAddDiv">
                    <label for="university_subjects">Subject:</label>
                    <select id="university_subjects" name="university_subjects">
                        <option value="">--Select Subject--</option>
                    </select>
                    </div>

                    <div id="subjectUpdateDeleteDiv" style="display:none;">
                    <label for="subjects">Subject:</label>
                    <select id="subjects" name="subjects">
                        <option value="">--Select Subject--</option>
                    </select>
                    </div>

                    <div id="subjectAddUpdateDiv" style="display:none;">
                    <label for="type">Type:</label>
                    <input type="text" id="type" name="type" placeholder="Enter Type">

                    <label for="exam">Exam:</label>
                    <input type="text" id="exam" name="exam" placeholder="Enter Exam">

                    <label for="internal">Internal Marks:</label>
                    <input type="number" id="internal" name="internal">

                    <label for="external">External Marks:</label>
                    <input type="number" id="external" name="external">

                    <label for="pass_marks">Pass Marks:</label>
                    <input type="number" id="pass_marks" name="pass_marks">

                    <label for="mode">Mode:</label>
                    <input type="text" id="mode" name="mode" placeholder="Enter Mode">

                    <label for="kind">Kind:</label>
                    <input type="text" id="kind" name="kind" placeholder="Enter Kind">

                    <label for="group">Group:</label>
                    <input type="text" id="group" name="group" placeholder="Enter Group">

                    <label for="credits">Credits:</label>
                    <input type="number" id="credits" name="credits">

                    <label for="syllabus">Syllabus:</label>
                    <textarea id="syllabus" name="syllabus" placeholder="Enter Syllabus"></textarea>
                    </div>

                    <div id="subjectButtons">
                    <button type="submit" id="submitAction_subject">Submit</button>
                    <button type="button" id="cancelButton_subject">Cancel</button>
                    </div>
                </form>
            </div>

            <div id="exam_form" style="display:none;">
                <div id="examsTableSection" style="display:none; color:white;">
                    <h3>Exam Details Records</h3>
                    <table class="table table-striped" id="examsTable" style="color:white;">
                        <thead style="color:black;">
                            <tr>
                                <th>ExaminationSchemeID</th>
                                <th>Semester Number</th>
                                <th>Admission Year</th>
                                <th>Subject Name</th>
                                <th>Subject Scheme Year</th>
                                <th>Examination Date</th>
                            </tr>
                        </thead>
                        <tbody style="color:white;">
                        </tbody>
                    </table>
                    <p id="noRecords_exam" style="display:none;">No records available</p>
                    <div id="actionButtons_exam" style="display:none;">
                        <button id="addButton_exam" style="display:none;">Add</button>
                        <button id="updateButton_exam" style="display:none;">Update</button>
                        <button id="deleteButton_exam" style="display:none;">Delete</button>
                    </div>
                </div>
                <form id="examForm">

                    <h2>Add/Update/Delete Exam Details</h2>
                    <label for="admission_year">Admission Year:</label>
                    <select id="admission_year" name="admission_year" required>
                        <option value="">--Select Admission Year--</option>
                    </select>

                    <div id="step2_scheme">
                    <label for="semester_number">Semester Number:</label>
                    <select id="semester_number" name="semester_number" required>
                        <option value="">--Select Semester Number--</option>
                    </select>
                    </div>

                    <div id="step3_scheme">
                    <label for="scheme_year_exam">Subject Scheme Year:</label>
                    <select id="scheme_year_exam" name="scheme_year_exam" required>
                        <option value="">--Select Subject Scheme Year--</option>
                    </select>
                    </div>

                    <div id="step4_scheme">
                    <label for="subject">Subject:</label>
                    <select id="subject" name="subject" required>
                        <option value="">--Select Subject--</option>
                    </select>
                    </div>

                    <div id="step5_scheme">
                    <div id="step5_scheme_details">
                    <label for="backlog">Backlog Examination:</label>
                    <select id="backlog" name="backlog">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                    <label for="exam_date">Date of Examination:</label>
                    <input type="date" id="exam_date" name="exam_date">
                    </div>
                    <button type="submit" id="submitAction_exam">Submit</button>
                    <button type="button" id="cancelButton_exam">Cancel</button>
                    </div>
                </form>
            </div>

            <div id="allot_subject_form" style="display:none;">
                <h2>Allot Subject to Enrollment</h2>
                <form id="allotSubjectForm" method="POST" action="submit_allot_subject.php">
                    <input type="hidden" id="institute_hidden_allot" name="institute_hidden_allot">
                    <input type="hidden" id="branch_hidden_allot" name="branch_hidden_allot">

                    <label for="enrollment_number">Enrollment Number:</label>
                    <select id="enrollment_number" name="enrollment_number" required>
                        <option value="">--Select Enrollment Number--</option>
                    </select>

                    <div id="step2_allot">
                    <label for="semester_number_allot">Semester Number:</label>
                    <select id="semester_number_allot" name="semester_number_allot" required>
                        <option value="">--Select Semester Number--</option>
                    </select>
                    </div>

                    <div id="step3_allot">
                    <label for="scheme_year_allot">Subject Subject Scheme Year:</label>
                    <select id="scheme_year_allot" name="scheme_year_allot" required>
                        <option value="">--Select Subject Scheme Year--</option>
                    </select>
                    </div>

                    <div id="step4_allot">
                    <label for="subject_allot">Subject:</label>
                    <select id="subject_allot" name="subject_allot" required>
                        <option value="">--Select Subject--</option>
                    </select>

                    </div>
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
                        $('#institute_hidden_exam').val(instituteID);
                        $('#institute_hidden_allot').val(instituteID);

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
                                $('#subject_form').hide();
                                $('#add_exam_scheme_form').hide();
                                $('#allot_subject_form').hide();
                                $('#operation').val('');
                            }
                        });
                    } else {
                        $('#step2').hide();
                        $('#step3').hide();
                        $('#subject_form').hide();
                        $('#add_exam_scheme_form').hide();
                        $('#allot_subject_form').hide();
                        $('#operation').val('');
                    }
                });

                $('#branch').change(function() {
                    const branchID = $(this).val();
                    if (branchID) {
                        $('#branch_hidden').val(branchID);
                        $('#branch_hidden_exam').val(branchID);
                        $('#branch_hidden_allot').val(branchID);
                        $('#step3').show();
                        $('#subject_form').hide();
                        $('#add_exam_scheme_form').hide();
                        $('#allot_subject_form').hide();
                        $('#operation').val('');
                    } else {
                        $('#step3').hide();
                        $('#subject_form').hide();
                        $('#add_exam_scheme_form').hide();
                        $('#allot_subject_form').hide();
                        $('#operation').val('');
                    }
                });

                $('#operation').change(function() {
                    const selectedOperation = $(this).val();
                    $('#subject_form').hide();
                    $('#add_exam_scheme_form').hide();
                    $('#allot_subject_form').hide();

                    if (selectedOperation === 'add_subject') {
                        showSubjectDetails();
                        $('#exam_form').hide();
                        $('#allot_form').hide();
                        $('#subject_form').show();
                    } else if (selectedOperation === 'add_exam_scheme') {
                        showExamDetails();
                        $('#subject_form').hide();
                        $('#allot_form').hide();
                        $('#exam_form').show();
                    } else if (selectedOperation === 'allot_subject') {
                        loadEnrollmentNumbers();
                        $('#step2_allot').hide();
                        $('#step3_allot').hide();
                        $('#step4_allot').hide();
                        $('#subject_form').hide();
                        $('#exam_form').hide();
                        $('#allot_form').show();
                    }
                });
                
                $('#admission_year').change(function() {
                    const admissionYear = $(this).val();
                    if (admissionYear) {
                        loadSemesters(admissionYear);
                        $('#step2_scheme').show();
                        $('#step3_scheme').hide();
                        $('#step4_scheme').hide();
                        $('#step5_scheme').hide();
                    }
                    else{
                        $('#step2_scheme').hide();
                        $('#step3_scheme').hide();
                        $('#step4_scheme').hide();
                        $('#step5_scheme').hide();
                    }
                });

                $('#semester_number').change(function() {
                    const semester = $(this).val();
                    if (semester) {
                        initialloadSchemeYears();
                        $('#step3_scheme').show();
                        $('#step4_scheme').hide();
                        $('#step5_scheme').hide();
                    }
                    else{
                        $('#step3_scheme').hide();
                        $('#step4_scheme').hide();
                        $('#step5_scheme').hide();
                    }
                });

                $('#scheme_year_exam').change(function() {
                    const schemeYear = $(this).val();
                    const branchID = $('#branch').val();
                    const instituteID = $('#institute').val();
                    if (schemeYear) {
                        loadSubjects(schemeYear, branchID, instituteID);
                        $('#step4_scheme').show();
                        $('#step5_scheme').hide();
                    } else {
                        $('#step4_scheme').hide();
                        $('#step5_scheme').hide();
                    }
                });

                $('#subject').change(function() {
                    if ($(this).val()&&$('#submitAction_exam').data('action')!='delete') {
                        $('#step5_scheme').show();
                    } 
                    else if($(this).val()){
                        $('#step5_scheme').show();
                        $("#step5_scheme_details").hide();
                    }
                    else {
                        $('#step5_scheme').hide();
                    }
                });

                $('#subjects').change(function() {
                    if ($(this).val() && $('#submitAction_subject').data('action')=='update') {
                        $('#subjectAddUpdateDiv').show();
                        $('#subjectButtons').show();
                    } 
                    else if ($(this).val() && $('#submitAction_subject').data('action')=='delete') {
                        $('#subjectButtons').show();
                    }
                    else {
                        $('#subjectAddUpdateDiv').hide();
                        $('#subjectButtons').hide();
                    }
                });

                $('#enrollment_number').change(function() {
                    const enrollment = $(this).val();
                    if (enrollment) {
                        loadSemestersForEnrollment(enrollment);
                        $('#step2_allot').show();
                        $('#step3_allot').hide();
                        $('#step4_allot').hide();
                    } else {
                        resetAllotFields();
                        $('#step2_allot').hide();
                        $('#step3_allot').hide();
                        $('#step4_allot').hide();
                    }
                });

                $('#semester_number_allot').change(function() {
                    const semester = $(this).val();
                    if (semester) {
                        initialloadSchemeYears();
                        $('#step3_allot').show();
                        $('#step4_allot').hide();
                    } else {
                        $('#step3_allot').hide();
                        $('#step4_allot').hide();
                    }
                });

                $('#scheme_year').change(function() {
                    const schemeYear = $(this).val();
                    const branchID = $('#branch').val();
                    const instituteID = $('#institute').val();
                    if (schemeYear && ($('#submitAction_subject').data('action')=='update'||$('#submitAction_subject').data('action')=='delete')) {
                        loadSubjects(schemeYear, branchID, instituteID);
                        $('#subjectAddDiv').hide();
                        $('#subjectAddUpdateDiv').hide();
                        $('#subjectUpdateDeleteDiv').show();
                        $('#subjectButtons').hide();
                    } else if (($('#submitAction_subject').data('action')=='update'||$('#submitAction_subject').data('action')=='delete')) {
                        $('#subjectButtons').hide();
                        $('#subjectAddDiv').hide();
                        $('#subjectAddUpdateDiv').hide();
                        $('#subjectUpdateDeleteDiv').hide();
                    }
                });

                $('#scheme_year_allot').change(function() {
                    const schemeYear = $(this).val();
                    const branchID = $('#branch').val();
                    const instituteID = $('#institute').val();
                    if (schemeYear) {
                        loadSubjects(schemeYear, branchID, instituteID);
                        $('#').show();
                    } else {
                        $('#step4_allot').hide();
                    }
                });

                function initialloadSchemeYears() {
                    const instituteID = $('#institute').val();
                    const branchID = $('#branch').val();
                    $.ajax({
                        url: 'fetch_admission_years.php',
                        method: 'POST',
                        data: { instituteID: instituteID, branchID: branchID },
                        success: function(data) {
                            const schemeYears = JSON.parse(data);
                            $('#scheme_year, #scheme_year_exam, #scheme_year_allot').html('<option value="">--Select Scheme Year--</option>');
                            for (let year of schemeYears) {
                                $('#scheme_year, #scheme_year_exam, #scheme_year_allot').append('<option value="' + year["Scheme Year"] + '">' + year["Scheme Year"] + '</option>');
                            }
                        }
                    });
                }

                function loadAdmissionYears() {
                    const instituteID = $('#institute').val();
                    const branchID = $('#branch').val();
                    $.ajax({
                        url: 'fetch_admission_years.php',
                        method: 'POST',
                        data: { instituteID: instituteID, branchID: branchID },
                        success: function(data) {
                            const admissionYears = JSON.parse(data);
                            $('#admission_year').html('<option value="">--Select Admission Year--</option>');
                            for (let year of admissionYears) {
                                $('#admission_year').append('<option value="' + year["Scheme Year"] + '">' + year["Scheme Year"] + '</option>');
                            }
                        }
                    });
                }

                function loadUniversitySubjects() {
                    $.ajax({
                        url: 'fetch_university_subjects.php',
                        method: 'GET',
                        success: function(data) {
                            const subjects = JSON.parse(data);
                            $('#university_subjects').html('<option value="">--Select Subject--</option>');
                            for (let subject of subjects) {
                                $('#university_subjects').append('<option value="' + subject.SubjectID + '">' + subject.Name + '</option>');
                            }
                        }
                    });
                }

                function loadSemesters(admissionYear) {
                    $.ajax({
                        url: 'fetch_semesters.php',
                        method: 'POST',
                        data: { SchemeYear: admissionYear },
                        success: function(data) {
                            const semesters = JSON.parse(data);
                            $('#semester_number').html('<option value="">--Select Semester--</option>').show();
                            for (let semester of semesters) {
                                $('#semester_number').append('<option value="' + semester.SemesterID + '">' + semester.Number + '</option>');
                            }
                        }
                    });
                }

                function loadSubjects(schemeYear, branchID, instituteID) {
                    $.ajax({
                        url: 'fetch_scheme_subjects.php',
                        method: 'POST',
                        data: { schemeYear: schemeYear, branchID: branchID, instituteID: instituteID },
                        success: function(data) {
                            const subjects = JSON.parse(data);
                            $('#subject, #subject_allot, #subjects').html('<option value="">--Select Subject--</option>').show();
                            for (let subject of subjects) {
                                $('#subject, #subject_allot, #subjects').append('<option value="' + subject.SubjectID + '">' + subject.Name + '</option>');
                            }
                        }
                    });
                }

                function loadEnrollmentNumbers() {
                    const instituteID = $('#institute').val();
                    const branchID = $('#branch').val();
                    $.ajax({
                        url: 'fetch_enrollment_numbers.php',
                        method: 'POST',
                        data: { instituteID: instituteID, branchID: branchID },
                        success: function(data) {
                            const enrollmentNumbers = JSON.parse(data);
                            $('#enrollment_number').html('<option value="">--Select Enrollment Number--</option>');
                            for (let enrollment of enrollmentNumbers) {
                                $('#enrollment_number').append('<option value="' + enrollment["Enrollment Number"] + '">' + enrollment["Enrollment Number"] + '</option>');
                            }
                        }
                    });
                }

                function loadSemestersForEnrollment(enrollment) {
                    $.ajax({
                        url: 'fetch_semesters_by_enrollment.php',
                        method: 'POST',
                        data: { enrollment: enrollment },
                        success: function(data) {
                            const semesters = JSON.parse(data);
                            $('#semester_number_allot').html('<option value="">--Select Semester--</option>').show();
                            for (let semester of semesters) {
                                $('#semester_number_allot').append('<option value="' + semester.SemesterID + '">' + semester.Number + '</option>');
                            }
                        }
                    });
                }

                function showSubjectDetails() {
                    const instituteID = $('#institute').val();
                    const branchID = $('#branch').val();
                    $.ajax({
                        url: 'fetch_subject_details.php',
                        method: 'POST',
                        data: { instituteID: instituteID, branchID: branchID },
                        success: function(data) {
                            const records = JSON.parse(data);
                            if (records.length > 0) {
                                let tableRows = '';
                                records.forEach(function(record) {
                                    tableRows += `<tr>
                                        <td>${record["SubjectDetailsID"]}</td>
                                        <td>${record["SubjectID"]}</td>
                                        <td>${record["Name"]}</td>
                                        <td>${record["Scheme Year"]}</td>
                                        <td>${record["Type"]}</td>
                                        <td>${record["Exam"]}</td>
                                        <td>${record["Internal"]}</td>
                                        <td>${record["External"]}</td>
                                        <td>${record["Pass Marks"]}</td>
                                        <td>${record["Mode"]}</td>
                                        <td>${record["Kind"]}</td>
                                        <td>${record["Group"]}</td>
                                        <td>${record["Credits"]}</td>
                                        <td>${record["Syllabus"]}</td>
                                    </tr>`;
                                });
                                $('#subjectsTable tbody').html(tableRows);
                                $('#subjectsTableSection').show();
                                $('#subjectForm').hide();
                                $('#actionButtons_subject').show();
                                $('#noRecords_subject').hide();
                                $('#addButton_subject').show();
                                $('#updateButton_subject').show();
                                $('#deleteButton_subject').show();
                            } else {
                                $('#subjectsTableSection').show();
                                $('#subjectsTable tbody').html('');
                                $('#subjectForm').hide();
                                $('#noRecords_subject').show();
                                $('#actionButtons_subject').show();
                                $('#addButton_subject').show();
                                $('#updateButton_subject').hide();
                                $('#deleteButton_subject').hide();
                            }
                        }
                    });
                }

                function showExamDetails() {
                    const instituteID = $('#institute').val();
                    const branchID = $('#branch').val();
                    $.ajax({
                        url: 'fetch_exam_details.php',
                        method: 'POST',
                        data: { instituteID: instituteID, branchID: branchID },
                        success: function(data) {
                            const records = JSON.parse(data);
                            if (records.length > 0) {
                                let tableRows = '';
                                records.forEach(function(record) {
                                    tableRows += `<tr>
                                        <td>${record["ExaminationSchemeID"]}</td>
                                        <td>${record["Number"]}</td>
                                        <td>${record["AdmissionYear"]}</td>
                                        <td>${record["Name"]}</td>
                                        <td>${record["Scheme Year"]}</td>
                                        <td>${record["Examination Date"]}</td>
                                    </tr>`;
                                });
                                $('#examsTable tbody').html(tableRows);
                                $('#examsTableSection').show();
                                $('#examForm').hide();
                                $('#actionButtons_exam').show();
                                $('#noRecords_exam').hide();
                                $('#addButton_exam').show();
                                $('#updateButton_exam').show();
                                $('#deleteButton_exam').show();
                            } else {
                                $('#examsTableSection').show();
                                $('#examsTable tbody').html('');
                                $('#examForm').hide();
                                $('#noRecords_exam').show();
                                $('#actionButtons_exam').show();
                                $('#addButton_exam').show();
                                $('#updateButton_exam').hide();
                                $('#deleteButton_exam').hide();
                            }
                        }
                    });
                }

                $('#addButton_subject').click(function() {
                    initialloadSchemeYears();
                    loadUniversitySubjects();
                    $('#submitAction_subject').data('action', 'add');
                    $('#subjectsTableSection').hide();
                    $('#subjectUpdateDeleteDiv').hide();
                    $('#subjectAddDiv').show();
                    $('#subjectAddUpdateDiv').show();
                    $('#subjectForm').show();
                    $('#cancelButton_subject').show();
                });

                $('#addButton_exam').click(function() {
                    loadAdmissionYears();
                    initialloadSchemeYears();
                    $('#step2_scheme').hide();
                    $('#step3_scheme').hide();
                    $('#step4_scheme').hide();
                    $('#step5_scheme').hide();
                    $('#submitAction_exam').data('action', 'add');
                    $('#examsTableSection').hide();
                    $('#examForm').show();
                    $('#cancelButton_exam').show();
                });

                $('#updateButton_subject').click(function() {
                    initialloadSchemeYears();
                    $('#submitAction_subject').data('action', 'update');
                    $('#subjectsTableSection').hide();
                    $('#subjectAddDiv').hide();
                    $('#subjectAddUpdateDiv').hide();
                    $('#subjectUpdateDeleteDiv').hide();
                    $('#subjectButtons').hide();
                    $('#subjectForm').show();
                    $('#cancelButton_subject').show();
                });

                $('#updateButton_exam').click(function() {
                    loadAdmissionYears();
                    initialloadSchemeYears();
                    $('#step2_scheme').hide();
                    $('#step3_scheme').hide();
                    $('#step4_scheme').hide();
                    $('#step5_scheme').hide();
                    $('#submitAction_exam').data('action', 'update');
                    $('#examsTableSection').hide();
                    $('#examForm').show();
                    $('#cancelButton_exam').show();
                });

                $('#deleteButton_subject').click(function() {
                    initialloadSchemeYears();
                    $('#submitAction_subject').data('action', 'delete');
                    $('#subjectsTableSection').hide();
                    $('#subjectAddDiv').hide();
                    $('#subjectAddUpdateDiv').hide();
                    $('#subjectUpdateDeleteDiv').hide();
                    $('#subjectButtons').hide();
                    $('#subjectForm').show();
                    $('#cancelButton_subject').show();
                });

                $('#deleteButton_exam').click(function() {
                    loadAdmissionYears();
                    initialloadSchemeYears();
                    $('#step2_scheme').hide();
                    $('#step3_scheme').hide();
                    $('#step4_scheme').hide();
                    $('#step5_scheme').hide();
                    $('#submitAction_exam').data('action', 'delete');
                    $('#examsTableSection').hide();
                    $('#examForm').show();
                    $('#cancelButton_exam').show();
                });

                $('#cancelButton_subject').click(function() {
                    $('#subjectForm').hide();
                    $('#subjectUpdateDeleteDiv').hide();
                    $('#subjectAddDiv').hide();
                    $('#subjectAddUpdateDiv').hide();
                    $('#subjectsTableSection').show();
                });

                $('#cancelButton_exam').click(function() {
                    $('#examForm').hide();
                    $('#step2_scheme').hide();
                    $('#step3_scheme').hide();
                    $('#step4_scheme').hide();
                    $('#step5_scheme').hide();
                    $('#examsTableSection').show();
                });

                $('#subjectForm').submit(function(e) {
                    e.preventDefault();
                    const action = $('#submitAction_subject').data('action');
                    const instituteID = $('#institute').val();
                    const branchID = $('#branch').val();
                    const schemeYear=$('#scheme_year').val();
                    let universitySubjects=null;
                    if(action=='add'){
                        universitySubjects=$('#university_subjects').val();
                    }
                    let subjects=null;
                    if(action=='update'||action=='delete'){
                        subjects=$('#subjects').val();
                    }
                    let type=null;
                    let exam=null;
                    let internal=null;
                    let external=null;
                    let passMarks=null;
                    let mode=null;
                    let kind=null;
                    let group=null;
                    let credits=null;
                    let syllabus=null;

                    if(action=='update'||action=='add'){
                        type=$('#type').val();
                        exam=$('#exam').val();
                        internal=$('#internal').val();
                        external=$('#external').val();
                        passMarks=$('#pass_marks').val();
                        mode=$('#mode').val();
                        kind=$('#kind').val();
                        group=$('#group').val();
                        credits=$('#credits').val();
                        syllabus=$('#syllabus').val();
                    }
                    
                    if (action == 'update') {
                        $.ajax({
                            url: 'update_subject_details.php',
                            method: 'POST',
                            data: {
                                instituteID: instituteID,
                                branchID: branchID,
                                schemeYear: schemeYear,
                                subjects: subjects,
                                type: type,
                                exam: exam,
                                internal: internal,
                                external: external,
                                passMarks: passMarks,
                                mode: mode,
                                kind: kind,
                                group: group,
                                credits: credits,
                                syllabus: syllabus
                            },
                            success: function(response) {
                                alert(response);
                                $('#subjectForm').hide();
                                $('#operation').trigger('change');
                                $('#subjectsTableSection').show();
                            }
                        });
                    }
                    if (action == 'add') {
                        $.ajax({
                            url: 'submit_subject_details.php',
                            method: 'POST',
                            data: {
                                instituteID: instituteID,
                                branchID: branchID,
                                schemeYear: schemeYear,
                                universitySubjects: universitySubjects,
                                type: type,
                                exam: exam,
                                internal: internal,
                                external: external,
                                passMarks: passMarks,
                                mode: mode,
                                kind: kind,
                                group: group,
                                credits: credits,
                                syllabus: syllabus
                            },
                            success: function(response) {
                                alert(response);
                                $('#subjectForm').hide();
                                $('#operation').trigger('change');
                                $('#subjectsTableSection').show();
                            }
                        });
                    }

                    if (action == 'delete') {
                        $.ajax({
                            url: 'delete_subject_details.php',
                            method: 'POST',
                            data: {
                                instituteID: instituteID,
                                branchID: branchID,
                                schemeYear: schemeYear,
                                subjects: subjects
                            },
                            success: function(response) {
                                alert(response);
                                $('#subjectForm').hide();
                                $('#operation').trigger('change');
                                $('#subjectsTableSection').show();
                            }
                        });
                    }

                });

                $('#examForm').submit(function(e) {
                    e.preventDefault();
                    const action = $('#submitAction_exam').data('action');
                    const instituteID = $('#institute').val();
                    const branchID = $('#branch').val();
                    const admissionYear = $('#admission_year').val();
                    const semesterNumber = $('#semester_number').val();
                    const schemeYear = $('#scheme_year_exam').val();
                    const subject = $('#subject').val();
                    let backlog=null;
                    let examDate=null;
                    if(action=='update'||action=='add'){
                        const backlog = $('#backlog').val();
                        const examDate = $('#exam_date').val();
                    }
                    
                    if (action == 'update') {
                        $.ajax({
                            url: 'update_exam_scheme.php',
                            method: 'POST',
                            data: {
                                instituteID: instituteID,
                                branchID: branchID,
                                admissionYear: admissionYear,
                                semesterNumber: semesterNumber,
                                schemeYear: schemeYear,
                                subject: subject,
                                backlog: backlog,
                                examDate: examDate
                            },
                            success: function(response) {
                                alert(response);
                                $('#examForm').hide();
                                $('#operation').trigger('change');
                                $('#examsTableSection').show();
                            }
                        });
                    }
                    if (action == 'add') {
                        $.ajax({
                            url: 'submit_exam_scheme.php',
                            method: 'POST',
                            data: {
                                instituteID: instituteID,
                                branchID: branchID,
                                admissionYear: admissionYear,
                                semesterNumber: semesterNumber,
                                schemeYear: schemeYear,
                                subject: subject,
                                backlog: backlog,
                                examDate: examDate
                            },
                            success: function(response) {
                                alert(response);
                                $('#examForm').hide();
                                $('#operation').trigger('change');
                                $('#examsTableSection').show();
                            }
                        });
                    }

                    if (action == 'delete') {
                        $.ajax({
                            url: 'delete_exam_details.php',
                            method: 'POST',
                            data: {
                                instituteID: instituteID,
                                branchID: branchID,
                                admissionYear: admissionYear,
                                semesterNumber: semesterNumber,
                                schemeYear: schemeYear,
                                subject: subject
                            },
                            success: function(response) {
                                alert(response);
                                $('#examForm').hide();
                                $('#operation').trigger('change');
                                $('#examsTableSection').show();
                            }
                        });
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
