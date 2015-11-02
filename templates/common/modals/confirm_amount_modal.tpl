<div id="confirmAmountModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-primary">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                <h4 class="modal-title">מספר מוזמנים</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <button class="btn btn-primary btn-circle btn-lg" type="button" onclick="updateAmount(1, this)"><i class="fa  fa-plus"></i></button>
                    <input id="confirmAmount" name="amount" readonly class="form-control" data-type="amount"
                           style="width:58%;font-size: xx-large; height: auto; text-align: center; display:inline;cursor:default;background-color: #fff"/>
                    <button class="btn btn-primary btn-circle btn-lg" type="button" onclick="updateAmount(-1, this)"><i class="fa fa-minus"></i></button>
                </div>
                <p><button id="confirmAmountBtn" class="btn btn-primary btn-lg center-block" type="button">אישור</button></p>
            </div>
        </div>
    </div>
</div>