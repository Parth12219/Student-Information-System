async function hashPassword(password) {
    const msgUint8=new TextEncoder().encode(password);                    
    const hashBuffer=await crypto.subtle.digest('SHA-256',msgUint8);
    const hashArray=Array.from(new Uint8Array(hashBuffer));
    const hashHex=hashArray.map(byte=>('00'+byte.toString(16)).slice(-2)).join('');
    return hashHex;
}
$(document).ready(function() {
    $('#contactForm').on('submit', async function(event) {
        event.preventDefault();
        let salt = Math.floor(Math.random() * (9999999 - 1000000 + 1)) + 1000000;
        const $inpassword = $('#password');
        const password = $inpassword.val();
        const hashedPassword = await hashPassword(password);
        const saltnew = await hashPassword(salt.toString());
        $('#hidden').val(saltnew);
        const newpassword = hashedPassword + saltnew;
        const finalpassword = await hashPassword(newpassword);
        $inpassword.val(finalpassword);
        $(this).off('submit').submit();
    });
    $(document).on('click', '#submitSignupButton', async function(event) {
        event.preventDefault();

        var empid = $('#empid').val();
        var password = $('#signupPassword').val();
        var confirmPassword = $('#confirmSignupPassword').val();
        password= await hashPassword(password);
        confirmPassword = await hashPassword(confirmPassword);
        if (!empid || !password || !confirmPassword) {
            alert('Please fill in all fields.');
            return;
        }
        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            return;
        }

        $.ajax({
            url: 'process_signup.php', 
            method: 'POST',
            data: {
                empid: empid,
                password: password,
                confirmPassword: confirmPassword
            },
            success: function(response) {
                alert('Sign-up successful!');
                window.location.href = 'login.php'; 
            },
            error: function(xhr, status, error) {
                console.error('Sign-up failed:', status, error);
                alert('Sign-up failed. Please try again.');
            }
        });
    });

    $('#forgotPasswordLink').click(function(event) {
        event.preventDefault(); 
        $.ajax({
            url: 'forgot_password.php',
            method: 'GET',
            success: function(response) {
                $('#form-header').hide(); 
                $('#form-container').html(response); 
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
    });

    $('#signUpButton').click(function(event) {
        event.preventDefault(); 
        $.ajax({
            url: 'signup_form.php',
            method: 'GET',
            success: function(response) {
                $('#form-header').hide();
                $('#form-container').html(response); 
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
    });

    $(document).on('click', '#sendResetLinkButton', function(event) {
        event.preventDefault();

        var email = $('#email').val();

        if (email) {
            $.ajax({
                url: 'send_reset_link.php',
                method: 'POST',
                data: { email: email },
                success: function(response) {
                    if (response === 'success') {
                        alert('Reset link sent! Check your email.');

                        $('#emailSection').hide();
                        $('#newPasswordSection').show();
                    } else {
                        alert('Error sending reset link.');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                    alert('Error sending reset link.');
                }
            });
        } else {
            alert('Email is required.');
        }
    });
});
