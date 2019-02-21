$(document).ready(function () {
	$('#ConvertForm').on('submit', function (e) {
		e.preventDefault();

		var number = $('#arabicnumeralsField').val();

		$.ajax({
			url: '/convert',
			type: 'POST',
			headers: {
			      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				"number": number
			},
			success: function (response) {
				$('#romannumeralsField').val(response.result);
				
			}
		});
	})
});