{include file="common/head.tpl"}

<div id="wrapper">
    {include file="common/navigation/navigation.tpl"}
    {*<span id="display" style=" background-color: black;    border: 1px solid;    color: white;    left: 50%;    padding: 5px;    position: fixed;    top: 0;    z-index: 2000;"></span>*}

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">סידורי ישיבה</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="panel panel-default zIndex1" id="groupsContainer" style="z-index: 1000">
                    <div class="panel-heading"> מוזמנים
                        <i style="color: #428bca; font-size: large" class="cursor-pointer fa fa-minus-square pull-left" onclick="handleGroupsContainerMinimize(this)"></i>
                    </div>
                    <div class="panel-body">
                        <div id="groups" class="panel-group" style="z-index: 2000;margin-bottom: 0">
                            {include file="seatingArrangement/guest_group.tpl"}
                        </div>
                    </div>
                </div>
                <div id="groupsContainerAlias" style=" display: none;"></div>
            </div>
            {*<div class="col-xs-3 col-sm-3 col-lg-3">{include file="seatingArrangement/add_table_form.tpl"}</div>*}
        </div>

        <div class="row">
            <div id="seatingArrangementTables" class="clearfix" style="position: relative;">


                {include file="seatingArrangement/tables.tpl"}
            </div>


            {*<div class="col-lg-3">*}

            {*<div class="col-xs-12 col-sm-12 col-lg-3">*}

            {*<p>*}
            {*<button type="submit" onclick="$('#seatingArrangementTables').printArea();return false"*}
            {*class="btn btn-info btn-lg btn-block"><i class="fa fa-print"></i>*}
            {*הדפס שולחנות*}
            {*</button>*}
            {*</p>*}
            {*{include file="common/statistic_gage.tpl"}*}
            {*{include file="seatingArrangement/add_table_form.tpl"}*}


            {*</div>*}
        </div>
    </div>
</div>
<div id="editTableModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ערוך פרטי שולחן</h4>
            </div>
            <div class="modal-body">
                <form id="editTableForm" role="form" autocomplete="off">
                    <div class="form-group">
                        <label for="editTitle">שם שולחן</label>
                        <input class="form-control" id="editTitle" required>
                    </div>

                    <div class="form-group">
                        <label for="editAmount">גודל שולחן</label>
                        <input class="form-control" id="editAmount">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-default" onclick="$('#editTableForm').submit()" value="עדכן"/>
                <button type="button" class="btn btn-default" id="deleteTableBtn">מחק</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">סגור</button>
            </div>
        </div>

    </div>
</div>
{*</div>*}

{*<script>*}
    {*$(window).scrollTop(0);*}
    {*$(document).ready(function ($) {*}
        {*initSeatingArrangement();*}
        {*var initWidth =  $('#groupsContainer').outerWidth() + "px";*}

        {*var stickyHeaderTop = $('#groupsContainer').offset().top;*}
        {*var initHeight =  $('#groupsContainer').outerHeight();*}

{*//*}
        {*$('#stickyalias').css('height',initHeight);*}
        {*$(window).scroll(function(){*}
                {*if( $(window).scrollTop() > stickyHeaderTop ) {*}
                    {*$('#groupsContainer').css({ position: 'fixed', top: '0px', width:initWidth});*}
                    {*$('#stickyalias').css('display', 'block');*}

                {*} else {*}
                    {*$('#groupsContainer').css({ position: 'static', top: '0px'});*}
                    {*$('#stickyalias').css('display', 'none');*}
                {*}*}
            {*});*}

{*//        $("#seatingArrangementTables").mCustomScrollbar({*}
{*////            autoHideScrollbar:true,*}
{*//            theme:"inset-2-dark",*}
{*//            scrollButtons:{ enable: true }*}
{*////            scrollbarPosition:"outside"*}
{*//        });*}
{*//        $("[data-type='group']").mCustomScrollbar({*}
{*//            setHeight: 100,*}
{*//            theme: "dark-3"*}
{*//        });*}
{*//        $("ol").mCustomScrollbar({*}
{*////            setHeight:240,*}
{*//            setWidth:80,*}
{*//            theme:"dark-3"*}
{*//        });*}
{*//        if (screenWidth > 768) {*}
{*//            $('#products').affix({*}
{*//                offset: {*}
{*//                    top: $('#products').offset().top - 10*}
{*////                    ,*}
{*////                    bottom: $('footer').offset().top - $('#tables div').last().offset().top + 15*}
{*//*}
{*//                }*}
{*//            }).on('affix.bs.affix', function () {*}
{*//                var that = $(this);*}
{*//                that.css({ width: that.outerWidth(), top: 10 });*}
{*//            });*}
{*//*}
{*//            if ($('#products').hasClass('affix')) {*}
{*//                $('#products').removeClass('affix').trigger('affix.bs.affix').addClass('affix');*}
{*//            }*}
{*//        }*}
{*//*}
{*//        $('#groups').affix({*}
{*//                offset: {*}
{*//                    top: $('#groups').offset().top - 10*}
{*////                    ,*}
{*////                    bottom: $('footer').offset().top - $('#tables div').last().offset().top + 15*}
{*//*}
{*//                }*}
{*//            }).on('affix.bs.affix', function () {*}
{*//                var that = $(this);*}
{*//                that.css({ width: that.outerWidth(), top: 10 });*}
{*//            });*}
{*//*}
{*//            if ($('#groups').hasClass('affix')) {*}
{*//                $('#groups').removeClass('affix').trigger('affix.bs.affix').addClass('affix');*}
{*//            }*}



{*//        $("#seatingArrangementTables").click(function(e){*}
{*//            var clickedElement = elementAtMousePosition(e.pageX ,e.pageY);*}
{*//            if(clickedElement.id == "seatingArrangementTables"){*}
{*//                closeOpenedTables();*}
{*//            }*}
{*//        });*}
    {*});*}
    {*//*}
    {*//                function elementAtMousePosition(x,y) {*}
    {*//                    return document.elementFromPoint(x,y);*}
    {*//                }*}
{*</script>*}
{include file="common/footer.tpl"}
