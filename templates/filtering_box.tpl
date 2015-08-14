<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-filter fa-fw"></i> סינון

    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr class="info">
                    <td>צד</td>
                </tr>
                <tr class="warning">
                    <td>
                        <div id="filterSides">
                            {foreach $sides as $value}
                                <div class="tagBG" onclick="filter('side_{$value@key}')" id="side_{$value@key}" value="{$value@key}">{$value}</div>
                            {/foreach}
                        </div>

                    </td>
                </tr>

                <tr class="info">
                    <td>קבוצה</td>
                </tr>
                <tr class="warning">
                    <td>

                        <div style="max-height: 140px; overflow-y: auto;direction: ltr;">
                            <div style="direction: rtl">
                                <div id="filterGroups">
                                    {foreach $groups as $value}
                                        <div class="tagBG" onclick="filter('group_{$value@key}')" id="group_{$value@key}" value="{$value@key}">{$value}</div>
                                    {/foreach}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
