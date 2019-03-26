@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8 px-2 sm:px-0">
	<div class="sm:flex">
		@if(count($news))
		<div class="hidden sm:w-1/5 sm:block sm:p-2 mt-4 mr-4 uppercase border-r">
			<h4 class="text-grey-darker mb-1 whitespace-no-wrap">Other News:</h4>
			<ul class="mb-4 text-grey-darkest">
				@foreach ($news as $new)
					<li class="mb-2 bg-grey-lightest py-4s"><a href="/news/{{ $new->category->alias }}/{{ $new->alias }}" class="no-underline font-normal text-sanika-primary hover:underline">{{ $new->title }}</a></li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="sm:w-4/5 mt-4 sm:p-2">
			<div class="flex flex-wrap sm:flex-no-wrap">
				<div class="flex-1">
					<span class="font-bold text-lg text-grey-darker uppercase">{{ $newsitem->category->name }}</span>
					<h1 class="font-extrabold uppercase mb-1">{{ $newsitem->title }}</h1>
					<h2 class="text-grey-darker font-bold mb-2">{{ $newsitem->sub_title }}</h2>
				</div>
				@if($newsitem->event)
				<div class="">
					<div class="flex flex-wrap">
						<div class="block rounded-t overflow-hidden bg-white text-center w-24">
							<div class="bg-red text-white py-1">
							  	{{ date('M', $newsitem->event['start']) }}
							</div>
							<div class="pt-1 border-l border-r">
							  	<span class="text-4xl font-bold">{{ date('d', $newsitem->event['start']) }}</span>
							</div>
							<div class="pb-2 px-2 border-l border-r border-b rounded-b flex justify-between">
							  	<span class="text-xs font-bold">{{ date('D', $newsitem->event['start']) }}</span>
							  	<span class="text-xs font-bold">{{ date('Y', $newsitem->event['start']) }}</span>
							</div>
						</div>
						@if($newsitem->event['end'])
						<div class="ml-2 h-12 mt-6" style="width: 0; border-top: 25px solid transparent; border-bottom: 25px solid transparent; border-left: 25px solid #EFEFEF;"></div>
						<div class="flex-1 ml-2 mr-2">
							<div class="block rounded-t overflow-hidden bg-white text-center w-24">
								<div class="bg-red text-white py-1">
								  	{{ date('M', $newsitem->event['start']) }}
								</div>
								<div class="pt-1 border-l border-r">
								  	<span class="text-4xl font-bold">{{ date('d', $newsitem->event['end']) }}</span>
								</div>
								<div class="pb-2 px-2 border-l border-r border-b rounded-b flex justify-between">
								  	<span class="text-xs font-bold">{{ date('D', $newsitem->event['end']) }}</span>
								  	<span class="text-xs font-bold">{{ date('Y', $newsitem->event['end']) }}</span>
								</div>
							</div>
						</div>
						@endif
						<div class="">
							<h3 class="text-grey-darker font-bold mb-1">Venue</h3>				
							<p class="">{{ $newsitem->event['address_1'] }}, {{ $newsitem->event['address_2'] }}, {{ $newsitem->event['address_3'] }}</p>
							<p class=""><a href="{{ $newsitem->event['link'] }}" target="_blank" class="inline-block my-2 no-underline bg-sanika-primary hover:bg-red-dark text-white font-bold py-2 px-4 rounded">More Info</a></p>
						</div>
					</div>
				</div>
				@endif
			</div>
			@if($newsitem->hasMedia('title'))
			<div class="my-2">
				<img src="{{ $newsitem->getFirstMediaUrl('title', 'hero') }}" alt="Image of {{ $newsitem['title'] }}">
			</div>
			@endif
			@if(count($newsitem->siteproducts) || count($newsitem->products) || $newsitem->hasMedia('attachments'))
				<div class="flex">
					@if(count($newsitem->siteproducts) || count($newsitem->products))
					<div class="w-1/2">
						<span class="block text-grey-darker uppercase mb-1">Related Products</span>
						<div class="flex">
						    <ul class="mb-4 text-grey-darkest">
						    	@if(count($newsitem->siteproducts))
							    	@foreach ($newsitem->siteproducts as $product)
								        <li class="mb-2">
								        	<a href="{{'/categories/'.$product->path.'/products/'.$product->alias}}" class="no-underline text-sanika-primary">
												{{ $product->name }}
											</a>
										</li>
									@endforeach
								@endif
								@if($newsitem->products)
									@foreach ($newsitem->products as $product)
								        <li class="mb-2">
								        	{{ $product }}
										</li>
									@endforeach
								@endif
							</ul>
						</div>
					</div>
					@endif
					@if($newsitem->hasMedia('attachments'))
					<div class="w-1/2">
						<span class="block text-grey-darker uppercase mb-1">Related Downloads</span>
						<div class="flex">
						    <ul class="mb-4 text-grey-darkest">
						    	@foreach($newsitem->getMedia('attachments') as $attachments)
								<li>
									<a class="no-underline font-semibold  text-sanika-primary" href="{{ $attachments->getUrl() }}" target="_blank" alt="{{ $attachments->name }}" >{{ $attachments->name }}</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					@endif
				</div>
			@endif
			<div class="category">
				@if($newsitem->title == "Sanika Waterproofing Specialists exhibit at the KZN Construction Expo 2019")
				<span class="block text-grey-darker uppercase mb-1">Listen to the interview below:</span>
				<audio controls>
			        <source src="/audio/sanika_highway_radio_interview.mp3" type="audio/mpeg">
			    </audio>
				@endif
				<p class="mb-2">{!! $newsitem->article !!}</p>
			</div>
		</div>
	</div>
	<div class="flex flex-wrap -mx-2 mt-6 text-base">
		@if(count($newsitem->siteproducts))
		<h3 class="font-extrabold uppercase w-full mb-2 px-2">Related Products</h3>
		@foreach(collect($newsitem->siteproducts)->chunk(3) as $chunk)
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
