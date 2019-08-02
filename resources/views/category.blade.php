@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8">
	<div class="flex flex-wrap">
		<div class="hidden sm:block w-1/4 mt-4">
			@foreach($categories as $menucategory)
			<div class="font-bold my-2">
				@if($menucategory->alias != $category->alias)
				<a class="inline-block no-underline font-normal text-sanika-primary hover:underline" href="/categories/{{ $menucategory->alias }}">
					{{ $menucategory->name }}
				</a>
				@else
				<div class="border-l-2 border-sanika-primary bg-grey-lighter p-2 mr-4">{{ $menucategory->name }}</div>
				@endif
			</div>
				@foreach($menucategory->allSubCategories as $submenucategory)
				<div class="font-bold my-2">
					@if($submenucategory->alias != $category->alias)
					<a class="inline-block no-underline font-normal text-sanika-primary hover:underline" href="/categories/{{ $menucategory->alias }}/{{ $submenucategory->alias }}">
						{{ $submenucategory->name }}
					</a>
					@else
					<div class="border-l-2 border-sanika-primary bg-grey-lighter p-2 mr-4 ml-2">{{ $submenucategory->name }}</div>
					@endif
				</div>
				@endforeach
			@endforeach
		</div>
		<div class="w-full sm:w-3/4 mt-4 category md:flex md:flex-wrap">
			<div class="flex-1 mb-6 ml-2 pr-4">
				
				@if($category['name'] == 'About')
					<img class="w-full block mx-auto mb-4" src="/images/about_sanika.jpg" alt="Image of Sanika Waterproofing Headquarters">
				@endif
				<h1 class="font-extrabold uppercase mb-2">{{ $category['name'] }}</h1>
				{!! $category['description'] !!}
			</div>
			@if($category->hasMedia('title'))
			<div class="sm:w-1/3">
				<img class="sm:w-3/4 mx-auto" src="{{ $category->getFirstMediaUrl('title', 'category') }}" alt="Image of {{ $category['name'] }}">
			</div>
			@endif
			@if($category->hasMedia('property'))
			<div class="w-full flex items-stretch flex-wrap sm:-m-2">
				@foreach($category->getMedia('property') as $property)
				<div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 sm:p-2">
					<div class="p-2 shadow rounded">
						@if($property->hasCustomProperty('link'))
							<a href="{{ $property->getCustomProperty('link') }}" target="_blank">
						@endif
						<div class="relative w-full" style="padding-top: 100%">
							<div class="absolute pin">
								<img class="block mx-auto max-h-full" src="{{ $property->getUrl('thumb') }}" alt="Image of {{ $property->name }}">
							</div>
						</div>
						@if($property->hasCustomProperty('link'))
							</a>
						@endif
						<div class="text-center font-bold mt-4">
							<span>{{ $property->name }}</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			@endif
		</div>
	</div>
	<div class="flex flex-wrap -mx-2 mt-6 text-base">
		@if($category['products'])
		<h3 class="font-extrabold uppercase w-full mb-2 px-2">@if($category->parent_id!=null) {{ $category->name }} Product Range @else Products @endif</h3>
		@endif
		@foreach(collect($category['products'])->chunk(3) as $chunk)
		<div class="flex flex-wrap w-full items-stretch">
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
	</div>
</div>
@include('partial.footer')
@endsection
