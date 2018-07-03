@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8">
	<div class="p-2 text-grey text-sm">
		<a href="/gallery/" class="no-underline text-sanika-primary">gallery</a> / {{ $gallery->title }}
	</div>
	<div class="sm:flex">
		<div class="sm:w-4/5 category md:flex sm:p-2">
			<div class="flex-1">
				<h1 class="font-extrabold uppercase mb-1">{{ $gallery->title }}</h1>
				<p class="mb-2">{!! $gallery->description !!}</p>
			</div>
		</div>
	</div>
	<div class="flex flex-wrap -mx-2 mt-6 text-base">
		@foreach($gallery->getMedia('gallery')->chunk(4) as $chunk)
			@foreach($chunk as $galItem)
			<div class="w-full sm:w-1/4 p-2 cursor-pointer">
				<div class="flex flex-col w-full bg-white border shadow p-2" @click="showGalleryImage('{{ $galItem->getUrl() }}','{{ $galItem->name }}')">
					<div class="">
						{{ $galItem('thumb') }}
					</div>
					<div class="">
						<div class="text-center">
							<h4 class="font-normal">{{ $galItem->name }}</h4>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		@endforeach
	</div>
</div>
<modals-container/>

@include('partial.footer')
@endsection
