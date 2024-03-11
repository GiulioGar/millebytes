(function($){
	"use strict";

	// Mean Menu
	$('.mean-menu').meanmenu({
		meanScreenWidth: "1199"
	});

	// Header Sticky
	$(window).on('scroll',function() {
		if ($(this).scrollTop() > 120){  
			$('.navbar-area').addClass("is-sticky");
		}
		else{
			$('.navbar-area').removeClass("is-sticky");
		}
	});

	// Others Option For Responsive JS
	$(".others-option-for-responsive .dot-menu").on("click", function(){
		$(".others-option-for-responsive .container .container").toggleClass("active");
	});

	// Search Menu JS
	$(".others-option .search-box i").on("click", function(){
		$(".search-overlay").toggleClass("search-overlay-active");
	});
	$(".search-overlay-close").on("click", function(){
		$(".search-overlay").removeClass("search-overlay-active");
	});

	// Home Slides
	$('.home-slides').owlCarousel({
		loop: true,
		nav: true,
		dots: true,
		autoplayHoverPause: true,
		autoplay: true,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		margin: 5,
		items: 1,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-chevron'></i>"
		]
	});
	$('.home-slides-two').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		autoHeight: true,
		autoplayHoverPause: true,
		autoplay: true,
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
		items: 1,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-chevron'></i>"
		]
	});

	// Testimonials Slides
	$('.testimonials-slides, .feedback-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		autoplayHoverPause: true,
		autoplay: true,
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
		items: 1,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-chevron'></i>"
		]
	});

	// Popup Video
	$('.popup-youtube').magnificPopup({
		disableOn: 320,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});

	// Team Slides
	$('.team-slides').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		autoplayHoverPause: true,
		autoplay: true,
		margin: 30,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-chevron'></i>"
		],
		responsive: {
			0: {
				items: 1,
			},
			576: {
				items: 2,
			},
			768: {
				items: 2,
			},
			992: {
				items: 4,
			}
		}
	});

	// Portfolio Slides
	$('.portfolio-slides').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		autoplayHoverPause: true,
		autoplay: true,
		margin: 30,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-chevron'></i>"
		],
		responsive: {
			0: {
				items: 1,
			},
			576: {
				items: 2,
			},
			768: {
				items: 2,
			},
			992: {
				items: 3,
			},
			1200: {
				items: 4,
			}
		}
	});

	// Accordion JS
	$(function() {
		$('.accordion').find('.accordion-title').on('click', function(){
			// Adds Active Class
			$(this).toggleClass('active');
			// Expand or Collapse This Panel
			$(this).next().slideToggle('fast');
			// Hide The Other Panels
			$('.accordion-content').not($(this).next()).slideUp('fast');
			// Removes Active Class From Other Titles
			$('.accordion-title').not($(this)).removeClass('active');		
		});
	});

	// Odometer JS
	$('.odometer').appear(function(e) {
		var odo = $(".odometer");
		odo.each(function() {
			var countNumber = $(this).attr("data-count");
			$(this).html(countNumber);
		});
	});

	// Article Image Slides
	$('.article-image-slides').owlCarousel({
		loop: true,
		nav: true,
		items: 1,
		dots: false,
		autoplayHoverPause: true,
		autoplay: true,
		animateOut: 'fadeOut',
        animateIn: 'fadeIn',
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-chevron'></i>"
		]
	});

	// Nice Select JS
	$('select').niceSelect();

	// Input Plus & Minus Number JS
	$('.input-counter').each(function() {
		var spinner = jQuery(this),
		input = spinner.find('input[type="text"]'),
		btnUp = spinner.find('.plus-btn'),
		btnDown = spinner.find('.minus-btn'),
		min = input.attr('min'),
		max = input.attr('max');
		
		btnUp.on('click', function() {
			var oldValue = parseFloat(input.val());
			if (oldValue >= max) {
				var newVal = oldValue;
			} else {
				var newVal = oldValue + 1;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
		});
		btnDown.on('click', function() {
			var oldValue = parseFloat(input.val());
			if (oldValue <= min) {
				var newVal = oldValue;
			} else {
				var newVal = oldValue - 1;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
		});
	});

	// Count Time 
	function makeTimer() {
		var endTime = new Date("September 20, 2022 17:00:00 PDT");			
		var endTime = (Date.parse(endTime)) / 1000;
		var now = new Date();
		var now = (Date.parse(now) / 1000);
		var timeLeft = endTime - now;
		var days = Math.floor(timeLeft / 86400); 
		var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
		var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
		var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
		if (hours < "10") { hours = "0" + hours; }
		if (minutes < "10") { minutes = "0" + minutes; }
		if (seconds < "10") { seconds = "0" + seconds; }
		$("#days").html(days + "<span>Days</span>");
		$("#hours").html(hours + "<span>Hours</span>");
		$("#minutes").html(minutes + "<span>Minutes</span>");
		$("#seconds").html(seconds + "<span>Seconds</span>");
	}
	setInterval(function() { makeTimer(); }, 0);

	// Sidebar Sticky
	$('.portfolio-sidebar-sticky').stickySidebar({
		topSpacing: 85,
		bottomSpacing: 85
	});

	// Blog Slides
	$('.blog-slides').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		autoplayHoverPause: true,
		autoplay: true,
		margin: 30,
		navText: [
			"<i class='flaticon-back'></i>",
			"<i class='flaticon-chevron'></i>"
		],
		responsive: {
			0: {
				items: 1,
			},
			768: {
				items: 2,
			},
			992: {
				items: 3,
			}
		}
	});

	// Subscribe form
	$(".newsletter-form").validator().on("submit", function (event) {
		if (event.isDefaultPrevented()) {
			// handle the invalid form...
			formErrorSub();
			submitMSGSub(false, "Please enter your email correctly.");
		} else {
			// everything looks good!
			event.preventDefault();
		}
	});
	function callbackFunction (resp) {
		if (resp.result === "success") {
			formSuccessSub();
		}
		else {
			formErrorSub();
		}
	}
	function formSuccessSub(){
		$(".newsletter-form")[0].reset();
		submitMSGSub(true, "Thank you for subscribing!");
		setTimeout(function() {
			$("#validator-newsletter").addClass('hide');
		}, 4000)
	}
	function formErrorSub(){
		$(".newsletter-form").addClass("animated shake");
		setTimeout(function() {
			$(".newsletter-form").removeClass("animated shake");
		}, 1000)
	}
	function submitMSGSub(valid, msg){
		if(valid){
			var msgClasses = "validation-success";
		} else {
			var msgClasses = "validation-danger";
		}
		$("#validator-newsletter").removeClass().addClass(msgClasses).text(msg);
	}
	// AJAX MailChimp
	$(".newsletter-form").ajaxChimp({
		url: "https://envytheme.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9", // Your url MailChimp
		callback: callbackFunction
	});

	// Go to Top
	$(function(){
		// Scroll Event
		$(window).on('scroll', function(){
			var scrolled = $(window).scrollTop();
			if (scrolled > 600) $('.go-top').addClass('active');
			if (scrolled < 600) $('.go-top').removeClass('active');
		});  
		// Click Event
		$('.go-top').on('click', function() {
			$("html, body").animate({ scrollTop: "0" },  500);
		});
	});

	// WOW Animation JS
	if($('.wow').length){
		var wow = new WOW({
			mobile: false
		});
		wow.init();
	}

}(jQuery));


function sendContact() {
	console.log("SS");

	var nome = $("#name").val();
    var email = $("#email").val();
	var message = $("#message").val();
	var phone_number = $("#phone_number").val();
	var info = $("#info").val();

	if(nome=='' || email=='' || message=='') {

		alert("Compilare i campi nome, email e messaggio!");
		return false;

	} else {

		$("#submitMsg").html('Invio...');

		$.ajax({
			type: "POST",
			url: "contactSend",
			data: "name=" + nome + "&email=" + email + "&info=" + info + "&phone_number=" + phone_number + "&message=" + message,
			dataType: "html",
			success: function(msg) {
				$("#result").html("<strong style='color:green;'>"+msg+"</strong>");
			},
			error: function() {
				alert("Chiamata fallita, si prega di riprovare...");
			}
		});

	}

}

function ValidateEmail(mail) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
		return true;
	}
    alert("Inserire una email in formato corretto");
	$("#email").focus();
    return false;
}

function registerUser2() {

	console.log("register");

	var second_name = $("#second_name").val();
    var email = $("#email").val();
	var first_name = $("#first_name").val();
	var pwd = $("#pwd").val();
	var birth_date = $("#birth_date").val();
	var gender = $("#gender").val();
	var province_id = $("#province_id").val();
	var provenienza = $("#provenienza").val();
	var sid = $("#sid").val();
	var utm = $("#utm").val();

	if(second_name=='' ) {
		alert("Inserire il cognome");
		console.log('surname error');
		$("#second_name").focus();
		return false;
	}

	if(first_name=='' ) {
		alert("Inserire il nome");
		console.log('name error');
		$("#first_name").focus();
		return false;
	}

	if(pwd=='' ) {
		alert("Inserire una password di almeno 6 caratteri");
		$("#pwd").focus();
		console.log('psw error');
		return false;
	}

	if(birth_date=='' ) {
		alert("Inserire la tua data di nascita");
		$("#birth_date").focus();
		console.log('birth error');
		return false;
	}

	if(gender=='' ) {
		alert("Selezionare genere");
		$("#gender").focus();
		console.log('gender error');
		return false;
	}

	if(province_id=='' ) {
		alert("Selezionare la tua provincia di residenza");
		$("#province_id").focus();
		console.log('prov error');
		return false;
	}

	if(email=='') {
		alert("Inserire una email esistente");
		console.log('email error');
		$("#email").focus();
		return false;
	} else {
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
			console.log('email check ok');
		} else {
			alert("Inserire una email in formato corretto");
			$("#email").focus();
			console.log('email error 2');
			return false;
		}
	}


	$("#submitMsg").html('Invio dati...');

	$.ajax({
		type: "POST",
		url: "https://millebytes.com/rconfirm/website",
		data: $("#registerUser").serialize(),
		dataType: "html",
		success: function(msg) {
			$("#submitMsg").html('Salvato!');
			$("#submitMsg").prop("disabled", true);
			$("#results").html("<strong style='color:green;'>Operazione eseguita con successo<br>Controlla la tua email per attivare l'utenza</strong>");
			
			var delay = 3000; 
			setTimeout(function(){ window.location = 'https://millebytes.com/home/msg/register?sid='+sid+'&utm='+utm; }, delay);

		},
		error: function() {
			alert("Chiamata fallita, si prega di riprovare...");
		}
	});


}

function ht() {
	$("#toastContainer").attr("style", "display: none !important");
}
