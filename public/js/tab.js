$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
   
    var tab = $('.nav-tabs').find('li.active a').attr('href');
    var selectedItems = {};

    $("#step1").find('input:checkbox:checked').each(function() {
        if($(this).attr('id') == 1){
            selectedItems["regular_photo"] = $(this).attr('id');
        } else  if($(this).attr('id') == 2){
            selectedItems["drone_photo"] = $(this).attr('id');
        } else  if($(this).attr('id') == 3){
            selectedItems["360_degree_photo"] = $(this).attr('id');
        } else  if($(this).attr('id') == 4){
            selectedItems["360_virtual"] = $(this).attr('id');
        } else  if($(this).attr('id') == 5){
            selectedItems["twilight_photo"] = $(this).attr('id');
        } else  if($(this).attr('id') == 6){
            selectedItems["day_to_dustphoto"] = $(this).attr('id');
        } else  if($(this).attr('id') == 7){
            selectedItems["floorplanner"] = $(this).attr('id');
        } else  if($(this).attr('id') == 8){
            selectedItems["video_editing"] = $(this).attr('id');
        } else  if($(this).attr('id') == 9){
            selectedItems["photo_slider"] = $(this).attr('id');
        } else  if($(this).attr('id') == 10){
            selectedItems["give_away_brochure"] = $(this).attr('id');
        } else  if($(this).attr('id') == 11){
            selectedItems["address_card"] = $(this).attr('id');
        }
             
    });

    if(numKeys(selectedItems) <= 0) {
        $('#errorid').remove();
        html = '<div class="alert alert-danger" id="errorid" style="display: block;"><button class="close" data-dismiss="alert"></button>You have some form errors. Please select one of the products in order to proceed.</div>';
        $('.tab-content').prepend(html);
        $("html, body").animate({ scrollTop: 0 }, "50");   
    } else {
        $('#errorid').remove();

        $.ajax({
            url: "/cemos-portal/products-form",
            data: {
               'selected': selectedItems
            },
            success: function(data){
                $("html, body").animate({ scrollTop: 0 }, "50");   
                $("#step2 #showhere").html("");
                $("#step2 #showhere").html(data);
                $("#step2 .prev-step").removeClass('disabled');
                $("#step2 .next-step").removeClass('disabled');
            },
            beforeSend: function(){
                $("#step2 #showhere").html("<i class='fa fa-spinner fa-spin fa-3x fa-fw'></i> Please wait while fetching form data...");
                $("#step2 .prev-step").addClass('disabled');
                $("#step2 .next-step").addClass('disabled');
            }

        });

        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

function numKeys(obj)
{
    var count = 0;
    for(var prop in obj)
    {
        count++;
    }
    return count;
}