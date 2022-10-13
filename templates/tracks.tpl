<div id="tracksList">
    {foreach from=$tracks item=$track}
        <div class="file">
            <div class="fileTitle">
                <p><a href='about/{$track->userName}'>{$track->userName}</a></p>
                <p>{$track->name}</p>
            </div>
            
                {if $track->photo_dir!=null}<div class="filePhoto hidden"><img src="{$track->photo_dir}"></img></div>{else}<span></span>{/if}
            
            <div class="fileInfo hidden">
                {if $smarty.session.loggedin==true && $track->userName==$smarty.session.name}
                    <form action="editFile/{$track->id}" method="post">
                        <button type="submit" class="editFile" title="Edit track" name="editFile">edit</button>
                        <div class="trackForm">
                            <label for="name">Track name:</label>
                                <input type="text" name="name" value="{$track->name}" required></input><br>
                            <label for="genre">Genre:</label>
                                <select name="genre" required>
                                    {foreach from=$genres item=$genre}
                                        <option value="{$genre->id}" {if $track->genre_id==$genre->id}selected{/if}>{$genre->genre}</option>
                                    {/foreach}
                                </select><br>
                            <label for="date">Date:</label>
                                <input type="date" name="date" {if $track->date}value="{$track->date}"{/if}></input><br> 
                        </div>   
                        <a class="deleteFile" href="deleteFile/{$track->id}/" title="Delete track">del</a>                    
                    </form>                    
                {else}
                    <p>{$track->name}</p>
                    <p>Genre: <a href="genres/{$track->genre}/">{$track->genre}</a></p>
                    <p>Date: {$track->date}</p>
                {/if}
            </div>
            <audio controls src="" alt="" type="audio/wav"></audio>
        </div>
    {/foreach}
</div>