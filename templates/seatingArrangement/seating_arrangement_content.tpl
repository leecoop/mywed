<style>
    h1 { padding: .2em; margin: 0; }

</style>

<div>
<div id="products">
    <h1 class="ui-widget-header">מוזמנים</h1>
    <div id="catalog" >

        {foreach $guestGroupedByGroup as $group}
            <h2 ><a href="#" id="group_{$group@key}">{$groups[$group@key]}</a></h2>
            <div style="max-height: 100px">
                <ul>
                    {foreach $group as $guest}
                    <li id="{$guest->oid}" amount="{$guest->amount}">{$guest->name} {$guest->last_name} <b>({$guest->amount})</b></li>
                    {/foreach}
                </ul>
            </div>

        {/foreach}

    </div>
</div>

{include file="seatingArrangement/tables.tpl"}
</div>
<script>
    $(function() {
        $( "#catalog" ).accordion();
        $( "#catalog li" ).draggable({
            appendTo: "body",
            helper: "clone"
        });
        $( "#tables ol" ).droppable({
            activeClass: "ui-state-default",
            hoverClass: "ui-state-hover",
            accept: ":not(.ui-sortable-helper)",
            drop: function( event, ui ) {
                $( this ).find( ".placeholder" ).remove();
                $( "<li id='"+ui.draggable.attr("id")+"'></li>" ).text( ui.draggable.text() ).appendTo( this );
                ui.draggable.hide();
                tableDropResponse(event, ui,this.offsetParent.id);

            }
        }).sortable({
            items: "li:not(.placeholder)",
            sort: function() {
                // gets added unintentionally by droppable interacting with sortable
                // using connectWithSortable fixes this, but doesn't allow you to customize active/hoverClass options
                $( this ).removeClass( "ui-state-default" );
            }
        });
    });
    $( ".seating_table" ).draggable();


</script>