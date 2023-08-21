@extends('layout')

@section('page_content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p class="text-success fs-4">${{ $product->price }}</p>
    <p>Amount left: {{ $product->amount }}</p>

    <hr>
    <form action="{{ route('cart.add') }}" method="POST">
        {{ csrf_field() }}

        @if($errors->any())
            <p class="text-danger">{{ $errors->first() }}</p>
        @endif

        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="number" name="amount" placeholder="Enter amount">
        <button class="btn btn-primary">Add to cart</button>
    </form>
@endsection
