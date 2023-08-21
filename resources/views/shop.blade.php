@extends("layout")

@section("page_title")
    Shop
@endsection

@section("page_content")
    <div class="container mt-5">
        <h2>This is shop page</h2>

        <hr>

        <h4>Latest products</h4>
        <div class="d-flex gap-2 flex-wrap">
            @foreach($latest_products as $latest_product)
                <div class="p-4 bg-light shadow w-100">
                    <h3>{{ $latest_product->name }}</h3>
                    <p>{{ $latest_product->description }}</p>
                    <p class="fs-3 text-success">${{ $latest_product->price }}</p>
                    <a href="{{ route('permalink', ['product' => $latest_product->id]) }}" class="btn btn-outline-primary">View more</a>
                </div>
            @endforeach
        </div>

        <hr>

        <h4>All products</h4>
        <div class="d-flex gap-2 flex-wrap">
            @foreach( $products as $product )
                <div class="p-4 bg-light shadow w-100">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p class="fs-3 text-success">${{ $product->price }}</p>
                    <a href="{{ route('permalink', ['product' => $latest_product->id]) }}" class="btn btn-outline-primary">View more</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
