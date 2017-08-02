function orderNow()
{
	datas = $("input[name=credit_points]:checked").val();

	$.ajax({
		url: '/cemos-portal/order',
	    data: {
           'data': datas
        },
		beforeSend: function(){
			$('.wizard').addClass('hidden');
			$('#formBody').css('display','inline');
		},
		success: function(res){
			if(res) {
				$('#formBody').css('display','none');
				$('#formSuccess').css('display','inline');
			} else {
				alert('Error in adding order products. Kindly contact the web admin.');
				location.reload();
			}
		}
	});
}

function viewImages(cId, objId, oId, opId)
{
	$('.view-modal').modal('show');
	$.ajax({
		url:'/cemos-portal/get-images',
		data: {
			companyId:cId,
			objectId:objId,
			orderId:oId,
			orderPId:opId
		},
		beforeSend: function ()
		{
			$('#view-modal .modal-body').html('Please wait while fetching images...');
		},
		success: function (res){
			var d = JSON.parse(res);
			var html = "";

			//html += '<div class="row">';
				$.each(d, function (i, v){
					
					if(v.type.search('image') == 1){
						//html += '<div class="col-md-3">';
						html += '<a target="_blank" href="'+v.path+'">';
							html += '<img src = "'+v.path+'" width="200" height="200">';	
						html += '</a>';
						//html += '</div>';
					} else {
						html += ' <video type="video" width="200px" height="200px" controls>';
							html += ' <source src="'+v.path+'" type="'+v.type+'">Your browser does not support the video tag.';
						html += ' </video>';
					}
					
				});
			//html += "</div>";
			
			$('#view-modal .modal-body').html();
			$('#view-modal .modal-body').html(html);
			
		}
	});
}