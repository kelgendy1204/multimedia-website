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


if(typeof isLogin == 'undefined') {
    // check
    var baseUrl = $('meta[name=url]').attr('content');
    var cookieUsername = getCookie('username');
    var localStorageUsername = localStorage.getItem('username');

    if(cookieUsername != localStorageUsername) {
        window.location.href = `${baseUrl}/admin/mzk_admin_front_logout`;
    }
} else if( isLogin == true ) {
    $(document).ready( function () {
        $('form')[0].addEventListener('submit', function(event) {
            event.preventDefault();
            var username = $('#name').val();
            createCookie( 'username', username , 30 );
            localStorage.setItem( 'username', username ); 
            $(this).submit();
        });
    });
}

function createCookie(name,value,days) {
    var expires = '';
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = '; expires=' + date.toUTCString();
    }
    document.cookie = name + '=' + value + expires + '; path=/';
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