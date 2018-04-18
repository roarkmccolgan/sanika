@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="pagebg pb-8">
	<div class="container flex-1 mx-auto">
		<div class="flex flex-wrap justify-center mt-6 -m-2">
			<div class="w-1/2 md:w-1/5 p-2">
				<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
					<div class="flipper">
						<div class="front">
							<img src="/images/flip/sanika_front.png" alt="" class="block w-full" />
						</div>
						<div class="back">
							<div class="aspect-fix">
								<div class="text-left leading-tight p-4">
									<h3 class="font-condensed mb-2">Waterproofing Solutions</h3>
									<ul class="list-reset">
										<li class="text-base">Insulative Boarded Waterproofing</li>
										<li class="text-base">Concrete Roofing and Decks</li>
										<li class="text-base">Metal Roof Waterproofing</li>
										<li class="text-base">Industrial &amp; Mining Anti Corrosive Coatings</li>
									</ul>
									<a href="contact.html" class="btn btn-inverse">Contact Us</a>
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
							<img src="/images/flip/kryton_front.png" alt="" class="block w-full" />
						</div>
						<div class="back">
							<div class="aspect-fix">
								<div class="text-left leading-tight p-4">
									<h3 class="font-condensed mb-2">Smart Concrete</h3>
									<ul class="list-reset">
										<li class="text-base">Admixtures &amp; Additives</li>
										<li class="text-base">Concrete Repair</li>
										<li class="text-base">Construction Joints &amp; Details</li>
										<li class="text-base">Surface Applied Waterproofing</li>
									</ul>
									<a href="contact.html" class="btn btn-inverse">Contact Us</a>
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
							<img src="/images/flip/emseal_front.png" alt="" class="block w-full" />
						</div>
						<div class="back">
							<div class="aspect-fix">
								<div class="text-left leading-tight p-4">
									<h3 class="font-condensed mb-2">Expansion Joint Systems</h3>
									<ul class="list-reset">
										<li class="text-base">Expansion joint covers</li>
										<li class="text-base">Pre-compressed sealants</li>
										<li class="text-base">Waterproof</li>
										<li class="text-base">Rapid installation</li>
										<li class="text-base">Fire rated</li>
									</ul>
									<a href="contact.html" class="btn btn-inverse">Contact Us</a>
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
							<img src="/images/flip/rivestop_front.png" alt="" class="block w-full" />
						</div>
						<div class="back">
							<div class="aspect-fix">
								<div class="text-left leading-tight p-4">
									<h3 class="font-condensed mb-2">Formwork Systems</h3>
									<ul class="list-reset">
										<li class="text-base">Hermetically sealed formwork holes</li>
										<li class="text-base">Removable, reusable, formwork tubes</li>
										<li class="text-base">Patented Technology</li>
										<li class="text-base">Specialist Tools</li>
									</ul>
									<a href="contact.html" class="btn btn-inverse">Contact Us</a>
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
							<img src="/images/flip/afrisam_front.png" alt="" class="block w-full" />
						</div>
						<div class="back">
							<div class="aspect-fix">
								<div class="text-left leading-tight p-4">
									<h3 class="font-condensed mb-2">Afrisam Plaster Pro</h3>
									<ul class="list-reset">
										<li class="text-base">A single-step, pre-blended plaster solution</li>
										<li class="text-base">Saves you time and money</li>
										<li class="text-base">Spectacular finish</li>
										<li class="text-base">Waterproof barrier</li>
									</ul>
									<a href="contact.html" class="btn btn-inverse">Contact Us</a>
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
		<div class="w-full p-2 pb-4 mb-4 flex items-center justify-center border-b">
			<div class="font-bold text-2xl"> I have an problem with </div>
			<div class="px-4 py-2 border rounded flex-grow mx-4" v-if="typer.show" @click.prevent="typer.show=!typer.show">
				<vue-typer :text="typer.text" :repeat="typer.repeat" class="font-bold text-2xl"></vue-typer>
			</div>
			<input type="text" class="font-bold text-2xl px-4 py-2 border rounded flex-grow mx-4" v-else />
			<a href="#" class="no-underline bg-sanika-primary hover:bg-red-dark text-white font-bold py-2 px-4 rounded" @click.prevent="typer.show=!typer.show"> find solution </a>
		</div>
		<div class="w-1/2 p-2">
			<h1 class="text-sanika-primary mb-4">Welcome to Sanika Waterproofing</h1>
			<p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero dolor facere tempora eligendi, dolorem aperiam quae error sequi, ut molestias excepturi amet non doloremque consequatur alias, ipsa odio saepe explicabo.</p>
		</div>
		
	</div>

	<div class="flex mt-6 mb-2 -mx-2">
		<div class="flex-1 bg-white border shadow mx-2 p-4">
			Project 1
		</div>
		<div class="flex-1 bg-white border shadow mx-2 p-4">
			Project 2
		</div>
		<div class="flex-1 bg-white border shadow mx-2 p-4">
			Project 3
		</div>
	</div>
</div>
@include('partial.footer')
@endsection
