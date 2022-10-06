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
                        <form id="profile_{$profile->id}" action="editProfile/{$profile->id}" method="post"></form>
                        <tr>
                            <td><input type="submit" form="profile_{$profile->id}" class="editFile" title="Edit profile"></input></td>
                            <td>
                                {if $profile->rol_id==0 || $profile->name==$session["name"]}
                                    <p>{$profile->rol}</p>
                                {else}
                                    <select name="user_rol" form="profile_{$profile->id}">
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
                            <td><a class="deleteFile" href="deleteProfile/{$profile->id}/" title="Delete profile">del</a></td>
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
        <form action="editGenre/" method="post">
            <table id="genresManagement">
                <caption>Management > genres</caption>
                <thead>
                    <tr>
                        <th>Edit</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$genres item=$genre}
                        <tr>
                            <td><button class="editFile" href="editGenre/{$genre->id}/" title="Edit genre">edit</but></td>
                            <td>{$genre->id}</td>
                            <td><input type="text" value="{$genre->genre}"></td>
                            <td><a class="deleteFile" href="deleteGenre/{$genre->id}/" title="Delete genre">del</a></td>
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </form>
    {/if}
</div>







