{{-- categoryProducts --}}
@extends('layouts.store.main_page')
@section('title', 'All Products')
@section('content')
    <div class="py-5">
        <div class="container">
            <br>
            <h2 class="text-center">{{ $categoryName }}</h2>
            <hr>
            <div class="row gy-5">
                @foreach ($categoryProducts as $product)
                    <div class="col-md-3">
                        @include('layouts.store.storeparts.product-card')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
