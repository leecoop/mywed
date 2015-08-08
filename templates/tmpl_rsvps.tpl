{*{include file="common/header.tpl"}*}

{*<body dir="rtl" bgcolor="#F8F8F8">*}
{*<div id="main">*}
{*{include file="common/head.tpl"}*}
{*{include file="common/left_panel.tpl"}*}

{*<div id="site_content">*}
{*{include file="top_panel.tpl"}*}
{*{include file="guests_content.tpl"}*}
{*</div>*}
{*</div>*}
{*<div style="text-align: center; font-size: 0.75em;"></div>*}
{*{include file="edit_guest.tpl"}*}

{*{include file="add_new_guest.tpl"}*}
{*{include file="common/footer.tpl"}*}

{include file="common/head.tpl"}

<div id="wrapper">
    {include file="common/navigation/navigation.tpl"}

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">אישורי הגעה</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                {include file="filtering_box.tpl"}
                <div id="guestsArea">
                    {include file="guests_content.tpl"}
                </div>
            </div>
            <div class="col-lg-3">
                {include file="common/statistic_gage.tpl"}
            </div>
        </div>
    </div>
    {include file="edit_guest.tpl"}

</div>

