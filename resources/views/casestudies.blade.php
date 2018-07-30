@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8 casestudy">
	<div class="mt-4 category md:flex">
		<div class="">
			{{-- <img src="/images/" alt="Case Study Icon"> --}}
		</div>
		<div class="flex-1">
			<h1 class="font-extrabold uppercase mb-2">@if($rootCategory) {{ $rootCategory->name }} @endif Case Studies</h1>
			<p>Standout projects that highlight Sanika's capabilities</p>
		</div>
	</div>
	<div class="flex flex-wrap -mx-2 text-base">
		@foreach($casestudies as $thecategory => $casestudiesbycat)
			@if($rootCategory !=null)
			<div class="w-full p-2">
				<h2 class="font-extrabold uppercase my-2">{{ $rootCategory->name }}</h2>
			</div>
			@endif
			@foreach(collect($casestudiesbycat)->chunk(2) as $chunk)

				@foreach($chunk as $casestudy)
				<div class="w-full sm:w-1/2 p-2">
					<div class="flex flex-wrap h-full bg-white border shadow p-4">
						@if($casestudy->hasMedia('title'))
						<div class="w-1/3">
							<a href="{{'/casestudies/'.$casestudy->category->alias.'/'.$casestudy->alias }}" class="no-underline">
								<img src="{{ $casestudy->getFirstMediaUrl('title', 'thumb') }}" alt="Photo of {{ $casestudy->title }}">
							</a>
						</div>
						@elseif($casestudy->hasMedia('gallery'))
						<div class="w-1/3">
							<a href="{{'/casestudies/'.$casestudy->category->alias.'/'.$casestudy->alias }}" class="no-underline">
								<img src="{{ $casestudy->getFirstMediaUrl('gallery', 'thumb') }}" alt="Photo of {{ $casestudy->title }}">
							</a>
						</div>
						@endif
						<div class="flex-1">
							<div class="mx-4">
								<a href="{{'/casestudies/'.$casestudy->category->alias.'/'.$casestudy->alias }}" class="text-sanika-primary no-underline hover:text-max-secondary">
									<h3 class="font-extrabold uppercase mb-2">{{ $casestudy->site }}</h3>
								</a>
								<p class="mb-2 text-sm font-bold">{{ $casestudy->client }}</p>
								{!! substr ( $casestudy->background , 0, strpos ( $casestudy->background , "</p>" )+4 ) !!}
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endforeach
		@endforeach
	</div>
</div>
@include('partial.footer')
@endsection
