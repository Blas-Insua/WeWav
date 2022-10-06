<div id="tracksList">
    {foreach from=$tracks item=$track}
        <div class="file">
            <div class="fileTitle">
                <p><a href='about/{$track->userName}'>{$track->userName}</a></p>
                <p>{$track->name}</p>
            </div>
            <img src="images/file.png" class="filePhoto hidden">
            <div class="fileInfo hidden">
                {if $track->userName==$session["name"]}
                    <form action="editFile/{$track->id}" method="post">
                        <button type="submit" class="editFile" title="Edit track">edit</button>
                        <div class="trackForm">
                            <label for="name">Track name:</label>
                                <input type="text" name="name" value="{$track->name}" required></input><br>
                            <label for="genre">Genre:</label>
                                <select name="genre" value="{$track->genre}" required>
                                    {foreach from=$genres item=$genre}
                                        <option value="{$genre->id}">{$genre->genre}</option>
                                    {/foreach}
                                </select><br>
                            <label for="date">Date:</label>
                                <input type="date" name="date" value="{$track->date}" required></input><br> 
                        </div>   
                        <a class="deleteFile" href="deleteFile/{$track->id}/" title="Delete track">del</a>                    
                    </form>                    
                {else}
                    <p>{$track->name}</p>
                    <p>Genre: {$track->genre}</p>
                    <p>Date: {$track->date}</p>
                {/if}
            </div>
            <audio controls src="" alt="" type="audio/wav"></audio>
        </div>
    {/foreach}
</div>