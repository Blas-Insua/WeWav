<div id="usersList">
    {foreach from=$accounts item=$account}
        <div class="userCard">
        <ul>
            <li><b>Name:</b> <a href="about/{$account->name}/">{$account->name}</a></li>            
            <li><b>AKA:</b> {$account->AKA}</li>    
            <li><b>Country:</b> {$account->country}</li>    
            <li><b>Genre:</b> <a href="genres/{$account->genre}/">{$account->genre}</a></li>   
        </ul>
        <div class="userLogo">
            <img src="{if $account->photo_dir==null}./images/profile_photos/default.png{else}{$account->photo_dir}{/if}"></img>
        </div>
    </div>
    {/foreach}
</div>    