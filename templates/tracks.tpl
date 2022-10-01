{include file="header.tpl"} 

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

{include file="footer.tpl"} 