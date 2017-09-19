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

if(typeof noCheck == 'undefined') {
    // check
    var cookieUsername = getCookie('username');
    var localStorageUsername = localStorage.getItem('username');
    
    if(cookieUsername != localStorageUsername) {
        submit('/admin/mzk_admin_front_logout', null , 'get');
    }
}


function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function submit(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}