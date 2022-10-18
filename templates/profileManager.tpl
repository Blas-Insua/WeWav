<div id="accountManager">
    <ul>
        <li class="profileManager {if $setting=="general" || $setting==null}active{/if}"><a href="account/{$profile->name}/settings/general/">General</a></li>
        <li class="profileManager {if $setting=="profilePhoto"}active{/if}"><a href="account/{$profile->name}/settings/profilePhoto/">Profile photo</a></li>
        <li class="profileManager {if $setting=="security"}active{/if}"><a href="account/{$profile->name}/settings/security/">Security</a></li>
        <li class="profileManager {if $setting=="delete"}active{/if}"><a href="account/{$profile->name}/settings/delete/">Delete</a></li>
    </ul> 
    <div class="formContainer"> 
        {if $setting=="general" || $setting==null}
            <form id="profileForm" action="editProfile/{$profile->name}/owner/" method="post" class="editProfileGeneral">
                <fieldset id="name" for="name"><legend>User name</legend><input type="text" name="name"></fieldset>
                <fieldset id="AKA" for="AKA"><legend>A.k.a</legend><input type="text" name="AKA"></fieldset>    
                <fieldset id="password" for="password"><legend>Password</legend><input type="password" name="password"></fieldset>    
                <fieldset id="country" for="country"><legend>Country</legend>
                    <select name="country" >
                        {foreach from=$countries item=$country}
                            <option value="{$country->id}">{$country->country}</option>
                        {/foreach}
                    </select>
                </fieldset>    
                <fieldset id="genre" for="genre"><legend>Genre</legend>
                    <select name="genre">
                        {foreach from=$genres item=$genre}
                            <option value="{$genre->id}">{$genre->genre}</option>
                        {/foreach}
                    </select>                
                </fieldset>    
                <input id="reset" type="reset" value="Reset" class="yellowBox">
            </form> 
        {else}
            {if $setting=="profilePhoto"}
                <form id="profileForm" action="editProfile/{$profile->name}/owner/" method="post" class="editProfilePhoto" enctype="multipart/form-data">   
                    <fieldset id="userPhoto" for="userPhoto"><legend>Profile photo</legend>
                        <input type="file" name="profilePhoto">
                        <a href="account/{$profile->name}/settings/profilePhoto/delete/">Delete</a>
                    </fieldset>    
                </form> 
            {else}
                {if $setting=="security"}
                    <form id="profileForm" action="editProfile/{$profile->name}/owner/" method="post" class="editProfileSecurity">
                        <fieldset id="password" for="password"><legend>Old password</legend>
                            <input type="password" name="password" required> 
                        </fieldset> 
                        <fieldset id="passwordNew" for="passwordNew"><legend>New password</legend>
                            <input type="password" name="passwordNew" required> 
                        </fieldset> 
                        <fieldset id="passwordConfirm" for="passwordConfirm"><legend>Confirm new password</legend>
                            <input type="password" name="passwordConfirm" required> 
                        </fieldset>                           
                    </form>
                {else}
                    {if $setting=="delete"}
                    <form id="profileForm" action="deleteProfile/{$profile->name}/owner/" method="post" class="editProfileDelete">
                        <fieldset id="password" for="password"><legend>Enter your password</legend>
                            <input type="password" name="password" required> 
                        </fieldset>                 
                    </form>  
                    {/if}
                {/if}
            {/if}
        {/if}
        {if $error}
            <div id="errorDIV">
                <p>{$error}</p>
            </div>
        {/if}
        
        {include file="captcha&submit.tpl" form="Submit"}
    </div>
</div>