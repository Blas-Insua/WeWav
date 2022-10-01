<form id="signup-form" action="signupSubmit" method="post">
    <div class="signup-form">
        <fieldset class="user-data" >
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
            
                <div class="areArtist">
                    <label>Are you an artist?</label>
                        <select id="createUserisArtist" name="artist">
                            <option value="0">No</option>
                            <option value="1">Yes</option>									
                        </select>
                </div>
                <div class="createacc-artist">
                    <label id="createUserArtistType">What do you do?</label>
                        <label for="Producer"><input type="checkbox" name="artistType" value="Producer" id="Producer">Producer</label>
                        <label for="Beatmaker"><input type="checkbox" name="artistType" value="Beatmaker" id="Beatmaker">Beatmaker</label>
                        <label for="Singer"><input type="checkbox" name="artistType" value="Singer" id="Singer">Singer</label>
                        <label for="Musician"><input type="checkbox" name="artistType" value="Musician" id="Musician">Musician</label>
                    <div class="createUserArtistGenre">
                        <label for="createUserArtistGenre">What genre do you do?:</label>
                            <select id="createUserArtistGenre" name="genre">
                                {foreach from=$genres item=$genre}
                                    <option value="{$genre->id}">{$genre->genre}</option>
                                {/foreach}
                            </select>
                    </div>
                </div>
    
                <label for="createUserProfilePhoto">Profile photo:</label>
                    <input type="file" id="createUserProfilePhoto" name="createUserProfilePhoto"> 
                        <br>
    
                <input type="reset">
        </fieldset>


    </div>

    <div class="userCard">
        <table>
            <tr>
                <th>User name:</th>
                <td class="userCard-UserName"></td>
            </tr>
            <tr>
                <th>A.k.a:</th>
                <td class="userCard-aka"></td>
            </tr>
            <tr>
                <th>Type:</th>
                <td class="userCard-artist-type"></td>
            </tr>
            <tr>
                <th>Genre:</th>
                <td class="userCard-artist-genre"></td>
            </tr>
            <tr>
                <th>Country:</th>
                <td class="userCard-artist-country"></td>
            </tr>
        </table>
        <img class="userLogo">
    </div>

    <div class="captcha">
        <p id="Captcha"></p>
        <input type="button" id="reCaptcha" name="button"> 
    </div>
    
    <div class="submitdiv">
        <input type="text" id="captchaUser" name="captchaUser" placeholder="Enter the captcha"> 
        <input type="submit" id="index-submit" name="submitbutton" value="Signup" class="yellowBox"> 
    </div>
</form>