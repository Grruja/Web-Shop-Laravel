@extends("layout")

@section("page_title")
    Dashboard
@endsection

@section("page_content")
    <div class="container mt-5">

        @if( $hour >= 0 && $hour <= 12 )
            <h1>Good morning</h1>
        @else
            <h1>Good afternoon</h1>
        @endif

        <p>Current hour: {{ $hour }}</p>
        <p>Current time: {{ $current_time }}</p>

        <hr>

        <div>
            <h2>Top products</h2>
            <div class="d-flex gap-2">
                @foreach($products as $product)
                    <div class="p-4 bg-light shadow w-100">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <p class="fs-3 text-success">${{ $product->price }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
