@extends('layouts.app')

@section('head')
@parent

@endsection
@section('body')
<div class="container flex-1 mx-auto pb-8">
	<div class="mt-6">
		<h1 class="font-extrabold uppercase mb-4">Search Results</h1>
		<ais-index :search-store="searchStore" query="{{ $query }}" class="flex-grow">
			<div class="container mx-auto px-2 sm:px-0">
				<div class="flex items-center w-full">
					<ais-search-box class="w-full relative flex items-center">
						<ais-results v-show="searchStore.query.length > 0" class="" style="top: 102%">
							<template slot-scope="{ result }">
								<a :href="result.url" class="block text-xl font-bold no-underline text-sanika-secondary border-b p-2 mb-4 hover:bg-grey-lighter hover:text-sanika-primary">
									<span class="block mb-2">
										<ais-highlight :result="result" attribute-name="name"></ais-highlight>
									</span>
									<p class="font-normal text-base mb-4 text-sanika-secondary">
										<ais-snippet :result="result" attribute-name="description"></ais-snippet>
									</p>
									<div class="font-light text-sm mb-4 text-sanika-secondary">
										<span class="text-sm font-normal inline-block mr-1 rounded-full border border-grey-light px-2 py-1 mb-1 text-sanika-secondary" v-for="result in result.tags">@{{ result }}</span>
									</div>
								</a>
							</template>
						</ais-results>
					</ais-search-box>
				</div>
			</div>
		</ais-index>
	</div>
</div>
@include('partial.footer')
@endsection
