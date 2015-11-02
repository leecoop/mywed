{include file="common/head.tpl"}
<div id="wrapper">
    {include file="common/navigation/navigation.tpl"}

    <div id="page-wrapper">
        {include file="common/navigation/breadcrumbs.tpl"}
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">חיפוש</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <div id="search" style="padding-bottom: 40px">
                    <label for="search-input" class="cursor-pointer"><i onclick="searchGuests()" class="fa fa-search"></i></label>
                    <input placeholder="חפש מוזמנים" class="form-control input-lg" id="search-input" onkeypress="searchGuestsKeyPress(event)">
                    <a class="fa fa-times-circle hide" href="#" id="search-clear"></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9" style="float: none">
                <h2 class="page-header">
                    <small>
                        <span>תוצאות חיפוש</span>
                    </small>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <div id="guestsArea">
                    {include file="guest/guests_content.tpl"}
                </div>
            </div>

        </div>
    </div>
    {include file="guest/edit_guest.tpl"}
</div>
{include file="common/footer.tpl"}


