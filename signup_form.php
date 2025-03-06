<?php
header('Content-Type: text/html; charset=utf-8');
?>
<div class="text-center">
    <h3 class="section-heading text-uppercase">Sign Up</h3>
    <h3 class="section-subheading text-muted">Create a new account.</h3>
</div>
<form id="signupForm" class="custom-form">
    <div class="input-group">
        <i class="fa-solid fa-envelope icon"></i>
        <input id="empid" type="number" placeholder="Enter Your College Employee ID*" name="empid" required />
    </div>
    <div class="input-group">
        <i class="fa-solid fa-lock icon"></i>
        <input id="signupPassword" type="password" placeholder="Enter Your Password*" name="password" required />
    </div>
    <div class="input-group">
        <i class="fa-solid fa-lock icon"></i>
        <input id="confirmSignupPassword" type="password" placeholder="Confirm Your Password*" name="confirmPassword" required />
    </div>
    <div class="text-center"><button id="submitSignupButton" type="button">SIGN UP</button></div>
    <div class="text-center mt-3">
        <p>Already have an account? <a href="login.php">Login Here</a></p>
    </div>
</form>