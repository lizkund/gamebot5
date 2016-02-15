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
	});

	$('#Assemble').click(function () {
		$('#result').text("Your BOT will be assembled (in the next version)!");
		//location.reload(true);
	});
});