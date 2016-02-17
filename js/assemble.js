$(document).ready(function () {
	// Initial assignment of dropbox values
	var top = $("#top").val();
	var middle = $("#middle").val();
	var bottom = $("#bottom").val();

	// On dropdown changes, replace image with selected bot piece image, and alter alt description
	$('#top').change(function () {
		top = $(this).val();
		$('#topPiece').attr({
			src: window.location.pathname.replace("/assemble", "") + '/images/bot/' + top + '.jpeg',
			alt: $('#top option:selected').text()
		});
	});
	$('#middle').change(function () {
		middle = $(this).val();
		$('#middlePiece').attr({
			src: window.location.pathname.replace("/assemble", "") + '/images/bot/' + middle + '.jpeg',
			alt: $('#middle option:selected').text()
		});
	});
	$('#bottom').change(function () {
		bottom = $(this).val();
		$('#bottomPiece').attr({
			src: window.location.pathname.replace("/assemble", "") + '/images/bot/' + bottom + '.jpeg',
			alt: $('#bottom option:selected').text()
		});
	});

	// only enable the assemble button if all three have a bot piece
	$('#top, #middle, #bottom').change(function () {
		// Checks for null, "", etc.
		if (!top || !middle || !bottom) {
			// Disable Assemble button
			$('#btnAssemble').prop('disabled', 'disabled');
		} else {
			// Enable Assemble button
			$('#btnAssemble').prop('disabled', false);
		}
	});

	// On click of assemble button
	$('#btnAssemble').click(function () {
		if ($(this).prop('disabled')) {
			// just in case - if button is disabled and somehow a user click went through...
			$('#result').text("Please select a bot piece for all three sections first!");
		} else {
			$('#result').text("Your BOT will be assembled (in the next version)!");
			// Disable/Remove dropdowns and assemble button, leaving the 'assembled' image
			$("#top, #middle, #bottom, #btnAssemble").prop("disabled", "disabled");
			$(".select, #Assemble").remove();
			//location.reload(true);
		}
	});
});