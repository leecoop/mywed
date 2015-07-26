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
                    {*<form role="form" action="register.php">*}
                        {*<fieldset>*}
                            <div class="form-group">
                                <input class="form-control" placeholder="שם החתן" id="groom_name"  autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="שם השכלה" id="bride_name"  >
                            </div>

                            <div class="form-group">
                                <input class="form-control" id="date"  placeholder="תאריך" >
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="אימייל" id="email" type="email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="סיסמא" id="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="סיסמא שנית" id="repassword" type="password" value="">
                            </div>


                            <!-- Change this to a button or input when using this as a form -->
                            {*<a href="check_login.php" class="btn btn-lg btn-success btn-block">כניסה</a>*}
                            {*<a href="check_login.php" class="btn btn-lg btn-success btn-block">כניסה</a>*}
                            <button onclick="register()" class="btn btn-lg btn-success btn-block" type="submit">הרשם</button>

                        {*</fieldset>*}
                    {*</form>*}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $( "#date" ).datepicker({
//            dateFormat: "dd/mm/yy"
            dateFormat: "yy-mm-dd"
        });
    });
</script>
</body>
</html>
