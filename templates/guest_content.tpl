<tr id="guest{$guest.oid}" name="{$guest.name}" amount="{$guest.amount}" phone="{$guest.phone}" side="{$guest.side_id}" group="{$guest.group_id}"
    invitationSent="{$guest.invitation_sent}" arrivalApproved="{$guest.arrival_approved}">
    {*{if $loc eq 'guests'}*}
    <td>

        <button class="btn btn-default btn-circle" type="button" onclick='openEditGuest("{$guest.oid}")'>
            <i class="fa fa-pencil"></i>
        </button>
        {*<a href="javascript:void(0)" class="fa fa-pencil fa-fw no-text-decoration" onclick='openEditGuest("{$guest.oid}")'></a>*}
    </td>
    {*{/if}*}
    <td>{$guest.name}</td>
    <td>{$guest.amount}</td>
    <td>{$guest.phone}</td>
    <td>{$sides[$guest.side_id]}</td>
    <td>{$groups[$guest.group_id]}</td>
    {if $loc neq 'guests'}
        {if $loc eq 'invitations' or $loc eq 'search' }
            <td>
                <a id="invitationSent{$guest.oid}" title="Mark this guest as accepted" invitationSent="{$guest.invitation_sent}"
                   class="{if $guest.invitation_sent == 1}checkOn{else}checkOff{/if}" onclick="updateInvitationSent({$guest.oid});"
                   href="javascript:void(0)"></a>
            </td>
        {/if}
        {if $loc eq 'rsvps' or $loc eq 'search' }
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
        {/if}
    {/if}
</tr>