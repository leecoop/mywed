{include file="common/general_error_modal.tpl"}
<input type="hidden" id="loc" value="{$loc}">
{include file="common/top_loader.tpl"}

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

    {include file="common/navigation/navbar_header.tpl"}
    <!-- /.navbar-header -->
    {if $isLoggedIn}
    {include file="common/navigation/navbar_top.tpl"}
    <!-- /.navbar-top-links -->

    {include file="common/navigation/sidebar.tpl"}
    {/if}
    <!-- /.navbar-static-side -->
</nav>