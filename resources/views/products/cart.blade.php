<h1>My cart</h1>

<div class="d-flex gap-2 flex-wrap">
    @foreach( $products as $product )
        <div class="p-4 bg-light shadow w-100">
            <p>Id: {{ $product['product_id'] }}</p>
            <p>Amount: {{ $product['amount'] }}</p>
        </div>
    @endforeach
</div>

