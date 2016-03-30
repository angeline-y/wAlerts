$(document).ready(function() {
	var num;
	var target = $("#steps").offset().top;
	$('#subscribe').click(function() {
		//$(this).addClass("off");
		$('html, body').animate({
			scrollTop: $('#steps').offset().top
		}, 2000);
	});
	$('#number').on('input propertychange paste', function() {
		if($(this).val().length > 0) {
			$('#button_step1').prop('disabled', false);
		}
	});
	$('#code').on('input propertychange paste', function() {
		if($(this).val().length > 0) {
			$('#button_step2').prop('disabled', false);
		}
	});
	$('#button_step1').one("click", function() {
		num = $('#number').val().replace(/\D/g, '');
		if(num.length == 0) {
			return;
		}
		$.ajax({
			type: 'POST',
			url: 'http://54.201.82.41/assets/backend/insertUser.php',
			data: {
				number: num
			},
			cache: false,
			success: function(response) {
			}
		});
		$(this).parent().fadeOut('slow', function() {
			$(this).addClass("hidden");
			$('#instruction1').css('opacity', '0');
			$('#instruction1').removeClass("hidden");
			$('#instruction1').animate({opacity: 1});
		});
		$('#instruction2').fadeOut('slow', function() {
			$(this).addClass("hidden");
			$('#code').parent().css('opacity', '0');
			$('#code').parent().removeClass("hidden");
			$('#code').parent().animate({opacity: 1});
		});
		$('#instruction3').fadeOut('slow', function() {
			$(this).addClass("hidden");
			$('#instruction4').css('opacity', '0');
			$('#instruction4').removeClass("hidden");
			$('#instruction4').animate({opacity: 1});
		});
	});
	$('#button_step2').click(function() {
		$.ajax({
			type: 'POST',
			url: 'assets/backend/verifyCode.php',
			data: {
				number: num,
				code: $('#code').val()
			},
			cache: false,
			success: function(response) {
				if(response == 'fail') {
					alert("incorrect code, try again");
					return;
				} else {
					$('#instruction1').fadeOut('slow', function() {
						$(this).addClass("hidden");
						$('#instruction5').css('opacity', '0');
						$('#instruction5').removeClass("hidden");
						$('#instruction5').animate({opacity: 1});
					});
					$('#button_step2').parent().fadeOut('slow', function() {
						$(this).addClass("hidden");
						$('#instruction6').css('opacity', '0');
						$('#instruction6').removeClass("hidden");
						$('#instruction6').animate({opacity: 1});
					});
					$('#instruction4').fadeOut('slow', function() {
						$(this).addClass("hidden");
						$('#country').parent().css('opacity', '0');
						$('#country').parent().removeClass("hidden");
						$('#country').parent().animate({opacity: 1});
					});
				}
			}
		});
	});
	$('#button_step3').one("click", function() {
		$('html, body').animate({
			scrollTop: 0
		}, 1500, function() {
			$("#subscribe").animate({opacity:'0'});
			$("#main").fadeOut(500, function() {
				$(this).css('background-image', 'url("assets/images/clouds.jpg")').fadeIn(1500);
			});
			$('#steps').addClass('hidden');
		});
	});
});
