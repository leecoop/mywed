{*<div class="filter_box_div">*}
{*<div class="site_content_small" style="width: 100%;margin-bottom: 25px">*}
{*<div class="box_title">*}
{*<div class="title_text">סינון</div>*}
{*</div>*}
{*<div style="float:right; padding-right:5px">*}

{*<table class="maxWidth">*}
{*<tbody>*}
{*<tr>*}

{*<td valign="top" style="padding-left: 5px">*}
{*<div class="marginB10">צד(<a onclick="toggleCheckboxes(this,'filterSides');" class="underline" href="javascript:void(0);">כלום</a>)</div>*}
{*<div id="filterSides" style="width: 130px">*}
{*{foreach $sides as $value}*}
{*<div style="width: 50px" class="tagBG" onclick="filter('side_{$value@key}')" id="side_{$value@key}" value="{$value@key}">{$value}</div>*}
{*{/foreach}*}
{*</div>*}

{*</td>*}

{*<td style="border: 1px solid rgb(222, 222, 222);"></td>*}

{*<td valign="top" style="padding-right:5px">*}
{*<div class="marginB10">קבוצה(<a onclick="toggleCheckboxes(this,'filterGroups');" class="underline" href="javascript:void(0);">כלום</a>)*}
{*<img id="add_group_btn" src="../style/Button-Add-icon.png" onclick="openCreateGroupDialog()" style="margin: -4px;padding-right: 4px">*}
{*</div>*}
{*<div style="max-height: 140px; overflow-y: auto;direction: ltr;">*}
{*<div style="direction: rtl">*}
{*<div id="filterGroups">*}
{*{foreach $groups as $value}*}
{*<div class="tagBG" onclick="filter('group_{$value@key}')" id="group_{$value@key}" value="{$value@key}">{$value}</div>*}
{*{/foreach}*}
{*</div>*}
{*</div>*}
{*</div>*}
{*</td>*}
{*<td style="border: 1px solid rgb(222, 222, 222);"></td>*}
{*<td valign="top" style="padding-right:5px">*}
{*{include file="common/statistic_gage.tpl"}*}
{*</td>*}

{*</tr>*}


{*</tbody>*}
{*</table>*}
{*<div style="float: left; cursor: pointer;">*}
{*<img id="xls" class="xls" onclick="report('{$loc}')"/>*}
{*<label for="xls">יצוא לאקסל</label>*}
{*</div>*}


{*</div>*}
{*</div>*}


{*</div>*}
{*<script>*}
{*$(function() {*}
{*$( "#filterSides" ).buttonset();*}
{*$( "#filterGroups" ).buttonset();*}
{*});*}
{*</script>*}
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-filter fa-fw"></i> סינון

        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table class="maxWidth">
                <tbody>
                <tr>

                    <td valign="top" style="padding-left: 5px">
                        <div class="marginB10">
                            <label>צד</label>

                            (<a onclick="toggleCheckboxes(this,'filterSides');" class="underline" href="javascript:void(0);">כלום</a>)
                        </div>
                        <div id="filterSides" style="width: 130px">
                            {foreach $sides as $value}
                                <div style="width: 60px" class="tagBG" onclick="filter('side_{$value@key}')" id="side_{$value@key}" value="{$value@key}">{$value}</div>
                            {/foreach}
                        </div>

                    </td>

                    <td style="border: 1px solid rgb(222, 222, 222);"></td>

                    <td valign="top" style="padding-right:5px">
                        <div class="marginB10">
                            <label>קבוצה</label>
                            (<a onclick="toggleCheckboxes(this,'filterGroups');" class="underline" href="javascript:void(0);">כלום</a>)
                            {*<img id="add_group_btn" src="../style/Button-Add-icon.png" onclick="openCreateGroupDialog()" style="margin: -4px;padding-right: 4px">*}
                        </div>
                        <div style="max-height: 140px; overflow-y: auto;direction: ltr;">
                            <div style="direction: rtl">
                                <div id="filterGroups">
                                    {foreach $groups as $value}
                                        <div class="tagBG" onclick="filter('group_{$value@key}')" id="group_{$value@key}" value="{$value@key}">{$value}</div>
                                    {/foreach}
                                </div>
                            </div>
                        </div>
                    </td>
                    {*<td style="border: 1px solid rgb(222, 222, 222);"></td>*}
                    {*<td valign="top" style="padding-right:5px">*}
                    {*{include file="common/statistic_gage.tpl"}*}
                    {*</td>*}

                </tr>


                </tbody>
            </table>
        </div>
        <!-- /.panel-body -->
    </div>
{*{include file="common/statistic_gage.tpl"}*}
