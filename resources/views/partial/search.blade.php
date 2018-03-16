<div class="bg-white py-4 relative z-30">
	<ais-index :search-store="searchStore">
		<div class="container mx-auto flex items-center bg-white px-2 pt-2 sm:px-0">
			<div class="mr-4">
				<a href="/" class="no-underline" title="Homepage"><img class="w-48" src="/images/max-renew-logo.svg" alt=""></a>
			</div>
			<div class="flex items-center w-full">
				<ais-search-box class="w-full relative flex items-center">
					<ais-input placeholder="Search product by name or reference..." :class-names="{ 'ais-input': 'shadow appearance-none border rounded flex-grow py-2 px-3 mr-1 text-grey-darker' }">
					</ais-input>
					<ais-clear v-show="searchStore.query.length > 0" :class-names="{'ais-clear': 'flex-no-shrink p-2 px-3 rounded-full bg-teal text-white border-teal mx-1 hover:bg-teal-dark'}">
						<font-awesome-icon :icon="icons.times" />
					</ais-clear>
					<button class="flex-no-shrink p-2 px-3 rounded-full bg-teal text-white border-teal mx-1 hover:bg-teal-dark" type="submit">
						<font-awesome-icon :icon="icons.search" />
					</button>
					<ais-results v-show="searchStore.query.length > 0" class="absolute pin-x pin-t bg-white p-2 shadow" style="top: 102%">
						<template slot-scope="{ result }">
							<a :href="result.url" class="block font-bold no-underline text-max-primary p-2 hover:bg-grey-lighter">
								<ais-highlight :result="result" attribute-name="name"></ais-highlight>
								<p class="font-normal text-sm">
									<ais-highlight :result="result" attribute-name="description"></ais-highlight>
								</p>
							</a>
						</template>
					</ais-results>
				</ais-search-box>
				@include('partial.cart')
			</div>
		</div>
	</ais-index>
</div>
<div v-show="searchStore.query.length > 0" class="z-0 absolute pin bg-max-primary opacity-75"></div>