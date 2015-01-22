$(function(){
	$('.open-info').click(function(){
		$(this).parent().parent().next().children('td').slideToggle();
	});
});