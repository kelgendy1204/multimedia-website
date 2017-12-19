export function playImgbgAudio() {
	$('.imgbg_animated').each(function(index, elem) {
		var getAudioSrc = $(elem).data('audio');
		if(getAudioSrc){
			var audio = new Audio(getAudioSrc);
			var isPlaying = audio.currentTime > 0 && !audio.paused && !audio.ended && audio.readyState > 2;
			$(elem).hover(function () {
				if (!isPlaying) {
					audio.play();
				}
			}, function () {
				audio.pause();
			});
		}
	});
}