<div id="add_new_guest" style="display: none" title="הוספת מוזמן חדש">
    <div id="site_content_small" style="float:left">
        <div style="float:right; padding-right:40px">
            <table id="add_new_guest_table" width="400" class="w3" cellspacing="0" cellpadding="1" border="0"
                   style="padding: 5px; font-weight: bolder; margin:10px">
                <tr>
                    <td align="right" valign="middle" class="w3">שם פרטי:</td>
                    <td align="right" valign="middle"><input id="name" name="name" type="text" class="leadnews"
                                                             style="height:15px"/></td>
                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">שם משפחה:</td>
                    <td align="right" valign="middle"><input id="lastName" name="lastName" type="text"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>

                <tr>
                    <td align="right" valign="middle" class="w3">טלפון:</td>
                    <td align="right" valign="middle"><input id="phone" name="phone" type="text"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>

                <tr>
                    <td align="right" valign="middle" class="w3">צד:</td>
                    <td align="right" valign="middle">
                        <select style="height:25px" id="sides" name="sides" class="widthRegister">
                            {*<option value=0>-</option>*}
                            {foreach $sides as $value}
                                <option value="{$value@key}">{$value}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">קבוצה:</td>
                    <td align="right" valign="middle">
                        <select style="height:25px" id="groups" name="groups" class="widthRegister">
                            {*<option value=0>-</option>*}
                            {foreach $groups as $value}
                                <option value="{$value@key}">{$value}</option>
                            {/foreach}
                        </select>
                        <img id="add_group_btn" src="../style/Button-Add-icon.png" onclick="openCreateGroupDialog()">

                    </td>

                </tr>
                <tr>
                    <td align="right" valign="middle" class="w3">מספר מוזמנים:</td>
                    <td align="right" valign="middle"><input id="amount" name="amount" type="text" value="1"
                                                             class="leadnews" style="height:15px"/></td>
                </tr>
            </table>
        </div>
    </div>

</div>
<script type="text/javascript">
    var addGuestDialog;
    $(function () {

        addGuestDialog = $("#add_new_guest").dialog({
            autoOpen: false,
            height: 460,
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

