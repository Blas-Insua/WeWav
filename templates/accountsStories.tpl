<div id="userStories">

    {foreach from=$accounts item=$account}
        <a href='about/{$account->name}/'><img class="userLogo" src="{if $account->artist==null}./images/profile_photos/default.png{else}{$account->artist}{/if}"></img></a>
    {/foreach}
    {foreach from=$accounts item=$account}
        <a href='about/{$account->name}/'><img class="userLogo" src="{if $account->artist==null}./images/profile_photos/default.png{else}{$account->artist}{/if}"></img></a>
    {/foreach}
    {foreach from=$accounts item=$account}
        <a href='about/{$account->name}/'><img class="userLogo" src="{if $account->artist==null}./images/profile_photos/default.png{else}{$account->artist}{/if}"></img></a>
    {/foreach}

</div>
