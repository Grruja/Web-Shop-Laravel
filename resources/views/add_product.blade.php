@extends('layout')

@section('page_content')
    <div class="container">
        <form method="POST" action="{{ route('product.save') }}">
            {{ csrf_field() }}

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p
                @endforeach
            @endif

            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name">

            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" value="{{ old('description') }}" id="description" cols="30" rows="5"></textarea>

            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" value="{{ old('amount') }}" class="form-control" id="amount">

            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="price">

            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" value="{{ old('name') }}" class="form-control" id="image">

            <button class="btn btn-danger text-white mt-3">Submit</button>
        </form>
    </div>
@endsection
