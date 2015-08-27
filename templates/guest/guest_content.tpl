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
    {if $loc neq 'invitations'}
        <td>{$guest.amount}</td>
        <td>{$guest.phone}</td>
    {/if}
    <td>{$sides[$guest.side_id]}</td>
    <td>{$groups[$guest.group_id]}</td>
    {if $loc neq 'guests'}
        {if $loc eq 'invitations' or $loc eq 'search' }
            <td>
                <button id="invitationSent{$guest.oid}" invitationSent="{$guest.invitation_sent}" title="Mark this guest as accepted"
                        class="btn btn-{if $guest.invitation_sent == 1}success{else}default{/if}  btn-circle" style="border-color: #4cae4c" type="button" onclick="updateInvitationSent({$guest.oid})">
                    <i class="fa fa-check"></i>
                </button>
            </td>
        {/if}
        {if $loc eq 'rsvps' or $loc eq 'search' }
            <td style="min-width: 90px">
                    <div class="btn-group " id="arrivalApproved{$guest.oid}">
                        <button val="1" onClass="btn-success" title="Mark this guest as accepted" class=" btn btn-{if $guest.arrival_approved == 1}success{else}default{/if}  btn-circle" type="button"
                                onclick="{if $loc eq 'rsvps'}openVerifyAmountModal({$guest.oid}){else}updateArrivalApproved({$guest.oid},1){/if}">
                            <i class="fa fa-check"></i>
                        </button>
                        <button val="0" onClass="btn-warning" title="Mark this guest as accepted" class=" btn btn-{if $guest.arrival_approved == 0}warning{else}default{/if}  btn-circle" type="button"
                                onclick="updateArrivalApproved({$guest.oid},0)">
                            <i class="fa fa-question"></i>
                        </button>
                        <button val="2" onClass="btn-danger" title="Mark this guest as accepted"  class=" btn btn-{if $guest.arrival_approved == 2}danger{else}default{/if}  btn-circle" type="button"
                                onclick="updateArrivalApproved({$guest.oid},2{if $loc eq 'rsvps'},true{/if})">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
            </td>
        {/if}
    {/if}
</tr>