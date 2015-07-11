<style>
    h1 {
        padding: .2em;
        margin: 0;
    }

    .item-catalog {
        margin-bottom: 7px;
        /*border: 1px solid #aaa; */
        /*position: relative; */
        /*text-align: center; */
        cursor: move;
        list-style-type: circle;

        /*width: 180px*/
    }
</style>

    <div class="panel panel-default" id="products" style="margin-top: 5px">
        <div class="panel-heading"> מוזמנים</div>

        <div class="panel-body">
            <div id="catalog" class="panel-group">
                {include file="seatingArrangement/guest_group.tpl"}
            </div>
        </div>
    </div>

    {include file="seatingArrangement/tables.tpl"}
<script>
    initSeatingArrangement();
</script>