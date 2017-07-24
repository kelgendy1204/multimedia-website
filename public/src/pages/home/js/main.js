NodeList.prototype.forEach = Array.prototype.forEach;

document.querySelector('.nav-icon').addEventListener('click', function(){
	this.classList.toggle('open');
	document.querySelector('header').classList.toggle('open');
});

document.querySelectorAll('.colorbtn').forEach( function(element) {
	element.addEventListener('click', function () {
		createCookie('color', this.getAttribute('data-color'), 30);
		window.location.reload(false);
	});
});

function createCookie(name,value,days) {
	var expires = '';
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days*24*60*60*1000));
		expires = '; expires=' + date.toUTCString();
	}
	document.cookie = name + '=' + value + expires + '; path=/';
}

$('.side-bans.home_right a').sticky({topSpacing: 80});
$('.side-bans.home_left a').sticky({topSpacing: 80});

setTimeout(() => {
	window.location.reload(false);
}, 5 * 60 * 1000);