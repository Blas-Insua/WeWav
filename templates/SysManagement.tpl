<div id="sysManagement">
    {if $management=="tracks"}
        <table id="tracksManagement">
                <caption>Management > tracks</caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Genre</th>
                        <th>Date</th>
                        <th>Uploaded by</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$tracks item=$track}
                        <form id="track_{$track->id}" action="editFile/{$track->id}" method="post"></form>
                        <tr form="track_{$track->id}">
                            <td>{$track->name}</td>
                            <td>{$track->genre}</td>
                            <td>{$track->date}</td>
                            <td>{$track->userName}</td>
                            <td><a class="deleteFile" href="deleteFile/{$track->id}/" title="Delete track">del</a></td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>        
        
    {else if $management=="accounts"}
            <table id="accountsManagement">
                <caption>Management > accounts</caption>
                <thead>
                    <tr>
                        <th>Edit</th>
                        <th>Rol</th>
                        <th>Name</th>
                        <th>AKA</th>
                        <th>Country</th>
                        <th>Genre</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$accounts item=$profile}
                        <form id="profile_{$profile->name}" action="editProfile/{$profile->name}/admin/" method="post"></form>
                        <tr>
                            <td><input type="submit" form="profile_{$profile->name}" class="editFile" title="Edit profile"></input></td>
                            <td>
                                {if $profile->rol_id==0 || $profile->name==$session["name"]}
                                    <p>{$profile->rol}</p>
                                {else}
                                    <select name="user_rol" form="profile_{$profile->name}">
                                        {foreach from=$roles item=$user_rol}
                                            {if $user_rol->rol!='Guest'}
                                                <option value="{$user_rol->id}" {if $profile->rol_id==$user_rol->id}selected{/if}>
                                                    {$user_rol->rol}
                                                </option>
                                            {/if}
                                        {/foreach}
                                    </select> 
                                {/if}                        
                            </td> 
                            <td>{$profile->name}</td>
                            <td>{$profile->AKA}</td>
                            <td>{$profile->country}</td>
                            <td>{$profile->genre}</td>               
                            <td><a class="deleteFile" href="deleteProfile/{$profile->name}/admin/" title="Delete profile">del</a></td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>       
    {else}
        <form id="newGenre" action="newGenre" method="post">
            <fieldset>
                <legend>New genre</legend>
                <label for ="newGenreName">Name:</label>
                    <input type="text" name="name"></input>
                <button type="submit" class="yellowBox">Create</button>
            </fieldset>
        </form>
        <p>Management > genres</p>
        <div id="genresManagement">
            <p><span>Edit</span><span>ID</span><span>Name</span><span>Delete</span></p>
            <div class="genres">
                {foreach from=$genres item=$genre}
                    <form action="editGenre/{$genre->id}/" method="post">
                        <input type="submit" class="editFile" title="Edit genre"></input>
                        <p>{$genre->id}</p>
                        <input type="text" name="genre" placeholder="{$genre->genre}">
                        <a class="deleteFile" href="deleteGenre/{$genre->id}/" title="Delete genre">del</a>
                    </form>
                {/foreach}
            </div>
        </div>
    {/if}
</div>







