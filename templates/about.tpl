<div class="account">
    <div class="userCard">
        <ul>
            <li><b>Name:</b> <a href='about/{$account->name}/'>{$account->name}</a></li>            
            <li><b>AKA:</b> {$account->AKA}</li>    
            <li><b>Country:</b> {$account->country}</li>    
            <li><b>Genre:</b> {$account->genre}</li> 
        </ul>
    <div>
        <details><summary></summary>
        <ul>
            <li>Edit profile photo</li>
            <li>Delete profile photo</li>
        </ul>
        </details>
        <img class="userLogo" src="{if $account->artist==null}./images/profile_photos/default.png{else}{$account->artist}{/if}"></img>
    </div>
                    
                
    </div>
    {if $smarty.session.loggedin==true && $account->name==$smarty.session.name}
        <a id="profileManagement" href="account/{$account->name}/">profile</a>
    {/if}
</div>
<div id="tracksList">        
    {include file="tracks.tpl"} 
</div>
