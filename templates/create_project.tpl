{include file="common/head.tpl"}
<div id="wrapper">
    {include file="common/navigation/navigation.tpl"}

    <div id="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">יצירת ארוע חדש</h3>
                        </div>
                        <div class="panel-body">
                            <form id="newProjectForm" role="form" action="javascript:createProject()" autocomplete="off">


                                <div class="form-group">
                                    <label for="maleName"><span class="fa fa-male"></span> שם החתן</label>

                                    <input class="form-control" placeholder="שם החתן" id="maleName" name="maleName">
                                </div>

                                <div class="form-group">
                                    <label for="femaleName"><span class="fa fa-female"></span> שם הכלה</label>
                                    <input class="form-control" placeholder="שם הכלה" id="femaleName" name="femaleName">
                                </div>

                                <div class="form-group">
                                    <label for="date"><span class="fa fa-calendar-o"></span> תאריך</label>
                                    <input class="form-control" id="date" name="date" placeholder="תאריך">
                                </div>


                                <button class="btn btn-lg btn-success btn-block" type="submit">צור</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $().ready(function () {
        $('#newProjectForm').validate({
            rules: {
                maleName: "required",
                femaleName: "required",
                date: "required"
            }
        });
        $("#date").datepicker({
//            dateFormat: "dd/mm/yy"
            dateFormat: "yy-mm-dd"
        });
    })

</script>
{include file="common/footer.tpl"}

