<div class="">
	<div class="container relative z-40 mx-auto sm:flex -mt-px sm:px-0">
		<div class="sm:hidden absolute pin-t pin-r px-4 mt-6" @click="showMenu=!showMenu">
			<font-awesome-icon :icon="icons.faBars" class="text-2xl"></font-awesome-icon>
		</div>
		<div class="sm:flex sm:items-end">
			<div class="sm:mr-4 mt-4">
				<a href="/" class="no-underline" title="Homepage"><img width="180" src="/images/sanika_logo.svg" alt=""></a>
			</div>
			<transition name="accordian">
			<div id="nav" class="sm:flex sm:ml-4 mt-2 sm:items-center" v-if="(mobileMenu && showMenu) || !mobileMenu">
				@foreach($categories as $category)
				<div class="menu text-base sm:flex">
					<a href="/categories/{{ $category->alias }}" class="block sm:inline-block font-bold text-black uppercase hover:text-grey-dark no-underline p-2">{{ $category->name }}</a>
					@if(count($category->allSubCategories) && !count($category->products))
					<div class="submenu sm:absolute min-w-full p-4 pt-0 sm:pt-4 shadow">
						<div class="sm:flex -mx-4">
							<div class="px-4">
								<a href="/categories/{{ $category->alias }}" class="block w-full font-bold uppercase text-black sm:pb-4 sm:border-b hover:text-sanika-primary">{{$category->name}}</a>
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
						<div class="submenu sm:absolute min-w-full p-4 pt-0 sm:pt-4 shadow">
							<div class="sm:flex -mx-4">
								@foreach($category->allSubCategories as $subCategory)
								<div class="px-4 sm:w-1/5">
									<a href="/categories/{{ $category->alias }}/{{ $subCategory->alias }}" class="block w-full font-bold uppercase text-black sm:pb-4 sm:border-b hover:text-sanika-primary mt-2 mb-2 sm:mt-0 sm:mb-4">{{$subCategory->name}}</a>
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
				<div class="menu text-base sm:flex">
					<a href="/casestudies" class="block sm:inline-block font-bold text-black uppercase hover:text-grey-dark no-underline p-2">Case Studies</a>
					<div class="submenu sm:absolute min-w-full p-4 pt-0 sm:pt-4 shadow">
						<div class="sm:flex -mx-4">
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
				<div class="menu text-base sm:flex">
					<a href="/news" class="block sm:inline-block font-bold text-black uppercase hover:text-grey-dark no-underline p-2">News</a>
					<div class="submenu sm:absolute min-w-full p-4 pt-0 sm:pt-4 shadow">
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
				{{-- Galleries --}}
				<div class="menu text-base sm:flex">
					<a href="/gallery" class="block sm:inline-block font-bold text-black uppercase hover:text-grey-dark no-underline p-2">Gallery</a>	
				</div>
				<div class="menu text-base sm:flex">
					<a href="/contact" class="block sm:inline-block font-bold text-black uppercase hover:text-grey-dark no-underline p-2">Contact Us</a>
				</div>
			</div>
			</transition>
		</div>
	</div>
</div>
