@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8">
	<div class="mt-6 p-4 bg-white border shadow">
		<div class="flex -mx-2">
			<div class="w-1/3 p-2">
				@if(isset($product->images))
				<img class="" src="/images/products/{{$product->images['main']['name']}}" alt="">
				@endif
			</div>
			<div class="w-1/3 p-2">
				<div class="mx-4">
					<h1 class="mb-4">{{ $product->name }}</h1>
					<p class="mb-2">{{ $product->description }}</p>
					<ul class="mb-4">
						@foreach($product->features as $feature)
							<li>{{ $feature->name }}</li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="w-1/3 p-2 pt-8">
				<div class="flex flex-col h-full ml-4">
					<form action="/api/cart" method="post" class="mt-6">
						<input type="hidden" name="{{ $product->alias }}">
						<div class="font-bold text-4xl mb-4">
							@money($product->price,'ZAR')
						</div>
						QTY <input name="qty" type="number" value="1" class="shadow appearance-none border rounded py-2 px-3 text-grey-darker w-16">
						<hr class="border-t border-grey-light my-6">
					</form>
					<div class="text-2xl">
						<button class="bg-teal text-white whitespace-no-wrap font-bold py-4 px-4 border-b-4 hover:border-b-2 hover:border-t-2 border-teal-dark hover:border-teal rounded">
							<font-awesome-icon :icon="icons.mouse"></font-awesome-icon>
							<span class="hidden sm:inline-block">Add to cart</span>
						</button>	
					</div>
				</div>
			</div>
		</div>
				
	</div>
	<div class="mt-6 -mx-4">
		<tabs>
	        <tab name="Q &amp; A" class="-mb-px mr-1">
	          	<div class="">
	          		<div class="px-4 py-2 rounded bg-grey-lighter text-lg mb-2 text-max-secondary">
	          			Q. How easy is it to install?
	          		</div>
	          		<div class="px-4 rounded bg-white mb-6">
	          			A. Very easy, you only need a spade and hacksaw, all plumbing parts are supplied with the kit
	          		</div>
	          		<div class="px-4 py-2 rounded bg-grey-lighter text-lg mb-2 text-max-secondary">
	          			Q. I have a 2 bedroom house, would this product be suitable for my house
	          		</div>
	          		<div class="px-4 rounded bg-white mb-6">
	          			A. Although this product would work, we recommend the smaller unit "Mr Grey Mini" this product is best suited for 3 bedroom houses or more.
	          		</div>
	          	</div>
	        </tab>
	        <tab name="Specifications">
	            <ul class="mb-4">
					@foreach($product->specs as $spec)
						<li>{{ $spec->spec }} - {{ $spec->value }}</li>
					@endforeach
				</ul>
	        </tab>
	    </tabs>
	</div>
	<div class="font-bold text-lg mt-6 mb-2">Other products</div>
	<div class="flex flex-wrap -mx-2 text-base">
		@foreach($category->products as $catproduct)
		@if($catproduct->alias !== $product->alias)
		<div class="w-1/3 p-2">
			<div class="flex flex-wrap bg-white border shadow p-4">
				<div class="w-1/3">
					<a href="/categories/{{ $catproduct->path }}/{{ $catproduct->alias }}" class="no-underline">
						img goes
					</a>
				</div>
				<div class="w-2/3">
					<div class="mx-4 flex flex-col h-full">
						<a href="/categories/{{ $catproduct->path }}/{{ $catproduct->alias }}" class="no-underline">
							<h3 class="mb-2">{{$catproduct->name}}</h3>
						</a>
						<div class="flex-1 text-max-primary font-bold mb-2">
							@money($catproduct->price,'ZAR')
						</div>
						<div class="">
							<a href="/categories/{{ $catproduct->path }}/{{ $catproduct->alias }}" class="no-underline">
								more&hellip;
							</a>
						</div>
							
					</div>
				</div>
			</div>
		</div>
		@endif
		@endforeach
	</div>
</div>
@include('partial.footer')
@endsection
