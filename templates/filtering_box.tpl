<div class="filter_box_div">


    <div id="site_content_small">
        <div class="box_title">
            <div class="title_text">סינון</div>
        </div>
        <div style="float:right; padding-right:10px">

            <table class="maxWidth">
                <tbody>
                <tr>

                    <td valign="top" style="padding-left: 30px; border-left: 1px solid rgb(222, 222, 222);">
                        <div class="marginB10">צד(<a onclick="toggleCheckboxes(this,'filterSides');" class="underline" href="javascript:void(0);">כלום</a>)</div>
                        <div id="filterSides">
                            {foreach $sides as $value}
                                <input type="checkbox" class="margin3" onclick="filter('{$loc}')" id="side_{$value@key}" value="{$value@key}">
                                <label for="side_{$value@key}">{$value}</label>
                                <br>
                            {/foreach}
                        </div>

                    </td>

                    <td valign="top" style="padding-right:30px">
                        <div class="marginB10">קבוצה(<a onclick="toggleCheckboxes(this,'filterGroups');" class="underline" href="javascript:void(0);">כלום</a>)
                            <img id="add_group_btn" src="../style/Button-Add-icon.png" onclick="openCreateGroupDialog()" style="margin: -4px;padding-right: 4px">
                        </div>
                        <div style="max-height: 110px; overflow-y: scroll;direction: ltr;">
                            <div style="direction: rtl">
                                <div id="filterGroups">
                                    <table>
                                        <tr>
                                            {foreach $groups as $value}
                                            <td style="padding: 0">
                                                <input type="checkbox" style="margin:3px 5px 3px 3px" id="group_{$value@key}" onclick="filter('{$loc}')" value="{$value@key}">
                                                <label for="group_{$value@key}">{$value}</label>
                                            </td>
                                            {if $value@index  % 3 == 0}
                                            {*<br>*}
                                        </tr>
                                        <tr>
                                            {/if}
                                            {/foreach}
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                </tr>

                </tbody>
            </table>
            {*<div style="float: left; cursor: pointer;">*}
                {*<img id="xls" class="xls" onclick="report('{$loc}')"/>*}
                {*<label for="xls">יצוא לאקסל</label>*}
            {*</div>*}



        </div>
    </div>
</div>
{*<script>*}
{*$(function() {*}
{*$( "#filterSides" ).buttonset();*}
{*$( "#filterGroups" ).buttonset();*}
{*});*}
{*</script>*}