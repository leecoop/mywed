<div class="well" style="padding-bottom: 0px">
    <div class="row">
        <div class="col-md-3">
            <ul style="list-style: none; padding-right: 0px">
                <li>
                    <div>
                        <p>
                            חלוקת הזמנות
                            <span class="pull-left text-muted">{$statisticsMap["invitationSentInPercent"]}% הושלם</span>
                        </p>

                        <div class="progress progress-striped active" style="margin-bottom: 8px">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{$statisticsMap["invitationSentInPercent"]}" aria-valuemin="0"
                                 aria-valuemax="100" style="width: {$statisticsMap["invitationSentInPercent"]}%">
                                <span class="sr-only">{$statisticsMap["invitationSentInPercent"]}% הושלם</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div>
                        <p>
                            אישורי הגעה
                            <span class="pull-left text-muted">{$statisticsMap["arrivalApprovedInPercent"]}% הושלם</span>
                        </p>

                        <div class="progress progress-striped active" style="margin-bottom: 8px">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{$statisticsMap["arrivalApprovedInPercent"]}" aria-valuemin="0"
                                 aria-valuemax="100" style="width: {$statisticsMap["arrivalApprovedInPercent"]}%">
                                <span class="sr-only">{$statisticsMap["arrivalApprovedInPercent"]}% הושלם</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div>
                        <p>
                            סידורי ישיבה
                            <span class="pull-left text-muted">{$statisticsMap["hasTableInPercent"]}% הושלם</span>
                        </p>

                        <div class="progress progress-striped active" style="margin-bottom: 8px">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{$statisticsMap["hasTableInPercent"]}" aria-valuemin="0"
                                 aria-valuemax="100" style="width: {$statisticsMap["hasTableInPercent"]}%">
                                <span class="sr-only">{$statisticsMap["hasTableInPercent"]}% הושלם</span>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>

        </div>


        <div class="col-md-6 well well-sm text-center" style="font-family:Times New Roman ">
            <div class="lead text" id="clock"></div>

        </div>


        <div class="col-md-3 text-center">
            <div class="small">
                <i class="fa fa-thumbs-o-up"></i> אישרו הגעה
            </div>
            <div>
                <h1 class="font-extra-bold m-t-xl m-b-xs">
                    {$statisticsMap["arrivalApproved"]}
                </h1>
                <small>אנשים</small>
            </div>
            <div class="small m-t-xl">
                <i class="fa fa-user fa-4x"></i>
            </div>
        </div>

    </div>
</div>