<div class="bg-black py-2 text-white text-sm font-bold relative z-50">
	@if(url()->current() == 'http://sanikacc.test' || url()->current() == 'http://sanika.co.za')
	<div class="sm:absolute z-50 sm:pin-x flex justify-center h-20 overflow-hidden pointer-events-none">
		<transition name="slide">
			<div ref="newsItem" class="hidden p-2 w-full sm:w-2/5 text-white bg-white rounded-b border-b border-grey shadow pointer-events-auto" style="background: rgb(201,0,0);background: linear-gradient(0deg, rgba(201,0,0,1) 40%, rgba(136,45,45,1) 90%, rgba(89,0,0,1) 100%);" v-show="showNews" v-cloak>
		        <div class="text-sm">Latest Article:</div>
		        <p class="font-bold uppercase">{{ $news->first()->title  }}</p>
		        <a href="/news/{{ $news->first()->category->alias }}/{{ $news->first()->alias }}" class="text-sm text-white">read now</a>
			</div>
		</transition>
	</div>
	@endif
	<div class="container mx-auto flex items-center justify-between px-2 sm:px-0">
		<div class="flex items-center">
			<div class="pr-4 mr-4 text-xs sm:text-sm">Call: <a class="no-underline text-sanika-primary" href="tel:+274243061">+27 (011) 425 3061</a></div>
			<div class="pr-4 mr-4 text-xs sm:text-sm">Email: <a class="no-underline text-sanika-primary" href="mailto:info@sanika.co.za">info@sanika.co.za</a></div>
		</div>
		<div class="font-normal text-sm">
			@if($isLoggedIn)
			<div class="flex items-center">
				<div class="mr-2"><img class="rounded-full w-8 h-8" src="{{ $user['picture'] }}" /></div>
				<div><a class="no-underline text-white" href="{{ url("/logout") }}">logout</a></div>
			</div>
			@else
			<a class="hidden no-underline text-white" href="{{ url("/login") }}">login</a>
			@endif
		</div>
		<div class="flex items-center text-lg">
			<a href="https://www.facebook.com/Sanika-Waterproofing-Specialists-151884002158500/" target="_blank" class="no-underline inline-block mx-1"><font-awesome-icon :icon="icons.faFacebookSquare" class="fa-lg text-white"></font-awesome-icon></a>
			<a href="https://www.linkedin.com/company/sanikawaterproofingspecialists/" target="_blank" class="no-underline inline-block mx-1"><font-awesome-icon :icon="icons.faLinkedin" class="fa-lg text-white"></font-awesome-icon></a>
			<a href="https://www.youtube.com/channel/UCTDGMK1Ex3CwEJfRKWe6QVw?view_as=subscriber" target="_blank" class="no-underline inline-block mx-1"><font-awesome-icon :icon="icons.faYoutubeSquare" class="fa-lg text-white"></font-awesome-icon></a>
		</div>
	</div>
</div>