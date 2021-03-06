<div style="text-align: center">

    <div id="g1" class="statisticGage"></div>
    <div id="g2" class="statisticGage"></div>
    <div id="g3" class="statisticGage"></div>
    <div id="g4" class="statisticGage"></div>


</div>

<script>
    var colors = [
        "#ff0000",
        "#f9c802",
        "#a9d70b"
    ];

    var g1 = new JustGage({
        id: "g1",
        value: {$statisticsMap["totalGuests"]},
        min: 0,
        max: 400,
        title: "הוזמנו",
        label: "מוזמנים",
        levelColors: colors
    });

    var g2 = new JustGage({
        id: "g2",
        value: {$statisticsMap["invitationSent"]},
        min: 0,
        max: {$statisticsMap["totalGuests"]},
        title: "קיבלו הזמנה",
        label: "מוזמנים",
        levelColors: colors

    });

    var g3 = new JustGage({
        id: "g3",
        value: {$statisticsMap["arrivalApproved"]},
        min: 0,
        max: {$statisticsMap["totalGuests"]},
        title: "אישרו הגעה",
        label: "מוזמנים",
        levelColors: colors
    });

    var g4 = new JustGage({
        id: "g4",
        value: {$statisticsMap["hasTable"]},
        min: 0,
        max: {$statisticsMap["totalGuests"]},
        title: "קיבלו שולחן",
        label: "מוזמנים",
        levelColors: colors

    });

</script>
