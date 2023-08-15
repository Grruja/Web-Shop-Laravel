@extends('layout')

@section('page_content')
    <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST" class="container">

        {{ csrf_field() }}

        @if ($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif

        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="name">

        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{ $product->description }}</textarea>

        <label for="amount" class="form-label">Amount</label>
        <input type="number" name="amount" value="{{ $product->amount }}" class="form-control" id="amount">

        <label for="price" class="form-label">Price</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control" id="price">

        <label for="image" class="form-label">Image</label>
        <input type="text" name="image" value="{{ $product->image }}" class="form-control" id="image">

        <button class="btn btn-danger text-white mt-3">Update</button>
    </form>
@endsection
