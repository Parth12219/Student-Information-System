$(document).ready(function() {
    $('#submitButton').click(function(event) {
        event.preventDefault(); 
        var enr=$('#enr').val();
        if (!enr) {
            alert('Please fill in all fields.');
            return;
        }
        $.ajax({
            url: 'load_studentinfo.php',
            method: 'POST',
            data:{
                enr: enr
            },
            success: function(response) {
                $('#form-container').hide();
                $('#result').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Invalid Enrollment Number.', status, error);
            }
        });
    });
    $(document).on('click', '#AcademicButton', function(event) {
        event.preventDefault();
        var enr=$('#enr').val();
        $.ajax({
            url: 'load_academicrecords.php',
            method: 'POST',
            data:{
                enr: enr
            },
            success: function(response) {
                $('#result').hide();
                $('#academicrecords').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Cannot load academic records.', status, error);
            }
        });
    });
    $(document).on('click', '#backButton', function(event) {
        $('#result').html('');
        $('#academicrecords').html('');
        $('#form-container').show();
    });
});
