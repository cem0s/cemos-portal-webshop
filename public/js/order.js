function orderNow()
{

	$.ajax({
		url: '/cemos-portal/order',
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