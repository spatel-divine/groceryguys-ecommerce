
$( document ).ready(function() {
    console.log( "ready!" );

	$('ul.product_tabs .tab-link').click(function(){

		var tab_id = $(this).attr('data-tab');
		$('.product_tabs .tab-link').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	});
});
