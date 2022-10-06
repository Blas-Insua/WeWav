<div id="genresDiv">
    {foreach from=$genres item=$genre}
        <a class="genre" href='genres/{$genre->genre}/'>{$genre->genre}</a>
    {/foreach}
</div>