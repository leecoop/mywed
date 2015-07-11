<div id="edit_guest" style="display: none" title="עריכת מוזמן">
    <div class="site_content_small" style="float:left">
        <div style="float:right; padding-right:40px">
            <table id="add_new_guest_table" width="400" class="w3" cellspacing="0" cellpadding="1" border="0"
                   style="padding: 5px; font-weight: bolder; margin:10px">
                <tr>
                    <td align="right" valign="middle" class="w3">שם פרטי:</td>
                    <td align="right" valign="middle"><input id="editName" type="text" class="leadnews"
                                                             style="height:15px"/></td>
                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">שם משפחה:</td>
                    <td align="right" valign="middle"><input id="editLastName" type="text"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>

                <tr>
                    <td align="right" valign="middle" class="w3">טלפון:</td>
                    <td align="right" valign="middle"><input id="editPhone" type="text"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>

                <tr>
                    <td align="right" valign="middle" class="w3">צד:</td>
                    <td align="right" valign="middle">
                        <select style="height:25px" id="editSides" class="widthRegister">
                            {foreach $sides as $value}
                                <option value="{$value@key}">{$value}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">קבוצה:</td>
                    <td align="right" valign="middle">
                        <select style="height:25px" id="editGroups" class="widthRegister">
                            {foreach $groups as $value}
                                <option value="{$value@key}">{$value}</option>
                            {/foreach}
                        </select>

                    </td>

                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">מספר מוזמנים:</td>
                    <td align="right" valign="middle"><input id="editAmount" type="text" value="1"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">נשלחה הזמנה:</td>
                    <td>
                        <a id="editInvitationSent" title="Mark this guest as accepted" invitationSent="" href="javascript:void(0)"></a>
                    </td>
                </tr>

                <tr>
                    <td align="right" valign="middle" class="w3">אישר הגעה:</td>
                    <td style="margin: 0.5em 0">
                         <span id="ediArrivalApproved">
                        <a val="1" onClass="checkOn" offClass="checkOff" onclick="toggleArrivalApprovedClass('ediArrivalApproved',1)" title="Mark this guest as accepted" href="javascript:void(0)"></a>
                        <a val="0" onClass="questionOn" offClass="questionOff" onclick="toggleArrivalApprovedClass('ediArrivalApproved',0)" title="Mark this guest as not responded"
                           href="javascript:void(0)"></a>
                        <a val="2" onClass="xOn" offClass="xOff" onclick="toggleArrivalApprovedClass('ediArrivalApproved',2)" title="Mark this guest as declined" href="javascript:void(0)"></a>
                             </span>
                    </td>
                </tr>


            </table>
        </div>
    </div>

</div>
<script type="text/javascript">
    var editGuestDialog;
    $(function () {

        editGuestDialog = $("#edit_guest").dialog({
            autoOpen: false,
            height: 450,
            width: 550,
            modal: true,
            close: function () {
            }
        })
        ;
    })
    ;
</script>

{include file="create_new_group.tpl"}

