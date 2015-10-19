    {foreach $tables as $table}
        {include file="seatingArrangement/table.tpl"}
    {/foreach}

{for $i=1 to 80}
    <div class="droppable table_small" style="height: 170px;float: left; position: static" ></div>
{/for}
