var doctors = {
	init: function() {
		var $this = this;
		
		$('.open-info').on('click', function(){
			$(this).parent().parent().next().children('td').slideToggle();
		});
		
		$('.free').on('click', function(){
			$(this).parent().find('.app_form').slideToggle();
		});
		
		$('.a_send').on('click', function(){
			var f = $(this).parent().parent().parent();
			var name = f.find('.a_name').val();
			var phone = f.find('.a_phone').val();
			var doctor = f.find('.a_doctor').val();
			var date = f.find('.a_date').val();
			
			$.getJSON('/site/appointment', {'name':name,'phone':phone,'doctor':doctor,'date':date}, function(json){
				if (json.id) {
					f.html(json.message + '<br>' + '<b>Номер Вашей записи: ' + json.id + '</b>').css({'color':'#229922','border':'1px solid #229922','display':'block','padding':'2px'});
				}
			});
		});
		
		$('.show_line').on('click', function(){
			var spec = $('.specialization').val();
			var date = $('.date_search').val();
			
			var url = '/?specialization='+spec+'&date_search='+date;
			$('article').load(url+' article', function(){
				$this.init();
				window.history.pushState('', '', url);
			});
			return false;
		});
	},
}

$(function(){
	doctors.init();
});