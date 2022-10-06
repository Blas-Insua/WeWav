<form id="uploadFileForm" action="uploadFile" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>File Data</legend>
            <input type="file" name="file"></label><br>

        <label>Name of track:</label>
            <input type="text" id="uploadFileName" name="uploadFileName" required><br>

        <label>Genre:</label>
            <select id="uploadFileGenre" name="uploadFileGenre" required >
                {foreach from=$genres item=$genre}
                    <option value="{$genre->id}" {if $genre->id=="0"}selected{/if}>{$genre->genre}</option>
                {/foreach}
            </select><br>

        <label>Date of creation:</label>
            <input type="date" id="uploadFileDate" name="uploadFileDate" required><br>

        <button class="yellowBox" id="uploadButton">Upload</button>
    </fieldset>
</form>