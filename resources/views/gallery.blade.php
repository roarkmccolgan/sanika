@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8">
	<div class="sm:flex">
		<div class="sm:w-4/5 category mt-4 md:flex sm:p-2">
			<div class="flex-1">
				<h1 class="font-extrabold uppercase mb-1">{{ $gallery->title }}</h1>
				<p class="mb-2">{!! $gallery->description !!}</p>
			</div>
		</div>
	</div>
	<div class="flex flex-wrap -mx-2 mt-6 text-base">
		@foreach($gallery->getMedia('gallery')->chunk(4) as $chunk)
			@foreach($chunk as $galItem)
			<div class="w-full sm:w-1/4 p-2">
				<div class="flex flex-col w-full bg-white border shadow p-4">
					<div class="">
						<img class="w-full" src="{{ $galItem->getUrl() }}" alt="Photo of">
					</div>
					<div class="">
						<div class="m-4 text-center">
							<h3 class="font-extrabold uppercase">Title</h3>
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
