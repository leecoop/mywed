<div id="guest{$guest.oid}" class='user_details'
        {*onmousemove="this.style.background='#FFC'"*}
        {*onmouseout="this.style.background='#FFF'" *}
        >
    <div class='user_details_title' onclick='openUserPage("{$guest.oid}")'>
        <div class='user_details_title_text'>{$guest.name} {$guest.last_name}</div>
    </div>
    <br/>

    <div style='padding:1px'>
        <table class="guest_table">
            <tr class='italic_font'>
                <td>טלפון</td>
                <td>{$guest.phone}</td>
            </tr>
            <tr>
                <td>מוזמנים</td>
                <td>{$guest.amount}</td>
            </tr>
            <tr>
                <td>צד</td>
                <td>{$sides[$guest.side_id]}</td>
            </tr>
            <tr>
                <td>קבוצה</td>
                <td>{$groups[$guest.group_id]}</td>
            </tr>
            {if $loc neq 'rsvps'}
                <tr>
                    <td>נשלחה הזמנה</td>
                    <td><a id="invitationSent{$guest.oid}" title="Mark this guest as accepted" invitationSent="{$guest.invitation_sent}"
                           class="{if $guest.invitation_sent == 1}checkOn{else}checkOff{/if}" onclick="updateInvitationSent({$guest.oid}{if $loc eq 'invitations'},true{/if});"
                           href="javascript:void(0)"></a>
                    </td>
                </tr>
            {/if}
            {if $loc neq 'invitations'}
                <tr>
                    <td>אישר הגעה</td>
                    <td>
                    <span id="arrivalApproved{$guest.oid}">
                        <a val="1" onClass="checkOn" offClass="checkOff" title="Mark this guest as accepted" class="{if $guest.arrival_approved == 1}checkOn{else}checkOff{/if}"
                           onclick="updateArrivalApproved({$guest.oid},1{if $loc eq 'rsvps'},true{/if});" href="javascript:void(0)"></a>
                        {if $loc neq 'rsvps'}
                            <a val="0" onClass="questionOn" offClass="questionOff" title="Mark this guest as not responded" class="{if $guest.arrival_approved == 0}questionOn{else}questionOff{/if}"
                               onclick="updateArrivalApproved({$guest.oid},0);" href="javascript:void(0)"></a>
                        {/if}
                        <a val="2" onClass="xOn" offClass="xOff" title="Mark this guest as declined" class="{if $guest.arrival_approved == 2}xOn{else}xOff{/if}"
                           onclick="updateArrivalApproved({$guest.oid},2{if $loc eq 'rsvps'},true{/if});" href="javascript:void(0)"></a>
                    </span>
                    </td>

                </tr>
            {/if}
            {*<tr>*}
            {*<td><a id="hasTable{$guest.oid}" title="Mark this guest as accepted" hasTable="{$guest.has_table}"*}
            {*class="{if $guest.has_table == 1}checkOn{else}checkOff{/if}" onclick="updateHasTable({$guest.oid});" href="javascript:void(0)"></a>*}
            {*</td>*}
            {*<td>נשלחה הזמנה</td>*}
            {*</tr>*}
        </table>
    </div>
    <input type="hidden" id="params_{$guest.oid}" name="{$guest.name}" lastName="{$guest.last_name}" phone="{$guest.phone}" amount="{$guest.amount}" side="{$guest.side_id}" group="{$guest.group_id}"
           sent="{$guest.invitation_sent}" approved="{$guest.arrival_approved}"/>
</div>