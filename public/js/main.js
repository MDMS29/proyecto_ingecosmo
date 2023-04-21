$(document).ready(function ($) {
	if (document.getElementById("sidebar").className == 'active') {
		var elms = document.querySelectorAll("[id='pa']");
		for (var i = 0; i < elms.length; i++) {
			elms[i].style.display = 'none';
			elms[i].style.opacity = '0';
		}
	}
	var fullHeight = function () {
		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function () {
			$('.js-fullheight').css('height', $(window).height());
		});
	};

	fullHeight();

	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');

		if (document.getElementById("sidebar").className == 'active') {
			var elm = document.querySelectorAll("[id='aa']");
			for (var i = 0; i < elm.length; i++) {
				elm[i].style.display = 'block';
				if (i == elm) {
					break;
				}
			}
			var elms = document.querySelectorAll("[id='pa']");
			for (var i = 0; i < elms.length; i++) {
				elms[i].style.opacity = '0';
				elms[i].style.display = 'none';
				if (i == elms) {
					break;
				}
			}
		} else {
			var elms = document.querySelectorAll("[id='pa']");
			for (var i = 0; i < elms.length; i++) {
				elms[i].style.opacity = '1';
				elms[i].style.display = 'block';
				if (i == elms) {
					break;
				}
			}
			var elm = document.querySelectorAll("[id='aa']");
			for (var i = 0; i < elm.length; i++) {
				elm[i].style.display = 'flex';
				if (i == elm) {
					break;
				}
			}
		}
	});
})
