<div class="loginSignup_modal_con flexc">


    <div class="login_modal_wrap">
        <div class="loginSignup_modal_closeBtn flexc"><i class="fal fa-times"></i></div>
        <h2 class="login_modal_title">Login to continue</h2>
        <p class="login_modal_error"></p>
        <form class="login_modal_form" autocomplete="off">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="login_submit" type="Submit">Login</button>
        </form>
        <div style="text-align:center"><a href="reset_password.php" class="forgot_pass">Forgot your pasword?</a></div>
        <div class="member_loginSignup" style="text-align:center">Not a member yet? <span class="signupM_toggle_btn" style="color:var(--themec)">Signup Now</span></div>
    </div>

    <div class="signup_modal_wrap">
        <div class="loginSignup_modal_closeBtn flexc"><i class="fal fa-times"></i></div>
        <h2 class="signup_modal_title">Signup</h2>
        <p class="signup_modal_error"></p>
        <form class="signup_modal_form" autocomplete="off">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" placeholder="Password" id="o_pass" required>
            <input type="password" name="password" placeholder="Confirm Password" id="c_pass" required>
            <button class="signup_submit" type="Submit">Create your account</button>
        </form>
        <div class="member_loginSignup" style="text-align:center">Are you a member? <span class="loginM_toggle_btn" style="color:var(--themec)">Login Now</span></div>
    </div>
</div>
