function createCookie(name,value,days) {
	var expires = '';
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days*24*60*60*1000));
		expires = '; expires=' + date.toUTCString();
	}
	document.cookie = name + '=' + value + expires + '; path=/';
}

function playImgbgAudio() {
	$('.imgbg_animated').each(function(index, elem) {
		var getAudioSrc = $(elem).data('audio');
		var audio = new Audio(getAudioSrc);
		$(elem).hover(function () {
			audio.play();
		}, function () {
			audio.pause();
		});
	});
}

function responsiveMenu() {
	$('.nav-icon').on('click', function(){
		this.classList.toggle('open');
		$('header').toggleClass('open');
	});
}

function handleColor() {
	$('.colorbtn').each(function(index, element) {
		$(element).on('click', function() {
			createCookie('color', this.getAttribute('data-color'), 30);
			window.location.reload(false);
		});
	});
}

function stickySideBans() {
	$('.side-bans.home_right a').sticky({topSpacing: 80});
	$('.side-bans.home_left a').sticky({topSpacing: 80});
}

function automaticRefreshPage(minutes) {
	setTimeout(() => {
		window.location.reload(false);
	}, minutes * 60 * 1000);
}

$(document).ready(function() {
	playImgbgAudio();
	responsiveMenu();
	handleColor();
	stickySideBans();
	automaticRefreshPage(5);
});