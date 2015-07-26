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
                            <div class="form-group">
                                <input class="form-control" placeholder="אימייל" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="סיסמא" name="password" type="password" value="">
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">השאר אותי מחובר
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            {*<a href="check_login.php" class="btn btn-lg btn-success btn-block">כניסה</a>*}
                            {*<a href="check_login.php" class="btn btn-lg btn-success btn-block">כניסה</a>*}
                            <button class="btn btn-lg btn-success btn-block" type="submit">כניסה</button>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
