{include file="common/head.tpl"}
<div id="wrapper">
    {include file="common/navigation/navigation.tpl"}
    <div id="page-wrapper">
        {include file="common/navigation/breadcrumbs.tpl"}

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">חלוקת הזמנות</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                {include file="filtering_box.tpl"}
                <div id="guestsArea">
                    {include file="guest/guests_content.tpl"}
                </div>
            </div>
            <div class="col-lg-3">
                {include file="common/statistic_gage.tpl"}
            </div>

        </div>
    </div>
    {include file="guest/edit_guest.tpl"}
</div>
{include file="common/footer.tpl"}
