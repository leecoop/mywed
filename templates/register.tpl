{include file="common/head.tpl"}
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">הרשמה</h3>
                </div>
                <div class="panel-body">
                    {*<form role="form"">*}
                    {*<fieldset>*}
                    <div class="form-group input-group">
                        <input style="direction: ltr" class="form-control" placeholder="אימייל" id="email" type="email" autofocus required>
                        <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>

                    </div>
                    <div class="form-group input-group">
                        <input style="direction: ltr" class="form-control" placeholder="סיסמא" id="password" type="password" value="" required>
                        <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>

                    </div>
                    <div class="form-group input-group">
                        <input style="direction: ltr" class="form-control" placeholder="סיסמא שנית" id="repassword" type="password" value="" required>
                        <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>

                    </div>
                    <div style=" height: 1px;
    margin: 9px 0;
    overflow: hidden;
    background-color: #e5e5e5"></div>

                    <div class="form-group input-group">
                        <input class="form-control" placeholder="שם החתן" id="groom_name"  required>
                        <span class="input-group-addon"><i class="fa fa-male fa-fw"></i></span>

                    </div>
                    <div class="form-group input-group">
                        <input class="form-control" placeholder="שם הכלה" id="bride_name" required>
                        <span class="input-group-addon"><i class="fa  fa-female  fa-fw"></i></span>

                    </div>

                    <div class="form-group input-group">
                        <input class="form-control" id="date" placeholder="תאריך" required>
                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>

                    </div>



                    <button onclick="register()" class="btn btn-lg btn-success btn-block" type="submit">הרשם</button>

                    {*</fieldset>*}
                    {*</form>*}
                </div>
                <div class="panel-footer">
                    <a href="login.php">התחבר</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#date").datepicker({
//            dateFormat: "dd/mm/yy"
            dateFormat: "yy-mm-dd"
        });
    });
</script>
</body>
</html>
