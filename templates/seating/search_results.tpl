<div class="row">
    {*<div class="col-md-10 col-sm-9">*}
    <h2 class="page-header">
        <small>
            <span ng-if="!searchInput">מוזמנים להושבה</span>
            <span ng-if="searchInput">
תוצאות חיפוש עבור "{{searchInput}}"
            </span>
            {*<span ng-bind="searchInput"></span>*}
        </small>

    </h2>

    <div id="search-results">
        {foreach $guests as $guest}
            {include file="seating/guest.tpl"}
        {/foreach}
    </div>
    {*</div>*}
</div>