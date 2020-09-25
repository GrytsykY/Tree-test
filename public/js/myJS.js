
$('.ele').click(function () {
	$('ul', $(this).parent()).eq(0).slideToggle();
});

$('.js-close-campaign').click(function () {
	var url = "";
	console.log();
	$(location).attr('href', url);
	$('.js-overlay-campaign').fadeOut();
});

