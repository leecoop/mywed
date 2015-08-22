{include file="common/head.tpl"}
<body>
{include file="common/general_error_modal.tpl"}

{include file="common/top_loader.tpl"}

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">כניסה</h3>
                </div>
                <div class="panel-body">
                    <div class="alert alert-danger hidden" id="errorMsg"></div>
                    {*<form role="form" action="check_login.php">*}
                    <form id="loginForm" role="form" action="javascript:checkLogin()" autocomplete="off">

                        {*<fieldset>*}
                        <div class="form-group has-feedback">
                            <label for="email"><span class="fa fa-user"></span> דוא"ל</label>
                            <input type="email" autofocus name="email" id="email" placeholder="example@gmail.com" class="form-control" style="direction: ltr">
                            <span style="right: 0" class="fa form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="password"><span class="fa fa-lock"></span> סיסמה</label>
                            <input class="form-control" style="direction: ltr" placeholder="●●●●●●" name="password" id="password" type="password">
                            <span style="right: 0" class="fa form-control-feedback"></span>

                        </div>


                        {*<div class="checkbox">*}
                        {*<label>*}
                        {*<input name="remember" type="checkbox" value="Remember Me">השאר אותי מחובר*}
                        {*</label>*}
                        {*</div>*}
                        {*<br/>*}
                        <button class="btn btn-lg btn-success btn-block" type="submit">כניסה</button>
                        {*</fieldset>*}
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="register.php">הרשמה</a>
                    {*<a href="register.php" class="pull-left">שחכתי סיסמא</a>*}
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script>
    $().ready(function () {
        $('#loginForm').validate({
//            errorElement: "em",
//            errorClass: "has-error",
//            validClass: "has-success",
//            highlight: function(element, errorClass, validClass) {
//                $(element).parent('div').addClass(errorClass).removeClass(validClass);
//                $(element).nextAll('.form-control-feedback').addClass('fa-times').removeClass('fa-check');
//            },
//            unhighlight: function(element, errorClass, validClass) {
//                $(element).parent('div').removeClass(errorClass).addClass(validClass);
//                $(element).nextAll('.form-control-feedback').removeClass('fa-times').addClass('fa-check');
//            },


            onfocusout: false,
            rules: {
                email: "required",
                password: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                email: {
                    required: jsTranslation.requiredEmail
                },
                password: {
                    required: jsTranslation.requiredPassword
                }
            }
        });
    })


</script>
</html>
