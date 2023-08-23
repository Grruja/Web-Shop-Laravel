<h1>My cart</h1>

<div>
    @foreach( $my_cart as $product )
        <div>
            <h3>{{ $product['name'] }}</h3>
            <p>Price: ${{ $product['price'] }}</p>
            <p>Amount: {{ $product['amount'] }}</p>
            <p>Total price: ${{ $product['total'] }}</p>
            @if ($errors->any())
                <p>{{ $errors->first() }}</p>
            @endif
        </div>
        <hr>
    @endforeach

    <a href="{{ route('cart.finish') }}">BUY</a>
</div>

