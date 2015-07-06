{ldelim}
{if isset($error)}
    "error": {$error|json_encode}
{/if}
{if isset($statMap)}
    ,
    "totalGuests":{$statMap["totalGuests"]|json_encode},
    "invitationSent":{$statMap["invitationSent"]|json_encode},
    "arrivalApproved":{$statMap["arrivalApproved"]|json_encode},
    "hasTable":{$statMap["hasTable"]|json_encode}
{/if}
{rdelim}