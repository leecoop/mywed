{*<div id="add_guest">*}

    <div id="site_content_small" style="width: 870px; margin-bottom: 10px">
        <div class="box_title" style="width: 870px">
            <div class="title_text">חדש</div>
        </div>
        <div style="float:right;">
            <table id="add_table"  class="w3" cellspacing="0" cellpadding="1" border="0"
                   style="font-weight: bolder; margin:4px; width:865px">
                <tr>
                    <td align="right" valign="middle" class="w3">שם:</td>
                    <td align="right" valign="middle"><input id="title" type="text" class="leadnews" value="{$tables|count} שולחן"/></td>


                    <td align="right" valign="middle" class="w3">גודל שולחן:</td>
                    <td align="right" valign="middle">
                        <input type="submit" class="buttonCss" style="width: 25px" onclick="updateAmount(1)" value="+"/>
                        <input id="amount" name="amount" type="text" value="12" class="leadnews" style="width:25px; text-align: center;"/>
                        <input type="submit" class="buttonCss" style="width: 25px" onclick="updateAmount(-1)" value="-"/>
                    </td>
                    <td>
                        <input type="submit" style="width: 120px" id="add_new_guest_btn" onclick="addTable(0)" class="largeOff" value="הוסף שולחן"/>

                    </td>
                </tr>
            </table>
        </div>
    </div>

{*</div>*}

{*{include file="create_new_group.tpl"}*}

