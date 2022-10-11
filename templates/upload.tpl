<div id="uploadFileDIV">
    <form id="uploadFileForm" action="uploadFile" method="post" enctype="multipart/form-data">
        <fieldset><legend>File</legend><input type="file" name="file"></fieldset>
        <fieldset><legend>Name of track</legend><input type="text" id="uploadFileName" name="uploadFileName" required></fieldset>
        <fieldset><legend>Genre</legend>
            <select id="uploadFileGenre" name="uploadFileGenre" required >
                {foreach from=$genres item=$genre}
                    <option value="{$genre->id}" {if $genre->id=="0"}selected{/if}>{$genre->genre}</option>
                {/foreach}
            </select>
        </fieldset>
        <fieldset><legend>Date of creation</legend><input type="date" id="uploadFileDate" name="uploadFileDate" required></fieldset>

        <button class="yellowBox" id="uploadButton">Upload</button>
    </form>
</div>
