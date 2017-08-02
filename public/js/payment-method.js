$(document).ready(function () {
    $('#submitOrder').attr("disabled", "disabled");

    $('input[type=radio]').change(function() {
        if (this.value == 'visa') {
            $('#error_msg').html("");
            console.log("visa");
        }
        else if (this.value == 'credit-points') {
            var total = parseFloat($('#total').html());
            var points = parseFloat($('#points').html());
            var remain = points - total;
            if(remain<0) {
                var html = ""
                html += '<div class="alert alert-warning alert-dismissible">';
                html += '    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">×</button>';
                html += '    <h4>';
                html += '    <i class="icon fa fa-warning"></i>';
                html += '    Alert!';
                html += '   </h4>';
                html += '   You dont have enough credit points to purchase the product/s. Please contact our sales to buy credit points.';
                html += '</div>';
                $('#error_msg').html("");
                $('#error_msg').append(html);
            } else {
                $('#submitOrder').removeAttr("disabled", "disabled");    
            }
            
        }
        else if (this.value == 'mastercard') {
            $('#error_msg').html("");
            console.log("mastercard");
        }
        else if (this.value == 'invoice') {
            $('#error_msg').html("");
            console.log("invoice");
        }
        else if (this.value == 'paypal') {
            $('#error_msg').html("");
            console.log("paypal");
        }
    });
});

