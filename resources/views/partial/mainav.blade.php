<div class="">
	<div class="container relative z-20 mx-auto flex -mt-px sm:px-0">
		<div class="flex items-end">
			<div class="sm:mr-4 mt-4">
				<a href="/" class="no-underline" title="Homepage"><img width="180" src="/images/sanika_logo.svg" alt=""></a>
			</div>
			<div id="nav" class="sm:ml-4 mt-2 flex items-center">
				@foreach($categories as $category)
				<div class="menu text-base flex">
					<a href="/categories/{{ $category->alias }}" class="font-bold text-black uppercase hover:text-grey-dark no-underline p-2">{{ $category->name }}</a>
					@if(count($category->allSubCategories) && !count($category->products))
					<div class="submenu absolute min-w-full p-4 pt-4 shadow">
						<div class="flex -mx-4">
							<div class="px-4">
								<a href="/categories/{{ $category->alias }}" class="block w-full font-bold uppercase text-black pb-4 border-b hover:text-sanika-primary">{{$category->name}}</a>
								@foreach($category->allSubCategories as $subCategory)
									<a href="/categories/{{ $category->alias }}/{{ $subCategory->alias }}" class="flex items-center py-1 px-2 text-grey-darkest hover:text-sanika-primary no-underline">
										{{ $subCategory->name }}
									</a>
								@endforeach
							</div>
						</div>
					</div>
					@else
						@if(count($category->allSubCategories))
						<div class="submenu absolute min-w-full p-4 pt-4 shadow">
							<div class="flex -mx-4">
								@foreach($category->allSubCategories as $subCategory)
								<div class="px-4 sm:w-1/5">
									<a href="/categories/{{ $category->alias }}/{{ $subCategory->alias }}" class="block w-full font-bold uppercase text-black pb-4 border-b hover:text-sanika-primary mb-4">{{$subCategory->name}}</a>
									@if(count($subCategory->products))
										@foreach($subCategory->products as $catProd)
											<a href="/categories/{{ $catProd->path }}/products/{{ $catProd->alias }}" class="flex items-center py-1 px-2 text-grey-darkest hover:text-sanika-primary no-underline">
												{{ $catProd->name }}
											</a>
										@endforeach
									@endif
								</div>
								@endforeach
							</div>
						</div>
						@endif
					@endif
				</div>
				@endforeach
				{{-- CaseStudies --}}
				@if(count($casestudies))
				<div class="menu text-base flex">
					<a href="/casestudies" class="font-bold text-black uppercase hover:text-grey-dark no-underline p-2">Case Studies</a>
					<div class="submenu absolute min-w-full p-4 pt-4 shadow">
						<div class="flex -mx-4">
							@foreach($casestudies as $casestudy)
							<div class="px-4">
								<span class="text-grey-dark">{{$casestudy->category->name }}</span> <a href="/casestudies/{{ $casestudy->category->alias }}/{{ $casestudy->alias }}" class="block w-full py-1 px-2 text-grey-darkest hover:text-sanika-primary no-underline">{{$casestudy->site }}</a>
							</div>
							@endforeach
						</div>
					</div>	
				</div>
				@endif
				{{-- News --}}
				@if(count($news))
				<div class="menu text-base flex">
					<a href="/news" class="font-bold text-black uppercase hover:text-grey-dark no-underline p-2">News</a>
					<div class="submenu absolute min-w-full p-4 pt-4 shadow">
						<div class="flex flex-wrap -mx-4">
							@foreach($news as $newsitem)
							<div class="px-4">
								<span class="text-grey-dark">{{$newsitem->category->name }}</span> <a href="/news/{{ $newsitem->category->alias }}/{{ $newsitem->alias }}" class="block w-full py-1 px-2 text-grey-darkest hover:text-sanika-primary no-underline">{{$newsitem->title }}</a>
							</div>
							@endforeach
						</div>
					</div>	
				</div>
				@endif
				<div class="menu text-base flex">
					<a href="/contact" class="font-bold text-black uppercase hover:text-grey-dark no-underline p-2">Contact</a>
				</div>
			</div>
		</div>
	</div>
</div>
