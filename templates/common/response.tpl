{ldelim}
    "data": {$data|json_encode},
    "error": {$error|json_encode},
    "guest":
        {ldelim}
            "oid":{$guest.oid|json_encode},
            "name":{$guest.name|json_encode},
            "lastName":{$guest.last_name|json_encode},
            "phone":{$guest.phone|json_encode},
            "amount":{$guest.amount|json_encode},
            "side":{$sides[$guest.side_id]|json_encode},
            "sideId":{$guest.side_id|json_encode},
            "group":{$groups[$guest.group_id]|json_encode},
            "groupId":{$guest.group_id|json_encode},
            "invitationSent":{$guest.invitation_sent|json_encode},
            "arrivalApproved":{$guest.arrival_approved|json_encode}
        {rdelim}
{rdelim}