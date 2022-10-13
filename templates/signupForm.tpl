<div class="formContainer signup-form">
    <form id="profileForm" action="signupSubmit/" method="post" enctype="multipart/form-data">
        <fieldset id="name"><legend>User Name</legend><input type="text" id="createUserName" name="name" required></fieldset>
        <fieldset id="AKA"><legend>AKA</legend><input type="text" id="createUserAKA" name="AKA"></fieldset>
        <fieldset id="pass"><legend>Password</legend><input type="password" id="createUserPass" name="pass" required></fieldset>
        <fieldset id="passConfirm"><legend>Confirm password</legend><input type="password" id="createUserPassConfirm" name="passConfirm" required></fieldset>
        <fieldset id="country"><legend>Country</legend>
            <select id="createUserCountry" name="country">
                    {foreach from=$countries item=$country}
                        <option value="{$country->id}">{$country->country}</option>
                    {/foreach}
                </select>
        </fieldset>
        <fieldset id="genre"><legend>Genre</legend>
            <select id="createUserArtistGenre" name="genre">
                {foreach from=$genres item=$genre}
                    <option value="{$genre->id}">{$genre->genre}</option>
                {/foreach}
            </select>
        </fieldset>
        <fieldset id="userPhoto"><legend>Profile photo</legend><input type="file" id="userPhoto" name="profilePhoto">recommended 100x100px max 20mb</fieldset>
        <input id="reset" class="yellowBox" type="reset">

        {if $error}
            <div id="errorDIV">
                <p>{$error}</p>
            </div>
        {/if}

        {include file="captcha&submit.tpl" form="Signup"}
    </form>
</div>
