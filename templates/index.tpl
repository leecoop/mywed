{include file="common/head.tpl"}

<div id="wrapper">
    {include file="common/navigation/navigation.tpl"}

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ראשי</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                {include file="dashboard/top_panel.tpl"}
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <a href="guests.php">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
                                    <div class="huge">{$statisticsMap["totalGuests"]}</div>
                                    <div>אורחים שהוזמנו</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="invitations.php">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
                                    <div class="huge">{$statisticsMap["invitationSent"]}</div>
                                    <div>הזמנות שחולקו</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="rsvps.php">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumbs-o-up fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
                                    <div class="huge">{$statisticsMap["arrivalApproved"]}</div>
                                    <div>אורחים שאישרו הגעה</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="seating_arrangement.php">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
                                    <div class="huge">{$statisticsMap["hasTable"]}</div>
                                    <div>יש לנו שולחן</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                {include file="dashboard/notifications.tpl"}
            </div>
            <div class="col-lg-4">
                {include file="dashboard/quick_permissions_add.tpl"}
            </div>

        </div>



    </div>
</div>

<script type="text/javascript">
    var $clock = $('#clock');

    $clock.countdown(new Date("{$date}"), function (event) {
//                $(this).html(event.strftime('ימים %D  שעות %H דקות %M שניות %S'));
        $(this).html(event.strftime(''
                + '<table class="table" style="direction: ltr;">'
                + '<tr>'
                + '<td style="border-top: 0px"><h3>%D</h3></td>'
                + '<td style="border-top: 0px"><h3>%H</h3></td>'
                + '<td style="border-top: 0px"><h3>:</h3></td>'
                + '<td style="border-top: 0px"><h3>%M</h3></td>'
                + '<td style="border-top: 0px"><h3>:</h3></td>'
                + '<td style="border-top: 0px"><h3>%S</h3></td>'
                + '</tr>'
                + '<tr>'
                + '<td><h5>ימים</h5></td>'
                + '<td><h5>שעות</h5></td>'
                + '<td></td>'
                + '<td><h5>דקות</h5></td>'
                + '<td></td>'
                + '<td><h5>שניות</h5></td>'
                + '</tr>'
                + '</table>'
        ));
    });
</script>
