
<?php
if(isset($_GET['login'])){
    echo "<main class=\"login-content\" id =\"login-page\">";
?>

    <div class="inner-content" id="login">
        <img src="../images/login_bg.png" alt="" class="image">
        <div class="form-con">
            <div class="login-info">
                <h1>Login</h1>
                <p>Log in now to innovate and organize with ease. Let's launch your success together!</p>
            </div>
           <div class="email-form">
                <label for="email">Email</label>
                <input type="email" placeholder="enter your email" id="user">
                <small class="">required</small>
           </div>
            <div class="pass-form">
                <label for="password">Password</label>
                <input type="password" placeholder="enter your password" id="pass">
                <small class="">required</small>
            </div>

            <div class="forgot-form">
                <a href="">forgot password?</a>
            </div>
           <div class="btn-form">
                <button type="button" id="log-btn">Log in</button>
           </div>
           <div class="dont-form">
                <p>Don’t have an account? <a id="gotoSign">Sign Up</a></p>
           </div>
        </div>
    </div>

<?php
    echo "</main>";
}

?>

