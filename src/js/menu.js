$(document).ready(function() {
	$(window).scroll(function () {
		if ($(window).scrollTop() == 0) {
			$('.premier').show();
		} else {
			$('.premier').hide();
		}
	});
})