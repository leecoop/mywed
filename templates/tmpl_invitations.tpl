{*{include file="common/header.tpl"}*}

{*<body dir="rtl" bgcolor="#F8F8F8">*}
{*<div id="main">*}
{*{include file="common/head.tpl"}*}

{*<div id="site_content">*}
{*{include file="top_panel.tpl"}*}
{*{include file="guests_content.tpl"}*}
{*</div>*}
{*{include file="common/left_panel.tpl"}*}

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
                <h1 class="page-header">חלוקת הזמנות</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-9">
                {include file="filtering_box.tpl"}

                <!-- /.panel -->
                    <div id="guestsArea">
                        {include file="guests_content.tpl"}
                    </div>
            </div>
            <div class="col-lg-3">
                {include file="common/statistic_gage.tpl"}
                <!-- /.panel .chat-panel -->
            </div>
            <!-- /.col-lg-8 -->
            {*<div class="col-lg-4">*}
            {*{include file="add_guest.tpl"}*}
            {*{include file="create_group.tpl"}*}

            {*<!-- /.panel .chat-panel -->*}
            {*</div>*}
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>