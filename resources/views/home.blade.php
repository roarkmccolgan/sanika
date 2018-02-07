@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
{{-- @includeWhen($pagetype == 'content', 'patial.mainmenu') --}}
{{-- Header --}}
<div class="bg-max-primary py-2 text-white text-sm font-bold">
	<div class="container mx-auto flex justify-between px-2 sm:px-0">
		<div class="flex items-center">
			<div class="pr-4 mr-4 sm:border-r border-grey text-base">CALL NOW: <a class="no-underline text-teal-light" href="tel:+27119181800">+27 (011) 918 1800</a></div>
			<div class="hidden sm:block">Frequently Asked Questions</div>
		</div>
		<div class="hidden sm:block">
			<em>Free Delivery on orders over R2000</em>
		</div>
	</div>
</div>
<div class="bg-white py-4">
	<div class="container mx-auto flex items-center bg-white px-2 pt-2 sm:px-0">
		<div class="mr-4">
			<a href="/" class="no-underline" title="Homepage"><img class="w-48" src="images/max-renew-logo.svg" alt=""></a>
		</div>
		<div class="flex items-center w-full">
			<input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Search">
			<button class="flex-no-shrink p-2 px-3 rounded-full bg-teal text-white border-teal hover:bg-teal-dark"><font-awesome-icon :icon="icons.search" /></button>
		</div>
		<div class="ml-4">
			<button class="bg-teal text-white whitespace-no-wrap font-bold py-2 px-4 border-b-4 hover:border-b-2 hover:border-t-2 border-teal-dark hover:border-teal rounded">
				<font-awesome-icon :icon="icons.cart"></font-awesome-icon>
				<span class="hidden sm:inline-block text-sm">Your Cart</span>
			</button>
		</div>
	</div>
</div>
<div class="bg-white border-t border-b border-grey-light">
	<div class="container mx-auto flex items-center -mb-px sm:px-0">
		<a href="#" class="text-base text-white bg-teal flex items-center py-2 px-2 border-b border-teal-dark no-underline">Grey Water Systems</a>
		<a href="#" class="text-base text-max-primary flex items-center py-2 px-2 hover:bg-grey-light hover:border-b hover:border-grey-dark no-underline">Rain Harvesting</a>
		<a href="#" class="text-base text-max-primary flex items-center py-2 px-2 hover:bg-grey-light hover:border-b hover:border-grey-dark no-underline">Water Backup Solutions</a>
		<a href="#" class="text-base text-max-primary flex items-center py-2 px-2 hover:bg-grey-light hover:border-b hover:border-grey-dark no-underline">Solar Water Heating</a>
		<a href="#" class="text-base text-max-primary flex items-center py-2 px-2 hover:bg-grey-light hover:border-b hover:border-grey-dark no-underline">Solar Street Lighting</a>
		<a href="#" class="text-base text-max-primary flex items-center py-2 px-2 hover:bg-grey-light hover:border-b hover:border-grey-dark no-underline">Off-Grid Solar Solutions</a>
		<a href="#" class="text-base text-max-primary flex items-center py-2 px-2 hover:bg-grey-light hover:border-b hover:border-grey-dark no-underline">Low Energy Pumps</a>
		<a href="#" class="text-base text-max-primary flex items-center py-2 px-2 hover:bg-grey-light hover:border-b hover:border-grey-dark no-underline">Water Storage Tanks</a>
		<a href="#" class="text-base text-max-primary flex items-center py-2 px-2 hover:bg-grey-light hover:border-b hover:border-grey-dark no-underline">Solar Panels</a>
		<a href="#" class="text-base text-max-primary flex items-center py-2 px-2 hover:bg-grey-light hover:border-b hover:border-grey-dark no-underline">Inverters</a>
	</div>
</div>
<div class="container mx-auto pb-8">
	<div class="mt-6 bg-white border shadow p-4">
		<img class="" src="/images/slidegeyser-100.jpg" alt="">
	</div>

	<div class="flex flex-wrap -mx-2 mt-6">
		<div class="w-1/3 p-2">
			<img class="" src="/images/special-100.jpg" alt="">
		</div>
		<div class="w-2/3 p-2">
			<div class="flex flex-wrap -m-2">
				<div class="w-1/3 p-2">
					<div class="bg-white border shadow p-2">
						<img class="" src="/images/greywater-100.jpg" alt="">
						<h4 class=" text-max-primary uppercase text-center pb-4 px-4 whitespace-no-wrap">Grey Water Systems</h4>
					</div>
				</div>
				<div class="w-1/3 p-2">
					<div class="bg-white border shadow p-2">
						<img class="" src="/images/rainwater-100.jpg" alt="">
						<h4 class=" text-max-primary uppercase text-center pb-4 px-4 whitespace-no-wrap">Rainwater Harvesting</h4>
					</div>
				</div>
				<div class="w-1/3 p-2">
					<div class="bg-white border shadow p-2">
						<img class="" src="/images/backup-100.jpg" alt="">
						<h4 class=" text-max-primary uppercase text-center pb-4 px-4 whitespace-no-wrap">Water Backup</h4>
					</div>
				</div>
				<div class="w-1/3 p-2">
					<div class="bg-white border shadow p-2">
						<img class="" src="/images/solargeyser-100.jpg" alt="">
						<h4 class=" text-max-primary uppercase text-center pb-4 px-4 whitespace-no-wrap">Solar Geysers</h4>
					</div>
				</div>
				<div class="w-1/3 p-2">
					<div class="bg-white border shadow p-2">
						<img class="" src="/images/streetlighting-100.jpg" alt="">
						<h4 class=" text-max-primary uppercase text-center pb-4 px-4 whitespace-no-wrap">Solar Street Lighting</h4>
					</div>
				</div>
				<div class="w-1/3 p-2">
					<div class="bg-white border shadow p-2">
						<img class="" src="/images/solar-100.jpg" alt="">
						<h4 class=" text-max-primary uppercase text-center pb-4 px-4 whitespace-no-wrap">Off-grid Solar</h4>
					</div>
				</div>
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
<div class="bg-black mt-8 text-sm text-white py-6">
	<div class="container mx-auto mb-6">
		<div class="flex flex-wrap leading-normal">
			<div class="w-1/4">
				<h5 class="text-lg font-normal mb-2">CUSTOMER SERVICES</h5>
				<div class="flex flex-col">
					<a href="#" class="no-underline text-white hover:text-max-primary">Contact Us</a>
					<a href="#" class="no-underline text-white hover:text-max-primary">FAQs</a>
					<a href="#" class="no-underline text-white hover:text-max-primary">Warranties</a>
				</div>
			</div>
			<div class="w-1/4">
				<h5 class="text-lg font-normal mb-2">SHOPPING WITH US</h5>
				<div class="flex flex-col">
					<a href="#" class="no-underline text-white hover:text-max-primary">Delivery Options</a>
					<a href="#" class="no-underline text-white hover:text-max-primary">Reterns/Refunds Policy</a>
					<a href="#" class="no-underline text-white hover:text-max-primary">Terms and Conditions</a>
				</div>
			</div>
			<div class="w-1/4">
				<h5 class="text-lg font-normal mb-2">MY ACCOUNT</h5>
				<div class="flex flex-col">
					<a href="#" class="no-underline text-white hover:text-max-primary">Profile</a>
					<a href="#" class="no-underline text-white hover:text-max-primary">Orders</a>
				</div>
			</div>
			<div class="w-1/4">
				<h5 class="text-lg font-normal mb-2">WHERE TO FIND US</h5>
				<address>
					+27 (011) 918 1800
					+27 (011) 918 1809
					info@maximtrading.co.za
					222, 14th Avenue, 
					Anderbolt, 
					Boksburg, 
					Gauteng
				</address>
			</div>
		</div>
		<div class="flex justify-end mt-6">
			<a href="/" class="no-underline" title="Homepage"><img class="w-32" src="images/max-renew-logo.svg" alt=""></a>
		</div>
	</div>
</div>
@endsection
