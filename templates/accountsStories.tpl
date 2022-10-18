<div id="userStories" class="userLogo">

    {foreach from=$accounts item=$account}
        <a href='about/{$account->name}/' title="{$account->name}"><img src="{if $account->photo_dir==null}./images/profile_photos/default.png{else}{$account->photo_dir}{/if}"></img></a>
    {/foreach}
    {foreach from=$accounts item=$account}
        <a href='about/{$account->name}/' title="{$account->name}"><img src="{if $account->photo_dir==null}./images/profile_photos/default.png{else}{$account->photo_dir}{/if}"></img></a>
    {/foreach}

</div>
