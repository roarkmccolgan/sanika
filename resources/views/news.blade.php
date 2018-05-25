@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8">
	<div class="mt-4 category md:flex">
		<div class="">
			{{-- <img src="/images/" alt="News Icon"> --}}
		</div>
		<div class="flex-1">
			<h1 class="font-extrabold uppercase mb-2">News</h1>
			<p>Press releases and other relevent news</p>
		</div>
	</div>
	<div class="flex flex-wrap -mx-2 mt-6 text-base">
		@foreach(collect($newsitems)->chunk(2) as $chunk)
		<div class="flex flex-wrap items-stretch">
			@foreach($chunk as $newsitem)
			<div class="w-full sm:w-1/2 p-2">
				<div class="flex flex-wrap h-full bg-white border shadow p-4">
					@if($newsitem->hasMedia('title'))
					<div class="w-1/3">
						<a href="{{'/news/'.$newsitem->alias }}" class="no-underline">
							<img src="{{ $newsitem->getFirstMediaUrl('title', 'thumb') }}" alt="Photo of {{ $newsitem->title }}">
						</a>
					</div>
					@endif
					<div class="flex-1">
						<div class="mx-4">
							<a href="{{'/news/'.$newsitem->alias }}" class="text-sanika-primary no-underline hover:text-max-secondary">
								<h3 class="font-extrabold uppercase mb-2">{{ $newsitem->title }}</h3>
							</a>
							<p class="mb-2 text-sm">{{ $newsitem->sub_title }}</p>
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
