<div class="col-md-3 col-sm-4 col-xs-6">
    <div class="panel panel-primary" data-guest-name="{$guest.name}" id="guest{$guest.oid}" amount="{$guest.amount}" data-original-amount="{$guest.amount}" data-table-id="{$guest.table_id}">
        <div class="panel-heading limit-text" title="{$guest.name}">
            {$guest.name}
        </div>
        <div class="panel-body text-center">
            <small class="text-muted">שולחן</small>
            <h1 class="font-extra-bold m-t-0 m-b-0 limit-text">
               {if in_array($guest.table_id,array_keys($tablesMap))} {$tablesMap[$guest.table_id]} {else} אין {/if}
            </h1>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary btn-lg btn-block" onclick="openConfirmAmountModal({$guest.oid},'updateArrivedStatus({$guest.oid})')" type="button">הגיעה</button>
        </div>
    </div>
</div>