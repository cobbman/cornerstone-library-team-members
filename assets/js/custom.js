jQuery(document).ready(function($) {
	$('.teammember .teammember-image-wrap').on('click', function(e) {
		e.preventDefault();
		$(this).closest('.teammember').addClass('open');
	});
	$('.teammember .t-close').on('click', function(e) {
		e.preventDefault();
		$(this).closest('.teammember').removeClass('open');
	});
});