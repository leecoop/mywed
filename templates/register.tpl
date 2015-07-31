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
                    <form id="registerForm" role="form" action="javascript:register()" autocomplete="off">
                    <div class="form-group">
                        <label>דוא"ל</label>
                        <input style="direction: ltr" class="form-control" placeholder="example@gmail.com" id="email" type="email" autofocus name="email">
                        {*<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>*}
                    </div>
                    <div class="form-group">
                        <label>סיסמה</label>
                        <input style="direction: ltr" class="form-control" placeholder="●●●●●●" id="password" type="password" name="password" >
                        {*<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>*}

                    </div>
                    <div class="form-group">
                        <label>חזור על הסיסמה שנית</label>
                        <input style="direction: ltr" class="form-control" placeholder="●●●●●●" id="confirm_password" name="confirm_password" type="password" >
                        {*<span class="input-group-addon"><i class="fa fa-lock fa-fw"></i></span>*}

                    </div>


                    <button class="btn btn-lg btn-success btn-block" type="submit">הרשם</button>
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="login.php">התחבר</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $().ready(function() {
        $('#registerForm').validate({
            rules:{
                email: "required",
                password: {
                    required:true,
                    minlength:6
                },
                confirm_password:{
                    required: true,
                    equalTo: "#password"
                }
            },
            messages:{
                email:{
                    required :jsTranslation.requiredEmail
                },
                password:{
                    required:jsTranslation.requiredPassword
                },
                confirm_password:{
                    required:jsTranslation.requiredConfirmPassword,
                    equalTo:jsTranslation.passwordsNotEqual

                }

            }
        });
        $("#date").datepicker({
//            dateFormat: "dd/mm/yy"
            dateFormat: "yy-mm-dd"
        });
    })

</script>
</body>
</html>
