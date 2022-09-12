@isset($category)
    <div class="card">
        <img src="{{ Storage::url($category->category_picture) }}" alt="product-image">
        <div class="card-body">
            <h5>{{ $category->name }}</h5>
            <span class="float-start">{{ $category->description }}</span>
        </div>
    </div>
@endisset