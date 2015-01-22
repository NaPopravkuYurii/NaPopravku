$(function(){
	$('.open-info').click(function(){
		$(this).parent().parent().next().children('td').slideToggle();
	});
	
	$('.free').click(function(){
		$(this).parent().find('.app_form').slideToggle();
	});
	
	$('.a_send').click(function(){
		var f = $(this).parent().parent().parent();
		var name = f.find('.a_name').val();
		var phone = f.find('.a_phone').val();
		var doctor = f.find('.a_doctor').val();
		var date = f.find('.a_date').val();
		
		$.getJSON('/site/appointment', {'name':name,'phone':phone,'doctor':doctor,'date':date}, function(json){
			if (json.id) {
				f.html(json.message + '<br>' + '<b>Номер Вашей записи: ' + json.id + '</b>').css('color', '#229922');
			}
		});
	});
});