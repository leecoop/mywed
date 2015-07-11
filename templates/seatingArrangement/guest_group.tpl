{foreach $guestGroupedByGroup as $group}
    <h2><a href="#" id="group_{$group@key}">{$groups[$group@key]}</a></h2>
    <div style="max-height: 100px">
        <ul>
            {foreach $group as $guest}
                <li class="item-catalog" {if $guest->table_id > 0 }style="display: none" {/if} oid="{$guest->oid}" id="guest{$guest->oid}"
                    amount="{$guest->amount}">{$guest->name} {$guest->last_name} <b>({$guest->amount})</b></li>
            {/foreach}
        </ul>
    </div>
{/foreach}

{*{$counter = 0}*}
{*{foreach $guestGroupedByGroup as $group}*}
{*<div class="panel panel-default">*}
{*<div class="panel-heading">*}
{*<h4 class="panel-title">*}
{*<a data-toggle="collapse" data-parent="#catalog" href="#collapse{$counter}">{$groups[$group@key]}</a>*}
{*</h4>*}
{*</div>*}
{*<div id="collapse{$counter}" class="panel-collapse collapse {if $counter==0} in{/if}">*}
{*<div class="panel-body">*}
{*{foreach $group as $guest}*}
{*<li class="item-catalog" {if $guest->table_id > 0 }style="display: none" {/if} oid="{$guest->oid}" id="guest{$guest->oid}"*}
{*amount="{$guest->amount}">{$guest->name} {$guest->last_name} <b>({$guest->amount})</b></li>*}
{*{/foreach}*}
{*</div>*}

{*</div>*}
{*</div>*}
{*{$counter = $counter +1}*}
{*{/foreach}*}
