{include file="common/head.tpl"}
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">התחברות</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="check_login.php">
                        <fieldset>
                            <div class="form-group input-group">
                                <input type="email" autofocus=""  name="email" placeholder="אימייל"
                                       required
                                       {*title="יש להזין כתובת דואר חוקית"*}
                                       {*x-moz-errormessage="יש להזין כתובת דואר חוקית"*}

                                        {*required data-errormessage-value-missing="Something's missing" data-errormessage-type-mismatch="Invalid!"*}
                                       class="form-control" style="direction: ltr">
                                <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                            </div>
                            <div class="form-group  input-group">
                                <input class="form-control"  style="direction: ltr" placeholder="סיסמא" name="password" type="password"
                                       required=""
                                       {*required="required"*}
                                       {*title="Please enter you username Leon1"*}
                                       {*x-moz-errormessage="אנא מלא שדה זה"*}
                                       {*oninvalid="this.setCustomValidity('Witinnovation')"*}
                                       value="">
                                <span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>
                            </div>


                            {*<div class="checkbox">*}
                                {*<label>*}
                                    {*<input name="remember" type="checkbox" value="Remember Me">השאר אותי מחובר*}
                                {*</label>*}
                            {*</div>*}
                            {*<br/>*}
                            <button class="btn btn-lg btn-success btn-block" type="submit">כניסה</button>
                        </fieldset>
                    </form>
                </div>
                <div class="panel-footer">
                <a href="register.php">הרשמה</a>
                <a href="register.php" class="pull-left">שחכתי סיסמא</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
