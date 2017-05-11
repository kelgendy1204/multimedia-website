(function () {
	var serverLinks = document.querySelectorAll('.servers >a');
	var iframe = document.querySelector('iframe');
	serverLinks.forEach(function (item) {
		item.addEventListener('click', function(e){
			e.preventDefault();
			iframe.src = this.href;
		});
	});
}());
