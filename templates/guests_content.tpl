<div id="guestsArea">
    <input type="hidden" id="loc" value="{$loc}">
    <fieldset class="border1 padd5 bg3 border_radius">
        <legend align="center" class="seperator1 font18" dir="rtl"><h5>סך הכל : <span id="totalCount" value="{$count}">{$count}</span></h5>
        </legend>
        <div id="guestsContent" dir="rtl">
            <table id="guestsTable" class=" maxWidth">
                <tr>
                    <th></th>
                    <th>שם</th>
                    <th>שם משפחה</th>
                    <th>מוזמנים</th>
                    <th>טלפון</th>
                    <th>צד</th>
                    <th>קבוצה</th>
                    {if $loc neq 'guests'}
                        {if $loc eq 'invitations' or $loc eq 'search' }
                            <th>נשלחה הזמנה</th>
                        {/if}
                        {if $loc eq 'rsvps' or $loc eq 'search' }
                            <th>אישור הגעה</th>
                        {/if}
                    {/if}
                </tr>

                {$total = 0}
                {foreach $guests as $guest}
                    {$total = $total + $guest.amount}
                    {include file="guest_content.tpl"}
                {/foreach}
                <script>
                    updateStatisticPanel({$total});
                </script>
            </table>
        </div>
    </fieldset>
</div>