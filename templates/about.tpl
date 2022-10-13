<div class="account">
    <div class="userCard">
        <ul>
            <li><b>Name:</b> <a href='about/{$account->name}/'>{$account->name}</a></li>            
            <li><b>AKA:</b> {$account->AKA}</li>    
            <li><b>Country:</b> {$account->country}</li>    
            <li><b>Genre:</b> {$account->genre}</li> 
        </ul>
    <div>
        <div class="userLogo">
            <img src="{if $account->photo_dir==null}./images/profile_photos/default.png{else}{$account->photo_dir}{/if}"></img>
        </div>
    </div>
                    
                
    </div>
    {if $smarty.session.loggedin==true && $account->name==$smarty.session.name}
        <a id="profileManagement" href="account/{$account->name}/settings/">profile</a>
    {/if}
</div>

{include file="tracks.tpl"} 
