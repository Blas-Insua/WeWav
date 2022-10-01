<form id="login-form" action="loginSubmit" method="post">
    <fieldset>
        <legend>Account Data</legend>
        
        <div class="login-form">	
            <label for="login-user">User or e-mail:</label><br>
                <input type="text" id="login-user" name="name" autocomplete="username" require><br>
            <label for="login-pass">Password:</label><br>
                <input type="password" id="login-pass" name="password" autocomplete="current-password" require> <br>				
        </div>
    </fieldset>

    <div class="captchaDIV">
        
        <input type="button" class="reCaptcha" name="button"> 
    </div>

    <div class="submitdiv">
        <input type="text" class="captchaUser" name="captchaUser" placeholder="Enter the captcha"> 
        <input type="submit" class="indexSubmit yellowBox" name="loginSubmit" value="Login" > 
    </div>
</form>