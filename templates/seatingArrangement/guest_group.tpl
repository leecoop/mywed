{foreach $guestGroupedByGroup as $group}
    <div class="panel panel-default {if $groupToAmount[$group@key]== 0}soft-hide{/if}" data-parent-group={$group@key}>
        <div class="panel-heading">
            <h4 class="panel-title">
                <a id="group_{$group@key}" data-toggle="collapse" data-parent="#catalog" href="#collapse{$group@key}">{$groups[$group@key]}
                    <span data-amount={$groupToAmount[$group@key]} class="badge">{$groupToAmount[$group@key]}</span>
                </a>
            </h4>
        </div>
        <div id="collapse{$group@key}" class="panel-collapse collapse">
            <div class="panel-body" style="direction: rtl">
                <ul class="list-unstyled" data-group={$group@key}>
                    {foreach $group as $guest}
                        <li class="item-catalog" {if $guest->table_id > 0 }style="display: none" {/if}
                            oid="{$guest->oid}" id="guest{$guest->oid}" firstName="{$guest->name}"
                            amount="{$guest->amount}"><span class="fa fa-arrows "></span> {$guest->name}
                            <b>({$guest->amount})</b></li>
                    {/foreach}
                </ul>
            </div>
        </div>
    </div>
{/foreach}
