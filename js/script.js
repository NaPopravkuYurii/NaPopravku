$(function(){
	$('.open-info').click(function(){
		$(this).parent().parent().next().children('td').slideToggle();
	});
	
	$('.free').click(function(){
		$(this).parent().find('.app_form').slideToggle();
		//$(this).parent().parent().next().children('td').slideToggle();
	});
});