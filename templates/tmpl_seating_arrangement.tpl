{include file="common/header.tpl"}

<body dir="rtl" bgcolor="#F8F8F8">
<div id="main">
    {include file="common/head.tpl"}
    {include file="common/left_panel.tpl"}

    <div id="site_content">
        {*{include file="top_panel.tpl"}*}
        {include file="seatingArrangement/add_table.tpl"}
        {include file="seatingArrangement/seating_arrangement_content.tpl"}
    </div>
</div>
<div style="text-align: center; font-size: 0.75em;"></div>

{include file="common/footer.tpl"}