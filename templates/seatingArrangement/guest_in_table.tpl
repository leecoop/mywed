<li id="guest{$guest->oid}" class="seatingTableGuest" data-oid="{$guest->oid}"  data-amount="{$guest->amount}" data-group={$guest->group_id}>
    {$guest->name} ({$guest->amount})
    <i class="delete-guest-from-table fa" onclick="deleteGuestFromTable($(this).parent())"></i>
</li>
