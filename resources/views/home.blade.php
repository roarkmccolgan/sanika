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
									<a href="/categories/products-services/waterproofing" class="inline-block no-underline text-black">
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
		<div class="w-full p-4 sm:p-2 mb-4 sm:flex sm:items-center justify-center border-b">
			<div class="font-bold text-2xl"> I have a problem with </div>
			<div class="sm:px-4 py-2 border rounded flex-grow" v-if="typer.show" @click.prevent="typer.show=!typer.show">
				<vue-typer :text="typer.text" :repeat="typer.repeat" class="font-bold text-2xl"></vue-typer>
			</div>
			<input type="text" class="font-bold text-2xl px-4 py-2 border rounded flex-grow" v-else />
			<a href="/categories/products-services" class="inline-block my-2 no-underline bg-sanika-primary hover:bg-red-dark text-white font-bold py-2 px-4 rounded" @click="typer.show=!typer.show"> find solution </a>
		</div>
		<div class="sm:w-1/2 p-4 sm:p-2">
			<h1 class="text-sanika-primary mb-4">Welcome to Sanika Waterproofing</h1>
			<p class="mb-2">Sanika Waterproofing Specialists was founded over 25 years ago with an ultimate goal in mind – become a trusted expert in the waterproofing industry to contractors, engineers, architects and building owners alike. Fast forward to present day and the same goal still rings true. We are a family owned and run business and we take the meaning of family to heart. We want to ensure that each and every client feels like family by providing that same excellent service and quality product, all back by our expert guidance accumulated over our many years in the industry.</p>
		</div>
		
	</div>
	@if(count($casestudies))
	<div class="flex flex-wrap mt-6 mb-2 -mx-2">
		<div class="w-full p-4"><h2 class="uppercase">Latest Projects</h2></div>
		@foreach($casestudies->chunk(3) as $chunk)
		@foreach($chunk as $casestudy)
		<div class="sm:w-{{ count($chunk)==1 ? 'full' : '3' }} flex-1 bg-white border shadow mx-2 p-4">
			<a class="no-underline text-black" href="{{'/casestudies/'.$casestudy->category->alias.'/'.$casestudy->alias }}">
			@if($casestudy->hasMedia('title'))
			<img src="{{ $casestudy->getFirstMediaUrl('title', 'casestudy') }}" alt="Image of {{ $casestudy->title }}">
			@endif
			<h4 class="no-underline text-blackblack font-extrabold uppercase mb-2">{{ $casestudy->title }}</h4>
			<span class="no-underline text-grey-dark">{{ $casestudy->client }}</span>
			</a>
		</div>
		@endforeach
		@endforeach
	</div>
	@endif
	<div class="flex flex-wrap mt-6 p-2">
		<h3 class="mb-2">Clients who trust us</h3>
		<carousel class="p-2" :per-page-custom="[[768, 3], [1024, 6]]" :loop="true" :autoplay-timeout="3000" :pagination-enabled="false" :scroll-per-page="false" :autoplay="true" :autoplay-hover-pause="true" :navigation-enabled="false">
			<slide>
				<img src="/storage/clients/SAB.png" alt="SAB">
			</slide>
			<slide>
				<img src="/storage/clients/Redefine.png" alt="Redfine Properties">
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

		</carousel>
	</div>
</div>
@include('partial.footer')
@endsection
