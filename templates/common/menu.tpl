<div id="menubar" role="navigation">
    <ul id="menu">
        {*<li>*}
            {*<a href="../../Logout.php">יציאה</a>*}
        {*</li>*}
        {*<li {if $loc eq 'management'} class="selected" {/if}>*}
            {*<a href="management.php">ניהול מערכת</a>*}
        {*</li>*}
        {*<li {if $loc eq 'reports'} class="selected" {/if}>*}
            {*<a href="reports.php">דוחות</a>*}
        {*</li>*}
        <li {if $loc eq 'search'} class="selected" {/if}>
            <a href="search.php">חיפוש</a>
        </li>
        <li {if $loc eq 'seating_arrangement'} class="selected" {/if}>
            <span id="seatingArrangementsCount" value='{$statisticsMap["totalGuests"]-$statisticsMap["hasTable"]}' class="countRedSmall">{$statisticsMap["totalGuests"]-$statisticsMap["hasTable"]}</span>
            <a href="seating_arrangement.php">סידור ישיבה</a>
        </li>
        <li {if $loc eq 'rsvps'} class="selected" {/if}>
            <span id="rsvpsCount" value='{$statisticsMap["totalGuests"]-$statisticsMap["arrivalApproved"]}' class="countRedSmall">{$statisticsMap["totalGuests"]-$statisticsMap["arrivalApproved"]}</span>
            <a href="rsvps.php">אישורי הגעה</a>
        </li>
        <li {if $loc eq 'invitations'} class="selected" {/if}>
            <span id="invitationsCount" value='{$statisticsMap["totalGuests"]-$statisticsMap["invitationSent"]}' class="countRedSmall">{$statisticsMap["totalGuests"]-$statisticsMap["invitationSent"]}</span>
            <a href="invitations.php">חלוקת הזמנות</a>
        </li>

        <li {if $loc eq 'guests'} class="selected" {/if}>
            <a href="guests.php">מוזמנים</a>
        </li>
        {*<li {if $loc eq 'index'} class="selected"  {/if}>*}
            {*<a href="index.php">ראשי</a>*}
        {*</li>*}

    </ul>
</div>