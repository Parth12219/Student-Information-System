<?php

header('Content-Type: text/html; charset=utf-8');
?>

<div class="text-center">
    <h3 class="section-heading text-uppercase">Reset</h3>
    <h3 class="section-subheading text-muted">Account Retrieval.</h3>
</div>
<form id="forgotPasswordForm" class="custom-form">
    <div id="emailSection">
        <div class="input-group">
            <i class="fa-solid fa-envelope icon"></i>
            <input id="email" type="email" placeholder="Enter Your College Email ID*" name="email" required />
        </div>
        <div class="text-center"><button id="sendResetLinkButton" type="button">SEND RESET LINK</button></div>
    </div>
    <div id="newPasswordSection" style="display: none;">
        <div class="input-group">
            <i class="fa-solid fa-lock icon"></i>
            <input id="newPassword" type="password" placeholder="Enter New Password*" name="newPassword" required />
        </div>
        <div class="input-group">
            <i class="fa-solid fa-lock icon"></i>
            <input id="confirmPassword" type="password" placeholder="Confirm New Password*" name="confirmPassword" required />
        </div>
        <div class="text-center"><button id="submitNewPasswordButton" type="button">RESET PASSWORD</button></div>
    </div>
    <div id="additionalSection" class="text-center mt-3" style="display: none;">
        <p>Check your email for the reset link. If you don't receive an email within a few minutes, 
            please check your spam folder.</p>
        <p>If you need further assistance, please <a href="contact_support.php">contact support</a>.</p>
    </div>
    <div class="text-center mt-3">
        <p>Remembered your password? <a href="login.php">Login Here</a></p>
    </div>
</form>