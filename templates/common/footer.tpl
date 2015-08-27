{if $loc eq 'invitations' or $loc eq 'rsvps'}
{include file="add_guest_slick.tpl"}
<script>
    $(document).ready(function($){
        $('#addGuestPanel').dcSlick({
            idWrapper:'addGuestPanelSlick',
            location: 'left',
            align: 'top',
            offset: '20%',
            speed: 'slow',
            tabText: '<i class="fa fa-user fa-fw"></i>הוספת מוזמנים',
            autoClose: false,
            onLoad: function(){
                 addGuestFormValidator = $('#addGuestForm').validate();
            }
        });
    });
</script>
{/if}
<footer class="footer">
    <p class="pull-left" style="padding: 15px">Copyright 2015 PlusONE | All rights reserved.</p>
</footer>
</body>
</html>