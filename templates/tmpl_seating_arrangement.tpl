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
                <h1 class="page-header">סידורי ישיבה</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-9 padd0">
                <div class="col-xs-6 col-sm-4 col-lg-4 padd0">
                    <div class="panel panel-default" id="products">
                        <div class="panel-heading"> מוזמנים</div>
                        <div class="panel-body">
                            <div id="catalog" class="panel-group">
                                {include file="seatingArrangement/guest_group.tpl"}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6 col-sm-8 col-lg-8 padd0">
                    {include file="seatingArrangement/tables.tpl"}
                </div>
            </div>
            {*<div class="col-lg-3">*}

            <div class="col-xs-12 col-sm-12 col-lg-3">

                <p>
                    <button type="submit" onclick="$('#tables').printArea();return false"
                            class="btn btn-info btn-lg btn-block"><i class="fa fa-print"></i>
                        הדפס שולחנות
                    </button>
                </p>
                {include file="common/statistic_gage.tpl"}
                {include file="seatingArrangement/add_table.tpl"}


            </div>
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
</div>


{include file="common/footer.tpl"}
<script>
    $('#products').affix({
        offset: {
            top: $('#products').offset().top - 10 ,
            bottom: $('footer').offset().top - $('#tables div').last().offset().top + 15

        }
    }).on('affix.bs.affix', function () {
        var that = $(this);
        that.css({ width: that.outerWidth(), top: 10 });
    });

    if ($('#products').hasClass('affix')) {
        $('#products').removeClass('affix').trigger('affix.bs.affix').addClass('affix');
    }


    initSeatingArrangement();
</script>