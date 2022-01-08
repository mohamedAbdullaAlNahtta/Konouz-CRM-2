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
<script>
    changecolors();
    var x;

    function changecolors() {
        x = 1;
        setInterval(change, 500);
    }

    function change() {
        if (x === 1) {
            color = "White";
            x = 2;
        } else {
            color = "#b4c6e7";
            x = 1;
        }

        var elements = document.getElementsByClassName("On Sale"); // get all elements
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.backgroundColor = color;
        }
    }
</script>





<script>
    $(document).ready(
        $(function () {
            $("#RoofArea").on("input", function () {
                if ($(this).val().length) $("#GardenArea").prop("disabled", true);
                else $("#GardenArea").prop("disabled", false);
                if ($(this).val().length) $("#OpenTrasArea").prop("disabled", true);
                else $("#OpenTrasArea").prop("disabled", false);
            });
          
        })
    );
    $(document).ready(
        $(function () {
            $("#GardenArea").on("input", function () {
                if ($(this).val().length) $("#RoofArea").prop("disabled", true);
                else $("#RoofArea").prop("disabled", false);
            });
            $("#OpenTrasArea").on("input", function () {
                if ($(this).val().length) $("#RoofArea").prop("disabled", true);
                else $("#RoofArea").prop("disabled", false);
            });
        })
    );
</script>

<!-- Magnific popup JavaScript -->
<script src="assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>


<!-- Sweet-Alert  -->
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script>

<!-- jQuery file upload -->
<script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>
<script>
    $(document).ready(function () {
        // Basic
        $(".dropify").dropify();

        // Translated
        $(".dropify-fr").dropify({
            messages: {
                default: "Glissez-déposez un fichier ici ou cliquez",
                replace: "Glissez-déposez un fichier ou cliquez pour remplacer",
                remove: "Supprimer",
                error: "Désolé, le fichier trop volumineux",
            },
        });

        // Used events
        var drEvent = $("#input-file-events").dropify();

        drEvent.on("dropify.beforeClear", function (event, element) {
            return confirm('Do you really want to delete "' + element.file.name + '" ?');
        });

        drEvent.on("dropify.afterClear", function (event, element) {
            alert("File deleted");
        });

        drEvent.on("dropify.errors", function (event, element) {
            console.log("Has Errors");
        });

        var drDestroy = $("#input-file-to-destroy").dropify();
        drDestroy = drDestroy.data("dropify");
        $("#toggleDropify").on("click", function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        });
    });
</script>


<?php

if (isset($GLOBALS['unit_delete'])) {
    $xxx = $GLOBALS['unit_delete'];

$xxxx = str_replace('.', '.\n ', $xxx );

if ($xxx === true) { ?>
<script type="text/javascript">

 swal("Good job!", "<?php echo htmlentities('Unit has been deleted successfully'); ?>.", "success"); 

// Your application has indicated there's an error
window.setTimeout(function () {
    // Move to a new location or you can do something else
    window.location.href = "index?module=Unites";
}, 3000);

//window.location.href = "index?module=Developers";

</script>
<?php

} else if(is_string($GLOBALS['unit_delete'])) {?>
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


if (isset($GLOBALS['unit_dml'])) {
    $xxx = $GLOBALS['unit_dml'];

$xxxx = str_replace('.', '.\n ', $xxx );

if ($xxx === true) { ?>
<script type="text/javascript">

 swal("Good job!", "<?php echo htmlentities('New Data has been Saved successfully'); ?>.", "success"); 

// Your application hasn't indicated there's an error
window.setTimeout(function () {
    // Move to a new location or you can do something else
    window.location.href = "index?module=Unites";
}, 3000);



</script>
<?php

} else if(is_string($GLOBALS['unit_dml'])) {?>
<script type="text/javascript">
 swal({   
            title: "Opps!",   
            text: "<?php echo 'You have an Error which is\n '.htmlentities($xxxx); ?>",   
            type: "warning",   
            showCancelButton: true, 
            showConfirmButton: false,   
            cancelButtonColor: "#DD6B55",   
        });  

// Your application has indicated there's an error
window.setTimeout(function () {
    // Move to a new location or you can do something else
    window.location.href = "index?module=Unites";
}, 3000);


</script>
<?php }
}
?>

<!-- Drop-down list dependent form -->
<!-- <script>
    $(document).ready($(function() {
    $(".dependent-form").hide();
    $("#unitStatusform").change(function() {
        switch($(this).val()){ 
            case "4":
                $(".dependent-form").hide().parent().find("#Status-Reason").show();
                $(".dependent-form").hide().parent().find("#Held-For").show();
                $(".dependent-form").hide().parent().find("#Hold-Can-Work-On").show();
                break;
            case "5":
                $(".dependent-form").hide().parent().find("#Status-Reason").show();
                $(".dependent-form").hide().parent().find("#Held-For").show();
                $(".dependent-form").hide().parent().find("#Hold-Can-Work-On").show();
                break;
            case "6":
                $(".dependent-form").hide().parent().find("#Status-Reason").show();
                $(".dependent-form").hide().parent().find("#Held-For").show();
                $(".dependent-form").hide().parent().find("#Hold-Can-Work-On").show();
                break;
        }
    });
}));
</script> -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- <script type="text/javascript">
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
</script> -->

