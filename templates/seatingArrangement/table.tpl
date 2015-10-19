{$currentAmount = 0}
<div class="draggable col-xs-6 col-sm-4 col-md-4 col-lg-3 table_small" style="position:absolute;top:{$table.top_position}%;left:{$table.left_position}%;padding-right: 0;padding-left: 0" data-opened="0" data-table="{$table.oid}" data-left="{$table.left_position}%" data-top="{$table.top_position}%">
    <div class="panel panel-green" id="table{$table.oid}" data-oid="{$table.oid}"> {*style="width: 200px; float: right; margin: 5px; ; margin-bottom: 100px"*}
        <div class="panel-heading" style="position: relative"><div class="table_title">{$table.title}</div>
            <span class="zoom-icon glyphicon  pull-left cursor-pointer" onclick="openTable('{$table.oid}')"></span>
        </div>
        <div class="panel-body">
        <ul class="guestsArea" data-type="table" data-table-oid="{$table.oid}">
            {if isset($guestGroupedByTable) and isset($guestGroupedByTable[$table.oid])}

                {foreach $guestGroupedByTable[$table.oid] as $guest}
                    {include file="seatingArrangement/guest_in_table.tpl"}
                    {$currentAmount = $currentAmount + $guest->amount}
                {/foreach}

            {else}
                <li class="placeholder">גרור מוזמנים לכאן
                        <i class="fa fa-arrow-circle-down"></i>
                </li>
            {/if}
        </ul>

    </div>
    <div class="panel-footer" style="position: relative">
        <span class="current_amount">{$currentAmount}</span>/<span class="max_amount">{$table.capacity}</span>
        <i style="left:0; position: absolute; top: 1px;" onclick="openEditTableModel('{$table.oid}')" class="fa fa-gear fa-fw pull-left cursor-pointer"></i>
    </div>
</div>
</div>

