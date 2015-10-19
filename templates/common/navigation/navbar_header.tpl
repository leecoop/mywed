<div class="navbar-header">
    {if $isLoggedIn}
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" onclick="">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <div class="user-panel dropdown visible-xs">
            <a data-toggle="dropdown" class="navbar-link dropdown-toggle" href="#"><i class="fa fa-lg fa-user"></i> <b
                        class="caret"></b></a>
            <ul class="dropdown-menu pull-left dropdown-menu-left">
                <li><a href="settings"><i class="fa fa-gear fa-fw"></i>הגדרות</a>
                </li>
                <li class="divider"></li>
                <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> צא</a>
                </li>
            </ul>
        </div>
    {/if}

    <a class="navbar-brand" style="font-family: Comic Sans MS;font-weight: bolder;" href="index">
        PlusOne#
    </a>
</div>