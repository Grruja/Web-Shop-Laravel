@extends("layout")

@section("page_content")
    <div class="container">
        <table class="table table-responsive">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($all_contacts as $contact)
                    <tr>
                        <th scope="row">{{ $contact->id }}</th>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>
                        <td>${{ $contact->created_at }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('delete_contact', ['contact' => $contact->id]) }}">Delete</a>
                            <a class="btn btn-primary" href="{{ route('edit_contact', ['contact' => $contact->id]) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
