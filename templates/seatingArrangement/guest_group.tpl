{foreach $guestGroupedByGroup as $group}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a id="group_{$group@key}" data-toggle="collapse" data-parent="#catalog"
                   href="#collapse{$group@key}">{$groups[$group@key]}</a>
            </h4>
        </div>
        <div id="collapse{$group@key}" class="panel-collapse collapse"
             style="max-height: 250px;overflow-y:auto;direction: ltr">
            <div class="panel-body" style="direction: rtl">
                <ul class="list-unstyled">
                    {foreach $group as $guest}
                        <li class="item-catalog" {if $guest->table_id > 0 }style="display: none" {/if}
                            oid="{$guest->oid}" id="guest{$guest->oid}" firstName="{$guest->name}"
                            amount="{$guest->amount}"><span
                                    class="fa fa-arrows "></span> {$guest->name}
                            <b>({$guest->amount})</b></li>
                    {/foreach}
                </ul>
            </div>
        </div>
    </div>
{/foreach}
