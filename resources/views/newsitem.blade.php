@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8">
	<div class="sm:flex">
		@if(count($news))
		<div class="sm:w-1/5 sm:p-2 mt-4 mr-4 uppercase border-r">
			<h4 class="text-grey-darker mb-1 whitespace-no-wrap">Other News:</h4>
			<ul class="mb-4 text-grey-darkest">
		        @foreach ($news as $new)
		            <li class="mb-2 bg-grey-lightest py-4s"><a href="/news/{{ $new->category->alias }}/{{ $new->alias }}" class="no-underline font-normal text-sanika-primary hover:underline">{{ $new->title }}</a></li>
		        @endforeach
		    </ul>
		</div>
		@endif
		<div class="sm:w-4/5 category mt-4 md:flex sm:p-2">
			@if($newsitem->hasMedia('title'))
			<div class="md:w-1/3">
				<img src="{{ $newsitem->getFirstMediaUrl('title', 'category') }}" alt="Image of {{ $newsitem['title'] }}">
			</div>
			@endif
			<div class="flex-1">
				<span class="font-bold text-lg text-grey-darker uppercase">Case Study</span>
				<h1 class="font-extrabold uppercase mb-1">{{ $newsitem->title }}</h1>
				<h2 class="text-grey-darker font-bold mb-2">{{ $newsitem->sub_title }}</h2>				
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
