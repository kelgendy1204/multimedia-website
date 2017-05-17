// import '../../../lib/jquery.pin.js';

document.querySelector('.nav-icon').addEventListener('click', function(){
	this.classList.toggle('open');
	document.querySelector('header').classList.toggle('open');
});

// $('.side-bans').pin();
