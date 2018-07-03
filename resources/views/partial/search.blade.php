<div class="bg-grey-dark py-4 relative z-30 mt-4">
	<div class="container mx-auto flex items-center">
		<ais-index :search-store="searchStore" class="flex-grow">
			<div class="container mx-auto px-2 sm:px-0">
				<div class="flex items-center w-full">
					<ais-search-box class="w-full relative flex items-center">
						<ais-input placeholder="Search" :class-names="{ 'ais-input': 'shadow appearance-none bg-grey-lightest rounded flex-grow py-2 px-3 mr-1 text-grey-darkest' }">
						</ais-input>
						<ais-clear v-show="searchStore.query.length > 0" :class-names="{'ais-clear': 'flex-no-shrink p-2 px-3 rounded-full bg-sanika-primary text-white border-sanika-primary mx-1 hover:bg-sanika-primary'}">
							<font-awesome-icon :icon="icons.times" />
						</ais-clear>
						<button class="flex-no-shrink p-2 px-3 rounded-full bg-sanika-primary text-white border-sanika-primary mx-1 hover:bg-sanika-primary" type="submit">
							<font-awesome-icon :icon="icons.search" />
						</button>
						<ais-results v-show="searchStore.query.length > 0" class="absolute pin-x pin-t bg-white p-2 shadow" style="top: 102%">
							<template slot-scope="{ result }">
								<a :href="result.url" class="block font-bold no-underline text-sanika-secondary p-2 hover:bg-grey-lighter">
									<ais-highlight :result="result" attribute-name="name"></ais-highlight>
									<p class="font-normal text-sm">
										<ais-snippet :result="result" attribute-name="description"></ais-snippet>
									</p>
								</a>
							</template>
						</ais-results>
					</ais-search-box>
				</div>
			</div>
		</ais-index>
		@if (!Request::is('checkout'))
			
		@endif
	</div>
</div>
<div v-show="searchStore.query.length > 0" class="z-20 absolute pin bg-black opacity-75"></div>