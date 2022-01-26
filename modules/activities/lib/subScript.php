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
        "order": []
    });
</script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>


<!-- Drop-down list dependent form for sale type and broker -->
<script>
    $(document).ready($(function() {
    $(".dependent-form").hide();
    $(".dependent-form-image").hide();
    $("#sale-typ-option").change(function() {
        switch($(this).val()){ 
            case "1":
                $("#broker-form-value").hide();
                $("#broker-form-image").hide();
                $(".dependent-form-image").hide();
                break;
            case "2":
                $("#broker-form-value").show();
                $("#broker-form-image").show();
                $(".dependent-form-image").show();
                break;
        }
    });
}));
</script>

<!-- Drop-down list dependent form for activty status and claim and refunded -->
<script>
    $(document).ready($(function() {
    $(".dependent-status-form").hide();
    $("#activity-status-option").change(function() {
        switch($(this).val()){ 
            case "1":
                $(".dependent-status-form").parent().find("#Refunded-broker-form-value").hide();
                $(".dependent-status-form").parent().find("#Filled-Claim-form-value").hide();
                break;
            case "2":
                $(".dependent-status-form").parent().find("#Refunded-broker-form-value").show();
                $(".dependent-status-form").parent().find("#Filled-Claim-form-value").show();
                break;
            case "3":
                $(".dependent-status-form").parent().find("#Refunded-broker-form-value").show();
                $(".dependent-status-form").parent().find("#Filled-Claim-form-value").show();
                break;
        }
    });
}));
</script>

<!-- Drop-down list dependent form for activty installment plan years, discount and intrest-->
<script>

window.onload = function () {
    var installmentYearsSel = document.getElementById("installmentYears");
    var installmentInterestPcSel  = document.getElementById("installmentInterestPc");
    var installmentDiscountSel = document.getElementById("installmentDiscount");

    installmentYearsSel.onchange = function () {
        document.getElementById("installmentInterestPc").selectedIndex = document.getElementById("installmentYears").selectedIndex;
        document.getElementById("installmentDiscount").selectedIndex = document.getElementById("installmentYears").selectedIndex;
    };

    installmentInterestPcSel.onchange = function () {
        document.getElementById("installmentDiscount").selectedIndex = document.getElementById("installmentInterestPc").selectedIndex;
        document.getElementById("installmentYears").selectedIndex = document.getElementById("installmentInterestPc").selectedIndex;
    };

    installmentDiscountSel.onchange = function () {
        document.getElementById("installmentYears").selectedIndex = document.getElementById("installmentDiscount").selectedIndex;
        document.getElementById("installmentInterestPc").selectedIndex = document.getElementById("installmentDiscount").selectedIndex;
    };
};

</script>

<!-- Drop-down list dependent form for activty installment plan years, discount and intrest-->
<script>
// var receivingPaymentPcCalc= receivingPaymentVal/unitBasicPriceVal;
// receivingPaymentPcCalc = Math.ceil(receivingPaymentPcCalc);
// receivingPaymentPcCalc = receivingPaymentPcCalc.toFixed(0);
// window.alert(receivingPaymentPcCalc);


//// getting receivingPaymentPcVal
// function getreceivingPaymentPc(){

//     var receivingPaymentVal = document.getElementById("receivingPayment").value;
//     var unitBasicPriceVal = document.getElementById("unitBasicPrice").value;
//     document.getElementById("receivingPaymentPc").value = receivingPaymentVal/unitBasicPriceVal;

// }

// // getting receivingPaymentVal
// function getreceivingPayment(){

//     var receivingPaymenPcVal = document.getElementById("receivingPaymentPc").value;
//     var unitBasicPriceVal = document.getElementById("unitBasicPrice").value;
//     document.getElementById("receivingPayment").value = receivingPaymenPcVal*unitBasicPriceVal;


// }

// // getting annVal
// function getannualWithRate(){

// var installmentYearsVal = document.getElementById("installmentYears").value;
// var basicMeterPriceVal = document.getElementById("basicMeterPrice").value;
// document.getElementById("annualWithRate").value = (basicMeterPriceVal/installmentYearsVal)*5;


// }
    
        

    

        
</script>
