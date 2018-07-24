<div class="bg-black py-2 text-white text-sm font-bold relative z-30">
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
			<a href="#" target="_blank" class="no-underline inline-block mx-1"><font-awesome-icon :icon="icons.faFacebookSquare" class="fa-lg text-white"></font-awesome-icon></a>
			<a href="#" target="_blank" class="no-underline inline-block mx-1"><font-awesome-icon :icon="icons.faLinkedin" class="fa-lg text-white"></font-awesome-icon></a>
			<a href="#" target="_blank" class="no-underline inline-block mx-1"><font-awesome-icon :icon="icons.faYoutubeSquare" class="fa-lg text-white"></font-awesome-icon></a>
		</div>
	</div>
</div>