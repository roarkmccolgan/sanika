@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
<div class="container flex-1 mx-auto pb-8">
	<div class="mt-6 p-4">
		<h1 class="mb-2">Contact Us</h1>
		<p>
			Feel free to contact us using the form below.<br/>
			Alternatively, contact us via our contact details listed on this page.
		</p>
		<div class="flex mt-6 text-base sm:flex-wrap sm:-mx-2">
			<div class="sm:px-2 sm:w-1/2">
				<div class="bg-white p-4 border-t border-b sm:border sm:shadow">
					<div class="-mx-3 md:flex md:flex-wrap mb-6">
						<div class="md:w-1/2 px-3 mb-6 md:mb-0">
							<label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
								Full Name
							</label>
							<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" type="text" placeholder="Jane Doe">
							<p class="text-red text-xs italic">Please fill out this field.</p>
						</div>
						<div class="md:w-1/2 px-3">
							<label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
								Email
							</label>
							<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="grid-last-name" type="text" placeholder="jane@email.com">
						</div>
						<div class="md:w-1/2 px-3 md:mt-6">
							<label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
								Subject
							</label>
							<div class="relative">
								<select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="subject">
									<option value="General Enquiry">General Enquiry</option>
									<option value="Technical Enquiry">Technical Enquiry</option>
									<option value="Complaint">Complaint</option>
								</select>
								<div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
									<svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
								</div>
							</div>
						</div>
					</div>
					<div class="-mx-3 md:flex mb-6">
						<div class="md:w-full px-3">
							<label class="block tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
								Messsage
							</label>
							<textarea class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
								
							</textarea>
						</div>
					</div>
					<div class="-mx-3 md:flex md:justify-end mb-2">
						<div class="md:w-1/3 px-3 mb-6 md:mb-0 text-right">
							<button class="appearance-none border font-bold text-white bg-grey-darker hover:bg-max-secondary py-2 px-4 rounded">Send</button>
						</div>
					</div>
				</div>
			</div>
			<div class="sm:px-2 sm:w-1/2">
				<div class="p-4 sm:w-1/2">
					<h3 class="pb-2 border-b font-medium mb-2">Contact Deatails</h3>
					<address class="leading-normal">
						<span class="block text-sm font-bold text-grey-darker roman mb-2">Call</span>
						<a class="text-max-secondary" href="tel:+27119181800">+27 (011) 918 1800</a><br/>
						<a class="text-max-secondary" href="tel:+270119181809">+27 (011) 918 1809</a><br/><br/>
						<span class="block text-sm font-bold text-grey-darker roman mb-2">Email</span>
						<a class="text-max-secondary" href="mailto:info@maximtrading.co.za" title="email MaxRenew">info@maximtrading.co.za</a><br/><br/>
						<span class="block text-sm font-bold text-grey-darker roman mb-2">Visit Us</span>
						222, 14th Avenue,<br/>
						Anderbolt,<br/>
						Boksburg,<br/>
						Gauteng<br/>
						South Africa
				</address>
				</div>
			</div>
		</div>
	</div>
</div>
@include('partial.footer')
@endsection
