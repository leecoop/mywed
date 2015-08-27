<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-key  fa-fw"></i> הוספת הרשאות מהירה
    </div>
    <div class="panel-body">
        <p class="text-info"><i class="fa fa-info-circle"></i> אפשר לאחרים לנהל מוזמנים בארוע זה</p>
        <div id="addPermissionsResponseMsg"></div>
        <fieldset {if !$isProjectMaster}disabled{/if}>
            <form id="addPermissionsForm" role="form" action="javascript:addPermissions()" autocomplete="off">
                <div class="form-group">
                    <label for="email"><span class="fa fa-user"></span> דוא"ל</label>
                    <input type="email" name="email" id="email" placeholder="example@gmail.com" class="form-control" required style="direction: ltr">
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">
                    הוסף
                </button>
            </form>
        </fieldset>

    </div>
</div>

<script>
    $('#addPermissionsForm').validate({
        onfocusout: false,
        messages: {
            email: {
                required: jsTranslation.requiredEmail
            }
        }
    });
</script>