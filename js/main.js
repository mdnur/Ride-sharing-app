$(document).ready(function () {
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


	// Add an event listener to the "From" dropdown
	$('#fromSelect').change(function () {
		var selectedFromValue = $(this).val();
		// console.log(selectedFromValue);
		if (selectedFromValue != '') {
			// Perform AJAX call to retrieve point options based on the selected location
			$.ajax({
				url: 'getPointAPI.php',
				method: 'GET',
				data: {
					locationID: selectedFromValue
				},
				dataType: 'json',
				success: function (data) {
					// console.log(data);
					var fromPointSelect = $('#FromPoint');
					fromPointSelect.empty(); // Clear existing options
					fromPointSelect.append($('<option>').val('').text('Select'));
					$.each(data, function (index, point) {
						fromPointSelect.append($('<option>').val(point.id).text(point.name));
					});

				},
				error: function (xhr, status, error) {
					console.error('Error fetching data:', error);
				}
			});
		} else {
			// Clear point options when no location is selected
			$('#FromPoint').empty().append($('<option>').val('').text('Select'));
		}
	});


	$('#fromSelect').change(function () {
		var selectedFromValue = $(this).val();
		$('#toSelect option').each(function () {
			if ($(this).val() === selectedFromValue) {
				$(this).prop('disabled', true);
			} else {
				$(this).prop('disabled', false);
			}
		});
	});

	$('#toSelect').change(function () {
		var selectedFromValue = $(this).val();
		$('#fromSelect option').each(function () {
			if ($(this).val() === selectedFromValue) {
				$(this).prop('disabled', true);
			} else {
				$(this).prop('disabled', false);
			}
		});
	});

	$('#toSelect').change(function () {
		var selectedFromValue = $(this).val();
		// console.log(selectedFromValue);
		if (selectedFromValue != '') {
			// Perform AJAX call to retrieve point options based on the selected location
			$.ajax({
				url: 'getPointAPI.php',
				method: 'GET',
				data: {
					locationID: selectedFromValue
				},
				dataType: 'json',
				success: function (data) {
					// console.log(data);
					var toPointSelect = $('#toPoint');
					toPointSelect.empty(); // Clear existing options
					toPointSelect.append($('<option>').val('').text('Select'));
					$.each(data, function (index, point) {
						toPointSelect.append($('<option>').val(point.id).text(point.name));
					});

				},
				error: function (xhr, status, error) {
					console.error('Error fetching data:', error);
				}
			});
		} else {
			// Clear point options when no location is selected
			$('#toPoint').empty().append($('<option>').val('').text('Select'));
		}
	});


	$('#CheckAvailable').submit(function (event) {
		event.preventDefault();

		var selectedFromValue = $('#fromSelect').val();
		var selectedToValue = $('#toSelect').val();

		$.ajax({
			url: 'filter_routesApi.php',
			method: 'GET',
			data: {
				from: selectedFromValue,
				to: selectedToValue
			},
			dataType: 'json', // Assuming your PHP script returns JSON data
			success: function (data) {
				if (data.length == 0) {
					$("#tableC").hide();
					alert("No route Available");
					return;
				}

				$("#tableC").show();
				var routeTableBody = $('#routeTableBody');
				routeTableBody.empty(); // Clear existing rows

				$.each(data, function (index, row) {
					var newRow = $('<tr>');
					console.log(row.locationId_From);
					newRow.append($('<td>').text(index + 1));
					newRow.append($('<td>').text(row.fromLocationName));
					newRow.append($('<td>').text(row.toLocationName));
					newRow.append($('<td>').text(row.available_seats));
					newRow.append($('<td>').text(row.fare + ' TK'));
					newRow.append($('<td>').text(row.StartJourneyTime));
					newRow.append($('<td>').text(row.DepartureTime));
					newRow.append($('<td>').html('<a class="btn btn-info" href="booking_confirm.php?id=' + row.id + '">Book</a>'));
					routeTableBody.append(newRow);
				});
			},
			error: function (xhr, status, error) {
				console.error('Error fetching data:', error);
				$("#tableC").hide();
			}
		});
	});

	// $('#tableC').onload(function (event) {	
	// 	$('#tableC').hide();
	// });


	// Function to hide the card header
	function hideCardHeader() {
		$("#tableC").hide();
	}

	// Call the function to hide the card header
	hideCardHeader();


	//FliterByDateApi

	$('#inlineFormInputName2').change(function () {

		var selectedFromValue = $(this).val();
		console.log(selectedFromValue);
		$.ajax({
			url: 'FliterByDateApi.php',
			method: 'GET',
			data: {
				date: selectedFromValue,
			},
			dataType: 'json', // Assuming your PHP script returns JSON data
			success: function (data) {
				console.log(data);
				var routeTableBody = $('#routeTableBody');
				routeTableBody.empty(); // Clear existing rows

				$.each(data, function (index, row) {
					var newRow = $('<tr>');
					console.log(row.locationId_From);
					newRow.append($('<td>').text(index + 1));
					newRow.append($('<td>').text(row.fromLocationName));
					newRow.append($('<td>').text(row.toLocationName));
					newRow.append($('<td>').text(row.available_seats));
					newRow.append($('<td>').text(row.fare + ' TK'));
					newRow.append($('<td>').text(row.StartJourneyTime));
					newRow.append($('<td>').text(row.DepartureTime));
					newRow.append($('<td>').html('<a class="btn btn-info" href="booking_confirm.php?id=' + row.id + '">Book</a>'));
					routeTableBody.append(newRow);
				});
			},
			error: function (xhr, status, error) {
				console.error('Error fetching data:', error);
			}
		});
	});



	$('#CheckAvailable').submit(function (event) {
		event.preventDefault(); // Prevent the default form submission

		var selectedFromValue = $('#inlineFormInputName2').val();

		$.ajax({
			url: 'FliterByDateApi.php',
			method: 'GET',
			data: {
				date: selectedFromValue,
			},
			dataType: 'json',
			success: function (data) {
				var routeTableBody = $('#routeTableBody');
				routeTableBody.empty();

				$.each(data, function (index, row) {
					var newRow = $('<tr>');
					newRow.append($('<td>').text(index + 1));
					newRow.append($('<td>').text(row.fromLocationName));
					newRow.append($('<td>').text(row.ToLocationName));
					newRow.append($('<td>').text(row.fare + ' TK'));
					newRow.append($('<td>').text(row.StartJourneyTime));
					newRow.append($('<td>').text(row.DepartureTime));
					newRow.append($('<td>').html('<a class="btn btn-info" href="booking_confirm.php?id=' + row.id + '">Book</a>'));
					routeTableBody.append(newRow);
				});
			},
			error: function (xhr, status, error) {
				console.error('Error fetching data:', error);
			}
		});
	});






	// Status

	$('#inlineFormInputName4').change(function () {

		var selectedFromValue = $(this).val();
		console.log(selectedFromValue);
		$.ajax({
			url: 'FilterByStatus.php',
			method: 'GET',
			data: {
				status: selectedFromValue,
			},
			dataType: 'json', // Assuming your PHP script returns JSON data
			success: function (data) {
				console.log(data);
				var routeTableBody = $('#StatusAndDate');
				routeTableBody.empty(); // Clear existing rows

				$.each(data, function (index, row) {
					var newRow = $('<tr>');
					console.log(row.locationId_From);
					newRow.append($('<td>').text(index + 1));
					newRow.append($('<td>').text(row.driverName));
					newRow.append($('<td>').text(row.pickUpLocation));
					newRow.append($('<td>').text(row.dropLocation));
					newRow.append($('<td>').text(row.StartJourneyTime));
					newRow.append($('<td>').text(row.rideFare));


					if (row.rideStatus == 2) {
						newRow.append($('<td>').html("<span class='badge badge-pill badge-success'>Completed</span>"));
					} else if (row.rideStatus == 0) {
						newRow.append($('<td>').html("<span class='badge badge-pill badge-primary'>Active</span>"));
					} else if (row.rideStatus == 3) {
						newRow.append($('<td>').html("<span class='badge badge-pill badge-danger'>Canceled</span>"));
					} else if (row.rideStatus == 1) {
						newRow.append($('<td>').html("<span class='badge badge-pill badge-info'>Processing</span>"));
					}
					// routeTableBody.append(newRow);
					// newRow.append($('<td>').text(row.rideStatus));
					// newRow.append($('<td>').html('<a class="btn btn-info" href="booking_confirm.php?id=' + row.id + '">Book</a>'));
					newRow.append($('<td>').html('<a class="btn btn-info" href="view_booking.php?id=' + row.rideBookID + '">View</a>'));
					routeTableBody.append(newRow);
				});
			},
			error: function (xhr, status, error) {
				console.error('Error fetching data:', error);
			}
		});
	});


	// Date


	$('#inlineFormInputName3').change(function () {

		var selectedFromValue = $(this).val();
		console.log(selectedFromValue);
		$.ajax({
			url: 'FilterByDate.php',
			method: 'GET',
			data: {
				date: selectedFromValue,
			},
			dataType: 'json', // Assuming your PHP script returns JSON data
			success: function (data) {
				console.log(data);
				var routeTableBody = $('#StatusAndDate');
				routeTableBody.empty(); // Clear existing rows

				$.each(data, function (index, row) {
					var newRow = $('<tr>');
					console.log(row.locationId_From);
					newRow.append($('<td>').text(index + 1));
					newRow.append($('<td>').text(row.driverName));
					newRow.append($('<td>').text(row.pickUpLocation));
					newRow.append($('<td>').text(row.dropLocation));
					newRow.append($('<td>').text(row.StartJourneyTime));
					newRow.append($('<td>').text(row.rideFare));


					if (row.rideStatus == 2) {
						newRow.append($('<td>').html("<span class='badge badge-pill badge-success'>Completed</span>"));
					} else if (row.rideStatus == 0) {
						newRow.append($('<td>').html("<span class='badge badge-pill badge-primary'>Active</span>"));
					} else if (row.rideStatus == 3) {
						newRow.append($('<td>').html("<span class='badge badge-pill badge-danger'>Canceled</span>"));
					} else if (row.rideStatus == 1) {
						newRow.append($('<td>').html("<span class='badge badge-pill badge-info'>Processing</span>"));
					}
					newRow.append($('<td>').html('<a class="btn btn-info" href="view_booking.php?id=' + row.rideBookID + '">View</a>'));
					routeTableBody.append(newRow);
				});
			},
			error: function (xhr, status, error) {
				console.error('Error fetching data:', error);
			}
		});
	});
})