<ul class="nav nav-pills">
    {foreach $guestGroupedByGroup as $group}
        <li class="{if $groupToAmount[$group@key]== 0}hide{/if}" data-parent-group={$group@key}><a id="group_{$group@key}" data-toggle="tab" href="#{$group@key}">{$groups[$group@key]}
                <span data-amount={$groupToAmount[$group@key]} class="badge">{$groupToAmount[$group@key]}</span>
            </a></li>
    {/foreach}
</ul>
<div class="tab-content">
    {foreach $guestGroupedByGroup as $group}
        <div id="{$group@key}" class="tab-pane fade in" data-parent-group={$group@key}>
            <br/>
            <ul class="guestsArea horizontal-list" data-type="group">
                {foreach $group as $guest}
                    <li id="guest{$guest->oid}" {if $guest->table_id > 0 }style="display: none" {/if} class="seatingTableGuest" data-oid="{$guest->oid}"  data-amount="{$guest->amount}" data-group={$guest->group_id}>
                        {$guest->name} ({$guest->amount})
                        <i class="delete-guest-from-table fa" onclick="deleteGuestFromTable($(this).parent())"></i>

                    </li>
                {/foreach}
            </ul>
        </div>
    {/foreach}
</div>
