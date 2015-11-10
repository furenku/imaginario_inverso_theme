jQuery(document).ready(function($){

	$('.h_full').each(function(){
		$(this).height( $(this).parent().height() );
	})

	$('.imgLiquid.imgLiquidFill').imgLiquid();
	$('.imgLiquid.imgLiquidNoFill').imgLiquid({
		fill:false
	});

	$('.slick').slick();

	$( document ).click(function() {
		$( "#map" ).toggle( "slide", { direction: 'left' } );
		$( "#text" ).toggle( "slide", { direction: 'right' } );
	});

});