<div class="new-topic random{{" " . $classname}}">
	<div class="title-topic">مواضيع مهمة</div>
	<div class="border-topic">
		<div class="btn-paginate previous">
			<img src="/dist_v2/images/prev.svg" alt="previous" />
		</div>

		<div class="swiper-container">
			<div class="swiper-wrapper">
				@foreach ($randomPosts as $randomPost)
					<div class="swiper-slide">
						<a href="{{ route('showpost', ['postdesc' => $randomPost->description]) }}">
							<div class="topic-img" style="background-image: url('{{$randomPost->photo_url}}')"></div>
						</a>
					</div>
				@endforeach
			</div>
		</div>

		<div class="btn-paginate next">
			<img src="/dist_v2/images/next.svg" alt="next" />
		</div>
	</div>
</div>

<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var mySwiper = new Swiper ('.swiper-container', {
			direction: 'horizontal',
			slidesPerView: 5,
			nextButton: '.btn-paginate.next',
			prevButton: '.btn-paginate.previous',
			slidesPerGroup: 5
		})
	});
</script>