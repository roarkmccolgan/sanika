@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8">
	<div class="category mt-4 md:flex">
		<div class="flex-1">
			<div class="sm:flex -mx-2">
				<div class="sm:flex-1 p-2">
					<div>
						<h1 class="font-extrabold uppercase mb-2">{{ $casestudy->site }}</h1>
						@if($casestudy->hasMedia('title'))
						<div class="my-2">
							<img src="{{ $casestudy->getFirstMediaUrl('title', 'hero') }}" alt="Image of {{ $casestudy['title'] }}">
						</div>
						@endif
					</div>
					<div class="flex bg-grey-lighter p-4">
						<div class="mr-4">
							<span class="block text-grey-darker uppercase">Client</span>
							<span class="block font-bold text-lg mb-2">{{ $casestudy->client }}</span>

							<span class="block text-grey-darker uppercase">Site</span>
							<span class="block font-bold text-lg mb-2">{{ $casestudy->site }}</span>

							<span class="block text-grey-darker uppercase">Scope</span>
							<span class="block font-bold text-lg mb-2">{{ $casestudy->scope }}</span>
						</div>
						<div class="">
							<span class="block text-grey-darker uppercase mb-1">Products Used</span>
							<div class="flex">
							    <ul class="mb-4 text-grey-darkest">
							    	@if(count($casestudy->siteproducts))
								    	@foreach ($casestudy->siteproducts as $product)
									        <li class="mb-2">
									        	<a href="{{'/categories/'.$product->path.'/products/'.$product->alias}}" class="no-underline text-sanika-primary">
													{{ $product->name }}
												</a>
											</li>
										@endforeach
									@endif
									@if($casestudy->products)
										@foreach ($casestudy->products as $product)
									        <li class="mb-2">
									        	{{ $product }}
											</li>
										@endforeach
									@endif
								</ul>
							</div>
						</div>
					</div>
					<h2 class="font-extrabold uppercase mb-4 mt-4">Background</h2>
					<p class="mb-2">{!! $casestudy->background !!}</p>
					<h2 class="font-extrabold uppercase mb-4 mt-4">Solution</h2>
					<p class="mb-2">{!! $casestudy->solution !!}</p>
					<div>
						@if($casestudy->hasMedia('gallery'))
							<slick
								ref="slickcasestudypreview"
								:options="slickOptions.clients"
								class="casestudypreview"
							>
							@foreach($casestudy->getMedia('gallery') as $galleryImg)
								<div class="py-2 pb-2">
									<img src="{{ $galleryImg->getUrl('thumb') }}" alt="{{ $galleryImg->name }}">
								</div>
							@endforeach
							</slick>
							<slick
								ref="slickcasestudynav"
								:options="slickOptions.clients"
								class="casestudynav"
							>
							@foreach($casestudy->getMedia('gallery') as $galleryImg)
								<div class="py-2 pb-2">
									<img src="{{ $galleryImg->getUrl('thumb') }}" alt="{{ $galleryImg->name }}">
								</div>
							@endforeach
							</slick>
							
						@endif
					</div>
					@if($casestudy->videos)
						@foreach($casestudy->videos as $video)
						<div class='embed-container mt-2'><iframe src='https://www.youtube.com/embed/{{ $video }}' frameborder='0' allowfullscreen></iframe></div>
						@endforeach
					@endif
				</div>
				<div class="sm:w-1/3 p-2 pt-0 mt-4">
					<span class="font-bold text-lg text-grey-darker uppercase">Other Case Studies</span>
					@foreach($categories as $menucategory)
					<div class="font-bold my-2">
						
						<a class="inline-block no-underline font-normal text-sanika-primary hover:underline" href="/casestudies/{{ $menucategory->alias }}">
							{{ $menucategory->name }}
						</a>
					</div>
						@foreach($menucategory->casestudies as $subCaseStudy)
						<div class="my-2 ml-2">
							@if($subCaseStudy->alias != $casestudy->alias)
							<a class="inline-block no-underline text-sanika-primary hover:underline" href="/casestudies/{{ $menucategory->alias }}/{{ $subCaseStudy->alias }}">
								{{ $subCaseStudy->title }}
							</a>
							@endif
						</div>
						@endforeach
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="flex flex-wrap -mx-2 mt-6 text-base">
		@if(count($casestudy->siteproducts))
		<h3 class="font-extrabold uppercase w-full mb-2 px-2">Products used</h3>
		@foreach(collect($casestudy->siteproducts)->chunk(3) as $chunk)
		<div class="w-full flex flex-wrap items-stretch">
			@foreach($chunk as $product)
			<div class="w-full sm:w-1/3 p-2">
				<div class="flex flex-wrap h-full bg-white border shadow p-4">
					@if($product->hasMedia('title'))
					<div class="w-1/3">
						<a href="{{'/categories/'.$product->path.'/products/'.$product->alias}}" class="no-underline">
							<img src="{{ $product->getFirstMediaUrl('title', 'thumb') }}" alt="Photo of {{ $product->alias }}">
						</a>
					</div>
					@endif
					<div class="flex-1">
						<div class="mx-4">
							<a href="{{'/categories/'.$product->path.'/products/'.$product->alias}}" class="text-sanika-primary no-underline hover:text-max-secondary">
								<h3 class="font-extrabold uppercase mb-2">{{$product['name']}}</h3>
							</a>
							<p class="mb-2 text-sm">{{ $product['strapline'] }}</p>
						</div>
					</div>
					<div class="w-full">
						<hr class="border-t border-grey-light my-4">
						<div class="flex justify-between">
							<div class="text-lg text-sanika-primary font-bold">
								
							</div>
							<div class="">
								<a href="{{'/categories/'.$product->path.'/products/'.$product->alias}}" class="no-underline font-bold text-white bg-grey-darkest py-2 px-4 rounded hover:bg-black whitespace-no-wrap">
									<span class="inline-block text-sm">View</span>
								</a>	
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@endforeach
		@endif
	</div>
</div>
@include('partial.footer')
@endsection
