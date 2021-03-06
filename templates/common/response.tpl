{ldelim}
{if isset($dbConnectionError)}
    "dbConnectionError": {$dbConnectionError|json_encode}
{/if}
{if isset($data)}
    ,"data": {$data|json_encode}
{/if}
{if isset($error)}
    ,"error": {$error|json_encode}
{/if}
{if isset($errorMsg)}
    , "errorMsg": {$errorMsg|json_encode}
{/if}
{if isset($redirectLink)}
    , "redirectLink": {$redirectLink|json_encode}
{/if}
{if isset($groupSet)}
    , "groupSet": {$groupSet|json_encode}
{/if}
{if isset($guest)}
    ,
    "guest":
    {ldelim}
    "oid":{$guest.oid|json_encode},
    "name":{$guest.name|json_encode},
    "phone":{$guest.phone|json_encode},
    "amount":{$guest.amount|json_encode},
    "side":{$sides[$guest.side_id]|json_encode},
    "sideId":{$guest.side_id|json_encode},
    "group":{$groups[$guest.group_id]|json_encode},
    "groupId":{$guest.group_id|json_encode},
    "invitationSent":{$guest.invitation_sent|json_encode},
    "arrivalApproved":{$guest.arrival_approved|json_encode}
{rdelim}
{/if}
{if isset($statMap)}
    ,
    "stat":
    {ldelim}
    "totalGuests":{$statMap["totalGuests"]|json_encode},
    "invitationSent":{$statMap["invitationSent"]|json_encode},
    "arrivalApproved":{$statMap["arrivalApproved"]|json_encode},
    "hasTable":{$statMap["hasTable"]|json_encode}
    {rdelim}
{/if}
{rdelim}