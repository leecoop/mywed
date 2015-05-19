{*<div id="add_guest">*}

    <div id="site_content_small" style="width: 870px; margin-bottom: 10px">
        <div class="box_title" style="width: 870px">
            <div class="title_text">חדש</div>
        </div>
        <div style="float:right;">
            <table id="add_guest_table"  class="w3" cellspacing="0" cellpadding="1" border="0"
                   style="font-weight: bolder; margin:4px; width:865px">
                <tr>
                    <td align="right" valign="middle" class="w3">שם:</td>
                    <td align="right" valign="middle"><input id="name" name="name" type="text" class="leadnews"/></td>

                    <td align="right" valign="middle" class="w3">שם משפחה:</td>
                    <td align="right" valign="middle"><input id="lastName" name="lastName" type="text" class="leadnews"/></td>
                    <td align="right" valign="middle" class="w3">מספר מוזמנים:</td>
                    <td align="right" valign="middle">
                        <input type="submit" class="buttonCss" style="width: 25px" onclick="updateAmount(1)" value="+"/>
                        <input id="amount" name="amount" type="text" value="1" class="leadnews" style="width:25px; text-align: center;"/>
                        <input type="submit" class="buttonCss" style="width: 25px" onclick="updateAmount(-1)" value="-"/></td>

                {*</tr>*}

                {*<tr>*}
                    <td align="right" valign="middle" class="w3">צד:</td>
                    <td align="right" valign="middle">
                        <select style="height:25px" id="sides" name="sides" class="selectField">
                            {*<option value=0>-</option>*}
                            {foreach $sides as $value}
                                <option value="{$value@key}">{$value}</option>
                            {/foreach}
                        </select>
                    </td>

                    <td align="right" valign="middle" class="w3">קבוצה:</td>
                    <td align="right" valign="middle">
                        <select style="height:25px" id="groups" name="groups" class="selectField">
                            {*<option value=0>-</option>*}
                            {foreach $groups as $value}
                                <option value="{$value@key}">{$value}</option>
                            {/foreach}
                        </select>
                        {*<img id="add_group_btn" src="../style/Button-Add-icon.png" onclick="openCreateGroupDialog()">*}

                    </td>


                    {*<td align="right" valign="middle" class="w3">טלפון:</td>*}
                    {*<td align="right" valign="middle"><input id="phone" name="phone" type="text" class="leadnews" /></td>*}

                    <td>
                        <input type="submit" style="width: 60px" id="add_new_guest_btn" onclick="addGuest()" class="largeOff" value="חדש"/>

                    </td>
                </tr>
            </table>
        </div>
    </div>

{*</div>*}

{*{include file="create_new_group.tpl"}*}

