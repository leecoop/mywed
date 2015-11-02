<div class="row">
    <div class="col-lg-12" style="position: relative">
        <i class="fa fa-map-marker" style="position: absolute; top: 12px;right: 15px"></i>

        <ol class="breadcrumb">

            {if $loc eq 'dashboard'}
                <li class="active">ראשי</li>
            {else}
                <li><a href="index">ראשי</a></li>
                <li class="active">{$title}</li>
            {/if}

        </ol>
    </div>
</div>