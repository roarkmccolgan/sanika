@extends('layouts.app')

@section('body')
<div class="container flex-1 mx-auto pb-8">
    <div class="mt-6">
        <h1 class="font-extrabold uppercase mb-4">Search Results</h1>
        @forelse($products as $product)
            <a href="/categories/{{ $product->path }}/products/{{ $product->alias }}" class="block text-xl font-bold no-underline text-sanika-secondary border-b p-2 mb-4 hover:bg-grey-lighter hover:text-sanika-primary">
                <span class="block mb-2">{{ $product->name }}</span>
                <p class="font-normal text-base mb-4 text-sanika-secondary">{{ strip_tags($product->description) }}</p>
                <div class="font-light text-sm mb-4 text-sanika-secondary">
                    @foreach($product->uses ?? [] as $use)
                        <span class="text-sm font-normal inline-block mr-1 rounded-full border border-grey-light px-2 py-1 mb-1 text-sanika-secondary">{{ $use }}</span>
                    @endforeach
                </div>
            </a>
        @empty
            <p>No products found for “{{ $query }}”.</p>
        @endforelse
    </div>
</div>
@include('partial.footer')
@endsection
