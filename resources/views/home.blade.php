@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="px-2 sm:px-0 pagebg pb-8">
	<div class="container flex-1 mx-auto">
		<div class="flex flex-wrap justify-center -mx-2 mt-6">
			<div class="w-1/2 md:w-1/5 p-2">
				<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
					<div class="flipper">
						<div class="front">
							<div class="p-2">
								<img src="/images/flip/sanika_front.png" alt="" class="block w-full" />
							</div>
						</div>
						<div class="back">
							<div class="h-full p-2 sm:p-4">
								<div class="flex flex-col h-full text-sm sm:text-base text-left leading-tight">
									<h3 class="font-condensed mb-2">Waterproofing Solutions</h3>
									<ul class="list-reset ml-1 flex-1">
										<li class="mb-1">Insulative Boarded Waterproofing</li>
										<li class="mb-1">Concrete Roofing and Decks</li>
										<li class="mb-1">Metal Roof Waterproofing</li>
										<li class="mb-1">Industrial &amp; Mining Anti Corrosive Coatings</li>
									</ul>
									<a href="/categories/products-services/waterproofing-services" class="inline-block no-underline text-black">
										<span class="block px-3 py-2 bg-sanika-primary text-white rounded shadow">Find out more</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="w-1/2 md:w-1/5 p-2">
				<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
					<div class="flipper">
						<div class="front">
							<div class="p-2">
								<img src="/images/flip/kryton_front.png" alt="" class="block w-full" />
							</div>
						</div>
						<div class="back">
							<div class="h-full p-2 sm:p-4">
								<div class="flex flex-col h-full text-sm sm:text-base text-left leading-tight">
									<h3 class="font-condensed mb-2">Smart Concrete</h3>
									<ul class="list-reset ml-1 flex-1">
										<li class="mb-1">Admixtures &amp; Additives</li>
										<li class="mb-1">Concrete Repair</li>
										<li class="mb-1">Construction Joints &amp; Details</li>
										<li class="mb-1">Surface Applied Waterproofing</li>
									</ul>
									<a href="categories/products-services/kryton" class="inline-block no-underline text-black">
										<span class="block px-3 py-2 bg-sanika-primary text-white rounded shadow">Find out more</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="w-1/2 md:w-1/5 p-2">
				<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
					<div class="flipper">
						<div class="front">
							<div class="p-2">
								<img src="/images/flip/emseal_front.png" alt="" class="block w-full" />
							</div>
						</div>
						<div class="back">
							<div class="h-full p-2 sm:p-4">
								<div class="flex flex-col h-full text-sm sm:text-base text-left leading-tight">
									<h3 class="font-condensed mb-2">Expansion Joint Systems</h3>
									<ul class="list-reset ml-1 flex-1">
										<li class="mb-1">Expansion joint covers</li>
										<li class="mb-1">Pre-compressed sealants</li>
										<li class="mb-1">Waterproof</li>
										<li class="mb-1">Rapid installation</li>
										<li class="mb-1">Fire rated</li>
									</ul>
									<a href="/categories/products-services/emseal" class="inline-block no-underline text-black">
										<span class="block px-3 py-2 bg-sanika-primary text-white rounded shadow">Find out more</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="w-1/2 md:w-1/5 p-2">
				<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
					<div class="flipper">
						<div class="front">
							<div class="p-2">
								<img src="/images/flip/rivestop_front.png" alt="" class="block w-full" />
							</div>
						</div>
						<div class="back">
							<div class="h-full p-2 sm:p-4">
								<div class="flex flex-col h-full text-sm sm:text-base text-left leading-tight">
									<h3 class="font-condensed mb-2">Formwork Systems</h3>
									<ul class="list-reset ml-1 flex-1">
										<li class="mb-1">Hermetically sealed formwork holes</li>
										<li class="mb-1">Removable, reusable, formwork tubes</li>
										<li class="mb-1">Patented Technology</li>
										<li class="mb-1">Specialist Tools</li>
									</ul>
									<a href="/categories/products-services/rivestop" class="inline-block no-underline text-black">
										<span class="block px-3 py-2 bg-sanika-primary text-white rounded shadow">Find out more</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="w-1/2 md:w-1/5 p-2">
				<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
					<div class="flipper">
						<div class="front">
							<div class="p-2">
								<img src="/images/flip/afrisam_front.png" alt="" class="block w-full" />
							</div>
						</div>
						<div class="back">
							<div class="h-full p-2 sm:p-4">
								<div class="flex flex-col h-full text-sm sm:text-base text-left leading-tight">
									<h3 class="font-condensed mb-2">Afrisam Plaster Pro</h3>
									<ul class="list-reset ml-1 flex-1">
										<li class="mb-1">A single-step, pre-blended plaster solution</li>
										<li class="mb-1">Saves you time and money</li>
										<li class="mb-1">Spectacular finish</li>
										<li class="mb-1">Waterproof barrier</li>
									</ul>
									<a href="/categories/products-services/afrisam" class="inline-block no-underline text-black">
										<span class="block px-3 py-2 bg-sanika-primary text-white rounded shadow">Find out more</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container flex-1 mx-auto pb-8">
	<div class="flex flex-wrap -mx-2 mt-6">
		<form id="typerSearchForm" class="w-full p-4 sm:p-2 mb-6 sm:flex sm:items-center justify-center border-b" action="/search" method="GET">
			
			<div class="font-bold text-2xl"> I have a problem with </div>
			
			<div class="sm:px-4 sm:mx-2 py-2 border rounded flex-grow" v-if="typer.show" @click.prevent="focusSearchBox">
				<vue-typer :text="typer.text" :repeat="typer.repeat" class="font-bold text-2xl" @typed="typeComplete"></vue-typer>
			</div>
			<template v-else>
				<input type="search" name="q" class="font-bold text-2xl sm:px-4 sm:mx-2 py-2 border rounded flex-grow" />
			</template>
			<button type="submit" href="/categories/products-services" class="inline-block my-2 no-underline bg-sanika-primary hover:bg-red-dark text-white font-bold py-2 px-4 rounded" @click.prevent="submitSearch">
				find solution 
			</button>
		</form>
		<div class="sm:w-1/2 p-4 sm:p-2">
			<div class="sm:pr-8">
				<h1 class="text-sanika-primary mb-4">Welcome to Sanika Waterproofing</h1>
				<p class="mb-2">Sanika Waterproofing Specialists has been firmly entrenched in the specialist waterproofing, industrial coating and roofing industry since 1987. </p>
				<p class="mb-2">As a family owned and run business, we feel strongly about making every client feel like a part of our family by providing an excellent service and quality product, all backed by expert guidance.</p>
				<p class="mb-2">
					We are the proud industry leaders in insulative boarded maintenance free waterproofing systems in Southern Africa as well as the exclusive approved distributors of Kryton Crystalline Concrete Waterproofing Products, Emseal expansion jointing systems and RiveStop tie-hole waterproofing products in Southern Africa.</p>
				<p class="mb-2">
					We are actively involved in roofing and waterproofing consultation, water management and corrosion protection systems and concrete crack repair, rejuvenation and concrete waterproofing in the commercial, industrial and mining industries throughout Southern Africa.</p>
				<p>We pride ourselves in preparing long term, cost effective and high quality concrete rejuvenation and waterproofing solutions, painting and waterproofing coating systems nationwide.</p>				
			</div>
		</div>
		<div class="sm:w-1/2 p-4 sm:p-2">
			{{-- <carousel class="p-2" :per-page="1" :loop="true" :autoplay-timeout="3000" :pagination-enabled="false" :scroll-per-page="false" :autoplay="true" :autoplay-hover-pause="true" :navigation-enabled="true">
				<slide>
					<img class="rounded block" src="/images/gallery/gallery_1.png" alt="Samrand Roof">
				</slide>
				<slide>
					<img class="rounded block" src="/images/gallery/gallery_2.png" alt="">
				</slide>
				<slide>
					<img class="rounded block" src="/images/gallery/gallery_3.png" alt="Turbine Hall">
				</slide>
				<slide>
					<img class="rounded block" src="/images/gallery/gallery_4.png" alt="Impala">
				</slide>
				<slide>
					<img class="rounded block" src="/images/gallery/gallery_5.png" alt="Eastgate">
				</slide>
				<slide>
					<img class="rounded block" src="/images/gallery/gallery_6.png" alt="Samrand">
				</slide>
				<slide>
					<img class="rounded block" src="/images/gallery/gallery_7.png" alt="kakamaas">
				</slide>
				<slide>
					<img class="rounded block" src="/images/gallery/gallery_8.png" alt="Sisani Studios">
				</slide>
				<slide>
					<img class="rounded block" src="/images/gallery/gallery_9.png" alt="Shaft">
				</slide>
				<slide>
					<img class="rounded block" src="/images/gallery/gallery_10.png" alt="Nandos">
				</slide>
				
			</carousel> --}}
		</div>
		
	</div>
	@if(count($casestudies))
	<div class="flex flex-wrap mt-6 mb-2 -mx-2">
		<div class="w-full p-2"><h2 class="uppercase p-2">Latest Projects <a class="text-base text-sanika-primary" href="/casestudies">View all</a></h2></div>
		@foreach($casestudies->chunk(3) as $chunk)
		@foreach($chunk as $casestudy)
		<div class="sm:w-1/{{ count($chunk)==1 ? 'full' : '3' }} p-2">
			<div class="w-full bg-white border shadow mx-2 p-4">
				<a class="no-underline text-black" href="{{'/casestudies/'.$casestudy->category->alias.'/'.$casestudy->alias }}">
				@if($casestudy->hasMedia('title'))
				<img class="block mb-2" src="{{ $casestudy->getFirstMediaUrl('title', 'thumb') }}" alt="Image of {{ $casestudy->title }}">
				@elseif($casestudy->hasMedia('gallery'))
				<img class="block mb-2" src="{{ $casestudy->getFirstMediaUrl('gallery', 'thumb') }}" alt="Image of {{ $casestudy->title }}">
				@endif
				<h4 class="no-underline text-blackblack font-extrabold uppercase mb-2">{{ $casestudy->title }}</h4>
				<span class="no-underline text-grey-dark">{{ $casestudy->client }}</span>
				</a>
			</div>
				
		</div>
		@endforeach
		@endforeach
	</div>
	@endif
	<div class=" mt-6 p-2">
		<slick
			ref="slickclients"
			:options="slickOptions.clients"
		> 
			<div><img src="/storage/clients/SAB.png" alt="SAB"></div>
			<div><img src="/storage/clients/Mnet.png" alt="MNET"></div>
			<div><img src="/storage/clients/Liberty.png" alt="Liberty"></div>
			<div><img src="/storage/clients/Johnson%20Matthey.png" alt="Johnson Matthey"></div>
			<div><img src="/storage/clients/Investec.png" alt="Investec"></div>
			<div><img src="/storage/clients/Impala%20Platinum.png" alt="Impala Platinum"></div>
			<div><img src="/storage/clients/Growthpoint.png" alt="Growthpoint"></div>
			<div><img src="/storage/clients/Excellerate.png" alt="Excellerate"></div>
			<div><img src="/storage/clients/Eastgate.png" alt="Eastgate"></div>
			<div><img src="/storage/clients/Broll.png" alt="Broll"></div>
			<div><img src="/storage/clients/Anglo%20American.png" alt="Anglo American"></div>
</slick>

		{{-- <carousel class="p-2" :per-page-custom="[[768, 3], [1024, 6]]" :loop="true" :autoplay-timeout="3000" :pagination-enabled="false" :scroll-per-page="false" :autoplay="true" :autoplay-hover-pause="true" :navigation-enabled="true">
			<slide>
				<img src="/storage/clients/SAB.png" alt="SAB">
			</slide>
			<slide>
				<img src="/storage/clients/Mnet.png" alt="MNET">
			</slide>
			<slide>
				<img src="/storage/clients/Liberty.png" alt="Liberty">
			</slide>
			<slide>
				<img src="/storage/clients/Johnson%20Matthey.png" alt="Johnson Matthey">
			</slide>
			<slide>
				<img src="/storage/clients/Investec.png" alt="Investec">
			</slide>
			<slide>
				<img src="/storage/clients/Impala%20Platinum.png" alt="Impala Platinum">
			</slide>
			<slide>
				<img src="/storage/clients/Growthpoint.png" alt="Growthpoint">
			</slide>
			<slide>
				<img src="/storage/clients/Excellerate.png" alt="Excellerate">
			</slide>
			<slide>
				<img src="/storage/clients/Eastgate.png" alt="Eastgate">
			</slide>
			<slide>
				<img src="/storage/clients/Broll.png" alt="Broll">
			</slide>
			<slide>
				<img src="/storage/clients/Anglo%20American.png" alt="Anglo American">
			</slide>

		</carousel> --}}
	</div>
</div>
@include('partial.footer')
@endsection
