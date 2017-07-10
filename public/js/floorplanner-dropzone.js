 
 $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = '/cemos-portal/upload';

        $(document.body).on('click', '.fileupload-floorplanner', function(){
            var container = 'floorplanner_';
            var fileuploadID = $(this).attr('id');
            var fileuploadPreviewID = $(this).parent().parent().find('.files').attr('id');
            var temp_var = fileuploadID.split('_');
            temp_var = temp_var[temp_var.length-1];
            var orginalFileName = '';

            $('#' + fileuploadID).fileupload({
                url: url,
                dataType: 'json',
                autoUpload: false,
                maxFileSize: 999000,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                // Enable image resizing, except for Android and Opera,
                // which actually support image resizing, but fail to
                // send Blob objects via XHR requests:
                disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
                previewMaxWidth: 100,
                previewMaxHeight: 100,
                previewCrop: true,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                formData: {
                    param_name: fileuploadID,
                    type: 'floorPlanner',
                    rename: 'floor_no_' + temp_var
                },
               
                add: function (e, data) {
                    // console.log(data);
                    $.each(data.files, function (index, file) {
                        orginalFileName = file.name;
                    });

                    data.submit();
                    $('#' + fileuploadID).parent().addClass('disabled');
                },
                done: function (e, data) {
                    var html = '';
                    $.each(data.result, function (index, object) {
                        $.each(object, function (index, file) {
                            html+= '<tr>';
                           
                            html+=      '<td>';
                            if(orginalFileName)
                            {
                                html+= '<p>'+ orginalFileName +'</p>';
                            }
                            else
                            {
                                html+=  '<p>'+ file.name +'</p>';
                            }
                            html+=      '</td>';
                            html+=      '<td>';
                            html+=          '<button class="btn btn-danger pull-right" data-floor-id="'+temp_var+'" data-type="'+ file.deleteType +'" data-url="'+ file.deleteUrl +'&param_name='+ fileuploadID +'" data-table-id="'+ fileuploadPreviewID +'" data-input-id="'+ fileuploadID +'" onclick="deleteImage(this)">';
                            html+=              '<i class="glyphicon glyphicon-trash"></i>';
                            html+=              '<span>Delete</span>';
                            html+=          '</button>';
                            html+=      '</td>';
                            html+= '</tr>';
                            $('.floorplanner_' +temp_var + ' #' + fileuploadID).attr('disabled', 'disabled');
                            $('.floorplanner_' +temp_var + ' #file_name_' + temp_var).val(file.name);
                        });
                    });
                    $('.' + container+temp_var + ' #' + fileuploadPreviewID).find('tbody').append(html);
                    
                   

                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $(this).parent().parent().find('#progress .progress-bar').css('width', progress + '%');
                }
            }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
        });
    });