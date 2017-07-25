$(document).ready(function () {
    $('input[type=radio]').change(function() {
        if (this.value == 'visa') {
            console.log("visa");
        }
        else if (this.value == 'credit-points') {
            console.log("credit-points");
        }
        else if (this.value == 'mastercard') {
            console.log("mastercard");
        }
        else if (this.value == 'invoice') {
            console.log("invoice");
        }
    });
});