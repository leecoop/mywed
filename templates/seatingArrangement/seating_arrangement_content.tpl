<style>
    h1 { padding: .2em; margin: 0; }
</style>

<div>
<div id="products">
    <h1 class="ui-widget-header">מוזמנים</h1>
    <div id="catalog" >

        {foreach $guestGroupedByGroup as $group}
            <h2 ><a href="#" id="group_{$group@key}">{$groups[$group@key]}</a></h2>
            <div style="max-height: 100px">
                <ul>
                    {foreach $group as $guest}
                    <li {if $guest->table_id > 0 }style="display: none" {/if} oid="{$guest->oid}" id="guest{$guest->oid}" amount="{$guest->amount}">{$guest->name} {$guest->last_name} <b>({$guest->amount})</b></li>
                    {/foreach}
                </ul>
            </div>

        {/foreach}

    </div>
</div>

{include file="seatingArrangement/tables.tpl"}
</div>
<script>
    initSeatingArrangement();
</script>