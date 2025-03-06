<?php
$enr=$_POST['enr'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Records</title>
    <link rel="stylesheet" href="styles_login.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/scripts_studentinfo.js"></script>
</head>
<body>
    <div class="container custom-form">
        <h1>Academic Records</h1>

        <label for="semester">Select Semester:</label>
        <select id="semester">
            <option value="all">Overall</option>
        </select>
        
        <table class="table table-striped" id="academic-records-table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Internal Marks</th>
                    <th>External Marks</th>
                    <th>Total Marks</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <div class="chart-container">
            <canvas id="performanceChart"></canvas>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let performanceChart = null;
            var enr = '<?php echo $enr; ?>';
            $.ajax({
                url: 'fetch_semesters_by_enrollment.php',
                method: 'POST',
                data:{
                    enrollment: enr
                },
                success: function(data) {
                    const semesters = JSON.parse(data);
                    $('#semester').empty();
                    $('#semester').append('<option value="all">Overall</option>');
                    for (let semester of semesters) {
                        $('#semester').append('<option value="' + semester.SemesterID + '">Semester ' + semester.Number + '</option>');
                    }
                }
            });
            $('#semester').change(function() {
                const selectedSemester = $(this).val();
                fetchAcademicRecords(selectedSemester);
            });

            fetchAcademicRecords('all');

            function fetchAcademicRecords(semester) {
                $.ajax({
                    url: 'fetch_academic_records.php',
                    method: 'POST',
                    data: { 
                        semester: semester,
                        enr: enr
                    },
                    success: function(data) {
                        $('#academic-records-table tbody').html('');
                        const records = JSON.parse(data);
                        let tableContent = '';
                        let subjects = [];
                        let totalMarks = [];
                        
                        records.forEach(function(record) {
                            tableContent += `
                                <tr>
                                    <td>${record.subject}</td>
                                    <td>${record.internal_marks}</td>
                                    <td>${record.external_marks}</td>
                                    <td>${record.total_marks}</td>
                                </tr>
                            `;
                            subjects.push(record.subject);
                            totalMarks.push(record.total_marks);
                        });

                        $('#academic-records-table tbody').html(tableContent);
                        updateChart(subjects, totalMarks);
                    }
                });
            }

            function updateChart(subjects, totalMarks) {
                if (performanceChart) {
                    performanceChart.destroy();
                }
                const ctx = document.getElementById('performanceChart').getContext('2d');
                performanceChart=new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: subjects,
                        datasets: [{
                            label: 'Total Marks',
                            data: totalMarks,
                            backgroundColor: 'rgba(255, 200, 0, 0.7)'
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    </script>
</body>