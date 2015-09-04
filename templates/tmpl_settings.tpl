{include file="common/head.tpl"}
<div id="wrapper">
    {include file="common/navigation/navigation.tpl"}

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">הגדרות</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#changePassword">
                            <span class="fa fa-lock"></span>
                            התחברות
                        </a></li>
                    <li><a data-toggle="tab" href="#permissions">
                            <span class="fa fa-key"></span>
                            הרשאות
                        </a></li>
                    {*<li><a data-toggle="tab" href="#menu2">Menu 2</a></li>*}
                    {*<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>*}
                </ul>

                <div class="tab-content">
                    <div id="changePassword" class="tab-pane fade in active">
                        {include file="settings/change_password.tpl"}
                    </div>

                    <div id="permissions" class="tab-pane fade">
                        {include file="settings/manage_permmisions.tpl"}
                    </div>
                    {*<div id="menu2" class="tab-pane fade">*}
                        {*<h3>Menu 2</h3>*}
                        {*<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>*}
                    {*</div>*}
                    {*<div id="menu3" class="tab-pane fade">*}
                        {*<h3>Menu 3</h3>*}
                        {*<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>*}
                    {*</div>*}
                </div>
            </div>
            </div>
        </div>
    </div>
{include file="common/footer.tpl"}

