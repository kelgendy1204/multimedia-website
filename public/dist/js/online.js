(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
(function () {
	var serverLinks = document.querySelectorAll('.servers >a');
	var iframe = document.querySelector('iframe');
	serverLinks.forEach(function (item) {
		item.addEventListener('click', function (e) {
			e.preventDefault();
			$('.servers >a.active').classList.remove('active');
			iframe.src = this.href;
			this.classList.add('active');
		});
	});
})();

},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJwdWJsaWNcXHNyY1xccGFnZXNcXG9ubGluZVxcanNcXG1haW4uanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUNBQyxhQUFZO0FBQ1osS0FBSSxjQUFjLFNBQVMsZ0JBQVQsQ0FBMEIsYUFBMUIsQ0FBbEI7QUFDQSxLQUFJLFNBQVMsU0FBUyxhQUFULENBQXVCLFFBQXZCLENBQWI7QUFDQSxhQUFZLE9BQVosQ0FBb0IsVUFBVSxJQUFWLEVBQWdCO0FBQ25DLE9BQUssZ0JBQUwsQ0FBc0IsT0FBdEIsRUFBK0IsVUFBUyxDQUFULEVBQVc7QUFDekMsS0FBRSxjQUFGO0FBQ0EsS0FBRSxvQkFBRixFQUF3QixTQUF4QixDQUFrQyxNQUFsQyxDQUF5QyxRQUF6QztBQUNBLFVBQU8sR0FBUCxHQUFhLEtBQUssSUFBbEI7QUFDQSxRQUFLLFNBQUwsQ0FBZSxHQUFmLENBQW1CLFFBQW5CO0FBQ0EsR0FMRDtBQU1BLEVBUEQ7QUFRQSxDQVhBLEdBQUQiLCJmaWxlIjoiZ2VuZXJhdGVkLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbiBlKHQsbixyKXtmdW5jdGlvbiBzKG8sdSl7aWYoIW5bb10pe2lmKCF0W29dKXt2YXIgYT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2lmKCF1JiZhKXJldHVybiBhKG8sITApO2lmKGkpcmV0dXJuIGkobywhMCk7dmFyIGY9bmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIitvK1wiJ1wiKTt0aHJvdyBmLmNvZGU9XCJNT0RVTEVfTk9UX0ZPVU5EXCIsZn12YXIgbD1uW29dPXtleHBvcnRzOnt9fTt0W29dWzBdLmNhbGwobC5leHBvcnRzLGZ1bmN0aW9uKGUpe3ZhciBuPXRbb11bMV1bZV07cmV0dXJuIHMobj9uOmUpfSxsLGwuZXhwb3J0cyxlLHQsbixyKX1yZXR1cm4gbltvXS5leHBvcnRzfXZhciBpPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7Zm9yKHZhciBvPTA7bzxyLmxlbmd0aDtvKyspcyhyW29dKTtyZXR1cm4gc30pIiwiKGZ1bmN0aW9uICgpIHtcclxuXHR2YXIgc2VydmVyTGlua3MgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuc2VydmVycyA+YScpO1xyXG5cdHZhciBpZnJhbWUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCdpZnJhbWUnKTtcclxuXHRzZXJ2ZXJMaW5rcy5mb3JFYWNoKGZ1bmN0aW9uIChpdGVtKSB7XHJcblx0XHRpdGVtLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oZSl7XHJcblx0XHRcdGUucHJldmVudERlZmF1bHQoKTtcclxuXHRcdFx0JCgnLnNlcnZlcnMgPmEuYWN0aXZlJykuY2xhc3NMaXN0LnJlbW92ZSgnYWN0aXZlJyk7XHJcblx0XHRcdGlmcmFtZS5zcmMgPSB0aGlzLmhyZWY7XHJcblx0XHRcdHRoaXMuY2xhc3NMaXN0LmFkZCgnYWN0aXZlJyk7XHJcblx0XHR9KTtcclxuXHR9KTtcclxufSgpKTtcclxuIl19
