@extends("layout")

@section("page_title")
    Shop
@endsection

@section("page_content")
    <div class="container mt-5">
        <h2>This is shop page</h2>

        <hr>

        <h4>New products</h4>
        @foreach($latest_products as $latest_product)
                <p>{{$latest_product->name}}</p>
        @endforeach

        <hr>

        <h4>All products</h4>
        @foreach( $products as $product )
            <p>{{ $product->name }}</p>
        @endforeach
    </div>
@endsection
