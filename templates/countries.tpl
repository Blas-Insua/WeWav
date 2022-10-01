<select id="createUserCountry" name="country">
    {foreach from=$countries item=$country}
        <option value="{$country->id}">{$country->country}</option>
    {/foreach}
</select>

