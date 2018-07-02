@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8">
	<div class="mt-4 category ">
		<h1 class="font-extrabold uppercase mb-2">Gallery</h1>
	</div>
	<div class="flex flex-wrap -mx-2 mt-6 text-base">
		@foreach(collect($galleries)->chunk(2) as $chunk)
			@foreach($chunk as $gallery)
			<div class="w-full sm:w-1/2 p-2">
				<div class="flex flex-col w-full bg-white border shadow p-4">
					@if($gallery->hasMedia('gallery'))
					<div class="">
						<a href="{{'/gallery/'.$gallery->alias }}" class="no-underline">
							<img class="w-full" src="{{ $gallery->getFirstMediaUrl('gallery', 'thumb') }}" alt="Photo of {{ $gallery->title }}">
						</a>
					</div>
					@endif
					<div class="">
						<div class="m-4 text-center">
							<a href="{{'/gallery/'.$gallery->alias }}" class="text-sanika-primary no-underline hover:text-max-secondary">
								<h3 class="font-extrabold uppercase">{{ $gallery->title }}</h3>
							</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		@endforeach
	</div>
</div>
@include('partial.footer')
@endsection
