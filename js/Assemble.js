$(document).ready(function () {
	$('#top').change(function () {
		var piece = $(this).val();
		$('#topPiece').attr('src', window.location.pathname.replace("/assemble", "") + '/images/bot/' + piece + '.jpeg');
	});
	$('#middle').change(function () {
		var piece = $(this).val();
		$('#middlePiece').attr('src', window.location.pathname.replace("/assemble", "") + '/images/bot/' + piece + '.jpeg');
	});
	$('#bottom').change(function () {
		var piece = $(this).val();
		$('#bottomPiece').attr('src', window.location.pathname.replace("/assemble", "") + '/images/bot/' + piece + '.jpeg');

	$('#Assemble').click(function () {
		$('#result').append( "Your BOT is assembled!" );
		location.reload(true);
	})
	});
});