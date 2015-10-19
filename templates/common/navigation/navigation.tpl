{include file="common/general_error_modal.tpl"}
<input type="hidden" id="loc" value="{$loc}">
{include file="common/top_loader.tpl"}

<nav class="navbar navbar-inverse " role="navigation" style="margin-bottom: 0">
    <div class="container">
        <div class="row">
            {include file="common/navigation/navbar_header.tpl"}
            <!-- /.navbar-header -->
            {if $isLoggedIn}
                {include file="common/navigation/navbar_top.tpl"}
                <!-- /.navbar-top-links -->

            {/if}
            <!-- /.navbar-static-side -->
        </div>
    </div>
</nav>
{if $isLoggedIn}
{include file="common/navigation/sidebar.tpl"}
{/if}
