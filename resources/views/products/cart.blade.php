<h1>My cart</h1>

<div>
    @foreach( $my_cart as $product )
        <div>
            <h3>{{ $product['name'] }}</h3>
            <p>Price: ${{ $product['price'] }}</p>
            <p>Amount: {{ $product['amount'] }}</p>
            <p>Total price: ${{ $product['total'] }}</p>
        </div>
        <hr>
    @endforeach
</div>

