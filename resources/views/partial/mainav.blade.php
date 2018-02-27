<div class="bg-white border-t border-b border-grey-light">
	<div id="nav" class="container relative z-20 mx-auto flex items-stretch -mt-px sm:px-0">
		@foreach($categories as $cat => $category)
		<div class="menu text-base flex">
			<a href="#" class="text-max-primary hover:border-b hover:border-grey-dark no-underline py-2 px-2">{{ $category['title'] }}</a>
			<div class="submenu absolute bg-white min-w-full shadow-lg">
				@foreach($category['products'] as $prod => $product)
				<a href="/categories/{{ $cat }}/{{ $prod }}" class="block py-1 text-max-primary hover:text-max-secondary whitespace-no-wrap no-underline">{{ $product['name'] }}</a>
				@endforeach
			</div>
		</div>
		@endforeach
	</div>
	<div class="menuscreen z-10 hidden absolute pin bg-max-primary opacity-75">
		
	</div>
</div>