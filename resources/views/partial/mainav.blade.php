<div class="bg-white border-t border-b border-grey-light">
	<div id="nav" class="container relative z-30 mx-auto flex justify-between -mt-px sm:px-0">
		@foreach($categories as $category)
		<div class="menu text-base flex">
			<a href="/categories/{{ $category->alias }}" class="text-max-primary hover:border-b hover:border-grey-dark no-underline py-2 px-2">{{ $category->name }}</a>
			<div class="submenu absolute bg-white min-w-full shadow-lg">
				@if(!$category['all_sub_categories'])
					@foreach($category['products'] as $product)
					<a href="/categories/{{ $category->alias }}/{{ $product->alias }}" class="block py-1 px-2 font-bold text-max-primary hover:text-max-secondary hover:bg-grey-lighter whitespace-no-wrap no-underline">{{ $product->name }}</a>
					@endforeach
				@else
					@foreach($category['all_sub_categories'] as $subCategory)
						<div title="{{ $subCategory->name }}">
						@if(!$subCategory['all_sub_categories'])
							@foreach($subCategory['products'] as $product)
							<a href="/categories/{{ $category->alias }}/{{ $subCategory->alias }}/{{ $product->alias }}" class="block py-1 px-2 font-bold text-max-primary hover:text-max-secondary hover:bg-grey-lighter whitespace-no-wrap no-underline">{{ $product->name }}</a>
							@endforeach
						@else
							@foreach($subCategory['all_sub_categories'] as $subSubCategory)
							<div title="{{ $subSubCategory->name }}">
								@foreach($subSubCategory['products'] as $product)
								<a href="/categories/{{ $category->alias }}/{{ $subCategory->alias }}/{{ $subSubCategory->alias }}/{{ $product->alias }}" class="block py-1 px-2 font-bold text-max-primary hover:text-max-secondary hover:bg-grey-lighter whitespace-no-wrap no-underline">{{ $product->name }}</a>
								@endforeach
							</div>
							@endforeach
						@endif
						</div>
					@endforeach
				@endif
			</div>
		</div>
		@endforeach
	</div>
	<div class="menuscreen z-20 hidden absolute pin bg-max-primary opacity-75">
		
	</div>
</div>
