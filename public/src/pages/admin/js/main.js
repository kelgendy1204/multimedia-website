document.querySelectorAll('form.delete').forEach(function (element, index) {
	element.addEventListener('submit', function(event){
		console.log('submit');
		event.preventDefault();
		var action = confirm('Are you sure you want to delete this post?');
		console.log(action);
		if(action) {
			element.submit();
		}
	}, false);
});