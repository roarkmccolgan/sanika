<div class="">
	<div class="container relative z-40 mx-auto sm:flex -mt-px sm:px-0">
		<div class="sm:hidden absolute pin-t pin-r px-4 mt-6" @click="showMenu=!showMenu">
			<font-awesome-icon :icon="icons.faBars" class="text-2xl"></font-awesome-icon>
		</div>
		<div class="sm:flex sm:items-end w-full">
			<div class="sm:mr-4 mt-4">
				<a href="/" class="no-underline" title="Homepage"><img width="180" src="/images/sanika_logo.svg" alt=""></a>
			</div>
			<transition name="accordian">
			<div id="nav" class="sm:flex-1 sm:flex sm:ml-4 mt-2" v-if="(mobileMenu && showMenu) || !mobileMenu">
				@foreach($categories as $category)
				<div class="menu text-sm sm:flex sm:items-center sm:rounded-t">
					<a href="/categories/{{ $category->alias }}" class="block text-base sm:inline-block font-bold bg-grey-light sm:bg-transparent text-black uppercase hover:text-grey-dark no-underline p-2">{{ $category->name }}</a>
					@if(count($category->allSubCategories) && !count($category->products))
					<div class="submenu sm:absolute">
						<div class="sm:flex -mx-4 p-4">
							<div class="px-4">
								<a href="/categories/{{ $category->alias }}" class="block w-full font-bold uppercase text-grey-darker sm:text-white sm:pb-4 sm:border-b hover:text-sanika-primary">{{$category->name}}</a>
								@foreach($category->allSubCategories as $subCategory)
									<a href="/categories/{{ $category->alias }}/{{ $subCategory->alias }}" class="flex items-center py-2 px-2 text-black sm:text-grey-light hover:text-sanika-primary no-underline border-b border-dotted border-grey-darker">
										{{ $subCategory->name }}
									</a>
								@endforeach
							</div>
						</div>
					</div>
					@else
						@if(count($category->allSubCategories))
						<div class="submenu sm:absolute sm:pin-x">
							<div class="sm:flex -mx-4 p-4">
								@foreach($category->allSubCategories as $subCategory)
								<div class="px-4 sm:w-1/5">
									<a href="/categories/{{ $category->alias }}/{{ $subCategory->alias }}" class="block w-full font-bold uppercase text-grey-darker sm:text-white sm:pb-4 sm:border-b hover:text-sanika-primary mt-2 mb-2 sm:mt-0 sm:mb-4">{{$subCategory->name}}</a>
									@if(count($subCategory->products))
										@foreach($subCategory->products as $catProd)
											<a href="/categories/{{ $catProd->path }}/products/{{ $catProd->alias }}" class="flex items-center py-2 px-2 text-black sm:text-grey-light hover:text-sanika-primary no-underline border-b border-dotted border-grey-darker">
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
				@if(count($casestudycategories))
				<div class="menu text-sm sm:flex sm:items-center sm:rounded-t">
					<a href="/casestudies" class="block text-base sm:inline-block font-bold bg-grey-light sm:bg-transparent text-black uppercase hover:text-grey-dark no-underline p-2">Case Studies</a>
					<div class="submenu sm:absolute">
						<div class="p-4">
							@foreach($casestudycategories as $casestudy)
							<div class="">
								<a href="/casestudies/{{ $casestudy->alias }}/" class="block w-full py-2 px-2 text-black sm:text-grey-light hover:text-sanika-primary no-underline border-b border-dotted border-grey-darker">{{$casestudy->name }}</a>
							</div>
							@endforeach
						</div>
					</div>	
				</div>
				@endif
				{{-- News --}}
				@if(count($news))
				<div class="menu text-sm sm:flex sm:items-center sm:rounded-t">
					<a href="/news" class="block text-base sm:inline-block font-bold bg-grey-light sm:bg-transparent text-black uppercase hover:text-grey-dark no-underline p-2">News</a>
					<div class="submenu sm:absolute">
						<div class="p-4">
							@foreach($news as $newsitem)
							<div class="">
								<span class="text-grey-dark">{{$newsitem->category->name }}</span> <a href="/news/{{ $newsitem->category->alias }}/{{ $newsitem->alias }}" class="block w-full py-2 px-2 text-black sm:text-grey-light hover:text-sanika-primary no-underline border-b border-dotted border-grey-darker">{{$newsitem->title }}</a>
							</div>
							@endforeach
						</div>
					</div>	
				</div>
				@endif
				{{-- Galleries --}}
				{{-- <div class="menu text-sm sm:flex sm:items-center sm:rounded-t">
					<a href="/gallery" class="block text-base sm:inline-block font-bold bg-grey-light sm:bg-transparent text-black uppercase hover:text-grey-dark no-underline p-2">Gallery</a>	
				</div> --}}
				<div class="menu text-sm sm:flex sm:items-center sm:rounded-t">
					<a href="/contact" class="block text-base sm:inline-block font-bold bg-grey-light sm:bg-transparent text-black uppercase hover:text-grey-dark no-underline p-2">Contact Us</a>
				</div>
			</div>
			</transition>
			<div class="mt-4 sm:mt-0 sm:ml-4 sm:flex sm:flex-col sm:justify-center">
				@include('partial.search')
			</div>
		</div>
	</div>
	<div class="container mx-auto h-0 mt-6 border-sanika-primary border-b"></div>
</div>
