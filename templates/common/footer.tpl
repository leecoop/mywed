{if $loc eq 'invitations' or $loc eq 'rsvps'}
    {include file="guest/add_guest_floating.tpl"}
{/if}

{if $loc eq 'seating_arrangement'}
    {include file="seatingArrangement/add_table_floating.tpl"}
{/if}
<footer class="footer">
    <p class="pull-left" style="padding: 15px">Copyright 2015 PlusONE | All rights reserved.</p>
</footer>
</body>
</html>