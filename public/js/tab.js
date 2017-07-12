$(document).ready(function () {
    //Initialize tooltips
    //$('.nav-tabs > li a[title]').tooltip();
    
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

    if(tab == '#step1') {

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
                    FormDropzone.init();

                    $("[name='template']").change(function() {
                        var cont = $(this).val();
                        if(cont == 'Template 1'){
                            $('#brochure1').modal('show');
                        }else if(cont == 'Template 2'){
                            $('#brochure2').modal('show');
                        }else if(cont == 'Template 3'){
                            $('#brochure3').modal('show');
                        }else if(cont == 'Template 4'){
                            $('#brochure4').modal('show');
                        }
                    });

                },
                beforeSend: function(){
                    $("#step2 #showhere").html("<i class='fa fa-spinner fa-spin fa-3x fa-fw'></i> Please wait while fetching form data...");
                    $("#step2 .prev-step").addClass('disabled');
                    $("#step2 .next-step").addClass('disabled');
                }

            }); 

            $(elem).next().find('a[data-toggle="tab"]').click();
        }
    } else if(tab == "#step2") {
        $('#emptyCartNotif').css('display','none');
        $('#submitOrder').attr('disabled',false);
        var divIds = [];
        var reqData = [];
        var data = {};
        $('#step2 .container').children('div').each(function() {
            divIds.push($(this).attr('id'));
        });
       

        $.each(divIds, function(i, val){
            data[val] = {};
            $('#step2 .container').find('div#' + val).find('[name]').each(function() {
                if(val == "archi") {
                   var fp = new getFloorPlanData(val);
                    data[val] = fp;
                } else {
                    if ($(this).is(':checkbox')) {
                        if ($(this).prop('checked')) {
                            data[val][$(this).attr('name')] = ($(this).val());
                        }
                    } else if ($(this).is(':radio')) {
                        if ($(this).prop('checked')) {
                            if ($(this).attr('target-audience')) {
                                data[val][$(this).attr('name')] = ($(this).attr('target-audience'));
                            } else {
                                data[val][$(this).attr('name')] = ($(this).val());
                            }
                        }
                    } else {
                        if($(this).prop('required')){
                            if(!$(this).val()){
                                reqData.push($(this).attr('name'));
                            } else {
                                $(this).next().next('.alert-danger').addClass('hidden');
                            }
                        }
                        data[val][$(this).attr('name')] = ($(this).val());
                    }
                }
                    
            });
        });

        if(reqData.length >0){
            $.each(reqData, function(i, val){ 
                $('#step2 .container').find('#'+val).next().next('.alert-danger').removeClass('hidden');
                var errorDiv = $('.alert-danger:visible').first();
                var scrollPos = errorDiv.offset().top;
                $('html, body').animate({
                    scrollTop: scrollPos
                }, 500);
            });

            return false;
        } 

        $.ajax({
            url: "/cemos-portal/show-cart",
            data: {
               'data': data
            },
            success: function(data){
            
                $("html, body").animate({ scrollTop: 0 }, "50");   
                $("#step3 #checkout").html("");
                $("#step3 #checkout").html(data);
                $("#step3 .prev-step").removeClass('disabled');
                $("#step3 .next-step").removeClass('disabled');

            },
            beforeSend: function(){
                $("#step3 #checkout").html("<i class='fa fa-spinner fa-spin fa-3x fa-fw'></i> Please wait while finalizing order data...");
                $("#step3 .prev-step").addClass('disabled');
                $("#step3 .next-step").addClass('disabled');
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

function addFloor(id)
{
    var nextId = id+1;
    $('#button_'+id).addClass('hidden');
    $('#del_button_'+id).addClass('hidden');
    $('.floorplanner_'+id).append(addFloorForm(nextId));
} 

function addFloorForm(id)
{
    var form = '<div class="floorplanner_'+id+'">';
            form += '<hr><div class="row floors">';
                form += '<div class="col-md-4">';
                    form += '<div class="labelForDetails">';
                    form += '<h4>Floor '+id+'</4>';
                    form += '</div><br>';
                    form += 'Type <br> <input id= "floor_'+id+'" class="form-control" name="floor_'+id+'" type="text" required="required">';
                    form += '<br><div class="alert alert-danger hidden">Please fill out this field</div>';
                form += '</div>';
                form += '<div class="col-md-4">';
                    form+= '<div class="labelForDetails">';
                        form+= '<h4>Blueprint</h4>';
                    form+= '</div>';
                    form+= '<br>';
                    form+= 'Blueprint <br><input type="file" class="fileupload-floorplanner" name="print_'+id+'" id="print_'+id+'"> <br> ';
                    form+= '<input type="hidden"  name="file_name_'+id+'" id="file_name_'+id+'"> <br> ';
                    form+= '<div id="progress" class="progress">';
                        form+= '<div class="progress-bar progress-bar-success" id="progress_'+id+'"></div>';
                    form+= '</div>';
                    form+= '<table role="presentation" id= "files_'+id+'" class="table table-striped files"><tbody></tbody></table>';
                form += '</div>';
                form += '<div class="col-md-4">';
                    form+= '<br><br><br><br><button class="btn btn-primary" id="button_'+id+'" onclick="addFloor('+id+');">Add Another Floor</button>';
                    form+= ' <button class="btn btn-danger" id="del_button_'+id+'" onclick="deleteFloor('+id+');">Remove Floor</button>';
                form += '</div>';
            form += '</div>';
        form += '</div>';

    return form;
}

function deleteFloor(id)
{
    var prevButton = id-1;
    $('#button_'+prevButton).removeClass('hidden');
    $('#del_button_'+prevButton).removeClass('hidden');
    $('.floorplanner_'+id).remove();
}

function deleteImage(e)
{
    var floorId = $(e).attr('data-floor-id');
    var tableId = $(e).attr('data-table-id');
    var inputid = $(e).attr('data-input-id');
    var deleteUrl = $(e).attr('data-url');

    if(deleteUrl) {
        $.ajax({
            url: deleteUrl, 
            type: 'DELETE',
            dataType: 'json',
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (response) {
                if(response) {
                    $('.floorplanner_'+floorId + " #progress_"+floorId).css('width',0);
                    $('.floorplanner_'+floorId + " #"+tableId).find('tbody').html("");
                    $('.floorplanner_'+floorId + " #"+inputid).removeAttr('disabled');         
                } else {
                    alert("Error in deleting the file. Please try again");
                }
            }
        });
    }
  

}

var getFloorPlanData = function(v)
{
    var field = {};
    field['id'] = $('#'+v).find('input#id').val();
    field['floorComments'] = $('#'+v).find('textarea[name=floorComments]').val();
    field['f_preference_date'] = $('#'+v).find('input[name=f_preference_date]').val();
    if ($('#'+v).find('input[name="add_furniture"]').is(':checked')) {
        field['add_furniture'] = $('#'+v).find('input[name="add_furniture"]').val();
    }
    if ($('#'+v).find('input[name="mirror_hor"]').is(':checked')) {
        field['mirror_hor'] = $('#'+v).find('input[name="mirror_hor"]').val();
    }
    if ($('#'+v).find('input[name="mirror_ver"]').is(':checked')) {
        field['mirror_ver'] = $('#'+v).find('input[name="mirror_ver"]').val();
    }
    if ($('#'+v).find('input[name="situate_plan"]').is(':checked')) {
        field['situate_plan'] = $('#'+v).find('input[name="situate_plan"]').val();
    }
    if ($('#'+v).find('input[name="3d_indication"]').is(':checked')) {
        field['3d_indication'] = $('#'+v).find('input[name="3d_indication"]').val();
    }


    field['floors'] ={};
    $('#step2').find('div#' + v).find('div.floors').each(function(index) {
        field['floors'][index] = {};
        $(this).find('[name]').each(function() {
            field['floors'][index][$(this).attr('name')] = ($(this).val());
        });
    });

    return field;
}

