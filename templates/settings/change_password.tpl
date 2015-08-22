<div class="col-md-4">
    <h3><span class="fa fa-lock pLeft5"></span>שינוי סיסמה</h3>
    <div class="panel panel-default">
          <div class="panel-body">
            <form id="changePasswordForm" role="form" action="javascript:changePassword()" autocomplete="off">
                <div class="form-group has-feedback">
                    <label>סיסמה נוכחית</label>
                    <input style="direction: ltr" class="form-control" placeholder="●●●●●●" id="currentPassword" type="password" name="currentPassword" >
                    <span style="right: 0" class="fa form-control-feedback"></span>
                </div>
                <br>
                <div class="form-group has-feedback">
                    <label>סיסמה חדשה</label>
                    <input style="direction: ltr" class="form-control" placeholder="●●●●●●" id="newPassword" type="password" name="newPassword" >
                    <span style="right: 0" class="fa form-control-feedback"></span>
                </div>
                <div class="form-group  has-feedback">
                    <label>חזור על הסיסמה שנית</label>
                    <input style="direction: ltr" class="form-control" placeholder="●●●●●●" id="confirmNewPassword" name="confirmNewPassword" type="password" >
                    <span style="right: 0" class="fa form-control-feedback"></span>
                </div>
                <button class="btn btn btn-default btn-lg btn-block" type="submit">שנה סיסמה</button>
            </form>
        </div>

    </div>
</div>
<script>
    $().ready(function() {
        $('#changePasswordForm').validate({
            onfocusout: false,
            rules:{
                currentPassword: {
                    required:true,
                    minlength:6
                },
                newPassword: {
                    required:true,
                    minlength:6
                },
                confirmNewPassword:{
                    required: true,
                    minlength:6,
                    equalTo: "#newPassword"
                }
            },
            messages:{
                currentPassword:{
                    required:jsTranslation.requiredPassword
                },
                newPassword:{
                    required:jsTranslation.requiredPassword
                },
                confirmNewPassword:{
                    required:jsTranslation.requiredConfirmPassword,
                    equalTo:jsTranslation.passwordsNotEqual

                }

            }
        });
    })

</script>