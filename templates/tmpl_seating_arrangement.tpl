{*{include file="common/header.tpl"}*}

{*<body dir="rtl" bgcolor="#F8F8F8">*}
{*<div id="main">*}
{*{include file="common/head.tpl"}*}
{*{include file="common/left_panel.tpl"}*}

{*<div id="site_content">*}
{*{include file="top_panel.tpl"}*}
{*{include file="seatingArrangement/add_table.tpl"}*}
{*{include file="seatingArrangement/seating_arrangement_content.tpl"}*}
{*</div>*}
{*</div>*}
{*<div style="text-align: center; font-size: 0.75em;"></div>*}

{*{include file="common/footer.tpl"}*}

{include file="common/head.tpl"}
<style>
    {*h1 {*}
        {*padding: .2em;*}
        {*margin: 0;*}
    {*}*}

    .item-catalog {
        /*margin-bottom: 7px;*/
        /*border: 1px solid #aaa; */
        /*position: relative; */
        /*text-align: center; */
        cursor: move;
        /*list-style-type: circle;*/

        /*width: 180px*/
    }
</style>
<div id="wrapper">
    {include file="common/navigation/navigation.tpl"}

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">חלוקת הזמנות</h1>
            </div>
        </div>

        <div class="row">
            {*<div class="col-lg-6">*}
            {*{include file="seatingArrangement/add_table.tpl"}*}
            {*</div>*}
            {*{include file="common/statistic_gage.tpl"}*}
            {*</div>*}

            {*<div class="row">*}
            <div class="col-lg-3">
                <div class="panel panel-default" id="products">
                    <div class="panel-heading"> מוזמנים</div>

                    <div class="panel-body">
                        <div id="catalog" class="panel-group">
                            {include file="seatingArrangement/guest_group.tpl"}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">

                {include file="seatingArrangement/tables.tpl"}
            </div>

            <div class="col-lg-3">

                {include file="common/statistic_gage.tpl"}
                {include file="seatingArrangement/add_table.tpl"}


            </div>
        </div>
    </div>
    {include file="edit_guest.tpl"}

</div>

<script>
    initSeatingArrangement();
</script>