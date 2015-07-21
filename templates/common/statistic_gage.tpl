    <div class="panel panel-yellow">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> סטטיסטיקה
        </div>
        <div class="panel-body">
            {*<div style="text-align: center; float: left;width: 180px;height: 140px">*}

                {if  $loc eq 'guests'}
                    <div id="g1" class="statisticGage"></div>
                {/if}

                {if  $loc eq 'invitations'}
                    <div id="g2" class="statisticGage"></div>
                {/if}

                {if  $loc eq 'rsvps'}
                    <div id="g3" class="statisticGage"></div>
                {/if}

                {if  $loc eq 'seating_arrangement'}
                    <div id="g4" class="statisticGage"></div>
                {/if}

            {*</div>*}
        </div>
    </div>

<script>
    var colors = [
        "#ff0000",
        "#f9c802",
        "#a9d70b"
    ];
    {if  $loc eq 'guests'}
    var g1 = new JustGage({
        id: "g1",
        value: {$statisticsMap["totalGuests"]},
        min: 0,
        max: 400,
        title: "הוזמנו",
        label: "מוזמנים",
        levelColors: colors
    });
    {/if}

    {if  $loc eq 'invitations'}
    var g2 = new JustGage({
        id: "g2",
        value: {$statisticsMap["invitationSent"]},
        min: 0,
        max: {$statisticsMap["totalGuests"]},
        title: "קיבלו הזמנה",
        label: "מוזמנים",
        levelColors: colors

    });
    {/if}

    {if  $loc eq 'rsvps'}
    var g3 = new JustGage({
        id: "g3",
        value: {$statisticsMap["arrivalApproved"]},
        min: 0,
        max: {$statisticsMap["totalGuests"]},
        title: "אישרו הגעה",
        label: "מוזמנים",
        levelColors: colors
    });
    {/if}

    {if  $loc eq 'seating_arrangement'}
    var g4 = new JustGage({
        id: "g4",
        value: {$statisticsMap["hasTable"]},
        min: 0,
        max: {$statisticsMap["totalGuests"]},
        title: "קיבלו שולחן",
        label: "מוזמנים",
        levelColors: colors

    });
    {/if}

</script>
