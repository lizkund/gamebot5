$(document).ready(function () {
	var top = $("#top").val();
	var middle = $("#middle").val();
	var bottom = $("#bottom").val();
	$('#top').change(function () {
		top = $(this).val();
		$('#topPiece').attr('src', window.location.pathname.replace("/assemble", "") + '/images/bot/' + top + '.jpeg');
	});
	$('#middle').change(function () {
		middle = $(this).val();
		$('#middlePiece').attr('src', window.location.pathname.replace("/assemble", "") + '/images/bot/' + middle + '.jpeg');
	});
	$('#bottom').change(function () {
		bottom = $(this).val();
		$('#bottomPiece').attr('src', window.location.pathname.replace("/assemble", "") + '/images/bot/' + bottom + '.jpeg');
	});

	$('#top, #middle, #bottom').change(function () {
		if (!top || !middle || !bottom) {
			$('#btnAssemble').prop('disabled', 'disabled');
		} else {
			$('#btnAssemble').prop('disabled', false);
		}
	});


	$('#btnAssemble').click(function () {
		if ($(this).prop('disabled')) {
			$('#result').text("Please select a bot piece for all three sections first!");
		} else {
			$('#result').text("Your BOT will be assembled (in the next version)!");
			$("#top, #middle, #bottom, #btnAssemble").prop("disabled", "disabled");
			$(".select, #Assemble").remove();
			//location.reload(true);
		}
	});


});