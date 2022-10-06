<form id="profileForm" action="signupSubmit" method="post">
    <fieldset class="user-data">
        <legend>Account Data</legend>

        <label for="createUserName">User name:</label>
            <input type="text" id="createUserName" name="name" required>
                <br>
        <label for="createUserAKA">A.k.a:</label>
            <input type="text" id="createUserAKA" name="AKA">
                <br>
        <label for="createUserPass">Password:</label>
            <input type="password" id="createUserPass" name="pass" required> 
                <br>
        <label for="createUserPassConfirm">Confirm password:</label>
                <input type="password" id="createUserPassConfirm" name="passConfirm" required> 
                    <br>
        <label for="createUserCountry">Country</label>      
            <select id="createUserCountry" name="country">
                {foreach from=$countries item=$country}
                    <option value="{$country->id}">{$country->country}</option>
                {/foreach}
            </select>
                <br>
        <label>Are you an artist?</label>
            <select id="createUserisArtist" name="artist">
                <option value="0">No</option>
                <option value="1">Yes</option>									
            </select>
                <br>
        <label for="createUserArtistGenre">What genre do you do?:</label>
            <select id="createUserArtistGenre" name="genre">
                {foreach from=$genres item=$genre}
                    <option value="{$genre->id}">{$genre->genre}</option>
                {/foreach}
            </select>
                <br>
        <label for="createUserProfilePhoto">Profile photo:</label>
            <input type="file" id="createUserProfilePhoto" name="createUserProfilePhoto"> 
                <br>
        <input type="reset"><br>

        {include file="captcha&submit.tpl" form="Signup"}
    </fieldset>
</form>