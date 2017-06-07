(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

// import '../../../lib/jquery.pin.js';
// $('.side-bans').pin();

document.querySelector('.nav-icon').addEventListener('click', function () {
	this.classList.toggle('open');
	document.querySelector('header').classList.toggle('open');
});

document.querySelectorAll('.colorbtn').forEach(function (element, index) {
	element.addEventListener('click', function () {
		createCookie('color', this.getAttribute('data-color'), 30);
		window.location.reload(false);
	});
});

function createCookie(name, value, days) {
	var expires = '';
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
		expires = '; expires=' + date.toUTCString();
	}
	document.cookie = name + '=' + value + expires + '; path=/';
}

},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJwdWJsaWNcXHNyY1xccGFnZXNcXGhvbWVcXGpzXFxtYWluLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOzs7QUNBQTtBQUNBOztBQUVBLFNBQVMsYUFBVCxDQUF1QixXQUF2QixFQUFvQyxnQkFBcEMsQ0FBcUQsT0FBckQsRUFBOEQsWUFBVTtBQUN2RSxNQUFLLFNBQUwsQ0FBZSxNQUFmLENBQXNCLE1BQXRCO0FBQ0EsVUFBUyxhQUFULENBQXVCLFFBQXZCLEVBQWlDLFNBQWpDLENBQTJDLE1BQTNDLENBQWtELE1BQWxEO0FBQ0EsQ0FIRDs7QUFLQSxTQUFTLGdCQUFULENBQTBCLFdBQTFCLEVBQXVDLE9BQXZDLENBQWdELFVBQVMsT0FBVCxFQUFrQixLQUFsQixFQUF5QjtBQUN4RSxTQUFRLGdCQUFSLENBQXlCLE9BQXpCLEVBQWtDLFlBQVk7QUFDN0MsZUFBYSxPQUFiLEVBQXNCLEtBQUssWUFBTCxDQUFrQixZQUFsQixDQUF0QixFQUF1RCxFQUF2RDtBQUNBLFNBQU8sUUFBUCxDQUFnQixNQUFoQixDQUF1QixLQUF2QjtBQUNBLEVBSEQ7QUFJQSxDQUxEOztBQU9BLFNBQVMsWUFBVCxDQUFzQixJQUF0QixFQUEyQixLQUEzQixFQUFpQyxJQUFqQyxFQUF1QztBQUN0QyxLQUFJLFVBQVUsRUFBZDtBQUNBLEtBQUksSUFBSixFQUFVO0FBQ1QsTUFBSSxPQUFPLElBQUksSUFBSixFQUFYO0FBQ0EsT0FBSyxPQUFMLENBQWEsS0FBSyxPQUFMLEtBQWtCLE9BQUssRUFBTCxHQUFRLEVBQVIsR0FBVyxFQUFYLEdBQWMsSUFBN0M7QUFDQSxZQUFVLGVBQWUsS0FBSyxXQUFMLEVBQXpCO0FBQ0E7QUFDRCxVQUFTLE1BQVQsR0FBa0IsT0FBTyxHQUFQLEdBQWEsS0FBYixHQUFxQixPQUFyQixHQUErQixVQUFqRDtBQUNBIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24gZSh0LG4scil7ZnVuY3Rpb24gcyhvLHUpe2lmKCFuW29dKXtpZighdFtvXSl7dmFyIGE9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtpZighdSYmYSlyZXR1cm4gYShvLCEwKTtpZihpKXJldHVybiBpKG8sITApO3ZhciBmPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIrbytcIidcIik7dGhyb3cgZi5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGZ9dmFyIGw9bltvXT17ZXhwb3J0czp7fX07dFtvXVswXS5jYWxsKGwuZXhwb3J0cyxmdW5jdGlvbihlKXt2YXIgbj10W29dWzFdW2VdO3JldHVybiBzKG4/bjplKX0sbCxsLmV4cG9ydHMsZSx0LG4scil9cmV0dXJuIG5bb10uZXhwb3J0c312YXIgaT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2Zvcih2YXIgbz0wO288ci5sZW5ndGg7bysrKXMocltvXSk7cmV0dXJuIHN9KSIsIi8vIGltcG9ydCAnLi4vLi4vLi4vbGliL2pxdWVyeS5waW4uanMnO1xyXG4vLyAkKCcuc2lkZS1iYW5zJykucGluKCk7XHJcblxyXG5kb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcubmF2LWljb24nKS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKCl7XHJcblx0dGhpcy5jbGFzc0xpc3QudG9nZ2xlKCdvcGVuJyk7XHJcblx0ZG9jdW1lbnQucXVlcnlTZWxlY3RvcignaGVhZGVyJykuY2xhc3NMaXN0LnRvZ2dsZSgnb3BlbicpO1xyXG59KTtcclxuXHJcbmRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5jb2xvcmJ0bicpLmZvckVhY2goIGZ1bmN0aW9uKGVsZW1lbnQsIGluZGV4KSB7XHJcblx0ZWxlbWVudC5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uICgpIHtcclxuXHRcdGNyZWF0ZUNvb2tpZSgnY29sb3InLCB0aGlzLmdldEF0dHJpYnV0ZSgnZGF0YS1jb2xvcicpLCAzMCk7XHJcblx0XHR3aW5kb3cubG9jYXRpb24ucmVsb2FkKGZhbHNlKTtcclxuXHR9KVxyXG59KTtcclxuXHJcbmZ1bmN0aW9uIGNyZWF0ZUNvb2tpZShuYW1lLHZhbHVlLGRheXMpIHtcclxuXHR2YXIgZXhwaXJlcyA9ICcnO1xyXG5cdGlmIChkYXlzKSB7XHJcblx0XHR2YXIgZGF0ZSA9IG5ldyBEYXRlKCk7XHJcblx0XHRkYXRlLnNldFRpbWUoZGF0ZS5nZXRUaW1lKCkgKyAoZGF5cyoyNCo2MCo2MCoxMDAwKSk7XHJcblx0XHRleHBpcmVzID0gJzsgZXhwaXJlcz0nICsgZGF0ZS50b1VUQ1N0cmluZygpO1xyXG5cdH1cclxuXHRkb2N1bWVudC5jb29raWUgPSBuYW1lICsgJz0nICsgdmFsdWUgKyBleHBpcmVzICsgJzsgcGF0aD0vJztcclxufVxyXG5cclxuIl19
