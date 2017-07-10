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

function callback(){
    // console.log("The user has already solved the captcha, now you can submit your form.");
    $('#captcha').val(grecaptcha.getResponse().length);
    if(grecaptcha.getResponse().length !== 0){
       // console.log("The captcha has been already solved");
    }
}