(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJwdWJsaWNcXHNyY1xccGFnZXNcXG9ubGluZVxcanNcXG1haW4uanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7OztBQ0FDLGFBQVk7QUFDWixLQUFJLGNBQWMsU0FBUyxnQkFBVCxDQUEwQixhQUExQixDQUFsQjtBQUNBLEtBQUksU0FBUyxTQUFTLGFBQVQsQ0FBdUIsUUFBdkIsQ0FBYjtBQUNBLGFBQVksT0FBWixDQUFvQixVQUFVLElBQVYsRUFBZ0I7QUFDbkMsT0FBSyxnQkFBTCxDQUFzQixPQUF0QixFQUErQixVQUFTLENBQVQsRUFBVztBQUN6QyxLQUFFLGNBQUY7QUFDQSxLQUFFLG9CQUFGLEVBQXdCLFNBQXhCLENBQWtDLE1BQWxDLENBQXlDLFFBQXpDO0FBQ0EsVUFBTyxHQUFQLEdBQWEsS0FBSyxJQUFsQjtBQUNBLFFBQUssU0FBTCxDQUFlLEdBQWYsQ0FBbUIsUUFBbkI7QUFDQSxHQUxEO0FBTUEsRUFQRDtBQVFBLENBWEEsR0FBRCIsImZpbGUiOiJnZW5lcmF0ZWQuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uIGUodCxuLHIpe2Z1bmN0aW9uIHMobyx1KXtpZighbltvXSl7aWYoIXRbb10pe3ZhciBhPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7aWYoIXUmJmEpcmV0dXJuIGEobywhMCk7aWYoaSlyZXR1cm4gaShvLCEwKTt2YXIgZj1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK28rXCInXCIpO3Rocm93IGYuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixmfXZhciBsPW5bb109e2V4cG9ydHM6e319O3Rbb11bMF0uY2FsbChsLmV4cG9ydHMsZnVuY3Rpb24oZSl7dmFyIG49dFtvXVsxXVtlXTtyZXR1cm4gcyhuP246ZSl9LGwsbC5leHBvcnRzLGUsdCxuLHIpfXJldHVybiBuW29dLmV4cG9ydHN9dmFyIGk9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtmb3IodmFyIG89MDtvPHIubGVuZ3RoO28rKylzKHJbb10pO3JldHVybiBzfSkiLCIoZnVuY3Rpb24gKCkge1xyXG5cdHZhciBzZXJ2ZXJMaW5rcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5zZXJ2ZXJzID5hJyk7XHJcblx0dmFyIGlmcmFtZSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJ2lmcmFtZScpO1xyXG5cdHNlcnZlckxpbmtzLmZvckVhY2goZnVuY3Rpb24gKGl0ZW0pIHtcclxuXHRcdGl0ZW0uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBmdW5jdGlvbihlKXtcclxuXHRcdFx0ZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG5cdFx0XHQkKCcuc2VydmVycyA+YS5hY3RpdmUnKS5jbGFzc0xpc3QucmVtb3ZlKCdhY3RpdmUnKTtcclxuXHRcdFx0aWZyYW1lLnNyYyA9IHRoaXMuaHJlZjtcclxuXHRcdFx0dGhpcy5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKTtcclxuXHRcdH0pO1xyXG5cdH0pO1xyXG59KCkpO1xyXG4iXX0=
