{include file="header.tpl"} 

{foreach from=$accounts item=$account}
    <div class="userCard">
        <ul>
            <li><b>Name:</b> <a href='about/{$account->name}'>{$account->name}</a></li>            
            <li><b>AKA:</b> {$account->AKA}</li>    
            <li><b>Country:</b> {$account->country}</li>    
            <li><b>Genre:</b> {$account->genre}</li> 
        </ul>
        <img class="userLogo" src="../images/Logo.png">
    </div>
    <div id="tracksList">
    {foreach from=$tracks item=$track}
        <div class="file">
            <p><a href='about/{$track->userName}'>{$track->userName}</a></p>
            <p class="fileName">{$track->name}</p>
            <img src="../images/file.png">
            <div class="fileInfo hidden">
                <p>{$track->name}</p>
                <p>Genre: {$track->genre}</p>
                <p>Creation:{$track->date}</p>
            </div>
            <audio controls src="" alt="" type="audio/wav"></audio>
        </div>
    {/foreach}
</div>
{/foreach}

{include file="footer.tpl"} 
