@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
{{-- Header --}}
<div class="bg-max-primary py-2 text-white text-sm font-bold relative z-20">
	<div class="container mx-auto flex justify-between px-2 sm:px-0">
		<div class="flex items-center">
			<div class="pr-4 mr-4 sm:border-r border-grey text-base">CALL NOW: <a class="no-underline text-teal-light" href="tel:+27119181800">+27 (011) 918 1800</a></div>
			<div class="hidden sm:block">Frequently Asked Questions</div>
		</div>
		<div class="hidden sm:block">
			<em>Free Delivery on orders over R2000</em>
		</div>
	</div>
</div>
<div class="bg-white py-4 relative z-20">
	<div class="container mx-auto flex items-center bg-white px-2 pt-2 sm:px-0">
		<div class="mr-4">
			<a href="/" class="no-underline" title="Homepage"><img class="w-48" src="/images/max-renew-logo.svg" alt=""></a>
		</div>
		<div class="flex items-center w-full">
			<input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Search">
			<button class="flex-no-shrink p-2 px-3 rounded-full bg-teal text-white border-teal hover:bg-teal-dark"><font-awesome-icon :icon="icons.search" /></button>
		</div>
		<div class="ml-4">
			<button class="bg-teal text-white whitespace-no-wrap font-bold py-2 px-4 border-b-4 hover:border-b-2 hover:border-t-2 border-teal-dark hover:border-teal rounded">
				<font-awesome-icon :icon="icons.cart"></font-awesome-icon>
				<span class="hidden sm:inline-block text-sm">Your Cart</span>
			</button>
		</div>
	</div>
</div>

@include('partial.mainav')
<div class="container flex-1 mx-auto pb-8">
	<div class="mt-6 p-4">
		<h1 class="mb-2">{{ $category['title'] }}</h1>
		<p>{{ $category['description'] }}</p>
	</div>
	<div class="flex flex-wrap -mx-2 mt-6 text-base">
		@foreach($category['products'] as $prod => $product)
		<div class="w-1/2 p-2">
			<div class="flex flex-wrap bg-white border shadow p-4">
				<div class="w-1/3">
					<a href="{{'/categories/'.$category['alias'].'/'.$prod}}" class="no-underline">
						<img class="" src="/images/products/{{$product['images']['main']['name']}}" alt="">
					</a>
				</div>
				<div class="w-2/3">
					<div class="mx-4">
						<a href="{{'/categories/'.$category['alias'].'/'.$prod}}" class="text-max-primary no-underline hover:text-max-secondary">
							<h3 class="mb-2">{{$product['name']}}</h3>
						</a>
						<p class="mb-2">{{ str_limit($product['description'],80)}}</p>
						<ul class="mb-4">
							@foreach($product['specs'] as $spec)
								<li>{{ $spec }}</li>
							@endforeach
						</ul>
						<a href="{{'/categories/'.$category['alias'].'/'.$prod}}" class="block text-right text-max-primary hover:text-max-secondary">
							more&hellip;
						</a>
					</div>
				</div>
				<div class="w-full">
					<hr class="border-t border-grey-light my-4">
					<div class="flex justify-between">
						<div class="text-lg text-max-primary font-bold">
							@money($product['price'],'ZAR')
						</div>
						<div class="">
							<button class="bg-teal text-white whitespace-no-wrap font-bold py-2 px-4 border-b-4 hover:border-b-2 hover:border-t-2 border-teal-dark hover:border-teal rounded">
								<font-awesome-icon :icon="icons.mouse"></font-awesome-icon>
								<span class="hidden sm:inline-block text-sm">Add to cart</span>
							</button>	
						</div>
					</div>
				</div>
			</div>
		</div>

		@endforeach
	</div>
</div>
@include('partial.footer')
@endsection
