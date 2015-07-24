<li class="no-text-decoration" oid="{$guest->oid}" amount="{$guest->amount}">
    <a onclick="removeGuestFromTable({$guest->oid},{$table.oid});" class="fa fa-minus-circle fa-fw" ></a>
    {$guest->name} {$guest->last_name} ({$guest->amount})
</li>