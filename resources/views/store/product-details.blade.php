@extends('layouts.store.main_page')
@section('title', $product->name)

@section('content')
    <div class="py-3 px-5 mb-2 shadow-sm bg-warning border-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('category.products', $product->category->id) }}">{{ $product->category->name }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="card shadow ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ Storage::url($product->product_picture) }}" class="w-100 " alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                        </h2>
                        <label
                            class="float-end badge bg-danger badge-info">{{ $product->trending == '1' ? 'Trending' : '' }}</label>
                        <br>
                        <hr>
                        <label for="" class="me-5">Original Price : <s>{{ $product->original_price }}</s></label>
                        <label for="" class="fw-bold">Selling price :{{ $product->selling_price }}</label>
                        <br>
                        <p>
                            {{ $product->description }}
                        </p>
                        <hr>
                        {{-- $procut->quantity > 0 --}}
                        @if ($product->status == '1')
                            <label for="" class="badge bg-success">Available</label>
                        @else
                            <label for="" class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-5">
                            <div class="col-md-2">
                                <label for="">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span class="input-group-text decrement-btn">-</span>
                                    <input type="text" name="" value="1" class="form-control quantity-input">
                                    <span class="input-group-text increment-btn">+</span>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <br>
                                <button type="button" class="btn btn-success me-3 float-start">ِAdd To wishlist
                                    <i class="bi bi-balloon-heart"></i>
                                </button>
                                <button type="button" class="btn btn-primary me-3 float-start">Add to Cart
                                    <i class="bi bi-cart"></i>
                                </button>
                            </div>
                        </div>
                        <div>
                            <h3>Buyer: </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

@section('scripts')
    <script>
        console.log('xxx');
        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var box_value = $('.quantity-input').val();
                var parsed_box_value = parseInt(box_value, 10);
                console.log(parsed_box_value);
                parsed_box_value = isNaN(parsed_box_value) ? 0 : parsed_box_value;
                if (parsed_box_value < 10) {
                    ++parsed_box_value;
                    $('.quantity-input').val(parsed_box_value);
                }


            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var box_value = $('.quantity-input').val();
                var parsed_box_value = parseInt(box_value, 10);
                console.log(parsed_box_value);
                parsed_box_value = isNaN(parsed_box_value) ? 0 : parsed_box_value;
                if (parsed_box_value < 10 && parsed_box_value > 1) {
                    --parsed_box_value;
                    $('.quantity-input').val(parsed_box_value);
                }


            });

            
        });
    </script>
@endsection
