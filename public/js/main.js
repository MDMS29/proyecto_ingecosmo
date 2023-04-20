$(document).ready(function ($) {
	if (document.getElementById("sidebar").className == 'active') {
		document.getElementById("pa").style.opacity = '0'
		document.getElementById("pa").style.display = 'none'
	}else{
		document.getElementById("pa").style.opacity = '1'
		document.getElementById("pa").style.display = 'block'
		document.getElementById("pa").style.padding = '10px 30px'
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
			document.getElementById("pa").style.opacity = '0'
			document.getElementById("pa").style.display = 'none'
		}else{
			document.getElementById("pa").style.opacity = '1'
			document.getElementById("pa").style.display = 'block'
		}
	});


})
