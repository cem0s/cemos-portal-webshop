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
			}
		}
	});
}