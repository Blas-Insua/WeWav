<form id="profileForm" action="loginSubmit" method="post">
    <fieldset class="user-data">
        <legend>Account Data</legend>
        
        <div class="login-form">	
            <label for="login-user">User or e-mail:</label><br>
                <input type="text" id="login-user" name="name" autocomplete="username" require><br>
            <label for="login-pass">Password:</label><br>
                <input type="password" id="login-pass" name="password" autocomplete="current-password" require> <br>				
        </div>
        <br>
        {include file="captcha&submit.tpl" form="Login"}
    </fieldset>
</form>