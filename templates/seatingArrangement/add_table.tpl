{*<div id="add_guest">*}

{*<div class="site_content_small" style="margin-bottom: 20px">*}
    {*<div class="box_title">*}
        {*<div class="title_text">חדש</div>*}
    {*</div>*}
    {*<table id="add_table" class="w3" cellspacing="0" cellpadding="1" border="0"*}
           {*style="font-weight: bolder; margin:4px; width:100%">*}
        {*<tr>*}
            {*<td align="right" valign="middle" class="w3">שם:</td>*}
            {*<td align="right" valign="middle"><input style="width: 135px" id="title"*}
                                                     {*title="יש להזין שם"*}
                                                     {*type="text" class="leadnews" placeholder="שם שולחן"*}
                        {*value="שולחן {$tablesCount} "*}
                        {*/></td>*}

            {*<td align="right" valign="middle" class="w3">גודל שולחן:</td>*}
            {*<td align="right" valign="middle">*}
                {*<input type="submit" class="buttonCss" style="width: 25px" onclick="updateAmount(1)" value="+"/>*}
                {*<input id="amount" name="amount" type="text" value="12" class="leadnews" style="width:25px; text-align: center;"/>*}
                {*<input type="submit" class="buttonCss" style="width: 25px" onclick="updateAmount(-1)" value="-"/>*}
            {*</td>*}
            {*<td>*}
                {*<input type="submit" style="width: 120px" onclick="addTable(0)" class="largeOff" value="הוסף שולחן"/>*}

            {*</td>*}
        {*</tr>*}
    {*</table>*}
{*</div>*}
{*<script>*}
    {*var tooltips = $("[title]").tooltip({*}
        {*position: {*}
            {*my: "center top",*}
            {*at: "center top-30"*}
        {*}*}
    {*});*}
{*</script>*}
{*</div>*}

{*{include file="create_new_group.tpl"}*}

<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-group fa-fw"></i> הוספת שולחן
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

        <div class="form-group">
            <input class="form-control" placeholder="שם שולחן" id="title">
        </div>


        <div class="form-group">
            <label>גודל שולחן</label>

            <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(1)"><i class="fa  fa-plus"></i></button>
            <input id="amount" value="12" class="form-control" style="width:60px; text-align: center; display:inline "/>
            <button class="btn btn-default btn-circle" type="button" onclick="updateAmount(-1)"><i class="fa fa-minus"></i></button>

        </div>


        <button class="btn btn-primary btn-lg btn-block" type="button" id="add_new_guest_btn" onclick="addTable(0)">
            הוסף שולחן
        </button>

    </div>
</div>