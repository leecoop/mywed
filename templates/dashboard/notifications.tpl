<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-bullhorn fa-fw"></i> הודעות
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        {if $statisticsMap["totalGuests"] - $statisticsMap["invitationSent"] > 0}
            <div class="well">
                <i class="fa fa-star fa-fw"></i>
                {$statisticsMap["totalGuests"] - $statisticsMap["invitationSent"]} אורחים שעדיין לא קיבלו הזמנה

            </div>
        {/if}
        {if $statisticsMap["totalGuests"] - $statisticsMap["arrivalApproved"] > 0}
            <div class="well">
                <i class="fa fa-star fa-fw"></i>
                {$statisticsMap["totalGuests"] - $statisticsMap["arrivalApproved"]}  אורחים עדיין לא אישרו הגעה

            </div>
        {/if}
        {if $statisticsMap["arrivalApproved"] - $statisticsMap["hasTable"] > 0}
            <div class="well">
                <i class="fa fa-star fa-fw"></i>
                {$statisticsMap["arrivalApproved"] - $statisticsMap["hasTable"]} מוזמנים שאישרו הגעה ולא שובצו בשולחן
            </div>
        {/if}

    </div>
</div>