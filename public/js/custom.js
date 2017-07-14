$(document).ready(function(){
    $("#hide").click(function(){
        $("#all").hide(200);
    });
    $("#show").click(function(){
        $("#all").show(200);
    });

   $('.btnNext').click(function(){
      $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });

      $('.btnPrevious').click(function(){
      $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    })

    $('.dropdown-toggle').dropdown(); 
    

});

 function readURL(input, defaultPath) 
 {
    var val = $(input).val().toLowerCase(); 

    if (input.files && input.files[0]) {
        var file = input.files[0];
        var regex = new RegExp("(.*?)\.(jpg|jpeg|bmp|gif|png)$");
        if(!(regex.test(val))) {
            $(input).val('');
            $('#changePic')
                .attr('src', defaultPath);
            $('#changeOnSuccess').attr('disabled', 'disabled');    
            alert('Please select correct file format.');
            return false;
        } 

        if(file.size > 5242880 ) {
            alert('Maximum Upload size is 5MB.');
            $('#changeOnSuccess').attr('disabled', 'disabled');
            return false;
        }
        $('#changeOnSuccess').removeAttr('disabled');
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#changePic')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function callback()
{
    // console.log("The user has already solved the captcha, now you can submit your form.");
    $('#captcha').val(grecaptcha.getResponse().length);
    if(grecaptcha.getResponse().length !== 0){
       // console.log("The captcha has been already solved");
    }
}



function getCartTotal(id)
{
    $.ajax({
        url: '/cemos-portal/new-cart-total', 
        success: function(res) {
            var d = JSON.parse(res);
            if (d) {
                $('#subtotal').html(d.subtotal);
                $('#total').html(d.total);
                $('#tax').html(d.tax);
                $('#countP').html(d.count);
                $('#'+id).remove();
            }
           
            if(d.total <= 0){
                $('#emptyCartNotif').css('display','inline');
                $('#submitOrder').attr('disabled', true);
            }
            
        }
    });
}

function removeItem(id) 
{

    $.ajax({
        url: '/cemos-portal/remove-item', 
        type: 'POST', 
        data: { id: id},
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        beforeSend: function() {
            $('#spin_'+id).removeClass('hidden');
        }, 
        success: function(res) {
            if (res == 1) {
                getCartTotal(id);
            }
            else {
                alert("Oops, there's an error in removing the item. Kindly contact the website admin.");
            }
        }
    });
}
