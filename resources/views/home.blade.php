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
	<div class="flex flex-wrap items-center -mx-2 mt-6">
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
				<p class="mb-2">
					We are the proud industry leaders in insulative boarded maintenance free waterproofing systems in Southern Africa as well as the exclusive approved distributors of Kryton Crystalline Concrete Waterproofing Products, Emseal expansion jointing systems and RiveStop tie-hole waterproofing products in Southern Africa.</p>
				<p class="mb-2">
					We are actively involved in roofing and waterproofing consultation, water management and corrosion protection systems and concrete crack repair, rejuvenation and concrete waterproofing in the commercial, industrial and mining industries throughout Southern Africa.</p>
				<p>We pride ourselves in preparing long term, cost effective and high quality concrete rejuvenation and waterproofing solutions, painting and waterproofing coating systems nationwide.</p>				
			</div>
		</div>
		<div class="w-full p-4 sm:w-1/2 sm:p-2 ">
			<div class="slickhalf">
				<slick
					ref="slickgallery"
					:options="slickOptions.gallery"
				>
					<div class="py-2 pb-2">
						<img class="block" src="/images/gallery/gallery_1.jpeg" alt="Samrand Roof">
					</div>
					<div class="py-2 pb-2">
						<img class="block" src="/images/gallery/gallery_2.jpeg" alt="">
					</div>
					<div class="py-2 pb-2">
						<img class="block" src="/images/gallery/gallery_3.jpeg" alt="Turbine Hall">
					</div>
					<div class="py-2 pb-2">
						<img class="block" src="/images/gallery/gallery_4.jpeg" alt="Impala">
					</div>
					<div class="py-2 pb-2">
						<img class="block" src="/images/gallery/gallery_5.jpeg" alt="Eastgate">
					</div>
					<div class="py-2 pb-2">
						<img class="block" src="/images/gallery/gallery_6.jpeg" alt="Samrand">
					</div>
					<div class="py-2 pb-2">
						<img class="block" src="/images/gallery/gallery_7.jpeg" alt="kakamaas">
					</div>
					<div class="py-2 pb-2">
						<img class="block" src="/images/gallery/gallery_8.jpeg" alt="Sisani Studios">
					</div>
					<div class="py-2 pb-2">
						<img class="block" src="/images/gallery/gallery_9.jpeg" alt="Shaft">
					</div>
					<div class="py-2 pb-2">
						<img class="block" src="/images/gallery/gallery_10.jpeg" alt="Nandos">
					</div>
				</slick>
			</div>
				
		</div>
		
	</div>
	<div class=" mt-6 p-4 flex flex-wrap items-center">
		<div class="w-full sm:w-1/3">
			<div class="border border-red-dark rounded p-4 mr-4">
				<img src="/images/covid_19.png" class="w-full" alt="">
				<p class="mb-4">
					For information on the Sanika Waterproofing Covid-19 precedures please download our policy document
				</p>
				<a href="https://www.dropbox.com/s/fy7bp6w4nuis4jg/Sanika%20COVID%20Letter%202020-05-28.pdf?raw=1" target="_blank" class="no-underline text-sanika-primary border border-sanika-primary px-2 py-1 hover:text-white hover:bg-black rounded ">Sanika Covid 19 Policy</a>				
			</div>
		</div>
		<div class="w-full sm:w-2/3 bg-grey-lighter rounded p-4">
			<slick
				ref="slicktestimonials"
				:options="slickOptions.testimonials"
				class="w-5/6 mx-auto"
			> 
				<div class="">
					<div class="relative px-6 text-center">
						<div class="font-serif text-2xl text-grey-dark">
							"The levels of service, and quality of products that Sanika delivers are beyond anything else on the market."
						</div>
						<div class="mt-4">
							<div class="font-bold">Khaliphani Khumalo</div>
							<div class="">Building Services Manager</div>
							<div class="italic text-blue-light">JHI Retail (Pty) Ltd</div>
						</div>					
					</div>
				</div>
				<div>
					<div class="relative px-6 text-center">
						<div class="font-serif text-2xl text-grey-dark">
							"The roof looks excellent and we have received quite a number of compliments on your quality of work, I look forward to working with your organization in the future"
						</div>
						<div class="mt-4">
							<div class="font-bold">Brad O’Neill</div>
							<div class="">Facilities Manager</div>
							<div class="italic text-blue-light">Nando’s</div>
						</div>					
					</div>
				</div>
				<div>
					<div class="relative px-6 text-center">
						<div class="font-serif text-2xl text-grey-dark">
							"Thank you for your excellent service."
						</div>
						<div class="mt-4">
							<div class="font-bold">Jean van Niekerk</div>
							<div class="">Industrial Cleaning &amp; Plant Hire Manager.</div>
							<div class="italic text-blue-light">Rockent Industrial Services</div>
						</div>					
					</div>
				</div>
				<div>
					<div class="relative px-6 text-center">
						<div class="font-serif text-2xl text-grey-dark">
							"You have a good team!"
						</div>
						<div class="mt-4">
							<div class="font-bold">Ivan Lin Pr.Eng</div>
							<div class="">Director</div>
							<div class="italic text-blue-light">LinSpace</div>
						</div>					
					</div>
				</div>
			</slick>
		</div>

	</div>
	@if($casestudies)
	<div class="flex flex-wrap mt-6 mb-2 -mx-2">
		<div class="w-full p-2"><h2 class="uppercase p-2">Latest Projects <a class="text-base text-sanika-primary" href="/casestudies">View all</a></h2></div>
		@foreach($casestudies->chunk(3) as $chunk)
		@foreach($chunk as $casestudy)
		<div class="sm:w-1/{{ $chunk->count()==1 ? 'full' : '3' }} p-2">
			<div class="w-full bg-white border shadow mx-2 p-4">
				<a class="no-underline text-black" href="{{'/casestudies/'.$casestudy->category->alias.'/'.$casestudy->alias }}">
				@if($casestudy->hasMedia('title'))
				<img class="block mb-2" src="{{ $casestudy->getFirstMediaUrl('title', 'thumb') }}" alt="Image of {{ $casestudy->title }}">
				@elseif($casestudy->hasMedia('gallery'))
				<img class="block mb-2" src="{{ $casestudy->getFirstMediaUrl('gallery', 'thumb') }}" alt="Image of {{ $casestudy->title }}">
				@endif
				<h4 class="no-underline text-blackblack font-extrabold uppercase mb-2">{{ $casestudy->title }}</h4>
				<span class="no-underline text-grey-dark">{{ $casestudy->scope }}</span>
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
			class="w-5/6 mx-auto"
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
			<div><img src="/storage/clients/Nandos.png" alt="Nandos"></div>
			<div><img src="/storage/clients/Imperial%20Toyota.png" alt="Imperial Toyota"></div>
			<div><img src="/storage/clients/First%20Quantum.png" alt="First Quantum"></div>
			<div><img src="/storage/clients/Petra%20Diamonds.png" alt="Petra Diamonds"></div>
		</slick>
	</div>
	<div class="border-t" style="width: 100%; background-color: white; padding: 30px 0px 10px 0px; text-align: center; box-sizing: border-box;">
	<a style="display: flex; justify-content: center; flex-wrap: wrap; width:100%; text-decoration:none; text-align:center;" href="https://sacoronavirus.co.za/">
		<div class="main-corona-banner" style="display: inline-block; background-color: white; flex-grow: 2;">
			<img style="width: 294px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/main.png" alt="South African Government COVID-19 Portal" />
		</div>
		<div style="display: flex; flex-grow: 4; justify-content: center; flex-wrap: wrap;">
			<div style="display: flex; flex-grow: 1; justify-content: space-around; flex-wrap: wrap;">
				<div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
					<img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/tested.png" alt="South Africa COVID-19 Tested Numbers" />
				</div>
				<div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
					<img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/positive.png" alt="South Africa COVID-19 Positive Cases" />
				</div>
			</div>
			<div style="display: flex; flex-grow: 1; justify-content: space-around; flex-wrap: wrap;">
				<div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
					<img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/cured.png" alt="South Africa COVID-19 Recovered Numbers" />
				</div>
				<div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
					<img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/deaths.png" alt="South Africa COVID-19 Death Numbers" />
				</div>
			</div>
		</div>
	</a>
	<div style="text-align: center; background-color: white;">
		<a style="font-family: arial; text-decoration: none; font-size: 11px; color: #878787;" href="https://embrace.co.za/sacoronavirus-link">Linking to sacoronavirus.co.za is now required. Find out more and get the banner.</a>
	</div>
</div>
</div>
@include('partial.footer')
@endsection
@push('scripts')
    <script type="application/ld+json">
	{
	  "@context": "http://schema.org",
	  "@type": "WebSite",
	  "url": "http://sanika.co.za/",
	  "potentialAction": {
	    "@type": "SearchAction",
	    "target": "http://sanika.co.za/search?q={search_term_string}",
	    "query-input": "required name=search_term_string"
	  }
	}
	{
	  "@context": "http://schema.org",
	  "@type": "Organization",
	  "url": "http://sanika.co.za",
	  "logo": "http://sanika.co.za/sanika-logo.png",
	  "contactPoint": [
	    { "@type": "ContactPoint",
	      "telephone": "+27-11-425-3061",
	      "contactType": "customer service"
	    }
	  ]
	}
	</script>
@endpush
