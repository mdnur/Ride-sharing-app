$(document).ready(function () {


	$('#riderPhone').on('keyup', function () {
		var inputText = $(this).val();
		// Assuming jsonData contains the JSON data
		$.ajax({
			type: 'GET',
			url: 'get_rider_suggestions.php',
			data: {
				query: inputText
			},
			dataType: 'json',
			success: function (response) {
				// console.log(response);
				var jsonData = [];
				response.forEach(function (item) {
					jsonData.push(item.phone);
				});
				// console.log(jsonData);
				$("#riderPhone").autocomplete({
					source: jsonData
				});
				// $('#suggestions').html(response);
			}
		});
	});

	$('.header').height($(window).height());

	$(".navbar a").click(function () {
		$("body,html").animate({
			scrollTop: $("#" + $(this).data('value')).offset().top
		}, 1000)

	})
	var dropdownMenu = $("#navbarDropdown");

	// When the dropdown menu is clicked, toggle its visibility
	dropdownMenu.click(function () {
		dropdownMenu.toggle();
	});


})