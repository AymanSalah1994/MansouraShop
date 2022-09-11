@if (empty($product))
    <div class="card">
        <img src="{{ asset('images/some_asset/1.jpg') }}" alt="product-image">
        <div class="card-body">
            <h5>Demo Product</h5>
        </div>
    </div>
@else
    <div class="card">
        <img src="{{ Storage::url($product->product_picture) }}" alt="product-image">
        <div class="card-body">
            <h5>{{ $product->name }}</h5>
        </div>
    </div>
@endif