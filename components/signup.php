
<?php
if(isset($_GET['signup'])){
    echo "
    <main class=\"login-content\" id =\"signup-page\">
    ";
?>

    <div class="inner-content" id="signup">
        <img src="../images/signup_bg.png" alt="" class="image">

                <div class="form-con">
                    <div class="login-info">
                        <h1>Signup</h1>
                        <p>Sign up now to innovate and organize with ease. Let's launch your success together!</p>
                    </div>
                    <div class="scroll">
                        <div class="form">
                            <label for="email">Username</label>
                            <input type="text" placeholder="enter your username" id="suser" value="">
                            <small id="suserindic">required</small>
                        </div>

                        <div class="email-form">
                            <label for="email">Email</label>
                            <input type="email" placeholder="enter your email" id="semail" value="">
                            <small id="semailindic">required</small>
                        </div>

                        <div class="form">
                            <label for="password">Password</label>
                            <input type="password" placeholder="enter your password" id="spass" value="">
                            <small id="spassindic">required</small>
                        </div>
                        <div class="pass-form">
                            <label for="password">Confirm Password</label>
                            <input type="password" placeholder="confirm your password" id="scpass" value="">
                            <small id="scpassindic">required</small>
                        </div>

                    </div>

                    <div class="btn-form">
                            <button type="submit" id="sbtn">Sign up</button>
                    </div>
                <div class="dont-form">
                        <p>Already have an account? <a id="gotoLog">Log in</a></p>
                </div>
            </div>
    </div>
</form>
<?php
    echo "</main>";
}

?>

