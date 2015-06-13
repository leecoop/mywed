<div id="table{$table.oid}" oid="{$table.oid}" class="seating_table" style="padding: 5px;float: right;">
    <h1 class="ui-widget-header" style="font-size: small">{$table.title}</h1>
    {$currentAmount = 0}
    <div class="ui-widget-content" style="height: 270px;width: 140px">
        <ol>
            {if isset($guestGroupedByTable) and isset($guestGroupedByTable[$table.oid])}
                {foreach $guestGroupedByTable[$table.oid] as $guest}
                    <li oid="{$guest->oid}" amount="{$guest->amount}">{$guest->name} {$guest->last_name} ({$guest->amount})</li>
                    {$currentAmount = $currentAmount + $guest->amount}
                {/foreach}

            {else}
                <li class="placeholder">Add your items here</li>
            {/if}

        </ol>
    </div>
    <div class="ui-widget-header" style="font-size: small"><span class="current_amount">{$currentAmount}</span>/{$table.capacity}</div>

</div>