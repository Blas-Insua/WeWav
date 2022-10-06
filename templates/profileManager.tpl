<div id="accountManager">
    <ul>
        <li class="profileManager {if $setting=="general" || $setting==null}active{/if}"><a href="accountSettings/general">General</a></li>
        <li class="profileManager {if $setting=="security"}active{/if}"><a href="accountSettings/security">Security</a></li>
        <li class="profileManager {if $setting=="delete"}active{/if}"><a href="accountSettings/delete">Delete</a></li>
    </ul> 
    <div class="formContainer"> 
        {if $setting=="general" || $setting==null}
            <form id="profileForm" action="editProfile/{$profile->id}" method="post" class="editProfileGeneral">
                <label for="name">User name:</label>
                    <input type="text" name="name" required value="{$profile->name}">
                <label for="AKA">A.k.a:</label>
                    <input type="text" name="AKA" value="{$profile->AKA}">                        
                <label for="password">Password:</label>
                    <input type="password" name="password" required> 
                <label for="country">Country</label>      
                    <select name="country" >
                        {foreach from=$countries item=$country}
                            <option value="{$country->id}" {if $country->id==$profile->country_id}selected{/if}>{$country->country}</option>
                        {/foreach}
                    </select>
                <label for="genre">What genre do you do?:</label>
                    <select name="genre">
                        {foreach from=$genres item=$genre}
                            <option value="{$genre->id}" {if $genre->id==$profile->genre_id}selected{/if}>{$genre->genre}</option>
                        {/foreach}
                    </select>
                <label for="userPhoto">Profile photo:</label>
                    <input type="file" name="userPhoto">
                <input type="reset" value="Reset"><br>
            </form> 
        {else}
            {if $setting=="security"}
            <form id="profileForm" action="editProfile/{$profile->id}" method="post" class="editProfileSecurity">
                <label for="password">Old password:</label>
                    <input type="password" name="password" required> 
                        
                <label for="passwordNew">New password:</label>
                    <input type="password" name="passwordNew" required> 
                                    
                <label for="passwordConfirm">Confirm new password:</label>
                    <input type="password" name="passwordConfirm" required><br>        
            </form>
            {else}
                {if $setting=="delete"}
                <form id="profileForm" action="deleteProfile/{$profile->id}" method="post" class="editProfileDelete">
                    <label for="password">Enter your password:</label>
                        <input type="password" name="password" required><br>
                </form>  
                {/if}
            {/if}
        {/if}
        
        {include file="captcha&submit.tpl" form="Submit"}
    </div>
</div>