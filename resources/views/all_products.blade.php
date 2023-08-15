@extends("layout")

@section("page_content")
    <div class="container">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->amount }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->image }}</td>
                        <td>
                            <a href="{{ route('product.delete', ['product' => $product->id]) }}" class="btn btn-danger">Delete</a>
                            <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
