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

function viewImages(cId, objId, oId, opId, pId)
{
	$('.view-modal').modal('show');
	$.ajax({
		url:'/cemos-portal/get-images',
		data: {
			companyId:cId,
			objectId:objId,
			orderId:oId,
			orderPId:opId,
			pId:pId
		},
		beforeSend: function ()
		{
			$('#view-modal .modal-body').html('Please wait while fetching images...');
		},
		success: function (res){
			var d = JSON.parse(res);
			var html = "";

			//html += '<div class="row">';
				$.each(d.contents, function (i, v){
					if(v.type.indexOf('image') != -1){
						//html += '<div class="col-md-3">';
						if(pId == 3 || pId == 4) {
							var p  = v.file_path.replace(/\//g, "+");
							var e = p.replace(/\./g,'|')
							html += '<a target="_blank" href="/cemos-portal/view-360/'+e+'">';
								html += '<img src = "'+v.file_path+'" width="200" height="200">';	
							html += '</a>';
						} else {
							html += '<a target="_blank" href="'+v.file_path+'">';
								html += '<img src = "'+v.file_path+'" width="200" height="200">';	
							html += '</a>';
						}
						
						//html += '</div>';
					} else {
						html += ' <video type="video" width="200" height="200" controls>';
							html += ' <source src="'+v.file_path+'" type="'+v.type+'">Your browser does not support the video tag.';
						html += ' </video>';
					}
					
				});
			//html += "</div>";
			
			$('#view-modal .modal-body').html();
			$('#view-modal .modal-body').html(html);
			
		}
	});
}

