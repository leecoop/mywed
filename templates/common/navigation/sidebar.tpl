<div class="sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav nav-side" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input id="search_text" onkeypress="searchKeyPress(event)" type="text" class="form-control" placeholder="חיפוש...">
                                <span class="input-group-btn">
                                <button onclick="search()" class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li {if $loc eq 'dashboard'} class="active"  {/if} >
                <a href="index"><i class="fa fa-dashboard fa-fw"></i> ראשי</a>
            </li>
            <li {if $loc eq 'guests'}  class="active" {/if}>
                <a  href="guests"><i class="fa fa-user fa-fw"></i> מוזמנים</a>
            </li>
            <li {if $loc eq 'invitations'}  class="active" {/if}>
                <a  href="invitations"><i class="fa fa-envelope fa-fw"></i> חלוקת הזמנות</a>
            </li>
            <li {if $loc eq 'rsvps'}  class="active" {/if}>
                <a  href="rsvps"><i class="fa fa-thumbs-o-up fa-fw"></i> אישורי הגעה</a>
            </li>
            <li {if $loc eq 'seating_arrangement'}  class="active" {/if}>
                <a  href="seating-arrangement"><i class="fa fa-group fa-fw"></i> סידור ישיבה</a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>