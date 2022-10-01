{include file="header.tpl"}

<div id="uploadDIV">    
    <h1>Upload</h1>
    <form id="uploadFileForm" action="uploadFile" method="post" enctype="multipart/form-data">
        <fieldset id="uploadFileFormDIV">
            <legend>File Data</legend>
                <input type="file" name=""></label><br>

            <label>Name of track:</label>
                <input type="text" id="uploadFileName" name="uploadFileName" required><br>

            <label>Genre:</label>
                <input type="text" id="uploadFileGenre" name="uploadFileGenre" required><br>

            <label>Date of creation:</label>
                <input type="date" id="uploadFileDate" name="uploadFileDate" required><br>

            <button class="yellowBox" id="uploadButton">Upload</button>
        </fieldset>
    </form>    
</div>   