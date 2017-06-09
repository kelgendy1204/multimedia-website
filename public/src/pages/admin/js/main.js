document.querySelectorAll('form.delete').forEach(function (element, index) {
	element.addEventListener('submit', function(event){
		event.preventDefault();
		return confirm('Are you sure you want to delete this post?');
	}, false);
});