<div class="new-topic random{{" " . $classname}}">
	<div class="title-topic">مواضيع مهمة</div>
	<div class="border-topic">
		<div class="btn-paginate previous">
			<img src="/dist/images/prev.svg" />
		</div>

		<div class="swiper-container">
			<div class="swiper-wrapper">
				@foreach ($randomPosts as $randomPost)
					<div class="swiper-slide">
						<a href="/posts/{{$randomPost->id}}">
							<div class="topic-img" style="background-image: url('{{$randomPost->photo_url}}')"></div>
						</a>
					</div>
				@endforeach
			</div>
		</div>

		<div class="btn-paginate next">
			<img src="/dist/images/next.svg" />
		</div>
	</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var mySwiper = new Swiper ('.swiper-container', {
			direction: 'horizontal',
			slidesPerView: 5,
			nextButton: '.btn-paginate.next',
			prevButton: '.btn-paginate.previous',
			slidesPerGroup: '5'
		})
	});
</script>