<div class="bg-black py-2 text-white text-sm font-bold relative z-30">
	<div class="container mx-auto flex items-center justify-between px-2 sm:px-0">
		<div class="flex items-center">
			<div class="pr-4 mr-4 text-xs sm:text-base">CALL NOW: <a class="no-underline text-sanika-primary" href="tel:+274243061">+27 (011) 425 3061</a></div>
		</div>
		<div class="font-normal text-sm">
			@if($isLoggedIn)
			<div class="flex items-center">
				<div class="mr-2"><img class="rounded-full w-8 h-8" src="{{ $user['picture'] }}" /></div>
				<div><a class="no-underline text-white" href="{{ url("/logout") }}">logout</a></div>
			</div>
			@else
			<a class="no-underline text-white" href="{{ url("/login") }}">login</a>
			@endif
		</div>
	</div>
</div>