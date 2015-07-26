<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> הוספת מוזמנים
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

        <div class="form-group">
            <input class="form-control" placeholder="שם" id="name">
        </div>


        <div class="form-group">
            {*<label>טלפון</label>*}
            <input class="form-control" placeholder="טלפון" id="phone">
        </div>

        <div class="form-group">
            <label>צד</label>
            <select id="sides" class="form-control">
                {foreach $sides as $value}
                    <option value="{$value@key}">{$value}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label>קבוצה</label>
            <select id="groups" class="form-control">
                {foreach $groups as $value}
                    <option value="{$value@key}">{$value}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label>מספר מוזמנים</label>

            <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(1)"><i class="fa  fa-plus"></i></button>
            <input id="amount" value="1" class="form-control" style="width:60px; text-align: center; display:inline "/>
            <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(-1)"><i class="fa fa-minus"></i></button>

        </div>

        <button class="btn btn-primary btn-lg btn-block" type="button" id="add_new_guest_btn" onclick="addEditGuest(0)">
הוסף
        </button>


    </div>
</div>


{*<div class="site_content_small" style="margin-bottom: 20px">*}
{*<div class="box_title" >*}
{*<div class="title_text">חדש</div>*}
{*</div>*}
{*<div style="float:right;margin-right:10px">*}
{*<table id="add_guest_table"  class="w3" cellspacing="0" cellpadding="1" border="0"*}
{*style="font-weight: bolder; margin:4px; width:100%">*}
{*<tr>*}
{*<td align="right" valign="middle" class="w3">שם:</td>*}
{*<td align="right" valign="middle"><input id="name" name="name" type="text" class="leadnews"/></td>*}

{*<td align="right" valign="middle" class="w3">שם משפחה:</td>*}
{*<td align="right" valign="middle"><input id="lastName" name="lastName" type="text" class="leadnews"/></td>*}
{*<td align="right" valign="middle" class="w3">מספר מוזמנים:</td>*}
{*<td align="right" valign="middle">*}
{*<input type="submit" class="buttonCss" style="width: 25px" onclick="updateAmount(1)" value="+"/>*}
{*<input id="amount" name="amount" type="text" value="1" class="leadnews" style="width:25px; text-align: center;"/>*}
{*<input type="submit" class="buttonCss" style="width: 25px" onclick="updateAmount(-1)" value="-"/></td>*}

{*</tr>*}

{*<tr>*}
{*<td align="right" valign="middle" class="w3">צד:</td>*}
{*<td align="right" valign="middle">*}
{*<select style="height:25px" id="sides" name="sides" class="selectField">*}
{*<option value=0>-</option>*}
{*{foreach $sides as $value}*}
{*<option value="{$value@key}">{$value}</option>*}
{*{/foreach}*}
{*</select>*}
{*</td>*}

{*<td align="right" valign="middle" class="w3">קבוצה:</td>*}
{*<td align="right" valign="middle">*}
{*<select style="height:25px" id="groups" name="groups" class="selectField">*}
{*<option value=0>-</option>*}
{*{foreach $groups as $value}*}
{*<option value="{$value@key}">{$value}</option>*}
{*{/foreach}*}
{*</select>*}
{*<img id="add_group_btn" src="../style/Button-Add-icon.png" onclick="openCreateGroupDialog()">*}

{*</td>*}


{*<td>*}
{*<input type="submit" style="width: 60px" id="add_new_guest_btn" onclick="addEditGuest(0)" class="largeOff" value="חדש"/>*}

{*</td>*}
{*</tr>*}
{*</table>*}
{*</div>*}


