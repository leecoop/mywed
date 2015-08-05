<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-user fa-fw"></i> הוספת מוזמנים
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <form id="addGuestForm" role="form" action="javascript:addEditGuest(0)" autocomplete="off">
            <div class="form-group">
                <input class="form-control" placeholder="שם" id="name" name="name" required>
            </div>


            <div class="form-group">
                {*<label>טלפון</label>*}
                <input class="form-control" placeholder="טלפון" id="phone" name="phone">
            </div>

            <div class="form-group">
                <label>צד</label>
                <select id="sides" name="sides" class="form-control">
                    {foreach $sides as $value}
                        <option value="{$value@key}">{$value}</option>
                    {/foreach}
                </select>
            </div>

            <div class="form-group">
                <label>קבוצה</label>
                <select id="groups" name="groups" class="form-control">
                    {foreach $groups as $value}
                        <option value="{$value@key}">{$value}</option>
                    {/foreach}
                </select>
            </div>

            <div class="form-group">
                <label>מספר מוזמנים</label>

                <div class="form-group">

                    <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(1)"><i
                                class="fa  fa-plus"></i></button>
                    <input id="amount" name="amount" value="1" readonly class="form-control"
                           style="width:60px; text-align: center; display:inline;cursor:default;background-color: #fff"/>
                    <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(-1)"><i
                                class="fa fa-minus"></i></button>
                </div>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">הוסף</button>

        </form>


    </div>
</div>
<script>
    $('#addGuestForm').validate();
</script>


