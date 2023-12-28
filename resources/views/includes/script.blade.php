<script src=" https://kit.fontawesome.com/d3336582c4.js" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.1/js/dataTables.fixedColumns.min.js">
</script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.7/api/fnFakeRowspan.js"></script>

<script>
    var dataTable;
    $(document).ready(function() {
        dataTable = $("#datatable").DataTable({
            responsive: true,
            buttons: [{
                extend: "print",
                class: 'buttons-print',
                text: "Print current page",
                autoPrint: true,
                exportOptions: {
                    columns: ":visible",
                    stripHtml: false,
                },
                footer: true,
                customize: function(win) {
                    $(win.document.body)
                        .find("table")
                        .addClass("display table-striped table-bordered cell-border")
                        .css("font-size", "9px");
                    $(win.document.body)
                        .find("tr:nth-child(odd) td")
                        .each(function(index) {
                            $(this).css("background-color", "#D0D0D0");
                        });
                    $(win.document.body)
                        .find("h1")
                        .css("text-align", "center");
                },
            }, ],
        });
        dataTable.columns.adjust().responsive.recalc();
        $("#datatable").hide();
        dataTable.destroy();
        $("#datatable")
            .DataTable({
                drawCallback: function(settings) {
                    alert("now its time to show again");
                    $("#datatable").show();
                },
            })
            .columns.adjust()
            .responsive.recalc();
    });
</script>

<script>
    $('#btnPrint').on('click', function() {
        dataTable.button(".buttons-print").trigger(); //trigger the click event
    });
</script>

<script>
    $("#searchInput").keyup(function() {
        var table = $(".datatable").DataTable();

        table.search($(this).val()).draw();
    });
</script>

<script>
    $(document).ready(function() {
        $("#mobile-menu-button").click(function() {
            $("#mobile-menu-slide").slideToggle("slow", function() {});
        });
    });
</script>

<script>
    AOS.init();
    AOS.refresh();
</script>
