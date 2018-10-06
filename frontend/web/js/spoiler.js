$(function () {
	$('.spoiler').on('click', function(e) {
		$(this).toggleClass('active');
		$(this).next().slideToggle(200);
	})
})