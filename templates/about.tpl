<div class="account">
    <div class="userCard">
        <ul>
            <li><b>Name:</b> <a href='about/{$account->name}/'>{$account->name}</a></li>            
            <li><b>AKA:</b> {$account->AKA}</li>    
            <li><b>Country:</b> {$account->country}</li>    
            <li><b>Genre:</b> {$account->genre}</li> 
        </ul>
        <img class="userLogo" src="images/profile_icons/default.png">
    </div>
    {if $account->name==$session["name"]}
        <a id="profileManagement" href="account/{$account->name}/">profile</a>
    {/if}
</div>
<div id="tracksList">        
    {include file="tracks.tpl"} 
</div>
