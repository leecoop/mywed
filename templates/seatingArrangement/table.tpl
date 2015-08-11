{$currentAmount = 0}
<div class="col-lg-4">

    <div class="panel panel-green" id="table{$table.oid}" oid="{$table.oid}" max="{$table.capacity}" title="{$table.title}" > {*style="width: 200px; float: right; margin: 5px; ; margin-bottom: 100px"*}
        <div class="panel-heading"><i class="fa fa-group fa-fw"></i> {$table.title} <i onclick="openEditTableModel('{$table.oid}')" class="fa fa-gear fa-fw pull-left cursor-pointer"></i></div>
        <div class="panel-body" style="height: 290px;padding: 0 7px;">
            <ol>
                {if isset($guestGroupedByTable) and isset($guestGroupedByTable[$table.oid])}
                    {foreach $guestGroupedByTable[$table.oid] as $guest}
                        {include file="seatingArrangement/guest_in_table.tpl"}

                        {$currentAmount = $currentAmount + $guest->amount}
                    {/foreach}

                {else}
                    <li style="padding-top: 50%" class="placeholder text-center">גרור מוזמנים לכאן
                    <br/><h2 class="fa fa-arrow-circle-down"></h2>
                    </li>
                {/if}

            </ol>
        </div>
        <div class="panel-footer">
            <span class="current_amount">{$currentAmount}</span>/{$table.capacity}<a style="float: left" onclick="deleteTable({$table.oid})" href="#">מחק</a>
        </div>
    </div>
</div>