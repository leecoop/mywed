{include file="common/head.tpl"}

<div id="wrapper">
    {include file="common/navigation/navigation.tpl"}
    {*<span id="display" style=" background-color: black;    border: 1px solid;    color: white;    left: 50%;    padding: 5px;    position: fixed;    top: 0;    z-index: 2000;"></span>*}

    <div id="page-wrapper">
        {include file="common/navigation/breadcrumbs.tpl"}

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">סידורי ישיבה</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div id="groupsContainerAlias" style=" display: none;"></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-10">
                        <div class="panel panel-default zIndex1" id="groupsContainer" style="z-index: 1000">
                            <div class="panel-heading"> מוזמנים
                                <i style="color: #428bca; font-size: large" class="cursor-pointer fa fa-minus-square pull-left" onclick="handleGroupsContainerMinimize(this)"></i>
                            </div>
                            <div class="panel-body">
                                <div id="groups" class="panel-group" style="z-index: 2000;margin-bottom: 0">
                                    {include file="seatingArrangement/guest_group.tpl"}
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" {if $showAll == "true"}checked{/if} onchange="handleSeatingArrangementShowAll(this)">
הצג מוזמנים שטרם אישרו הגעה
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-2 text-center p-l-0 p-r-0">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">
                            <div class="well well-sm m-b-10">
                                <div>
                                    <h1 class="font-extra-bold m-t-0" id="tablesCount">{$tables->rowCount()}</h1>

                                    <div class="small m-t-xl">
                                        <i class="fa fa-group fa-3x"></i>
                                    </div>
                                    <small>שולחנות</small>
                                </div>
                            </div>
                        </div>
                        {*<div class="col-xs-6 col-sm-6 col-md-6 col-lg-12">*}
                            {*<div class="well well-sm">*}
                                {*<div>*}
                                    {*<h1 class="font-extra-bold m-t-0">55</h1>*}

                                    {*<div class="small m-t-xl">*}
                                        {*<i class="fa fa-group fa-3x opacity40"></i>*}
                                    {*</div>*}
                                    {*<small>ממקומות פנויים</small>*}
                                {*</div>*}
                            {*</div>*}
                        {*</div>*}
                    </div>

                </div>
            </div>
            {*<div class="col-xs-3 col-sm-3 col-lg-3">{include file="seatingArrangement/add_table_form.tpl"}</div>*}
        </div>

        <div class="row">
            <div class="col-lg-12" style="float: none">
                <h2 class="page-header">
                    <small>
                        <span>סידור שולחנות</span>
                    </small>
                </h2>
            </div>
            <div id="seatingArrangementTables" class="clearfix" style="position: relative;">


                {include file="seatingArrangement/tables.tpl"}
            </div>
        </div>
    </div>
</div>
{include file="seatingArrangement/edit_table_model.tpl"}

{include file="common/footer.tpl"}
