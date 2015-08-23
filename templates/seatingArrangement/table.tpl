{$currentAmount = 0}
<div class="col-xs-12 col-sm-6 col-lg-4" xmlns="http://www.w3.org/1999/html">

    <div class="panel panel-green" id="table{$table.oid}" oid="{$table.oid}" max="{$table.capacity}" title="{$table.title}" > {*style="width: 200px; float: right; margin: 5px; ; margin-bottom: 100px"*}
        <div class="panel-heading"><i class="fa fa-group fa-fw"></i> <span class="table_title">{$table.title}</span><i onclick="openEditTableModel('{$table.oid}')" class="fa fa-gear fa-fw pull-left cursor-pointer"></i></div>
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
            <span class="current_amount">{$currentAmount}</span>/<span class="max_amount">{$table.capacity}</span>
            <a style="float: left" onclick="deleteTable({$table.oid})" href="#">מחק</a>        </div>
    </div>
</div>