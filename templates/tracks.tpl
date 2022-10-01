<div id="tracks">
    {foreach from=$tracks item=$track}
        <div class="file">
            <p>{$track->userName}</p>
            <p>{$track->name}</p>
            <img src="../images/file.png">
            <div>
                <p>{$track->genre}</p>
                <p>{$track->date}</p>
            </div>
            <audio controls src="" alt="" type="audio/wav"></audio>
        </div>
    {/foreach}
</div>