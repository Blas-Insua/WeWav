<div class="formContainer login-form">	
    <form id="profileForm" class="user-data" action="loginSubmit/" method="post">
    <fieldset><legend>User or AKA</legend><input type="text" id="login-user" name="name" autocomplete="username" require>
    </fieldset>
    <fieldset><legend>Password</legend><input type="password" id="login-pass" name="password" autocomplete="current-password" require>
    </fieldset>

    {if $error}
        <div id="errorDIV">
            <p>{$error}</p>
        </div>
    {/if}

    {include file="captcha&submit.tpl" form="Login"}

    </form>
</div>
