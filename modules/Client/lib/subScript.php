<!-- ============================================================== -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="assets/plugins/bootstrap/js/tether.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>
<!-- This is data table -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
    $(document).ready(function () {
        $("#myTable").DataTable();
        $(document).ready(function () {
            var table = $("#example").DataTable({
                columnDefs: [
                    {
                        visible: false,
                        targets: 2,
                    },
                ],
                order: [[2, "asc"]],
                displayLength: 25,
                drawCallback: function (settings) {
                    var api = this.api();
                    var rows = api
                        .rows({
                            page: "current",
                        })
                        .nodes();
                    var last = null;
                    api.column(2, {
                        page: "current",
                    })
                        .data()
                        .each(function (group, i) {
                            if (last !== group) {
                                $(rows)
                                    .eq(i)
                                    .before('<tr class="group"><td colspan="5">' + group + "</td></tr>");
                                last = group;
                            }
                        });
                },
            });
            // Order by the grouping
            $("#example tbody").on("click", "tr.group", function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === "asc") {
                    table.order([2, "desc"]).draw();
                } else {
                    table.order([2, "asc"]).draw();
                }
            });
        });
    });
    $("#example23").DataTable({
        dom: "Bfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
        order: [],
    });
</script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
<!-- Sweet-Alert  -->
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script>


<?php 

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

if (isset($GLOBALS['object_dml'])) {
    $xxx = $GLOBALS['object_dml'];

$xxxx = str_replace('.', '.\n ', $xxx );

if ($xxx === true) { ?>
<script type="text/javascript">

 swal("Good job!", "<?php echo htmlentities('New Data has been Saved successfully'); ?>.", "success"); 

// Your application has indicated there's an error
window.setTimeout(function () {
    // Move to a new location or you can do something else
    window.location.href = "index?module=Client&tableName=<?php echo htmlentities($GLOBALS['tableName']); ?>&objecthome=true";
}, 3000);



</script>
<?php

} else if(is_string($GLOBALS['object_dml'])) {?>
<script type="text/javascript">
 swal({   
            title: "Opps!",   
            text: "<?php echo 'You have an Error which is\n '.htmlentities($xxxx); ?>",   
            type: "warning",   
            showCancelButton: true, 
            showConfirmButton: false,   
            cancelButtonColor: "#DD6B55",   
        });   
</script>
<?php }
}
 ?>

<!-- ============================================================== -->
<!-- ============================================================== -->
<script type="text/javascript">
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
</script>

<?php

if (isset($GLOBALS['object_delete'])) {
    $xxx = $GLOBALS['object_delete'];

$xxxx = str_replace('.', '.\n ', $xxx );

if ($xxx === true) { ?>
<script type="text/javascript">

 swal("Good job!", "<?php echo htmlentities('object has been deleted successfully'); ?>.", "success"); 
</script>


<script type="text/javascript">
// Your application has indicated there's an error
window.setTimeout(function () {
    // Move to a new location or you can do something else
    window.location.href = "index?module=Client&tableName=<?php echo htmlentities($GLOBALS['tableName']); ?>&objecthome=true'";
}, 3000);



</script>
<?php

} else if(is_string($GLOBALS['object_delete'])) {?>
<script type="text/javascript">
 swal({   
            title: "Opps!",   
            text: "<?php echo 'You have an Error which is\n '.htmlentities($xxxx); ?>",   
            type: "warning",   
            showCancelButton: true, 
            showConfirmButton: false,   
            cancelButtonColor: "#DD6B55",   
        });   
</script>
<?php } 
}
?>
<!-- ============================================================== -->
<!-- ============================================================== -->

