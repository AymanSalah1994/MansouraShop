@extends('layouts.store.main_page')

@section('slider')
    @include('layouts.store.storeparts.carousel')
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                @foreach ($featured_products as $product)
                    <div class="col-md-3">
                        @include('layouts.store.storeparts.card')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
