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



})