<div class="panel panel-yellow">
    <div class="panel-heading">
    <i class="fa fa-tasks fa-fw"></i>
        סטאטוס שולחנות
    </div>
    <div class="panel-body">
        <ul style="list-style: none; padding-right: 0">
            {foreach $tables as $table}
                {$leftSeats= $table.capacity - $templateUtils->getTableSeatsTaken($table.oid,$tableSeatsTakenAmount)}
                <li>
                    <div id="table{$table.oid}" data-table-id="{$table.oid}" data-table-capacity="{$table.capacity}" data-expected-taken-seats="{if $table.expected}{$table.expected}{else}0{/if}">
                        <p>
                            <strong>{$table.title}</strong>
                            <span class="pull-left text-muted"><span data-type="free-seats">{$leftSeats}</span> מקומות פנויים</span>
                        </p>

                        <div class="progress" style="margin-bottom: 8px">
                            <div class="progress-bar progress-bar-{if $leftSeats<0}danger{else}success{/if}" role="progressbar" aria-valuenow="{$templateUtils->getTableSeatsTaken($table.oid,$tableSeatsTakenAmount)}"
                                 aria-valuemin="0"
                                 aria-valuemax="{$table.capacity}" style="width: {$templateUtils->calcPercent($templateUtils->getTableSeatsTaken($table.oid,$tableSeatsTakenAmount),$table.capacity, true) }%">
                                <span class="text-center"><span class="taken-seats">{$templateUtils->getTableSeatsTaken($table.oid,$tableSeatsTakenAmount)}</span>/{$table.capacity}</span>
                                {*<span class="sr-only">{$statisticsMap["invitationSentInPercent"]}% הושלם</span>*}
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                </li>

            {/foreach}
        </ul>
    </div>
</div>