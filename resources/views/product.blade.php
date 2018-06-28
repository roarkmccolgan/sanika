@extends('layouts.app')

@section('head')
<title>Sanika - {{ $product->seo_title }}</title>
<meta name="description" content="{{ $product->seo_description }}">
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8 product">
	<div class="mt-6">
		<div class="sm:flex -mx-2">
			<div class="sm:flex-1 p-2">
				<div class="mx-4">
					<h1 class="font-extrabold uppercase mb-4">{{ $product->name }}</h1>
					<p class="mb-2">{!! $product->description !!}</p>
					<h2 class="font-extrabold uppercase mb-4 mt-4">How it works</h2>
					<p class="mb-2">{!! $product->how_it_works !!}</p>
					<h2 class="font-extrabold uppercase mb-4 mt-4">Features and Benefits</h2>
					<div class="flex">
						@foreach ($product->features->chunk(6) as $chunk)
						<ul class="sm:w-1/2 mb-4 text-grey-darkest">
							@foreach ($chunk as $feature)
							<li class="mb-2">{{ $feature->name }}</li>
							@endforeach
						</ul>
						@endforeach
					</div>
				</div>
			</div>
			<div class="sm:w-1/3 p-2 pt-8">
				@if($product->hasMedia('title'))
				<div class="mb-8">
					<img src="{{ $product->getFirstMediaUrl('title', 'product') }}" alt="Image of {{ $product['name'] }}">
				</div>
				@endif
				@if($product->hasMedia('gallery'))
				<carousel :per-page="1" :navigation-enabled="true">
					@foreach($product->getMedia('gallery') as $galleryImg)
					<slide>
						<img src="{{ $galleryImg->getUrl() }}" alt="{{ $galleryImg->name }}">
					</slide>
					@endforeach
				</carousel>
				@endif
				<lead-component :product-id="{{ $product->id }}"></lead-component>
				{{-- <div class="flex flex-col border px-4 py-6">
					<form action="/api/cart" method="post" class="" @submit.prevent="addToCart()">
						<input type="hidden" value="" name="sku" v-model="product.sku">
						<h3 class="font-extrabold uppercase text-grey-dark">Buy it Now</h3>
						<div class="font-bold text-4xl mb-2">
							@if(count($product->products))
							<div class="text-sm font-medium text-grey-dark">
								System Price
							</div>
							@endif
							@money(548300,'ZAR')
							<span class="text-sm font-medium text-grey-dark">
								inc.Vat
							</span>
						</div>
						<div class="flex flex-wrap items-center">
							<div class="w-1/2">
								QTY <input name="qty" type="number" v-model="product.qty" class="shadow appearance-none border rounded py-2 px-3 text-grey-darker w-16">
							</div>
							<div class="w-1/2">
								<button class="no-underline font-bold text-white bg-grey-darkest py-2 px-4 rounded hover:bg-black whitespace-no-wrap">
									<div class="inline-block w-6 mr-1">
										<transition name="component-bounce" mode="out-in">
											<font-awesome-icon :icon="busyAdding ? icons.loading : icons.mouse" class="fa-lg" :class="busyAdding ? 'fa-spin' : ''" v-bind:key="busyAdding"></font-awesome-icon>
										</transition>
										</div>
									<span class="inline-block">Add to cart</span>
								</button>
							</div>
						</div>
					</form>
				</div> --}}
			</div>
		</div>

	</div>
</div>
<div class="bg-grey-lighter">
	<div class="container flex-1 mx-auto pb-8">
		<div class="mt-6 -mx-2">
			<tabs class="">
				<tab name="RECOMMEND USES" class="-mb-px mr-1">
					<div class="my-8">
						<p class="mb-2">{{ $product->uses_intro }}</p>
						@if($product->uses)
						<ul>
							@foreach ($product->uses as $use)
							<li class="mb-2">{{ $use }}</li>
							@endforeach
						</ul>
						@endif
					</div>
				</tab>
				@if($product->application)
				<tab name="COVERAGE, DOSAGE AND PACKAGING">
					<p class="my-8">{!! $product->application !!}</p>
				</tab>
				@endif
				@if($product->hasMedia('applications'))
				<tab name="APPLICATIONS">
					<ul class="my-8">
						@foreach($product->getMedia('applications') as $applications)
						<li>
							<a class="no-underline font-semibold text-grey-darker" href="{{ $applications->getUrl() }}" target="_blank" alt="{{ $applications->name }}" >{{ $applications->name }}</a>
						</li>
						@endforeach
					</ul>
				</tab>
				@endif
				@if($product->hasMedia('technical'))
				<tab name="TECHNICAL RESOURCES">
					<ul class="my-8">
						@foreach($product->getMedia('technical') as $technical)
						<li>
							<a class="no-underline font-semibold text-grey-darker" href="{{ $technical->getUrl() }}" target="_blank" alt="{{ $technical->name }}" >{{ $technical->name }}</a>
						</li>
						@endforeach
					</ul>
				</tab>
				@endif
				@if($product->hasMedia('specifications'))
				<tab name="SPECIFICATIONS">
					<ul class="my-8">
						@foreach($product->getMedia('specifications') as $specification)
						<li>
							<a class="no-underline font-semibold text-grey-darker" href="{{ $specification->getUrl() }}" target="_blank" alt="{{ $specification->name }}" >{{ $specification->name }}</a>
						</li>
						@endforeach
					</ul>
				</tab>
				@endif
				<!--
				@if($product->specs('technical'))
				<tab name="SPECIFICATIONS">
					<table class="w-full text-sm text-left" cellpadding="0" cellspacing="0">
						<thead class="font-medium text-xs text-grey-dark uppercase border-grey">
							<tr>
								<th class="w-1/2 sm:w-1/5 text-right p-2 border-b bg-grey-lighter">Property <hr class="inline-block h-px border-t w-2 h-0 m-0 ml-2 mb-1"></th>
								<th class="text-left p-2 pl-0 border-b bg-grey-lighter">Value</th>
							</tr>
						</thead>
						<tbody class="">
							@foreach($product->specs as $spec)
							<tr>
								<td class="text-right p-4 border-b border-grey-light">{{ $spec->spec }} <hr class="inline-block h-px border-t w-2 h-0 m-0 ml-2 mb-1"></td>
								<td class="font-semibold p-4 pl-0 border-b border-grey-light">{{ $spec->value }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</tab>
				@endif
				-->
			</tabs>
		</div>
		@if(count($category->products)>1)
		<div class="font-bold text-lg mt-6 mb-2">Other products</div>
		<div class="flex flex-wrap items-stretch -mx-2 text-base">
			@foreach($category->products as $catproduct)
			@if($catproduct->alias !== $product->alias)
			<div class="w-1/3 p-2">
				<div class="flex flex-wrap h-full bg-white border shadow p-4">
					<div class="w-1/3">
						@if($catproduct->hasMedia('title'))
						<a href="/categories/{{ $catproduct->path }}/products/{{ $catproduct->alias }}" class="no-underline">
							<img src="{{ $catproduct->getFirstMediaUrl('title', 'product') }}" alt="Image of {{ $catproduct['name'] }}">
						</a>
						@endif
					</div>
					<div class="w-2/3">
						<div class="mx-4 flex flex-col h-full">
							<a href="/categories/{{ $catproduct->path }}/products/{{ $catproduct->alias }}" class="no-underline">
								<h3 class="mb-2">{{$catproduct->name}}</h3>
							</a>
							<div class="flex-1 text-max-primary font-bold mb-2">
								
							</div>
							<div class="">
								<a href="/categories/{{ $catproduct->path }}/products/{{ $catproduct->alias }}" class="no-underline">
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
		@endif
	</div>
</div>

@include('partial.footer')
@endsection
