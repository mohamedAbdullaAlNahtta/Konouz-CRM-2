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
        $("#example23").DataTable({
        dom: "Bfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
        "order": []
        });

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

    var National_ID_Sel = document.getElementById("National_ID");
    var Full_Name_Sel  = document.getElementById("Full_Name");
    var Mobile_Sel = document.getElementById("Mobile");

    National_ID_Sel.onchange = function () {
        document.getElementById("Full_Name").selectedIndex = document.getElementById("National_ID").selectedIndex;
        document.getElementById("Mobile").selectedIndex = document.getElementById("National_ID").selectedIndex;
    };

    Full_Name_Sel.onchange = function () {
        document.getElementById("Mobile").selectedIndex = document.getElementById("Full_Name").selectedIndex;
        document.getElementById("National_ID").selectedIndex = document.getElementById("Full_Name").selectedIndex;
    };

    Mobile_Sel.onchange = function () {
        document.getElementById("National_ID").selectedIndex = document.getElementById("Mobile").selectedIndex;
        document.getElementById("Full_Name").selectedIndex = document.getElementById("Mobile").selectedIndex;
    };
};

function myFunctionCalculateAll(){
        var unitAreaVal = document.getElementById("unitArea").value;
        var unitBasicMeterPriceVal = document.getElementById("unitBasicMeterPrice").value;
        var unitUsufructAreaVal = document.getElementById("unitUsufructArea").value;
        var unitUsufructMeterPriceVal = document.getElementById("unitUsufructMeterPrice").value;
        //window.alert(unitAreaVal+'....'+unitBasicMeterPriceVal+'....'+unitUsufructAreaVal+'....'+unitUsufructMeterPriceVal);

        var unitOtherDiscountVal = document.getElementById("unitOtherDiscount").value;
        var totalUnitBasicPriceVal = ((unitBasicMeterPriceVal*(1-unitOtherDiscountVal))*unitAreaVal)+(unitUsufructAreaVal*unitUsufructMeterPriceVal);
        document.getElementById("totalUnitBasicPrice").innerHTML = totalUnitBasicPriceVal;
        // window.alert(totalUnitBasicPriceVal);
        var meterPriceWithDiscountVal =unitBasicMeterPriceVal*(1-unitOtherDiscountVal);
        meterPriceWithDiscountVal = Math.ceil(meterPriceWithDiscountVal); 
        document.getElementById("meterPriceWithDiscount").value = meterPriceWithDiscountVal;

        var annualPaymentPcVal = document.getElementById("annualPaymentPc").value;

        var downPaymentPcVal = document.getElementById("downPaymentPc").value;
        var receivingPaymentPcVal = document.getElementById("receivingPaymentPc").value;

        var downPaymentAmountBasicVal = totalUnitBasicPriceVal*downPaymentPcVal;
        var receivingPaymentAmountBasicVal = totalUnitBasicPriceVal*receivingPaymentPcVal;
        document.getElementById("downPayment").innerHTML = downPaymentAmountBasicVal;
        document.getElementById("receivingPayment").innerHTML = receivingPaymentAmountBasicVal;

        var remainingAmountVal = totalUnitBasicPriceVal-(downPaymentAmountBasicVal+receivingPaymentAmountBasicVal);
        remainingAmountVal = Math.ceil(remainingAmountVal);
        document.getElementById("remainingAmount").value = remainingAmountVal;

        var installmentYearsVal = document.getElementById("installmentYears").value;

        var annualWithRateVal = (remainingAmountVal/installmentYearsVal)*5;
        document.getElementById("annualWithRate").value=annualWithRateVal;

        var installmentInterestPcVal = document.getElementById("installmentInterestPc").value;

        /////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////
        var intrestAmountVal = annualWithRateVal*installmentInterestPcVal;
        document.getElementById("intrestAmount").value = intrestAmountVal;
        /////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////

        var installmentDiscountVal = document.getElementById("installmentDiscount").value;

        var totalPriceAfterInterestOrDiscountVal = downPaymentAmountBasicVal+receivingPaymentAmountBasicVal+remainingAmountVal+intrestAmountVal-(installmentDiscountVal*remainingAmountVal);
        totalPriceAfterInterestOrDiscountVal = Math.ceil(totalPriceAfterInterestOrDiscountVal);
        document.getElementById("totalPriceAfterInterestOrDiscount").value = totalPriceAfterInterestOrDiscountVal;


        var annualPaymentPcVal = document.getElementById("annualPaymentPc").value;
        var annualPaymentAmountVal = totalPriceAfterInterestOrDiscountVal*annualPaymentPcVal;
        annualPaymentAmountVal = Math.ceil(annualPaymentAmountVal);
        document.getElementById("annualPaymentAmount").value = annualPaymentAmountVal;

        var downPaymentAmountAfterInterestVal = totalPriceAfterInterestOrDiscountVal*downPaymentPcVal;
        downPaymentAmountAfterInterestVal = Math.ceil(downPaymentAmountAfterInterestVal);
        var receivingPaymentAmountAfterInterestVal = totalPriceAfterInterestOrDiscountVal*receivingPaymentPcVal;
        receivingPaymentAmountAfterInterestVal = Math.ceil(receivingPaymentAmountAfterInterestVal); 

        document.getElementById("downPaymentAmountAfterInterest").value = downPaymentAmountAfterInterestVal;
        document.getElementById("receivingPaymentAmountAfterInterest").value = receivingPaymentAmountAfterInterestVal;


        var totalUnitDiscoutAmountVal = totalPriceAfterInterestOrDiscountVal*(parseFloat(unitOtherDiscountVal)+parseFloat(installmentDiscountVal));
        totalUnitDiscoutAmountVal = Math.ceil(totalUnitDiscoutAmountVal);
        document.getElementById("totalUnitDiscoutAmount").value = totalUnitDiscoutAmountVal;


        var installmentAmountVal = (totalPriceAfterInterestOrDiscountVal -(downPaymentAmountAfterInterestVal + receivingPaymentAmountAfterInterestVal)-(annualPaymentAmountVal* installmentYearsVal))/ (installmentYearsVal*4);
        installmentAmountVal= Math.ceil(installmentAmountVal);
        document.getElementById("installmentAmount").value= installmentAmountVal;

        var meterPriceAfterInterestVal = totalPriceAfterInterestOrDiscountVal/ unitAreaVal;
        meterPriceAfterInterestVal= Math.ceil(meterPriceAfterInterestVal);
        document.getElementById("meterPriceAfterInterest").value = meterPriceAfterInterestVal;

        var mainitananceAmountVal = totalPriceAfterInterestOrDiscountVal *8/100;
        mainitananceAmountVal= Math.ceil(mainitananceAmountVal);
        document.getElementById("mainitananceAmount").value = mainitananceAmountVal;
        document.getElementById("mainitananceAmount2").innerHTML = "EGP "+mainitananceAmountVal;

        document.getElementById("installmentYears2").innerHTML= installmentYearsVal+" Year";
        document.getElementById("annualPaymentPc2").innerHTML= annualPaymentPcVal*100+" %";
        document.getElementById("downPaymentPc2").innerHTML= downPaymentPcVal*100+" %";
        document.getElementById("receivingPaymentPc2").innerHTML= receivingPaymentPcVal*100+" %";

        document.getElementById("downPaymentAmountAfterInterest2").innerHTML = "EGP "+downPaymentAmountAfterInterestVal;
        document.getElementById("receivingPaymentAmountAfterInterest2").innerHTML = "EGP "+receivingPaymentAmountAfterInterestVal;
        document.getElementById("installmentAmount2").innerHTML = "EGP "+installmentAmountVal;
        document.getElementById("annualPaymentAmount2").innerHTML = "EGP "+annualPaymentAmountVal;
        

    }
    

</script>




