{$currentAmount = 0}
<div class="panel panel-green" id="table{$table.oid}" oid="{$table.oid}" max="{$table.capacity}" style="margin: 10px;float: right;">
    <div class="panel-heading"> {$table.title} </div>
    <div class="panel-body" style="height: 240px;width: 140px;padding: 0 7px">
        <ol>
            {if isset($guestGroupedByTable) and isset($guestGroupedByTable[$table.oid])}
                {foreach $guestGroupedByTable[$table.oid] as $guest}
                    <li oid="{$guest->oid}" amount="{$guest->amount}">{$guest->name} {$guest->last_name} ({$guest->amount})
                        <a onclick="removeGuestFromTable({$guest->oid},{$table.oid});" class="removeIconSmall"></a>
                    </li>
                    {$currentAmount = $currentAmount + $guest->amount}
                {/foreach}

            {else}
                <li class="placeholder">Add your items here</li>
            {/if}

        </ol>
    </div>
    <div class="panel-footer">
        <span class="current_amount">{$currentAmount}</span>/{$table.capacity}<a style="float: left" onclick="deleteTable({$table.oid})" href="#">מחק</a>
    </div>
</div>
