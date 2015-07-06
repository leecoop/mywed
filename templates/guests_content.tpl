<div id="guestsArea">
    <fieldset class="border1 padd5 bg3 border_radius">
        {*<legend align="center" class="seperator1 font18" dir="rtl"><h5>סך הכל : <span id="totalCount" value="{$count}">{$count}</span></h5>*}
        {*</legend>*}
        <div id="guestsContent" dir="rtl">
            <table id="guestsTable" class="display" cellspacing="0" width="100%">
                <thead>

                <tr>
                    {if $loc eq 'guests'}
                    <th></th>
                    {/if}
                    <th>שם</th>
                    <th>שם משפחה</th>
                    <th>מוזמנים</th>
                    <th>טלפון</th>
                    <th>צד</th>
                    <th>קבוצה</th>
                    {if $loc neq 'guests'}
                        {if $loc eq 'invitations' or $loc eq 'search' }
                            <th>נשלחה הזמנה</th>
                        {/if}
                        {if $loc eq 'rsvps' or $loc eq 'search' }
                            <th>אישור הגעה</th>
                        {/if}
                    {/if}
                </tr>
                </thead>
                {$total = 0}
                <tbody>

                {foreach $guests as $guest}
                    {$total = $total + $guest.amount}
                    {include file="guest_content.tpl"}
                {/foreach}
                </tbody>
                <script>
                    var table = $('#guestsTable').DataTable({
                        "columnDefs": [
                            { className: "dt-body-center", "targets": "_all" }
                        ],
                        "pageLength": 15,
                        "lengthMenu": [[10, 15, 25, 50, -1], [10, 15, 25, 50, "הכל"]],
                        "dom": 'frtip',

//                        dom: '<"top"T><"clear">lfrtip',
//                        tableTools: {
//                            "aButtons": [
//                                {
//                                    "sExtends": "copy",
//                                    "sButtonText": "העתק"
//                                },
//                                {
//                                    "sExtends": "xls",
//                                    "sButtonText": "יצא לאקסל"
//                                },
//                                {
//                                    "sExtends": "print",
//                                    "sButtonText": "הצג להדפסה"
//                                }
//
//                            ]
//                        },
                        "language": {
                            "lengthMenu": "תוצאות בעמוד _MENU_",
                            "zeroRecords": "אין תוצאות חיפוש",
                            "info": "עמוד _PAGE_ מתוך _PAGES_",
                            "infoEmpty": "לא נמצאו תוצאות חיפוש",
                            "infoFiltered": "",
                            "search": "חיפוש:",
                            "paginate": {
                                "next": "הבא",
                                "previous": "קודם"
                            }
                        }
                    });

                    var tt = new $.fn.dataTable.TableTools(table, {
//                       tableTools: {
                        "aButtons": [
                            {
                                "sExtends": "xls",
                                "sButtonText": "יצא לאקסל"
                            },


                            {
                                "sExtends": "copy",
                                "sButtonText": "העתק"
                            }

                        ]
//                       }
                    });

                    $(tt.fnContainer()).insertBefore('#guestsContent');

                    updateStatisticPanel({$total});
                </script>
            </table>
