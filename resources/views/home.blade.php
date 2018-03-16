@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8">
	<div class="mt-6 bg-white border shadow p-4">
		<img class="" src="/images/slidegeyser-100.jpg" alt="">
	</div>
	<div class="flex flex-wrap -mx-2 mt-6">
		<div class="w-1/3 p-2">
			<img class="" src="/images/special-100.jpg" alt="">
		</div>
		<div class="w-2/3 p-2">
			<div class="flex flex-wrap -m-2">
				@foreach($shop as $cat => $category)
				@if(isset($category['images']['tile']) && $category['images']['tile']['name']!='')
				<div class="w-1/3 p-2">
					<a href="{{'/categories/'.$cat.'/'}}" class="no-underline">
						<div class="bg-white border shadow p-2 hover:border-max-secondary">
							<img class="" src="/images/{{$category['images']['tile']['name']}}" alt="">
							<h4 class=" text-max-primary uppercase text-center pb-4 px-4 whitespace-no-wrap">{{$category['title']}}</h4>
						</div>
					</a>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>

	<div class="flex mt-6 mb-2 -mx-2">
		<div class="flex-1 bg-white border shadow mx-2">
			<img src="/images/free-delivery-100.jpg?id=1" alt="">
		</div>
		<div class="flex-1 bg-white border shadow mx-2">
			<img src="/images/installers-100.jpg" alt="">
		</div>
		<div class="flex-1 bg-white border shadow mx-2">
			<img src="/images/warranty-100.jpg" alt="">
		</div>
	</div>
</div>
@include('partial.footer')
@endsection
