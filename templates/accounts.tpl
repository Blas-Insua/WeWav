{foreach from=$accounts item=$account}
    <div class="userCard">
    <ul>
        <li><b>Name:</b> <a href="about/{$account->name}/">{$account->name}</a></li>            
        <li><b>AKA:</b> {$account->AKA}</li>    
        <li><b>Country:</b> {$account->country}</li>    
        <li><b>Genre:</b> <a href="genres/{$account->genre}/">{$account->genre}</a></li>   
    </ul>
    <img class="userLogo" src="images/profile_icons/default.png">
</div>
{/foreach}