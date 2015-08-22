{include file="common/head.tpl"}

<div id="wrapper">
    {include file="common/navigation/navigation.tpl"}

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">מוזמנים</h1>
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
                {include file="add_guest.tpl"}
                {include file="create_group.tpl"}

            </div>
        </div>
    </div>
    {include file="edit_guest.tpl"}
</div>


