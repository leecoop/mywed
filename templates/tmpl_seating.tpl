{include file="common/head.tpl"}
<div id="wrapper">
    {include file="common/navigation/navigation.tpl"}

    <div id="page-wrapper">
        {include file="common/navigation/breadcrumbs.tpl"}

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">הושבה</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                {include file="seating/search.tpl"}
                {include file="seating/search_results.tpl"}
            </div>
            <div class="col-lg-3">
                {include file="seating/tables_statistics.tpl"}

            </div>
        </div>
    </div>
    {include file="common/modals/confirm_amount_modal.tpl"}
    {include file="seating/choose_table_model.tpl"}
</div>
{include file="common/footer.tpl"}