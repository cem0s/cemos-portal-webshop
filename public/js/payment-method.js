$(document).ready(function () {
    $('#submitOrder').attr("disabled", "disabled");

    $('input[type=radio]').change(function() {
        if (this.value == 'visa') {
            console.log("visa");
        }
        else if (this.value == 'credit-points') {
            $('#submitOrder').removeAttr("disabled", "disabled");
        }
        else if (this.value == 'mastercard') {
            console.log("mastercard");
        }
        else if (this.value == 'invoice') {
            console.log("invoice");
        }
    });
});